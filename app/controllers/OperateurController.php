<?php
namespace controllers;

use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
use controllers\AuthOperateurController;
use Ubiquity\orm\DAO;
use models\Foyer;
use models\Consommation;
use models\Proprietaire;
use models\Locataire;
use models\Identifiant;


 /**
 * Controller OperateurController
 **/
class OperateurController extends ControllerBase{

	use WithAuthTrait;
	protected function getAuthController(): AuthController
	{
		return new AuthOperateurController();
	}

	/**
	 * @Route('operateur')
	 */
	public function index(){
		$foyers=DAO::getAll(Foyer::class);
		foreach($foyers as $foyer){
			$proprietaire = DAO::getOne(Proprietaire::class,$foyer->getFoyerID());
			$locataire = DAO::getOne(Locataire::class,$foyer->getFoyerID());
			$identifiant = DAO::getOne(Identifiant::class,$foyer->getFoyerID());
			$consommations=DAO::uGetAll(Consommation::class,"foyer.foyerID=?",false,["A"]);
			$foyer->setConsommations($consommations);
			$foyer->setProprietaires($proprietaire);
			$foyer->setLocataires($locataire);
			$foyer->setIdentifiants($identifiant);
		}
		$this->loadView("OperateurController/index.html",['foyers' => $foyers]);
	}
}
