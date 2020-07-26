<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $guarded = [];

    public function path() {
        return '/books/' . $this->id;
    }

    public function checkout($user) {
        $this->reservations()->create([
            'user_id'        => $user->id,
            'checked_out_at' => now(),
        ]);
    }

    public function checkin($user) {
        $reservation = $this->reservations()->where('user_id', $user->id)
            ->whereNotNull('checked_out_at')
            ->whereNull('checked_in_at')
            ->first();

        $reservation->update([
            'checked_in_at' => now(),
        ]);
    }

    public function setAuthorIdAttribute($author) {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author,
        ]))->id;
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
