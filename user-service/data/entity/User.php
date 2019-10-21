<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "oauth_users";
    protected $visible = ['first_name', 'last_name', 'password', 'username', 'email','user_id'];
    protected $hidden = ['perPage'];

}