<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user()
    {
        $expected = [
            'name',
            'email',
            'password',
        ];

        $this->assertEquals($expected, (new User())->getFillable());
    }
}
