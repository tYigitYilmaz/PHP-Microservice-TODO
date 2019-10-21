<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = "titles";
    protected $visible = ['title_id','title_name'];

}