<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Member;

class myTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testBasicExample()
    {
        $this->visit('/')
             ->see('TestApp')
             ->dontSee('Rails');
    }

    public function testBasicExample1()
    {
        $this->json('GET', 'http://localhost:8000/api/members')
             ->seeJson([
                 'status' => true
             ]);
    }

    
   

}
