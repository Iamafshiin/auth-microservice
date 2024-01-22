<?php

namespace Tests;

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseTransactions;

class InsertDatabaseTest extends TestCase
{
    use DatabaseTransactions;

    public function testDatabaseInsertion()
    {
        //Insert new user to database
        $user = User::factory()->create();

        // Assert the item was inserted into the database
        $this->seeInDatabase('users', ['mobile' => $user->mobile]);
    }
}
