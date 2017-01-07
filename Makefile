
INSTALLOPTS= --verbose --compare

WEBHOME=/var/www/html/
SUBDIRS  = samoaweb
LOCALSRC = README.md Makefile
	
help:
	echo "installing to ${WEBHOME}"
	echo "files are " ${LOCALSRC}
	echo "or " ; ls ${LOCALSRC}
	
all:
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   make -C $$D WEBHOME=${WEBHOME}/$$d all; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done

install:
	echo "installing to ${WEBHOME}"
	install $(INSTALLOPTS) $(LOCALSRC) $(WEBHOME)
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   if [ ! -e ${WEBHOME}/$$d ] ; then mkdir ${WEBHOME}/$$d ; fi ; \
	   make -C $$d WEBHOME=${WEBHOME}/$$d install; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
