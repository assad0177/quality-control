<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function test()
    {
        return $this->belongsToMany(Test::class, 'test_plans', 'plan_id' , 'test_id'  );
    }

    public function selectedTests()
    {
        return $this->test->pluck('id')->toArray();
    }

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
    public function terminal()
    {
        return $this->hasMany(Terminal::class);
    }
    public function getAvailableTests()
    {
        // dd(Plan::with('test')->where('status',0)->toArray());

        // dd($this->test->select('id','description')->where('status','1')->toArray());
    }
}
