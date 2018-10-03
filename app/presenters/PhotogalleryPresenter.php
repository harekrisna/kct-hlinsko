<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;
use Nette\Utils\Finder;

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

	public function renderImport() {
		$years_dir = "./images/orig_photos";
        
 		$search  = array('\x9e');
		$replace = array('ž');

        foreach (Finder::findDirectories('*')->in($years_dir) as $year_dir) {
		    foreach (Finder::findDirectories('*')->in($year_dir) as $gallery_dir) {
		    	if(file_exists($gallery_dir."/popis/nazev.txt")) {
		    		$description = file_get_contents($gallery_dir."/popis/nazev.txt");
		    		$description = iconv('windows-1250', 'UTF-8', $description);
		    		//$this->galery->insert(['title' => mb_convert_encoding($description, "UTF-8"), 'photos_folder' => "lol", 'url' => "lol"]);
		    		break;
		    	}
		    }
		}
        
        $blocks = [];

    	$this->template->blocks = $blocks;
    }

	public function renderYear($year) {
		$this->template->galeries = $this->galery->findBy(['year(galery_date)' => $year, 'active' => TRUE])
												 ->order('galery_date DESC');
		$this->template->year = $year;
		$this->template->backlink = $this->presenter->link('photogallery');
	}	

	public function renderPhotos($galery_id) {
		$galery = $this->galery->get($galery_id);

		$this->template->galery = $galery;
		$this->template->photos = $this->photo->findAll()
											  ->where(["galery_id" => $galery_id])
											  ->order("position ASC");
											  						  
		$this->template->backlink = $this->presenter->link('year', $galery->galery_date->format('Y'));
	}	
}
