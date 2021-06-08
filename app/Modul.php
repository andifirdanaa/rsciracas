<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'modul', 'status','url',
    ];

     public function AksesModul()
    {
        return $this->hasMany(AksesModul::class);
    }
}
