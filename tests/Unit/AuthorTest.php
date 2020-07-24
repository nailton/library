<?php

namespace Tests\Unit;

use App\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function onyl_name_is_required_to_create_an_author() {
        Author::firstOrCreate([
            'name' => 'John Doe',
        ]);

        $this->assertCount(1, Author::all());
    }

}
