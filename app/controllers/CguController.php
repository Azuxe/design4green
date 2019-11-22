<?php
namespace controllers;

use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use controllers\PersoAuthController;


 /**
 * Controller CguController
 **/
class CguController extends ControllerBase{

	use WithAuthTrait;
	protected function getAuthController(): AuthController
	{
		return new PersoAuthController();
	}

	/**
	 * @Route("cgu")
	 */
	public function index(){
		$this->loadView("CguController/index.html");
	}
}
