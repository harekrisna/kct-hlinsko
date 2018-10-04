<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Tracy\Debugger;
use Nette\Utils\Finder;
use Nette\Utils\Strings;
use Nette\Utils\Image;

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
		$years_dir = "../../kct/fotogalerie";
		$year_dir = "../../kct/fotogalerie/1975";
        foreach (Finder::findDirectories('*')->in($years_dir) as $year_dir) {
		    foreach (Finder::findDirectories('*')->in($year_dir) as $gallery_dir) {
		    	if(file_exists($gallery_dir."/popis/nazev.txt")) {
		    		$description = file_get_contents($gallery_dir."/popis/nazev.txt");
		    		$description = iconv('windows-1250', 'UTF-8', $description);
		    		$date_delimiter = strpos($description, " ");
		    		$date = substr($description, 0, $date_delimiter);
		    		$mysql_date_from = $mysql_date_to = substr($date, 6)."-".substr($date, 3, 2)."-".substr($date, 0, 2);
		    		$title = substr($description, $date_delimiter+1);
		    		$title_webalize = Strings::webalize($title);
		    		$url = Strings::webalize($description);

		    		Debugger::dump($date);

		    		if(strlen($date) > 10) {
		    			$mysql_date_from = substr($date, 10)."-".substr($date, 7, 2)."-".substr($date, 0, 2);
		    			$mysql_date_to = substr($date, 10)."-".substr($date, 7, 2)."-".substr($date, 4, 2);
		    			Debugger::dump($mysql_date_from." x ".$mysql_date_to);
		    			//Debugger::dump($mysql_date_from." - ".$mysql_date_to);
		    		}
		    		
		    		
		    		/*
		    		$new_gallery = $this->galery->insert(['title' => $title, 
		    											  'galery_date' => $mysql_date,
		    			   								  'photos_folder' => $title_webalize, 
		    			   				   				  'url' => $url]);
					
					if($new_gallery) {
						$photos_folder = $new_gallery->id."_".$title_webalize;
						$this->galery->update($new_gallery->id, ['photos_folder' => $photos_folder]);
						$photos_folder = GALERIES_FOLDER."/".$photos_folder;
						mkdir($photos_folder);
						chmod($photos_folder, 0777);
						mkdir($photos_folder."/photos");
						chmod($photos_folder, 0777);
						mkdir($photos_folder."/previews");
						chmod($photos_folder, 0777);

						foreach (Finder::findFiles('*.jpg', '*.JPG')->in($gallery_dir) as $photo_file) {
							$file_info = pathinfo($photo_file);
			    			$target_file = Strings::webalize($file_info['filename']).".".Strings::webalize($file_info['extension']);
							$image = Image::fromFile($photo_file);
							$image->resize(NULL, 1200, Image::SHRINK_ONLY);
							$image->save($photos_folder."/photos/".$target_file);
							chmod($photos_folder."/photos/".$target_file, 0777);
			                $filesize = filesize($photos_folder."/photos/".$target_file);
			                
			                $new_width = $image->width;
			                $new_height = $image->height;
			                
			                $image->resize(NULL, 240);
							$image->save($photos_folder."/previews/".$target_file);
							chmod($photos_folder."/previews/".$target_file, 0777);

			                unset($image);
														   
							$max_position = $this->photo->findAll()
														->where(['galery_id' => $new_gallery->id])
			                                            ->max('position');
							
		    				$new_photo = $this->photo->insert(["file" => $target_file,
		    												   'galery_id' => $new_gallery->id,
		    						 						   "width" => $new_width,
		    												   "height" => $new_height,
		    												   "position" => $max_position + 1,
		                                                     ]);
						}
					}
					*/
		    	}
		    }
		    break;
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
