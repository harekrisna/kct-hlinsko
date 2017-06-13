<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;


class PhotogalleryPresenter extends BasePresenter {
	
	public function renderPhotogallery() {
		$galery_years = $this->galery->findYears();
		
		$iterator = 0;
		$first_line = [];
		$year_groups = [];
		
		foreach ($galery_years as $year) {
			$iterator++;
			if($iterator < 6) {
				$first_line[] = $year;
			}
			else {
				$year_from = $year;
				$year_to = ceil($year / 5) * 5 - 5; // zaokrouhlení na 5 dolů

				if(empty($year_groups)) {
					$year_groups[$year_from."-".$year_to] = range($year_from, $year_to);
				}
				if($year % 5 == 0) {
					$year_from--;
					$year_groups[$year_from."-".$year_to] = range($year_from, $year_to);
				}
			}
		}

		if($iterator > 6) { // pokud není více roků než se vejde na první řádek
			array_pop($year_groups);
			$year_from = $year_to + 4;
			$year_to = $year;
			if($year_from == $year_to) {
				$year_groups[$year] = $year;
			}
			elseif($year_from > $year_to) {
				$year_groups[$year_from."-".$year_to] = range($year_from, $year_to);
			}
		}
		$this->template->first_line = $first_line;
		$this->template->year_groups = $year_groups;
	}

	public function renderYear($year) {
		$this->template->galeries = $this->galery->findBy(['year(galery_date)' => $year, 'active' => TRUE])
												 ->order('galery_date DESC');
		$this->template->year = $year;
		$this->template->backlink = $this->presenter->link('photogallery');
	}	

	public function renderPhotos($galery_id) {
		$this->template->galery = $this->galery->get($galery_id);
		$this->template->photos = $this->photo->findAll()
											  ->where(["galery_id" => $galery_id])
											  ->order("position ASC");
	}	
}
