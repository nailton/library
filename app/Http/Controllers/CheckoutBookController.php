<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Auth;

class CheckoutBookController extends Controller {
    public function store(Book $book) {
        $book->checkout(auth()->user());
    }
}
