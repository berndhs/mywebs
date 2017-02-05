
BASE = `basename \`pwd\``

WEBHOME=/var/www/html/sites/books/${BASE}

SUBDIRS  = 
LOCALSRC = *

localinst:
	if [ ! -e ${WEBHOME} ] ; then \
		mkdir ${WEBHOME} ; \
		fi
	install  ${LOCALSRC} ${WEBHOME}

install: localinst
	@for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d install; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
