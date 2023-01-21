<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminResetPass extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'token', 'created_at'];
}
