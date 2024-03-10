FROM alpine:3.11.5

RUN apk add --no-cache nginx && mkdir -p /run/nginx \
    && mkdir -p /var/www/greenapi/

COPY custom.conf /etc/nginx/conf.d/

CMD ["nginx", "-g", "daemon off;"]