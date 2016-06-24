<?php

namespace App\Presenters;

use Nette;
use App\Model;


class PhotogalleryDetailYearPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->setView("photogallerydetailyear");
	}

}
