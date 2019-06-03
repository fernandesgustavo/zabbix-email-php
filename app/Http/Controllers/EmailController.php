<?php

namespace App\Http\Controllers;

use App\Mail\EmailShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    // usuário zabbix para comunicação com a API
    private $zabbix_user;
    private $zabbix_password;
    private $zabbix_url_login;
    private $zabbix_url_graph;
    private $payload;

    // usuário email
    private $email_user;
    private $email_password;

    // SMTP server
    private $smtp_server;
    private $smtp_port;

    // destinatario
    private $to_addrs;
    private $subject;
    private $message;

    // informações do item
    private $itemId;
    private $itemName;

    // arquivo para o cookie da sessão
    private $cookieFile;

    // informaçõe do gráfico
    private $graph;
    private $period;
    private $width;
    private $height;
    private $color;

    public function __construct(Request $request)
    {
        // usuário zabbix para login
        $this->zabbix_user = env('ZABBIX_USER');
        $this->zabbix_password = env('ZABBIX_PASSWORD');

        // login na página inicial
        $this->payload = array(
            'name' => $this->zabbix_user,
            'password' => $this->zabbix_password,
            'enter' => 'Sign in'
        );

        // url para o login
        $this->zabbix_url_login = env('ZABBIX_URL') . 'index.php';

        // usuário do e-mail
        $this->email_user = $request->input(2);
        $this->email_password = $request->input(3);

        // configuração do email
        $this->smtp_server = $request->input(4);
        $this->smtp_port = $request->input(5);

        // destinatário e conteúdo do e-mail
        $this->to_addrs = $request->input(6);
        $this->subject = $request->input(7);
        $this->message = json_decode($request->input(8), TRUE);

        // informações do item da mensagem
        // $this->itemId = $this->getItemId($this->message);
        // $this->itemName = $this->getItemName($this->message);

        // arquivo para o cookie da sessão
        $this->cookieFile = 'cookies.txt';

        // variáveis para o gráfico
        $this->period = 3600;  // 1h
        $this->width = 800;
        $this->height = 200;
        $this->color = '218910';
    }

    public function createEmail(Request $request)
    {
        // seta as variáveis para o envio
        config(
            [
                'mail.driver' => 'smtp',
                'mail.host' => $this->smtp_server,
                'mail.port' => $this->smtp_port,
                'mail.from' => [
                    'address' => $this->email_user,
                    'name' => 'Monitoramento',
                ],
                'mail.encryption' => 'tls',
                    'name' => $this->email_user,
                'mail.username' => $this->email_user,
                'mail.password' => $this->email_password,
            ]
        );

        // verifica se passou os dados do item
        if(!empty($this->message['itemid']) && !empty($this->message['itemname']))
        {
            // pega o gráfico e chama o envio
            try
            {
                $this->graph = $this->getGraph();

                Mail::to($this->to_addrs)->send(new EmailShipped($this->subject, $this->message, $this->graph));
    
                return json_encode(array(
                    'status' => 'OK'
                ));
            }
            catch (\Throwable $th)
            {
                return json_encode(array(
                    'status' => 'FAIL',
                    'message' => $th->getMessage()
                ));
            }
        }
        else
        {
            return json_encode(array(
                'status' => 'FAIL',
                'message' => 'Os dados do item utilizados para o gráfico não foram informados.'
            ));
        }
    }

    public function getGraph()
    {
        // busca o item
        $itemid = $this->message['itemid'];
        $itemname = $this->message['itemname'];

        // monta a url para o gráfico
        $this->zabbix_url_graph = env('ZABBIX_URL') . "chart3.php?name=$itemname&period=$this->period&width=$this->width&height=$this->height&items[0][itemid]=$itemid&items[0][drawtype]=5&items[0][color]=$this->color";

        // chama a página principal e realiza o login
        $this->getRequest($this->zabbix_url_login, $this->payload, $this->cookieFile);

        // chama a página do gráfico e recebe a imagem png
        $return = $this->getRequest($this->zabbix_url_graph, NULL, $this->cookieFile);

        header("Content-type: image/png");

        return $return;
    }
    
    public function getRequest($url, $payload = NULL, $cookieFile)
    {
        // cria o arquivo de cookies
        if(!file_exists($this->cookieFile))
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

    public function getItemId($message)
    {
        $pattern = '/Item\sID:\s<\/strong>(.*)<\/td>/';
        preg_match($pattern, $message, $matches);
        return ($matches[1]);
    }

    public function getItemName($message)
    {
        $pattern = '/Item\sName:\s<\/strong>(.*)<\/td>/';
        preg_match($pattern, $message, $matches);
        return ($matches[1]);
    }
}
