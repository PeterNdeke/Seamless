<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRegister extends Model
{
    protected $fillable = ['user_id', 'course_id'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
