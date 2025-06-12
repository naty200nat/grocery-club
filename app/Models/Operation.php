<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Operation extends Model
{
    protected $fillable = ['user_id', 'type', 'reason', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

