<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory,SoftDeletes;

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }
}
