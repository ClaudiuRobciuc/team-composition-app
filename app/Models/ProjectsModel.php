<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectsModel extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'requirements'
    ];

    public function team(){
        return $this->hasMany('App\Models\TeamsModel', 'id', 'project_id');
    }

    public function signiflyers(){
        return $this->hasManyThrough('App\Models\SigniflyersModel', 'App\Models\TeamsModel', 'project_id', 'id', 'id', 'signiflyer_id');
    }
}
