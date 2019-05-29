### Informações sobre o projeto

- API para envio de e-mail a partir do Zabbix, baseada no micro-framework Lumen, podendo ser personalizada para outras integrações.

- Está é uma versão em PHP do módulo de e-mail para o magic_stack, com algumas alterações do projeto inicial, criado por Diego Rodrigues. Para mais informações consultar https://github.com/diegodrf/magic-stack e https://github.com/diegodrf/zabbix-email.


### Pré-requisitos

- Instalação do GIT.
- Instalação do Docker.
- Configuração do magic_stack.


### Preparação do código fonte

- Clonar o projeto;
- Criar a pasta images e adicionar a logo da empresa de origem dos e-mails (zabbix-email-php/public/images/empresa.png).
- Essa logo será utilizada nas views (zabbix-email-php/resources/views/emails/*) de cada tipo de e-mail. Fique a vontade para personalizar o front e imagens.


### Docker image e container

- Na raíz do projeto execute: 

- docker build -t "gustavodevops/zabbix-email-php:1.0" .
(comando para criar uma imagem Docker a partir do código fonte)

- docker container run zabbix-email-php -d -p 8002:80 -e ZABBIX_URL="http://URL_DO_ZABBIX/zabbix/" -e ZABBIX_USER="USUARIO_DO_ZABBIX" -e ZABBIX_PASSWORD="SENHA_DO_ZABBIX" gustavodevops/zabbix-email-php:1.0
(comando para subir o container Docker a partir da imagem criada anteriormente, com os parâmetros necessários)

    
### 