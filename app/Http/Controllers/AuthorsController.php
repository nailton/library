<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorsController extends Controller {
    public function create() {
        $author = [];
        return view('authors.create', compact('author'));
    }

    public function store() {
        Author::create($this->validateRequest());
        $author = Author::all();
        // dd($author);
        return view('authors.create', compact('author'));
    }

    protected function validateRequest() {
        return request()->validate([
            'name' => 'required',
            'dob'  => 'required',
        ]);
    }
}
