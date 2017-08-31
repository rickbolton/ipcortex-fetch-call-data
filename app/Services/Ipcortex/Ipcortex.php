<?php

namespace App\Services\Ipcortex;

use GuzzleHttp\Client;

class Ipcortex
{
    protected $guzzle;
    protected $hostname;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->guzzle = new Client;
        $this->hostname = config('services.ipcortex.hostname');
        $this->username = config('services.ipcortex.username');
        $this->password = config('services.ipcortex.password');
    }

    public function fetchCallData()
    {
        return json_decode($this->guzzle->post("{$this->hostname}/rest/call/read", [
            'verify' => false,
            'body' => json_encode([
                'type' => 'cdr',
                'scope' => [
                    'minDate' => 1504088068000,
                ],
                'auth' => [
                    'type' => 'auth',
                    'username' => $this->username,
                    'password' => $this->password,
                ]
            ])
        ])->getBody());
    }
}
