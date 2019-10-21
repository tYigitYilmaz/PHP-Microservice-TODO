<?php

namespace Service\Abst;


interface ICategoryService {

    public function listAllCategories();
    public function selectCategory($id);
    public function createCategory();
    public function deleteCategory();

}