<?php
namespace models;
class Proprietaire{
	/**
	 * @id
	 * @column("name"=>"foyerID","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $foyerID;

	/**
	 * @column("name"=>"nom","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $nom;

	/**
	 * @column("name"=>"prenom","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $prenom;

	/**
	 * @column("name"=>"societe","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $societe;

	/**
	 * @column("name"=>"adresse","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $adresse;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Foyer","name"=>"foyerID","nullable"=>false)
	**/
	private $foyer;

	 public function getFoyerID(){
		return $this->foyerID;
	}

	 public function setFoyerID($foyerID){
		$this->foyerID=$foyerID;
	}

	 public function getNom(){
		return $this->nom;
	}

	 public function setNom($nom){
		$this->nom=$nom;
	}

	 public function getPrenom(){
		return $this->prenom;
	}

	 public function setPrenom($prenom){
		$this->prenom=$prenom;
	}

	 public function getSociete(){
		return $this->societe;
	}

	 public function setSociete($societe){
		$this->societe=$societe;
	}

	 public function getAdresse(){
		return $this->adresse;
	}

	 public function setAdresse($adresse){
		$this->adresse=$adresse;
	}

	 public function getFoyer(){
		return $this->foyer;
	}

	 public function setFoyer($foyer){
		$this->foyer=$foyer;
	}

	 public function __toString(){
		return $this->adresse;
	}

}