<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AuthorManagementTest extends TestCase {
    use WithoutMiddleware;
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created() {

        $this->post('/authors', $this->data());

        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1988/14/05', $author->first()->dob->format('Y/d/m'));
    }

    /** @test */
    public function a_name_is_required() {
        $respose = $this->post('/authors', array_merge($this->data(), ['name' => '']));
        $respose->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_dob_is_required() {
        $respose = $this->post('/authors', array_merge($this->data(), ['dob' => '']));
        $respose->assertSessionHasErrors('dob');
    }

    private function data() {
        return [
            'name' => 'Author Name',
            'dob'  => '05/14/1988',
        ];
    }
}
