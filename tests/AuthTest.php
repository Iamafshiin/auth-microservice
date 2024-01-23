<?php

namespace Test;

use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testSuccessfulLogin()
    {
        // Attempt login
        $response = $this->post('/api/user/login', [
            'mobile' => '09111849776',
            'password' => 'password'
        ]);

        // Assert response
        $response->seeStatusCode(200);
        $response->seeJsonStructure([
            'data' => [
                'access_token',
                'name',
                'mobile'   
            ],
            'server_time'
        ]);
    }

    public function testLoginWithInvalidCredentials()
    {
        // Attempt login with invalid credentials
        $response = $this->post('/api/user/login', [
            'mobile' => '09111849776',
            'password' => 'wrongpassword'
        ]);

        // Assert response
        $response->seeStatusCode(401);
        $response->seeJson(['error' => 'Unauthorized']);
    }

    public function testLogout()
    {

        // Simulate login to get a token
        $response = $this->post('/api/user/login', [
            'mobile' => '09111849776',
            'password' => 'password'
        ]);

        $token = json_decode($response->response->getContent())->data->access_token;

        // Test logout with the token
        $response = $this->post('/api/user/logout', [], ['Authorization' => 'Bearer ' . $token]);

        // Assert the response status code and any other logout logic
        $response->seeStatusCode(200);
        $response->seeJsonStructure(['data' => [ 
                                        'message'
                                    ], 
                                    'server_time']);
    }
}
