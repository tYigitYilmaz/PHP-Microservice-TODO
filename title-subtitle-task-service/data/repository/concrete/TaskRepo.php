<?php

namespace Data\Repository\Concrete;

use Data\Entity\Task;
use Data\Repository\Abst\ITaskRepo;

class TaskRepo implements ITaskRepo
{

    public function where($in, $how, $opt = null)
    {
        return Task::where($in, $how, $opt = null);
    }

    public function first()
    {
        return Task::first();
    }

    public function orWhere($in, $like, $val)
    {
        return Task::orWhere($in, $like, $val);
    }

    public function get()
    {
        return Task::get();
    }

    public function with(...$val)
    {
        return Task::with(...$val);
    }

    public function update()
    {
        return Task::update();
    }


    public function insert($var)
    {
        return Task::insert($var);
    }

    public function all()
    {
        return Task::all();
    }
}