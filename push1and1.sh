#!/bin/bash -x
USER=`cat 1and1user`
HOST=`cat 1and1host`
scp samoaweb/index.php ${USER}@${HOST}:index.php
