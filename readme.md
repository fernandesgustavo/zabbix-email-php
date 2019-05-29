### Informações sobre o projeto

- API para envio de e-mail a partir do Zabbix, podendo ser personalizada para outras integrações.

- Está é uma versão em PHP do módulo de e-mail para o magic_stack, com algumas alterações do projeto inicial, criado por Diego Rodrigues. Para mais informações consultar https://github.com/diegodrf/magic-stack e https://github.com/diegodrf/zabbix-email.


### Preparação do código fonte

- Clonar o projeto;
- 


### Gerar imagem e subir o container

docker container run --rm --name zabbix-email -d -p 8002:80 -e ZABBIXSERVER="http://URL_DO_ZABBIX/zabbix" -e ZABBIXUSER="USUARIO_DO_ZABBIX" -e ZABBIXPASSWORD="SENHA_DO_ZABBIX" diegodrf/zabbix-email:latest