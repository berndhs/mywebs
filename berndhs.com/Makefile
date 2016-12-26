#!/bin/make

INSTALLOPTS= --verbose --compare

WEBHOME=/var/www/html/berndhs.com
SUBDIRS  = commute
LOCALSRC = *.php *.jpg *.png *.inc *.css Makefile README.md *.pdf *.js
#    index.php defs.php navset.php nav.php locallist.inc remotelist.inc \
#	weather.php nada.png nada.jpg box.png smiley-3.png \
	# paper.jpg paper.png bernd-styles.css crumple.jpg \
	# favicon.ico mp.jpg mp.png homelink.php homelinkvar.php \
	# homelink.html webcam.php webcamjava.php \
	# sethostvar.php
	
help:
	echo "files are " ${LOCALSRC}
	echo "or " ; ls ${LOCALSRC}
	
all:
	install ${INSTALLOPTS} ${LOCALSRC} ${WEBHOME}
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d all; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done

install:
	@for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   if [ ! -e ${WEBHOME}/$$d ] ; then mkdir ${WEBHOME}/$$d ; fi ; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d install; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
