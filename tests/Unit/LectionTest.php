<?php

namespace Tests\Unit;

use App\Lection;
use Tests\TestCase;

class LectionTest extends TestCase
{

    public function testUser()
    {
        $user = isset(Lection::find(1)->user);
        $this->assertTrue($user);
    }
}
