<?php
namespace models;
class Locataire{
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

	 public function getFoyer(){
		return $this->foyer;
	}

	 public function setFoyer($foyer){
		$this->foyer=$foyer;
	}

	 public function __toString(){
		return $this->prenom;
	}

}