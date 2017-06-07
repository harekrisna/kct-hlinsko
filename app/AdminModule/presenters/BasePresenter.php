<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {	
	/** @var Galery */
	protected $galery;	
	/** @var Photo */
	protected $photo;
	/** @var Page */
	protected $page;
	/** @var EventsSchedule */
	protected $events_schedule;
	/** @var User */
	protected $user;
	
	protected function startup() {
		parent::startup();
		
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }		
        
        $this->galery = $this->context->getService('galery');
        $this->photo = $this->context->getService('photo');
        $this->events_schedule = $this->context->getService('events_schedule');
        $this->page = $this->context->getService('page');
		$this->user = $this->getUser();

		\Forms\DatePicker\DatePicker::register();
	}

	public function flashMessage($message, $type = 'info') {
		if ($this->isAjax()) {
			$this->payload->messages[] = ['message' => $message,
										  'type' => $type];
		}
		else {
			parent::flashMessage($message, $type);
		}
	}
}