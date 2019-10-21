<?php

namespace Data\Repository\Concrete;

use Data\Entity\Reminder;
use Data\Repository\Abst\IReminderRepo;

class ReminderRepo implements IReminderRepo
{

    public function where($in, $how, $opt = null)
    {
        return Reminder::where($in, $how, $opt = null);
    }

    public function first()
    {
        return Reminder::first();
    }

    public function orWhere($in, $like, $val)
    {
        return Reminder::orWhere($in, $like, $val);
    }

    public function get()
    {
        return Reminder::get();
    }

    public function with(...$val)
    {
        return Reminder::with(...$val);
    }

    public function insert($var)
    {
        return Reminder::insert($var);
    }

    public function insertGetId($var)
    {
        return Reminder::insertGetId($var);
    }

    public function find($id)
    {
        return Reminder::find($id);
    }

    public function all()
    {
        return Reminder::all();
    }
}