<?php

namespace App\Presenters;

use Nette;
use App\Model;


class PaintersPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->setView("painters");
	}

}
