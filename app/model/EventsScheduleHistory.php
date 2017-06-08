<?php

namespace App\Model;
use Nette;
use Tracy\Debugger;

class EventsScheduleHistory extends TableExtended {
    /** @var string */
	protected $tableName = 'events_schedule_history';
}