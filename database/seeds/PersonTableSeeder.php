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
            'first_name' => 'Chidi',
            'last_name' => 'Nkwocha',
            'email' => 'profchydon@gmail.com',
            'password' => '*Shakers6559#',
            'person' => 1,
            'phone' => '',
        ]);


    }
}
