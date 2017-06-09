<?php

namespace App\Presenters;

use Nette;
use App\Model;


class EventsSchedulePresenter extends BasePresenter {
	public function renderSchedulesList() {
		$this->template->schedules_actual = $this->events_schedule->findAll()
															  ->order('year DESC');

		$this->template->schedules_history = $this->events_schedule_history->findAll()
															  		   ->order('year DESC');															  
	}

	public function renderActualSchedule($record_id) {
		$this->template->schedule = $this->events_schedule->get($record_id);
		$this->template->backlink = $this->link('plansList');
	}

	public function renderHistorySchedule($record_id) {
		$this->template->schedule = $this->events_schedule_history->get($record_id);
		$this->template->backlink = $this->link('plansList');
	}
}