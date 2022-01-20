<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory,SoftDeletes;
    protected $guard = 'client';
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $guarded = [];

    public function terminal()
    {
        return $this->hasMany(Terminal::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

}
