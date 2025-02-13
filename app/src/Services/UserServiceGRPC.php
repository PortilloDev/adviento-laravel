<?php 
namespace App\src\Services;

use Grpc\ChannelCredentials;
use IvanPortillo\User\GetUserRequest;
use IvanPortillo\User\UserServiceClient;

class UserServiceGRPC
{
    public static function send(int $id, string $name, string $email, ?string $password = null): void
    {
        $client = new UserServiceClient('localhost:8002', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);

        $request = new GetUserRequest();
        $request->setId($id);

        list($response, $status) = $client->GetUser($request)->wait();
        
        if ($status->code === \Grpc\STATUS_OK) {
            echo "Usuario: " . $response->getName();
        } else {
            echo "Error en la comunicación gRPC";
        }
    }
}