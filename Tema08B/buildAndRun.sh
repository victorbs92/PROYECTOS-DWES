#!/bin/sh
mvn clean package && docker build -t com.mycompany/Tema08B .
docker rm -f Tema08B || true && docker run -d -p 9080:9080 -p 9443:9443 --name Tema08B com.mycompany/Tema08B