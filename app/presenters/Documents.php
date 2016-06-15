<?php

namespace App\Presenters;

use Nette;
use App\Model;


class DocumentsPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->setView("documents");
	}

}
