<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'description',
        'status',
        'icon',
        'image'
    ];

    public function test()
    {
        return $this->belongsToMany(Test::class, 'test_plans', 'test_id' , 'plan_id'  );
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }



}
