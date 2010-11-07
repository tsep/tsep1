@echo off
REM
REM TSEP - automatic indexing using curl (curl downloadable from http://curl.haxx.se)
REM
REM please adjust the following env-vars to your needs:
REM   DIR_LOCAL_TSEP - root-directory, where tsep has been installed to
REM   DIR_WWW_TSEP   - same as DIR_LOCAL_TSEP, but http://-adress, where TSEP can be found
REM   PHPEXE         - full path to your php.exe
REM   CURLEXE        - full path to your curl.exe
REM
REM How this .cmd-file works:
REM
REM 0. if you call the .cmd-file without any parameter, the indexer is run for the currently active indexingprofile
REM    otherwise, the parameter(s) give is used as profile-name-definition:
REM       e.g. TSEPautoIndexing              - runs indexing for the current indexingprofile
REM            TSEPautoIndexing demo         - runs indexing for indexingprofile 'demo'
REM            TSEPautoIndexing my demo      - runs indexing for indexingprofile 'my demo'
REM                                            (do not use any quotes, if the indexingprofilename contains blanks)
REM 1. %SUBDIR_BGIND% subdirectory is created (if not existing) under the tsep-installation-directory
REM    The result- / logfiles are placed there.
REM    The reason, why it's a subdir under tsep is: if you open the logfile with your browser, this logfile
REM    is able to correclty (find and) load the "<?php echo TSEP_CLIENT_ROOT?>/static/css/tsep.css" file to have a nice view :-)
REM 2. a temporary php-script is built, which writes the .cmd-file commands for running curl (indexing)
REM 3. the temp-php-script is run, redirecting the output to a temp-.cmd-file
REM 4. the temp-.cmd-file is run, which uses curl.exe to run the indexer
REM 5. as a result (in addition to the real indexing of course ;-) you can find the logfile of the indexing-
REM    process in %DIR_LOCAL_TSEP%\%SUBDIR_BGIND%
REM    named yyyymmtt-hhmmss_Indexingprofile_zzz.html
REM    where yyyymmtt-hhmmss is year/month/day-hour/minute/second at which the process started
REM      and zzz is either 'CURRENT' or the profile-name, if given (see chapter 0. above)
REM
REM following will be filled automatically by SubVersion!
REM Do not change by hand!
REM  $LastChangedDate: 2005-05-17 17:18:57 +0200 (Tue, 17 May 2005) $
REM  @lastedited $LastChangedBy: olaf $
REM  $LastChangedRevision: 41 $

set DIR_LOCAL_TSEP=d:\srv\www\htdocs\php\tsep
set DIR_WWW_TSEP=http://localhost/php/tsep
set PHPEXE=D:\Programme\xampp\php\php.exe
set CURLEXE=D:\Ut\Curl.exe

set SUBDIR_BGIND=bgindexing.log


REM *****
REM * * * prechecks
REM *****

if not exist %PHPEXE% echo %0: PHP executable not found: %PHPEXE%
if not exist %PHPEXE% goto :EOF

if not exist %CURLEXE% echo %0: CURL executable not found: %CURLEXE%
if not exist %CURLEXE% goto :EOF


REM *****
REM * * * check output-destination-directory
REM *****

cd %DIR_LOCAL_TSEP%\%SUBDIR_BGIND%
if errorlevel == 1 goto MKD
goto DIROK

:MKD

mkdir "%DIR_LOCAL_TSEP%\%SUBDIR_BGIND%"
cd %DIR_LOCAL_TSEP%\%SUBDIR_BGIND%
if errorlevel == 1 goto MKDERR
goto DIROK

:MKDERR

echo %0: unable to create directory %DIR_LOCAL_TSEP%\%SUBDIR_BGIND% - indexing aborted
goto :EOF

:DIROK



REM *****
REM * * * check output-destination-directory
REM *****

set FNPHPTMP=
set FNCMDTMP=
if not "%TEMP%" == "" set FNPHPTMP=%TEMP%\TSEPautoIndexingTmp.php
if not "%TMP%" == ""  set FNPHPTMP=%TMP%\TSEPautoIndexingTmp.php
if not "%TEMP%" == "" set FNCMDTMP=%TEMP%\TSEPautoIndexingTmp.cmd
if not "%TMP%" == ""  set FNCMDTMP=%TMP%\TSEPautoIndexingTmp.cmd

if "%FNPHPTMP%" == "" goto FNPHPTMPERR
goto FNPHPTMPOK

:FNPHPTMPERR

echo %0: unable to build php-tempfile or cmd-tempfile
goto :EOF

:FNPHPTMPOK



REM *****
REM * * * build temp-php-file, which creates a tmp-.cmd-file to run curl
REM * * * (this way is used, to have the ability, that the resulting log-file has a timestamp in its name
REM * * * this temp-php-file and the resulting tmp-.cmd-file are intentionally not removed
REM *****

set PROF=%*

for /f %%i in ("<?php") do echo %%i  >%FNPHPTMP%
echo $fn = preg_replace("/\\\/","\\", '%DIR_LOCAL_TSEP%\\%SUBDIR_BGIND%\\') . date("Ymd-His");       >>%FNPHPTMP%

if "%PROF%" == "" goto PROFCURR
echo $fn .= "_Indexingprofile_%PROF%.html"; >>%FNPHPTMP%
echo echo "\"" . '%CURLEXE%' . "\" \"%DIR_WWW_TSEP%/admin/indexer.php\" -d startindexing=startindexing -d profile=\"%PROF%\" -o \"$fn\"\n"; >>%FNPHPTMP%
goto PROFEND

:PROFCURR
echo $fn .= "_Indexingprofile_CURRENT.html"; >>%FNPHPTMP%
echo echo "\" . '%CURLEXE%' . "\" \"%DIR_WWW_TSEP%/admin/indexer.php\" -d startindexing=startindexing -o \"$fn\"\n"; >>%FNPHPTMP%

:PROFEND

for /f %%i in ("?>") do echo %%i  >>%FNPHPTMP%


REM *****
REM * * * run temp-php-file to create tmp-.cmd-file to run curl
REM *****

%PHPEXE% -e %FNPHPTMP% >%FNCMDTMP%
if errorlevel == 1 goto PHPERR
goto PHPOK

:PHPERR
echo %0: error while running temp-phpfile: %FNPHPTMP% (errormessage see there)
goto :EOF

:PHPOK


REM *****
REM * * * run tmp-.cmd-file
REM *****

call %FNCMDTMP%
