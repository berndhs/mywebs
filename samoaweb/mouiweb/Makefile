

FILES = footer.html \
	index.php \
	moui-index.html 

WEBTARGET = berndhs,moui@web.sourceforge.net:htdocs/

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
