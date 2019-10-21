<?php

namespace Data\Repository\Concrete;

use Data\Entity\DynamicBinder;
use Data\Repository\Abst\IDynamicBinderRepo;
use Data\Repository\Abst\IReminderRepo;

class DynamicBinderRepo implements IDynamicBinderRepo
{

    public function where($in, $how, $attributes, $opt = null)
    {
        $table = new DynamicBinder($attributes);
        return $table->where($in, $how, $opt = null);
    }

    public function first()
    {
        return $this->first();
    }

    public function get()
    {
        return $this->get();
    }

    public function with(...$val)
    {
        return $this->with(...$val);
    }

    public function insert($var, $attributes)
    {
        $table = new DynamicBinder($attributes);
        return $table->insert($var);
    }

    public function all($attributes)
    {
        $table = new DynamicBinder($attributes);
        return $table->all();
    }
}