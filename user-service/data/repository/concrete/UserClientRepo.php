<?php

namespace Data\Repository\Concrete;

use Data\Entity\User;
use Data\Repository\Abst\IUserClientRepo;

class UserClientRepo implements IUserClientRepo
{

    public function where($in, $how, $opt = null)
    {
        return UserClientRepo::where($in, $how, $opt = null);
    }

    public function first()
    {
        return UserClientRepo::first();
    }

    public function orWhere($in, $like, $val)
    {
        return UserClientRepo::orWhere($in, $like, $val);
    }

    public function get()
    {
        return UserClientRepo::get();
    }

    public function with(...$val)
    {
        return UserClientRepo::with(...$val);
    }

    public function insert($var)
    {
        return UserClientRepo::insert($var);
    }

    public function all()
    {
        return UserClientRepo::all();
    }
}