#
# TSEP - automatic indexing using curl
#
# please adjust DIR_LOCAL_TSEP and DIR_WWW_TSEP to your needs
#
# following will be filled automatically by SubVersion!
# Do not change by hand!
#  $LastChangedDate$
#  @lastedited $LastChangedBy$
#  $LastChangedRevision$

DIR_LOCAL_TSEP=/srv/www/htdocs/php/tsep
DIR_WWW_TSEP=http://localhost/php/tsep

SUBDIR_BGIND=bgindexing.log

if [ ! -d "$DIR_LOCAL_TSEP/$SUBDIR_BGIND" ]; then
   mkdir "$DIR_LOCAL_TSEP/$SUBDIR_BGIND"
   if [ $? -ne 0 ]; then
      echo "$0: unable to create directory \"$DIR_LOCAL_TSEP/$SUBDIR_BGIND\" - indexing aborted"
      exit 2;
   fi
fi

FNLOG=`date +"%Y%m%d-%H%M%S"`
PROF=$1
if [ ! -z "$PROF" ]; then
   FNLOG="${FNLOG}_Indexingprofile_\"$PROF\".html"
else
   PROF=
   FNLOG="${FNLOG}_Indexingprofile_CURRENT.html"
fi

FNLOG="$DIR_LOCAL_TSEP/$SUBDIR_BGIND/$FNLOG"

if [ ! -z "$PROF" ]; then
   curl $DIR_WWW_TSEP/admin/indexer.php -d startindexing=startindexing -d profile="$PROF" -o "$FNLOG"
else
   curl $DIR_WWW_TSEP/admin/indexer.php -d startindexing=startindexing -o "$FNLOG"
fi
