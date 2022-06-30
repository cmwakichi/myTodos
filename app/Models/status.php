<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function todos(){
        return $this->hasMany(todo::class);
    }
}
