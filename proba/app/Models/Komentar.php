<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    public function kurs(){
        return $this->belongsTo(Kurs::class);
    }
    public function korisnik(){
        return $this->belongsTo(Korisnik::class);
    }
}
