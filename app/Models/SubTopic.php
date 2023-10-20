<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function courseSkillTitles()
    {
        return $this->hasMany(CourseSkillTitle::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
