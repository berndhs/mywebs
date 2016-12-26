#!/bin/make

INSTALLOPTS= --verbose --compare

WEBHOME=echo `pwd` |sed "s+${HOME}/mywebs+/var/www/html+"

SUBDIRS  = 
LOCALSRC = *.php
#    index.php defs.php navset.php nav.php locallist.inc remotelist.inc \
#	weather.php nada.png nada.jpg box.png smiley-3.png \
	# paper.jpg paper.png bernd-styles.css crumple.jpg \
	# favicon.ico mp.jpg mp.png homelink.php homelinkvar.php \
	# homelink.html webcam.php webcamjava.php \
	# sethostvar.php
	
help:
	echo "files are " ${LOCALSRC}
	echo "installing to " ${WEBHOME}
	
install:
	install ${INSTALLOPTS} ${LOCALSRC} ${WEBHOME}
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d all; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
