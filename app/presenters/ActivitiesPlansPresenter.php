<?php

namespace App\Presenters;

use Nette;
use App\Model;


class ActivitiesPlansPresenter extends BasePresenter {
	public function renderPlansList() {
		$this->template->schedules_actual = $this->events_schedule->findAll()
															  ->order('year DESC');

		$this->template->schedules_history = $this->events_schedule_history->findAll()
															  		   ->order('year DESC');															  
	}

}