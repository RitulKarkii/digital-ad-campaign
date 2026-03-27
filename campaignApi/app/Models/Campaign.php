<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable =[
        'page_id',
        'campaignName',
        'budget',
        'startDate',
        'endDate',
        'addContent',
        'status'
    ];

    public function page(){
        return $this->belongsTo(page::class);
    }
}
