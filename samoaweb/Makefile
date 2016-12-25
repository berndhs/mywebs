
INSTALLOPTS= --verbose --compare

WEBHOME=/var/www/html/
SUBDIRS  = books tpl berndhs.com
LOCALSRC = *.php *.jpg *.png *.inc *.css Makefile readme.txt *.pdf *.js
#    index.php defs.php navset.php nav.php locallist.inc remotelist.inc \
#	weather.php nada.png nada.jpg box.png smiley-3.png \
	# paper.jpg paper.png bernd-styles.css crumple.jpg \
	# favicon.ico mp.jpg mp.png homelink.php homelinkvar.php \
	# homelink.html webcam.php webcamjava.php \
	# sethostvar.php
	
help:
	echo "make installsrc for ${LOCALSRC}"
	echo "make installindex for index.php"
	echo "make install for everything"
	
installindex:
	install ${INSTALLOPTS} index.php ${WEBHOME}
	
installsrc:
	install ${INSTALLOPTS} ${LOCALSRC} ${WEBHOME}

all:
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d all; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done

localinst:
	bash ./make_sethostvar
	install  ${INSTALLOPTS} ${LOCALSRC} ${WEBHOME}

install: 
	@for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   if [ ! -e ${WEBHOME}/$$d ] ; then mkdir ${WEBHOME}/$$d ; fi ; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d install; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
	make localinst
