<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = new \App\User();
        $data = [
            'name' => 'Um usuário',
            'email' => 'user@email.com',
            'password' => bcrypt(123456)
        ];
        $user->create($data);

        factory(\App\User::class, 10)->create();
    }
}
