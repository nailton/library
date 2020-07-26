<?php

namespace Tests\Unit;

use App\Book;
use App\Reservation;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_checked_out() {

        $book = factory(Book::class)->create();
        $user = factory(User::class)->create();

        $book->checkout($user);

        $this->assertCount(1, Reservation::all());
        $this->assertEquals($user->id, Reservation::first()->user_id);
        $this->assertEquals($book->id, Reservation::first()->book_id);
        $this->assertEquals(now(), Reservation::first()->checked_out_at);
    }
}
