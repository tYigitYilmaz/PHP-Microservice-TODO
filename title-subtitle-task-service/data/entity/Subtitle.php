<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class Subtitle extends Model
{
    protected $table = "subtitles";
    protected $visible = ['subtitle_id','subtitle_name'];

}