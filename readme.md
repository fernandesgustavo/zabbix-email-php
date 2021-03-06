### Informações sobre o projeto

- API para envio de e-mail a partir do Zabbix, baseada no micro-framework Lumen, podendo ser personalizada para outras integrações.

- Está é uma versão em PHP do módulo de e-mail para o magic_stack, com algumas alterações do projeto inicial, criado por Diego Rodrigues. Para mais informações consultar https://github.com/diegodrf/magic-stack e https://github.com/diegodrf/zabbix-email.



### Pré-requisitos

- Instalação do GIT.
- Instalação do Docker.
- Configuração do magic_stack.



### Preparação do código fonte

- Clonar o projeto;
- Criar a pasta images e adicionar a logo da empresa de origem dos e-mails (zabbix-email-php/public/images/logo.png).
- Essa logo será utilizada nas views (zabbix-email-php/resources/views/emails/*) de cada tipo de e-mail. Fique a vontade para personalizar o front e imagens.



### Docker image e container

- Na raíz do projeto execute: 

docker build -t "gustavodevops/zabbix-email-php:1.0" .
(comando para criar uma imagem Docker a partir do código fonte)

docker container run zabbix-email-php -d -p 8002:80 -e ZABBIX_URL="http://URL_DO_ZABBIX/zabbix/" -e ZABBIX_USER="USUARIO_DO_ZABBIX" -e ZABBIX_PASSWORD="SENHA_DO_ZABBIX" gustavodevops/zabbix-email-php:1.0
(comando para subir o container Docker a partir da imagem criada anteriormente, com os parâmetros necessários)


    
### URLs

- http://localhost:8002/api/v1/info GET (exibe informações sobre a API)
- http://localhost:8002/api/v1/graph/{item_id}/{item_name} GET (recebe os parâmetros e exibe o gráfico com o intervalo de 1h)
- http://localhost:8002/api/v1/email POST (recebe os parâmetros para envio do e-mail do magic_stack)



### Alterações/Atualizações

- O primeiro parâmetro enviado para o magic.py deverá ser URL:PORTA/api/v1/email;

![Tela de exemplo de configuração da media.](https://github.com/fernandesgustavo/zabbix-email-php/blob/master/public/examples/zabbix-media.png)


- O layout do e-mail está configurado nas views e não mais no Zabbix;
- O último parâmetro deverá estar configurado como JSON no Zabbix, com a seguinte estrutura:

```json
{
"type": "problem",
"ackmessage": "{ACK.MESSAGE}",
"ackdate": "{ACK.DATE}",
"triggername": "{TRIGGER.NAME}",
"triggerstatus": "{TRIGGER.STATUS}",
"triggerseverity": "{TRIGGER.SEVERITY}",
"eventdate": "{EVENT.DATE}",
"eventtime": "{EVENT.TIME}",
"eventrecoverydate": "{EVENT.RECOVERY.DATE}",
"eventrecoverytime": "{EVENT.RECOVERY.TIME}",
"eventage": "{EVENT.AGE}",
"hostname": "{HOST.NAME1}",
"hostdns": "{HOST.DNS1}",
"hostip": "{HOST.IP1}",
"hostdescription": "{HOST.DESCRIPTION1}",
"triggerdescription": "{TRIGGER.DESCRIPTION}",
"eventid": "{EVENT.ID}",
"itemid": "{ITEM.ID1}",
"itemname": "{ITEM.NAME1}",
"itemvalue": "{ITEM.VALUE1}"
}
```

![Tela de exemplo de configuração da ação.](https://github.com/fernandesgustavo/zabbix-email-php/blob/master/public/examples/zabbix-action.png)


- A view será selecionada para envio de acordo com o campo type (problem, resolved, acknowledged).
- Fique a vontade para passar a quantidade de parâmetros que achar necessário no JSON, eles poderão ser utilizados nas views.


### Telas de e-mail default

- Problem

![Tela de exemplo de um e-mail como problem.](https://github.com/fernandesgustavo/zabbix-email-php/blob/master/public/examples/zabbix-problem.png)

- Resolved

![Tela de exemplo de um e-mail como resolved.](https://github.com/fernandesgustavo/zabbix-email-php/blob/master/public/examples/zabbix-resolved.png)

- Acknowledged

![Tela de exemplo de um e-mail como acknowledged.](https://github.com/fernandesgustavo/zabbix-email-php/blob/master/public/examples/zabbix-acknowledged.png)

Retificando que antes de gerar a imagem Docker você poderá criar novas views html e passar os parâmetros pelo JSON, construindo e-mails personalizados.