<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI\Presenter;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {
	/** @var Page */
	protected $page;
	/** @var EventsSchedule */
	protected $events_schedule;
	/** @var EventsScheduleHistory */
	protected $events_schedule_history;
	/** @var Galery */
	protected $galery;
	/** @var Photo */
	protected $photo;

	protected function startup() {
		parent::startup();

		$this->page = $this->context->getService('page');
		$this->events_schedule = $this->context->getService('events_schedule');
		$this->events_schedule_history = $this->context->getService('events_schedule_history');
        $this->galery = $this->context->getService('galery');
        $this->photo = $this->context->getService('photo');
	}
}
