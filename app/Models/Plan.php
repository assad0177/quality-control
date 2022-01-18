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


}
