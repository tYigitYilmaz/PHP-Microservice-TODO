<?php

namespace Service\Abst;


interface ITitleService {

    public function listAllTitles();
    public function selectTitle($id);
    public function createTitle();
    public function deleteTitle();

}