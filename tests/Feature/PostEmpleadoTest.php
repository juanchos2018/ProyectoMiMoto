<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class PostEmpleadoTest extends TestCase
{
   
    use RefreshDatabase;
    /** @test */
    public function a_post_can_be_created(){
       $response= $this->post('/post',[
            'title'=>'dfdfd',
            'title'=>'dfdfd'
       ]);

       $response->assertOk();
       $this->assertCount(1,Post::all());
      // $post= Post::first();
       //$this->assertEquals($)

    }
}
