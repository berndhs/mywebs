
INSTALLOPTS= --verbose --compare

WEBHOME=/var/www/html/
SUBDIRS  =
LOCALSRC = \
	footer.html \
	index.php \
	moui-index.html 

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
	echo "Use:"
	echo "    make upload    to push to sf.net"
	echo "    make install   to push to localhost "

upload: 
	scp $(FILES) $(WEBTARGET)

install: $(FILES)
	./installfiles.sh moui $(FILES)

moui-index.html: moui-index.txt
	asciidoc moui-index.txt
