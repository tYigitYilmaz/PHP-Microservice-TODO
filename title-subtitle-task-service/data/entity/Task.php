<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    protected $visible = ['task_id', 'task_name', 'note','subtitle_id'];
    protected $fillable = ['note'];

}