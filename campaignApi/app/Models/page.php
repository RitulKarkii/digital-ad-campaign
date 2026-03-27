<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    protected $fillable = [
        'name'
    ];

    public function campaign(){
        return $this->hasMany(Campaign::class);
    }
}
