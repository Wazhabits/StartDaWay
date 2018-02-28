<?php

use Illuminate\Database\Seeder;
use App\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::insert([
            'login' => 'admin',
            'password' => md5('root'),

            'email' => 'your@domain.fr',
            'firstname' => 'Super',
            'lastname' => 'Administrator',
            'phone' => 'XXXXXXXXXX',

            'image' => 'null',
            'level' => 5,

            'unicode' => str_random(25),
            'validate' => 1,
        ]);
        factory(App\Users::class, 50)->create();
    }
}
