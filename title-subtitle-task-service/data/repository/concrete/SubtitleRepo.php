<?php

namespace Data\Repository\Concrete;

use Data\Entity\Subtitle;
use Data\Repository\Abst\ISubtitleRepo;

class SubtitleRepo implements ISubtitleRepo
{

    public function where($in, $how, $opt = null)
    {
        return Subtitle::where($in, $how, $opt = null);
    }

    public function first()
    {
        return Subtitle::first();
    }

    public function orWhere($in, $like, $val)
    {
        return Subtitle::orWhere($in, $like, $val);
    }

    public function get()
    {
        return Subtitle::get();
    }

    public function with(...$val)
    {
        return Subtitle::with(...$val);
    }

    public function insert($var)
    {
        return Subtitle::insert($var);
    }

    public function all()
    {
        return Subtitle::all();
    }
}