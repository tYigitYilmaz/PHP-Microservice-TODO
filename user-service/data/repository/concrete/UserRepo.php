<?php

namespace Data\Repository\Concrete;

use Data\Entity\User;
use Data\Repository\Abst\IUserRepo;

class UserRepo implements IUserRepo
{

    public function where($in, $how, $opt = null)
    {
        return User::where($in, $how, $opt = null);
    }

    public function first()
    {
        return User::first();
    }

    public function orWhere($in, $like, $val)
    {
        return User::orWhere($in, $like, $val);
    }

    public function get()
    {
        return User::get();
    }

    public function with(...$val)
    {
        return User::with(...$val);
    }

    public function insert($var)
    {
        return User::insert($var);
    }

    public function all()
    {
        return User::all();
    }
}