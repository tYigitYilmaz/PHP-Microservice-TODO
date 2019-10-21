<?php

namespace Data\Repository\Concrete;

use Data\Entity\Title;
use Data\Repository\Abst\ITitleRepo;

class TitleRepo implements ITitleRepo
{

    public function where($in, $how, $opt = null)
    {
        return Title::where($in, $how, $opt = null);
    }

    public function first()
    {
        return Title::first();
    }

    public function orWhere($in, $like, $val)
    {
        return Title::orWhere($in, $like, $val);
    }

    public function get()
    {
        return Title::get();
    }

    public function with(...$val)
    {
        return Title::with(...$val);
    }

    public function insert($var)
    {
        return Title::insert($var);
    }

    public function all()
    {
        return Title::all();
    }

    public function delete()
    {
        return Title::delete();
    }
}