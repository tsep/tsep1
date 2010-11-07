#!/bin/sh
#
# (dont forget to create a sub-directory named 'pic', if you run this example-script unchanged)
#
sh wwwshot.sh << END
http://www.mozilla.org 5 pic/mozilla.png pic/tn_mozilla.jpg
http://www.imagemagick.org 10 pic/imagemagick.png pic/tn_imagemagick.jpg
http://tsep.sourceforge.net 7 pic/tsep_sf_net.jpg pic/tn_tsep_sf_net.jpg
END
