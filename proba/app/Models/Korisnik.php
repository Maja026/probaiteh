<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    public function kursevi(){
        return $this->belongsToMany(Kurs::class);
    }
    public function komentari(){
        return $this->hasMany(Komentar::class);
    }
}
