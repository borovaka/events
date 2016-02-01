<?php

use App\User;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create admin user

        $admin = User::create([
            'name' => 'Admin user',
            'email' => 'admin@tickets.dev',
            'password' => 'password',
            'type' => User::USER_ADMIN
        ]);

        $admin->generateApiKey('c786e9e743c8ff591e5cd5de9455ebcf92ccbc55');
        $admin->save();

        //Create ordinary user
        User::create([
            'name' => 'User',
            'email' => 'user@tickets.dev',
            'password' => 'password',
            'type' => User::USER_USER
        ])->save();


        factory(App\User::class, 15)->create(['type' => 2])->each(function (\App\User $u) {
            for ($i = 0; $i < 10; $i++) {
                $u->events()->save(factory(\App\Event::class)->make());
            }
        });
    }
}
