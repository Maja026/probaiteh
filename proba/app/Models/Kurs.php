<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    public function komentari(){
         return $this->hasMany(Komentar::class);
    }
    public function profesor(){
        return $this->belongsTo(Profesor::class);
    }
    public function korisnici(){
        return $this->belongsToMany(Korisnik::class);
    }
    protected $table = 'kurs';
}
