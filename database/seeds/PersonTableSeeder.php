<?php

use Illuminate\Database\Seeder;
use App\User;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        //
        $user = User::create([
            'first_name' => 'Hello',
            'last_name' => 'Lightblocks',
            'email' => 'hello@lightblocks.biz',
            'password' => 'lightblocks',
            'person' => 1,
            'verified' => 1,
            'phone' => '',
        ]);


    }
}
