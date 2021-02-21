@echo off
call mvn clean package
call docker build -t com.mycompany/Tema08B .
call docker rm -f Tema08B
call docker run -d -p 9080:9080 -p 9443:9443 --name Tema08B com.mycompany/Tema08B