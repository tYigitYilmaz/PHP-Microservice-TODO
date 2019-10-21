<?php

namespace Data\Repository\Abst;

Interface IReminderRepo
{
    public function where($in, $how, $opt=null);
    public function orWhere($in, $like, $val);
    public function get();
    public function first();
    public function insert($arr);
    public function insertGetId($arr);
    public function with(...$val);
    public function find($id);

}