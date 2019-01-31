FROM ubuntu:latest
RUN apt-get update
RUN apt-get install -y curl
ENV SITE_URL https://ya.ru/
WORKDIR /data
VOLUME /data
CMD sh -c "curl -L $SITE_URL > /data/curl.txt"

