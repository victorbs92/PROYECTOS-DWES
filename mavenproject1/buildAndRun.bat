@echo off
call mvn clean package
call docker build -t com.mycompany/mavenproject1 .
call docker rm -f mavenproject1
call docker run -d -p 9080:9080 -p 9443:9443 --name mavenproject1 com.mycompany/mavenproject1