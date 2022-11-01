<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\FileCookieJar;

class AttendanceCheck
{
    protected $client;
    protected $user;
    public function __construct($username = 'tiaswidiatmika')
    {
        $this->client = $this->buildClient();
        $this->user = $this->getUser($username);
    }

    public function buildClient()
    {
        $file = storage_path('app/cookie.txt');
        $cookieJar = new FileCookieJar($file);
        return new Client([
            'verify' => false,
            // 'base_uri' => 'http://192.168.0.10/presensa/',
            'base_uri' => 'http://127.0.0.1:8000/presensa/',
            'cookies' => $cookieJar,
        ]);
    }

    public function getUser($username)
    {
        return \App\Models\User::where('username', $username)->first();
    }

    public function doLogin()
    {
        $response = $this->client->request('POST', 'login.php', [
            'debug' => true,
            'form_params' => [
                'username' => $this->user->username,
                'password' => $this->user->password,
            ],
        ]);
    }

    public function doAttend()
    {
        $response = $this->client->request('GET', 'clockin.php', ['debug' => true]);
        return $response->getBody()->getContents();
    }
}
