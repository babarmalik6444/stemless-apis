<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;

class GetUser extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function get_users_list()
    {
        
        // $users = (new UserController())->index;
        // $this->assertTrue(true, $users);
        $this->call('GET', '/api/user', ['first_name' => '', 'last_name' => '', 'email' => '', 'phone' => '', 'sort_column' => '', 'sort_by' => ''])
        ->assertSuccessful()
        ->assertSee('houmaan');
    }
}
