<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AksesModul extends Model
{
    protected $fillable = [
        'modul_id', 'user_role_id',
    ];

     public function Modul()
    {
        return $this->belongsTo(Modul::class);
    }
     public function UserRole()
    {
        return $this->belongsTo(UserRole::class);
    }
}
