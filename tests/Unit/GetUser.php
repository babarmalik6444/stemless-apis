<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
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
    public function getUserApiTest()
    {
        $users = (new UserController())->index;
        $this->assertTrue(true, $users);
    }
}
