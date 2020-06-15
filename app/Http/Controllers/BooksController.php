<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller {
    public function store() {
        $data = request()->validate([
            'title'  => 'required',
            'author' => 'required',
        ]);
        Book::create($data);
    }

    public function update($id) {
        $data = request()->validate([
            'title'  => 'required',
            'author' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->update($data);
    }
}
