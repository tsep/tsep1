@echo off
rem *** use '@REM' as comment-definition within tsep ***
setlocal
set ws_drive=d:
set ws_path=%ws_drive%\programme\webswoon
set ws_appl=webswoon_console.exe
set ws_flistname=websites_list.txt
set ws_flist=%ws_path%\%ws_flistname%
set ws_captdir=%ws_path%\captures
if not exist "%ws_path%\%ws_appl%" goto ERRAPPL
if exist %ws_flist% del "%ws_flist%"
del /q "%ws_captdir%"

<!-- BEGIN PAGES -->
echo {PAGEURL}>>"%ws_flist%"
<!-- END PAGES -->

%ws_drive%
cd %ws_path%
%ws_appl% -c -f "%ws_flistname%"

call "{FNTRANS2DOS}"

goto ENDBAT

:ERRAPPL
echo File not found: %ws_appl%
goto ENDBAT

:ENDBAT
endlocal