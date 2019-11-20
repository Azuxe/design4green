<?php
namespace models;
/**
 * @table('foyer')
*/
class Foyer{
	/**
	 * @id
	 * @column("name"=>"foyerID","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $foyerID;

	/**
	 * @column("name"=>"type","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $type;

	/**
	 * @column("name"=>"surface","nullable"=>false,"dbType"=>"float")
	 * @validator("notNull")
	**/
	private $surface;

	/**
	 * @column("name"=>"pieces","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $pieces;

	/**
	 * @column("name"=>"chauffage","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $chauffage;

	/**
	 * @column("name"=>"annee_construction","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $annee_construction;

	/**
	 * @column("name"=>"nb_voie","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $nb_voie;

	/**
	 * @column("name"=>"voie","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $voie;

	/**
	 * @column("name"=>"code_postal","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $code_postal;

	/**
	 * @column("name"=>"ville","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $ville;

	/**
	 * @oneToMany("mappedBy"=>"foyer","className"=>"models\\Consommation")
	**/
	private $consommations;

	/**
	 * @oneToMany("mappedBy"=>"foyer","className"=>"models\\Identifiant")
	**/
	private $identifiants;

	/**
	 * @oneToMany("mappedBy"=>"foyer","className"=>"models\\Locataire")
	**/
	private $locataires;

	/**
	 * @oneToMany("mappedBy"=>"foyer","className"=>"models\\Proprietaire")
	**/
	private $proprietaires;

	 public function getFoyerID(){
		return $this->foyerID;
	}

	 public function setFoyerID($foyerID){
		$this->foyerID=$foyerID;
	}

	 public function getType(){
		return $this->type;
	}

	 public function setType($type){
		$this->type=$type;
	}

	 public function getSurface(){
		return $this->surface;
	}

	 public function setSurface($surface){
		$this->surface=$surface;
	}

	 public function getPieces(){
		return $this->pieces;
	}

	 public function setPieces($pieces){
		$this->pieces=$pieces;
	}

	 public function getChauffage(){
		return $this->chauffage;
	}

	 public function setChauffage($chauffage){
		$this->chauffage=$chauffage;
	}

	 public function getAnnee_construction(){
		return $this->annee_construction;
	}

	 public function setAnnee_construction($annee_construction){
		$this->annee_construction=$annee_construction;
	}

	 public function getNb_voie(){
		return $this->nb_voie;
	}

	 public function setNb_voie($nb_voie){
		$this->nb_voie=$nb_voie;
	}

	 public function getVoie(){
		return $this->voie;
	}

	 public function setVoie($voie){
		$this->voie=$voie;
	}

	 public function getCode_postal(){
		return $this->code_postal;
	}

	 public function setCode_postal($code_postal){
		$this->code_postal=$code_postal;
	}

	 public function getVille(){
		return $this->ville;
	}

	 public function setVille($ville){
		$this->ville=$ville;
	}

	 public function getConsommations(){
		return $this->consommations;
	}

	 public function setConsommations($consommations){
		$this->consommations=$consommations;
	}

	 public function getIdentifiants(){
		return $this->identifiants;
	}

	 public function setIdentifiants($identifiants){
		$this->identifiants=$identifiants;
	}

	 public function getLocataires(){
		return $this->locataires;
	}

	 public function setLocataires($locataires){
		$this->locataires=$locataires;
	}

	 public function getProprietaires(){
		return $this->proprietaires;
	}

	 public function setProprietaires($proprietaires){
		$this->proprietaires=$proprietaires;
	}

	 public function __toString(){
		return $this->ville;
	}

}