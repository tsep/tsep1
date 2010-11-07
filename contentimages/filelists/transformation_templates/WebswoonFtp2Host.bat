@echo off
rem *** use '@REM' as comment-definition within tsep ***
setlocal
set ws_drive=d:
set ws_path=%ws_drive%\programme\webswoon
set ws_captdir=%ws_path%\captures
set tsep_fnftp=%temp%\tsep_ftp.dat
if exist "%tsep_fnftp%" del "%tsep_fnftp%"

%ws_drive%
cd %ws_captdir%

echo open ###WWW.MYHOST.COM###  >>%tsep_fnftp%
echo ###MYUSERID###             >>%tsep_fnftp%
echo ###MYPASSWD###             >>%tsep_fnftp%
echo bin                        >>%tsep_fnftp%
echo cd {IMAGE_ABSPATH}         >>%tsep_fnftp%

<!-- BEGIN PAGES -->
echo put {PAGENO}{IMAGE_FILEEXT} {MD5NAME}{IMAGE_FILEEXT}  >>"%tsep_fnftp%"
<!-- END PAGES -->

echo bye                        >>%tsep_fnftp%

ftp -s:"%tsep_fnftp%"

endlocal