<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller {
    public function store() {
        $data = request()->validate([
            'title'  => 'required',
            'author' => '',
        ]);
        Book::create($data);
    }
}
