<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller {
    public function store() {
        Book::create([
            'title'  => request('title'),
            'author' => request('author'),
        ]);
    }
}
