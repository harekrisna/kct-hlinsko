<?php

namespace App\Presenters;

use Nette;
use App\Model;


class ActivitiesPlansPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->setView("activities-plans");
	}

}
