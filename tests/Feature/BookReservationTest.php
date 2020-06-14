<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BookReservationTest extends TestCase {
    use WithoutMiddleware;
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library() {

        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title'  => 'Cool book title',
            'author' => 'Victor',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required() {

        $response = $this->post('/books', [
            'title'  => '',
            'author' => 'Victor',
        ]);

        $response->assertSessionHasErrors();
    }

    /** @test */
    public function a_author_is_required() {

        $response = $this->post('/books', [
            'title'  => 'Cool title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors();
    }

    /** @test */
    public function a_book_can_be_update() {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title'  => 'Cool Title',
            'author' => 'Victor',
        ]);
        $book     = Book::first();
        $response = $this->patch('/books/' . $book->id, [
            'title'  => 'New Title',
            'author' => 'New Author',
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);
    }

}
