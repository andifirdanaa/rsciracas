<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRole extends Model
{
    protected $table = 'user_role';
    protected $primarykey = 'id';
    protected $fillable = [
        'name', 'status',
    ];

     public function user()
    {
        return $this->hasMany(User::class);
    }
     public function AksesModul()
    {
        return $this->hasMany(AksesModul::class);
    }
}
