
<?php


/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 22.05.2016
 * Time: 12:43
 */

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\ChatController;

require  'vendor/autoload.php';


$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ChatController()
        )
    ),
    8080
);

$server->run();
?>