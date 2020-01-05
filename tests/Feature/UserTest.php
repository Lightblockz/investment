<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    use DatabaseTransactions, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreatesUser()
    {
        
        $response = $this->get('/');

        $user = User::create([
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
        ]);

        if (!$user){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }

    }
}
