<?php

namespace controllers;

use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use controllers\PersoAuthController;

/**
 * Controller ConsommationController
 **/
class ConsommationController extends ControllerBase
{

	use WithAuthTrait;
	protected function getAuthController(): AuthController
	{
		return new PersoAuthController();
	}

	/**
	 * @Route("consommation")
	 */
	public function index()
	{
		$this->loadView("ConsommationController/index.html");
	}
}
