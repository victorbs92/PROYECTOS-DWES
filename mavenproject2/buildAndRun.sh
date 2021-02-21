#!/bin/sh
mvn clean package && docker build -t com.mycompany/mavenproject2 .
docker rm -f mavenproject2 || true && docker run -d -p 9080:9080 -p 9443:9443 --name mavenproject2 com.mycompany/mavenproject2