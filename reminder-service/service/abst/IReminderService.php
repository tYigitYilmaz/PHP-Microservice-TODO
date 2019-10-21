<?php

namespace Service\Abst;


interface IReminderService {

    public function listAllReminders();
    public function selectReminder();
    public function editReminder() ;
    public function createReminder();

}