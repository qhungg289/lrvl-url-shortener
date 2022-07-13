<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['destination', 'short_code', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
