<?php

namespace Service\Abst;


interface ISubtitleService {

    public function listAllSubtitles();
    public function selectSubtitle($id);
    public function createSubtitle();
    public function deleteSubtitle();

}