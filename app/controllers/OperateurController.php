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

	/**
	 * @Route("operateur/{pageNum}/{countPerPage}")
	 */
	public function index5($pageNum,$countPerPage){
		$foyers=DAO::paginate(Foyer::class,$pageNum,$countPerPage);
		$res = [];
		foreach($foyers as $foyer){
			$proprietaire = DAO::getOne(Proprietaire::class,$foyer->getFoyerID(),false);
			$locataire = DAO::getOne(Locataire::class,$foyer->getFoyerID(),false);
			$identifiant = DAO::getOne(Identifiant::class,$foyer->getFoyerID(),false);
			$consommations=DAO::uGetAll(Consommation::class,"foyer.foyerID=?",false,["A"]);
			$json_foyer = json_decode(json_encode($foyer),true);
			$json_foyer["consommations"] = $consommations;	
			$json_foyer["identifiants"] = $identifiant;	
			$json_foyer["locataires"] = $locataire;	
			$json_foyer["proprietaires"] = $proprietaire;	
			array_push($res,$json_foyer);
		}
		echo "<i>" . json_encode($res) . "<i>";
	}
}


// RESTE A FAIRE
// GESTION DE LA PAGINATION / Filtre
// CREATION COMPTE
// MAIL RESET + MAIL CONFIRMATION
// SERVEUR
// NETTOYAGE
//
//