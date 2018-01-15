<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GithubAuth extends Model
{
    protected $table = 'github_authorizations';
    public $timestamps = false;

    public function User(){
        return $this->hasOne('App\User','id','user_id');
    }
}
