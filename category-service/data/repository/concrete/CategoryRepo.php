<?php

namespace Data\Repository\Concrete;

use Data\Entity\Category;
use Data\Repository\Abst\ICategoryRepo;

class CategoryRepo implements ICategoryRepo
{

    public function where($in, $how, $opt = null)
    {
        return Category::where($in, $how, $opt = null);
    }

    public function first()
    {
        return Category::first();
    }

    public function orWhere($in, $like, $val)
    {
        return Category::orWhere($in, $like, $val);
    }

    public function get()
    {
        return Category::get();
    }

    public function with(...$val)
    {
        return Category::with(...$val);
    }

    public function insert($var)
    {
        return Category::insert($var);
    }

    public function delete()
    {
        return Category::delete();
    }

    public function all()
    {
        return Category::all();
    }
}