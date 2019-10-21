<?php

namespace Data\Entity;

use \Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = "reminders";
    protected $visible = ['deadlineDate','reminderRepeat', 'reminderTime'];

}