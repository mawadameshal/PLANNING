<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Committee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'committee_name','committee_type', 'committee_center_id'
    ];

    public function parent()
    {
        return $this->belongsTo('Committee', 'committee_center_id');
    }

    public function children()
    {
        return $this->hasMany('Committee', 'committee_center_id');
    }

    public function created()
    {
        return $this->belongsTo('User', 'created_id');
    }

    public function updated()
    {
        return $this->belongsTo('User', 'updated_id');
    }

    public function deleted()
    {
        return $this->belongsTo('User', 'deleted_id');
    }

}
