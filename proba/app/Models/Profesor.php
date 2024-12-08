<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public function kursevi(){
        return $this->hasMany(Kurs::class);
    }
}
