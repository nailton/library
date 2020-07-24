<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller {
    public function store() {
        $book = Book::create($this->validateRequest());

        return redirect($book->path());
    }

    public function update($id) {
        $book = Book::findOrFail($id);
        $book->update($this->validateRequest());

        return redirect($book->path());
    }

    public function destroy($book) {
        $book = Book::find($book);
        $book->delete();

        return redirect('/books');
    }

    protected function validateRequest() {
        return request()->validate([
            'title'     => 'required',
            'author_id' => 'required',
        ]);
    }
}
