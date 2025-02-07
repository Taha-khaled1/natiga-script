<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
}
