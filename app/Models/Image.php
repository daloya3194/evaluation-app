<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function question()
    {
        return $this->hasOne(Question::class);
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }
}
