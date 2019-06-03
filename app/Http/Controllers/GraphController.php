<?php

namespace App\Http\Controllers;

class GraphController extends Controller
{
    public function __construct()
    {
        //
    }

    public function showGraph($item_id, $item_name)
    {
        // informações para o login no zabbix
        $zabbix_url_login = env('ZABBIX_URL');
        $zabbix_url_graph = $zabbix_url_login . "chart3.php?name=$item_name&period=3600&width=800&height=200&stime=1558623863&items[0][itemid]=$item_id&items[0][drawtype]=5&items[0][color]=218910";
        $zabbix_user = env('ZABBIX_USER');
        $zabbix_password = env('ZABBIX_PASSWORD');

        // informações para o login na página inicial do zabbix
        $payload = array(
            'name' => $zabbix_user,
            'password' => $zabbix_password,
            'enter' => 'Sign in'
        );

        // arquivo para o cookie da sessão
        $cookieFile = 'cookies.txt';

        // chama a página principal e realiza o login
        $this->getRequest($zabbix_url_login, $payload, $cookieFile);

        // chama a página do gráfico e recebe a imagem png
        $return = $this->getRequest($zabbix_url_graph, NULL, $cookieFile);

        header("Content-type: image/png");

        // salva a imagem no diretório
        // $fp = fopen(app()->basePath('public/' . '/images/graph.png'),'x');
        // fwrite($fp, $return);
        // fclose($fp);

        echo $return;
    }

    public function getRequest($url, $payload = NULL, $cookieFile)
    {
        // cria o arquivo de cookies
        if(!file_exists($cookieFile))
        {
            $fh = fopen($cookieFile, 'w');
            fwrite($fh, '');
            fclose($fh);
        }

        $ch = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_COOKIEJAR => $cookieFile,
            CURLOPT_COOKIEFILE => $cookieFile
        );

        curl_setopt_array($ch, $options);
    
        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
