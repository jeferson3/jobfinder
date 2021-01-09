<?php
// require "./vendor/autoload.php";
require_once(dirname(__DIR__) . '/vendor/autoload.php');
// require "./chat/chat.php";
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Chat;


    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Chat()
            )
        ),
        8085
    );

    $server->run();