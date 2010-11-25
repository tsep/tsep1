@echo off
rem *** use '@REM' as comment-definition within tsep ***
setlocal
set ws_drive=d:
set ws_path=%ws_drive%\programme\webswoon
set ws_captdir=%ws_path%\captures

%ws_drive%
cd %ws_captdir%

<!-- BEGIN PAGES -->
copy {PAGENO}{IMAGE_FILEEXT} {IMAGE_ABSPATHDOS}\{MD5NAME}{IMAGE_FILEEXT}
<!-- END PAGES -->

endlocal