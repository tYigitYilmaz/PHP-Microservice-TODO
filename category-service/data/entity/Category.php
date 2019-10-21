<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $visible = ['name', 'category_id'];
    protected $fillable = ['name'];

}