#specify base image 
FROM ubuntu:latest

RUN apt update 

#install apache
RUN apt install –y apache2 apache2-utils 

RUN apt clean 

EXPOSE 80
 
CMD [“apache2ctl”, “-D”, “FOREGROUND”]