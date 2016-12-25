
WEBHOME=/var/www/html/tpl

SUBDIRS= 

LOCALSRC = front.php today.php linksarray.php Makefile \

INSTALL_FLAGS = --verbose --compare


all:
	for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d all; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
install:
	install  $(INSTALL_FLAGS)  $(LOCALSRC) $(WEBHOME)
	@for d in $(SUBDIRS) ; do \
	   echo ---------------Directory '[ ' $$d/ ' ]'; \
	   cd $$d; make WEBHOME=${WEBHOME}/$$d install; cd ..; \
	   echo ---------------finished ' [ ' $$d/ ' ]'; \
	   done
