#!/bin/sh
#
#
# following will be filled automatically by SubVersion!
# Do not change by hand!
#  $LastChangedDate: 2005-08-21 11:48:20 +0200 (So, 21 Aug 2005) $
#  @lastedited $LastChangedBy: manfred $
#  $LastChangedRevision: 292 $
#
# wwwshot.sh is intended to build screenshots from webpages
#
# <<<*>>> PLEASE adjust the settings below to your needs <<<*>>>
#
# the script needs to be run from within an X-server (e.g. KDE) and
# uses ImageMagick and Mozilla Firefox
# Javascript has to be enabled!
# Popupwindows has to be allowed!
#
# hint: have a look at the resulting images, because this script does not check 404,...
#
# usage-example:
#
# sh wwwshot.sh << END
# http://www.mozilla.org 5 pic/mozilla.png pic/tn_mozilla.jpg
# http://www.imagemagick.org 10 pic/imagemagick.png pic/tn_imagemagick.jpg
# http://tsep.sourceforge.net 7 pic/tsep_sf_net.jpg pic/tn_tsep_sf_net.jpg
# END
#
# parms: URL WAITTIME FNSCREENSHOT FNTHUMB
#        +---+--------+------------+------- URL of the page to be shot
#            +--------!------------!------- Time in seconds to wait for the page has been loaded
#                     +------------!------- Filename of the screenshotfile
#                                  +------- Filename of the thumbnailfile
#
# how it works:
# 1. a temp-html-file is built
# 2. the browser is launched using this temp-html-file
#    the html-file contains Javascript-code, which opens a second Browser-Window.
#    This second Browser-Window has the exact size, the screenshot should have (see $BROWSER_SIZE below)
#    and does not have an address-, status- or toolbar (therefor you do not have the nessecity to crop the image).
# 3. for each wwwshot.sh-inputline
#    a. load the given URL using the second Browser-Window
#    b. take a screenshot from this windows
#    c. crop the resulting image (if $CUT_BORDERS is not "0 0 0 0")
#    d. create a thumbnail-image (resize to $THUMB_GEOMETRY) [images are written into subdir 'pic', if you use this example unchanged]
#
# tools used within this script:
#    cat, cut, egrep, expr sleep, wc,  import, killall, xwininfo
#    convert, mogrify (imagemagick)
#
# this script is provided "as is" - no warranty - use it at your own risk



#+++++++++++++++++++++++++++++++++++++++++++++++++++
### please adjust the following value to your needs: < < < < < < < < < < < < < < < < < < < < < < <
#+++++++++++++++++++++++++++++++++++++++++++++++++++


# -------
# name to be used by killall - to close the browser after the work is done

PGM=firefox

# -------
# fully qualified name of the browser to be launched

BROWSER=/Programme/firefox/firefox
BROWSER=/opt/sw/firefox/firefox

# -------
# title of the browser - used to find out the window-id via xwininfo

BROWSER_TITLE="Mozilla Firefox"

# -------
# fully qualified commandline, used to load a new URL in the active browser-window (initially launched via "$BROWSER")
# use $URL as placeholder for the URL

BROWSER_OPENURL="$BROWSER -a firefox -remote \"openurl(\$URL)\""

# -------
# size of the browser-window, used to show the required URL and from which the screenshot is taken (<width>x<height>)

BROWSER_SIZE="700x400"

# -------
# borders to be cut from the screenshot taken from the browser-window
# define it as "top right bottom left" - e.g.: CUT_BORDERS="30 2 1 2"

CUT_BORDERS="0 0 0 0"

# -------
# thumbnailsize (this setting directly is used as geometry-definition for imagemagick)

THUMB_GEOMETRY="150x100"

# -------
# time to wait for the browser to start up the first time

INITTIME=10

#+++++++++++++++++++++++++++++++++++++++++++++++++++
### end of 'user servicable part' :-)
#+++++++++++++++++++++++++++++++++++++++++++++++++++



################################################################################
# some initial stuff
################################################################################

for TST in cat convert cut egrep expr import killall mogrify sleep xwininfo wc; do
   type $TST 2>/dev/null 1>&2
   if [ $? -ne 0 ]; then
      echo "$0: needed program not found (not installed?): $TST" 1>&2
      echo "$0: aborting" 1>&2
      exit 2
   fi
done

if [ ! -f $BROWSER -o ! -x $BROWSER ]; then
   echo "$0: \$BROWSER setting: file does not exists or has no execute-permission: $BROWSER" 1>&2
   exit 2
fi

###################
# prepare filelist
###################

FNTMPENTRIES=/tmp/TENTRIES$$
rm $FNTMPENTRIES 2>/dev/null

CT=0
while read REC; do
   CT=`expr $CT + 1`
   P1=`echo $REC|cut -d\  -f1`
   P2=`echo $REC|cut -d\  -f2`
   P3=`echo $REC|cut -d\  -f3`
   P4=`echo $REC|cut -d\  -f4`
   if [ -z "$P1" -o -z "$P2" -o -z "$P3" -o -z "$P4" ]; then
      echo "$0: incomplete input line $CT:" 1>&2
      echo -e "\t'$REC'" 1>&2
      echo "$0: aborting" 1>&2
      exit 2
   fi
   if [ "`echo $REC`" != "$P1 $P2 $P3 $P4" ]; then
      echo "$0: invalid input line $CT (possibly contains extra data):" 1>&2
      echo -e "\t'$REC'" 1>&2
      echo "$0: aborting" 1>&2
      exit 2
   fi
   echo $P1 $P2 $P3 $P4 >> $FNTMPENTRIES
done
CT_ENTRIES=`echo \`wc -l $FNTMPENTRIES\`|cut -d\  -f1`


########################
# compute size-settings
########################

checkNumeric() {
   if [ "$1" == "0" ]; then
      return;
   fi
   expr $1 + 0 2>/dev/null 1>&2
   if [ $? -ne 0 ]; then
      echo "$2" 1>&2
      exit 2;
   fi
}

BROWSER_WIDTH=`echo $BROWSER_SIZE|cut -dx -f1`
BROWSER_HEIGHT=`echo $BROWSER_SIZE|cut -dx -f2`

checkNumeric "$BROWSER_WIDTH" "$0: BROWSER_SIZE invalid - aborting" 
checkNumeric "$BROWSER_HEIGHT" "$0: BROWSER_SIZE invalid - aborting" 


CUT_BORDER_TOP=`echo $CUT_BORDERS|cut -d\  -f1`
CUT_BORDER_RGT=`echo $CUT_BORDERS|cut -d\  -f2`
CUT_BORDER_BOT=`echo $CUT_BORDERS|cut -d\  -f3`
CUT_BORDER_LFT=`echo $CUT_BORDERS|cut -d\  -f4`

checkNumeric "$CUT_BORDER_TOP" "$0: CUT_BORDERS invalid - aborting"
checkNumeric "$CUT_BORDER_RGT" "$0: CUT_BORDERS invalid - aborting"
checkNumeric "$CUT_BORDER_BOT" "$0: CUT_BORDERS invalid - aborting"
checkNumeric "$CUT_BORDER_LFT" "$0: CUT_BORDERS invalid - aborting"


if [ "`echo $CUT_BORDERS`" == "0 0 0 0" ]; then
   CROP_GEOMETRY=
else
   CROP_WIDTH=`expr $BROWSER_WIDTH - $CUT_BORDER_LFT - $CUT_BORDER_RGT`
   CROP_HEIGHT=`expr $BROWSER_HEIGHT - $CUT_BORDER_TOP - $CUT_BORDER_BOT`
   CROP_GEOMETRY="${CROP_WIDTH}x${CROP_HEIGHT}+${CUT_BORDER_LFT}+${CUT_BORDER_TOP}"
fi


################################################################################
# build temp-start-html, which launches a second window with the desired size
################################################################################

FNTMPSTARTHTML=/tmp/T$$.html
cat >$FNTMPSTARTHTML <<EOT
<html>
<body onload='window.open("about:blank","_blank","width=$BROWSER_WIDTH,height=$BROWSER_HEIGHT,top=0,left=0,dependent=no,location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no");'>
</body>
</html>
EOT


################################################################################
# launch the browser
################################################################################

$BROWSER $FNTMPSTARTHTML &

sleep $INITTIME


################################################################################
# find the window, having the wanted size
################################################################################

WNDSIZE="${BROWSER_WIDTH}x${BROWSER_HEIGHT}\\+[0-9]+\\+[0-9]+"
BRWWINID=`echo \`xwininfo -tree -root|egrep "$BROWSER_TITLE\".+ $WNDSIZE "\`|cut -d\  -f1`

if [ -z "$BRWWINID" ]; then
   echo -e "$0:unable to find window\n\thaving '$BROWSER_TITLE' in its name (title) and size '$WNDSIZE' - aborting" 1>&2
   echo "windows found with this name:" 1>&2
   xwininfo -tree -root|egrep "$BROWSER_TITLE\"" 1>&2
   echo "$0: aborting" 1>&2
   exit 2
fi


################################################################################
# do loop
################################################################################

CT=0
while read URL LOADTIME FN_SCREENSHOT FN_THUMB; do
   CT=`expr $CT + 1`
   echo -e "$CT/$CT_ENTRIES $URL...\c"

   eval $BROWSER_OPENURL
   sleep $LOADTIME
   import -window "$BRWWINID" $FN_SCREENSHOT
   cp $FN_SCREENSHOT $FN_THUMB
   if [ ! -z "$CROP_GEOMETRY" ]; then
      mogrify -crop $CROP_GEOMETRY "$FN_THUMB"
   fi
   convert $FN_THUMB -resize $THUMB_GEOMETRY $FN_THUMB

   echo -e "\r$CT/$CT_ENTRIES $URL - done"
done < $FNTMPENTRIES

killall -g $PGM
rm $FNTMPSTARTHTML $FNTMPENTRIES
