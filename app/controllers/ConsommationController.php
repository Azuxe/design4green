<?php

namespace controllers;

use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use controllers\PersoAuthController;
use Ubiquity\orm\DAO;
use models\Foyer;
use models\Consommation;
use models\Locataire;
use models\Proprietaire;
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
		$foyer_id = USession::get("activeUser")->getFoyerID();
		$foyer=DAO::getOne(Foyer::class,$foyer_id,false);
		$consommations=DAO::uGetAll(Consommation::class,"foyer.foyerID=?",false,[$foyer_id]);
		$proprietaire = DAO::getOne(Proprietaire::class,$foyer_id);
		$locataire = DAO::getOne(Locataire::class,$foyer_id);
		$foyer->setConsommations($consommations);
		$foyer->setLocataires($locataire);
		$foyer->setProprietaires($proprietaire);
		$this->loadView("ConsommationController/index.html", ["logement" => $foyer]);
	}
}
