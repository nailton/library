<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Auth;

class CheckoutBookController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Book $book) {
        $book->checkout(auth()->user());
    }
}
