<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subTopics()
    {
        return $this->hasMany(SubTopic::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
