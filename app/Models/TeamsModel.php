<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamsModel extends Model
{
    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'signiflyer_id'
    ];
}
