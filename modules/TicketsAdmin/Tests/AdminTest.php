<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test Login and Redirect to admin middleware
     *
     * @return void
     */
    public function test_login()
    {
        $testEmail = 'admin@tickets.dev';
        $testPass = 'password';

        $this->visit('/admin')
            ->submitForm('Login',['email'=>$testEmail,'password'=>$testPass])
            ->see('Tickets Admin');
    }

    /**
     * Test creating user
     */

    public function test_create_user()
    {
        \Auth::loginUsingId(1);
        $this->visit('/admin/users/create')
            ->submitForm('Create',['name'=>'test_user','email'=>'testuseremail@tickets.dev','password'=>'password']);
        $this->seeInDatabase('users',['name'=>'test_user']);
    }



}
