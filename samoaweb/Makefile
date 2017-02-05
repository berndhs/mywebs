
INSTALLOPTS= --verbose --compare

WEBHOME=/var/www/html/
SUBDIRS  = tpl
#SUBDIRS = books tpl mouiweb berndhs.com
LOCALSRC = *.php *.jpg *.png *.inc *.css Makefile *.pdf *.js
#    index.php defs.php navset.php nav.php locallist.inc remotelist.inc \
#	weather.php nada.png nada.jpg box.png smiley-3.png \
	# paper.jpg paper.png bernd-styles.css crumple.jpg \
	# favicon.ico mp.jpg mp.png homelink.php homelinkvar.php \
	# homelink.html webcam.php webcamjava.php \
	# sethostvar.php
	
help:
	echo "installing to ${WEBHOME}"
	echo "make installsrc for ${LOCALSRC}"
	echo "make installindex for index.php"
	echo "make install for everything"
	
installindex:
	echo "installing to ${WEBHOME}"
	install ${INSTALLOPTS} index.php ${WEBHOME}
	
installsrc:
	echo "installing to ${WEBHOME}"
	install ${INSTALLOPTS} ${LOCALSRC} ${WEBHOME}
	   
install:
	echo "installing to ${WEBHOME}"
	make installindex
	make installsrc
	install $(INSTALLOPTS) $(LOCALSRC) $(WEBHOME)
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   if [ ! -e ${WEBHOME}/$$d ] ; then mkdir ${WEBHOME}/$$d ; fi ; \
	   make -C $$d WEBHOME=${WEBHOME}/$$d install; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
