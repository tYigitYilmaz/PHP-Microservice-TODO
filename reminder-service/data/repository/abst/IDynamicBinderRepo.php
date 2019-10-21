<?php

namespace Data\Repository\Abst;

Interface IDynamicBinderRepo
{
    public function where($in, $how, $attributes,$opt=null);
    public function get();
    public function first();
    public function insert($var, $attributes);
    public function with(...$val);
    public function all($attributes);

}