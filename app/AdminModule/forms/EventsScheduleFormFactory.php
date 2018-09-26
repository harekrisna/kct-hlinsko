<?php

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;
use Tracy\Debugger;

class EventsScheduleFormFactory {
	use Nette\SmartObject;
	
	/** @var FormFactory */
	private $factory;
	/** @var EventsSchedule */
	private $events_schedule;
	/** @var EventsScheduleHistory */
	private $events_schedule_history;
	private $model;

	private $record;
		
	public function __construct(FormFactory $factory, \App\Model\EventsSchedule $events_schedule, \App\Model\EventsScheduleHistory $events_schedule_history) {
		$this->factory = $factory;
		$this->events_schedule = $events_schedule;
		$this->events_schedule_history = $events_schedule_history;
	}

	public function create($schedule_type, $record = null) {
		$this->record = $record;
		if($schedule_type == "actual") {
			$this->model = $this->events_schedule;
		}
		elseif($schedule_type == "history") {
			$this->model = $this->events_schedule_history;	
		}

		$form = $this->factory->create();
		$data = $form->addContainer('data');

		$data->addText('year', 'Rok')
			 ->setRequired('Zadej rok.');      	

      	$data->addTextArea('content', 'Obsah');

      	$form->addSelect('schedule_type', 'Plán', ['actual' => 'Aktuální', 'history' => 'Uskutečné']);
	    $form->addSubmit('add', 'Přidat rok');
	    $form->addSubmit('edit', 'Uložit změny');

	    if($record != null) {
	    	$form['data']->setDefaults($record);
	    }

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formError');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		if($form->isSubmitted() !== true && $form->isSubmitted()->name == "add") { 
			try {
				if($values->schedule_type == 'actual')
					$this->events_schedule->insert($values->data);
				elseif($values->schedule_type == 'history')
					$this->events_schedule_history->insert($values->data);
			}
			catch(\App\Model\DuplicateException $e) {
				if($e->foreign_key == "year") {
					$form['data']['year']->addError("Plán pro tento rok již existuje.");
				}
			}
		}
		else { //pokud $form->isSubmitted() === true znamená to že byl formulář odeslán ukládacím tlačítkem CKFINDERu při editaci
			$this->model->update($this->record->id, $values->data);
		}
	}

	public function formError(Form $form) {
		Debugger::fireLog($form->errors);
	}
}
