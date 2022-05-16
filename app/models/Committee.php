<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Committee extends Model
{
    use SoftDeletes;

    public function parent()
    {
        return $this->belongsTo('Committee', 'committee_center_id');
    }

    public function children()
    {
        return $this->hasMany('Committee', 'committee_center_id');
    }

}
