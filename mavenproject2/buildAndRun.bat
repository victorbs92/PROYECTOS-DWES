@echo off
call mvn clean package
call docker build -t com.mycompany/mavenproject2 .
call docker rm -f mavenproject2
call docker run -d -p 9080:9080 -p 9443:9443 --name mavenproject2 com.mycompany/mavenproject2