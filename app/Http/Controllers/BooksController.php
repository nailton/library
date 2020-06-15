<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller {
    public function store() {
        Book::create($this->validateRequest());
    }

    public function update($id) {
        $book = Book::findOrFail($id);
        $book->update($this->validateRequest());
    }

    protected function validateRequest() {
        return request()->validate([
            'title'  => 'required',
            'author' => 'required',
        ]);
    }
}
