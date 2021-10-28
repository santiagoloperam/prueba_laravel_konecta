<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cliente extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
