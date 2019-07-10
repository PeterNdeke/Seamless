<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $with = ['course_registers'];

    public function course_registers()
    {
        return $this->hasMany(CourseRegister::class)->latest();
    }

}
