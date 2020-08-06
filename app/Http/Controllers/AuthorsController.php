<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorsController extends Controller {
    public function store() {
        Author::create($this->validateRequest());
    }

    protected function validateRequest() {
        return request()->validate([
            'name' => 'required',
            'dob'  => 'required',
        ]);
    }
}
