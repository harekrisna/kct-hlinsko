<?php

namespace App\Model;
use Nette;
use Tracy\Debugger;

class Galery extends TableExtended {
    /** @var string */
	protected $tableName = 'galery';

   	public function findYears() {
        $selection_years = $this->findAll()->select('DISTINCT YEAR(date_from) AS year')
        								   ->where(['active' => TRUE])
										   ->order('year DESC');

		$years = [];										   
		foreach ($selection_years as $year) {
			$years[] = $year->year;
		}							     

		return $years;
    }
}