<?php

$router->get('/', function () use ($router)
{
    return redirect()->route('info');
});

$router->get('/api', function () use ($router)
{
    return redirect()->route('info');
});

$router->get('/api/v1', function () use ($router)
{
    return redirect()->route('info');
});

$router->group(['prefix' => 'api/v1'], function($app)
{
    $app->get('info', ['as' => 'info', function ()
    {
        echo 'API para envio de e-mail criada por Gustavo Fernandes.';
    }]);

    $app->get('graph/{item_id:[0-9]+}/{item_name:[a-z]+}','GraphController@showGraph');
    
    $app->post('email','EmailController@createEmail');
});