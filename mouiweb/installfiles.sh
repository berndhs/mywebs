#!/bin/bash
set -x
WEBSITE=$1
shift
FILES=$*

if [ -d /var/www/html/moui ]
then
  TARGETDIR=/var/www/html
else
  if [ -d /var/www/html/moui ]
  then
    TARGETDIR=/var/www/html/moui
  else
    echo " No webhome directoy found! "
    exit 1
  fi
fi

install -d ${TARGETDIR}/${WEBSITE}
install -p -m 0644 ${FILES} ${TARGETDIR}/${WEBSITE}

