<?php

namespace App\Model;
use Nette;
use Tracy\Debugger;

class EventsScheduleHistory extends TableExtended {
    /** @var string */
	protected $tableName = 'events_schedule_history';

	public function getYearById($id)  {
		$record = $this->get($id);
		if($record)
			return $record->year;
	}
	
	public function getIdByYear($year)  {
		$record = $this->findBy(array("year" => $year))->fetch();
		if($record) {
			return $record->id;	
		}
	}	
}