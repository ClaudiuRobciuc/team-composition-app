<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SigniflyersModel extends Model
{
    use SoftDeletes;

    protected $table = 'signiflyers';

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'profile_picture',
        'role_id',
        'education',
        'skillset'
    ];

    public function role(){
        return $this->hasOne('App\Models\JobRolesModel', 'id', 'role_id');
    }

    public function team(){
        return $this->hasOne('App\Models\TeamsModel', 'signiflyer_id', 'id');
    }

    public function available(){
        return empty($this->team);
    }
}
