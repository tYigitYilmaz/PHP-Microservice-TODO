<?php

namespace Data\Repository\Abst;

Interface ICategoryRepo
{
    public function where($in, $how, $opt=null);
    public function orWhere($in, $like, $val);
    public function get();
    public function first();
    public function delete();
    public function insert($arr);
    public function with(...$val);

}