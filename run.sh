#!/bin/sh

GIT=$(which git)
DOCKER=$(which docker)
PWD=${PWD##*/}

# check for the programs we need
if [ $DOCKER = '' ]; then
    echo "This script requires docker."
    exit
fi

if [ $GIT = '' ]; then
    echo "This script requires git."
    exit
fi

# make sure we aren't already in the directory
if [ $PWD = "code-demo" ]; then
    cd ..
fi

# create the directory if we need to
if [ ! -d "code-demo" ]; then
    $GIT clone https://github.com/CColeman13/code-demo.git
fi

# build and start the container
if [ -d "code-demo" ]; then
    cd code-demo &&
        $DOCKER build . &&
        $DOCKER compose up
fi
