<?php

namespace controllers;

use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use controllers\PersoAuthController;
use Ubiquity\orm\DAO;
use models\Foyer;
use models\Consommation;
use models\Identifiant;
use Ubiquity\utils\http\USession;


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
		$foyer=DAO::getOne(Foyer::class,USession::get("activeUser")->getFoyerID(),false);
		$consommations=DAO::uGetAll(Consommation::class,"foyer.foyerID=?",false,["A"]);
		$foyer->setConsommations($consommations);
		$this->loadView("ConsommationController/index.html", ["logement" => $foyer]);
	}
}
