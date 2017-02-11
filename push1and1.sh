#!/bin/bash -x
USER=`cat 1and1user`
HOST=`cat 1and1host`
echo "try to push to ${USER} @ ${HOST}"
scp samoaweb/index.php ${USER}@${HOST}:index.php
scp samoaweb/desk/index.php ${USER}@${HOST}:desk/index.php
scp samoaweb/mobile/index.php ${USER}@${HOST}:mobile/index.php
