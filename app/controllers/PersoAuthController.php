<?php
namespace controllers;
use controllers\auth\files\PersoAuthControllerFiles;
use Ubiquity\controllers\auth\AuthFiles;

 /**
 * Auth Controller PersoAuthController
 **/
class PersoAuthController extends \controllers\BaseAuthController{

	public function _getBaseRoute() {
		return 'PersoAuthController';
	}
	
	protected function getFiles(): AuthFiles{
		return new PersoAuthControllerFiles();
	}



}
