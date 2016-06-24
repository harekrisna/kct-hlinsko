<?php

namespace App\Presenters;

use Nette;
use App\Model;


class PhotogalleryDirectFolderPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->setView("photogallerydirectfolder");
	}

}
