<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class UserClient extends Model
{
    protected $table = "oauth_clients";
    protected $visible = ['client_id','grant_types','client_secret','user_id'];

}