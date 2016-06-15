<?php

namespace App\Presenters;

use Nette;
use App\Model;


class PhotogalleryPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->setView("photogallery");
	}

}
