FROM rabbitmq:3.8.3-management

LABEL maintainer="牛逗 <89731416@qq.com>"

RUN rabbitmq-plugins enable --offline rabbitmq_mqtt rabbitmq_federation_management rabbitmq_stomp


VOLUME /data/rabbitmq:/var/lib/rabbitmq

EXPOSE 5672 15672

CMD [ "rabbitmq-server" ]