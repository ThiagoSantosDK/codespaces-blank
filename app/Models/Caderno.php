<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caderno extends Model
{
    use HasFactory;

    // sanitização dos dados e criação em massa
    protected $fillable = ['nome'];

    public function noticias(){
        return $this->hasMany(Noticia::class, 'id_caderno');
    }

}
