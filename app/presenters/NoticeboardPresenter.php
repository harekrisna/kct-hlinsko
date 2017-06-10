<?php

namespace App\Presenters;

use Nette;
use App\Model;


class NoticeboardPresenter extends BasePresenter
{

	public function renderNoticeboard()
	{
		$this->setView("Noticeboard");
	}

}
