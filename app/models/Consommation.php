<?php
namespace models;
/**
 * @table('consommation')
*/
class Consommation{
	/**
	 * @id
	 * @column("name"=>"date_releve","nullable"=>false,"dbType"=>"date")
	 * @validator("type","date","constraints"=>array("notNull"=>true))
	**/
	private $date_releve;

	/**
	 * @column("name"=>"kwh","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $kwh;

	/**
	 * @id
	 * @column("name"=>"foyerID","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $foyerID;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Foyer","name"=>"foyerID","nullable"=>false)
	**/
	private $foyer;

	 public function getDate_releve(){
		return $this->date_releve;
	}

	 public function setDate_releve($date_releve){
		$this->date_releve=$date_releve;
	}

	 public function getKwh(){
		return $this->kwh;
	}

	 public function setKwh($kwh){
		$this->kwh=$kwh;
	}

	 public function getFoyerID(){
		return $this->foyerID;
	}

	 public function setFoyerID($foyerID){
		$this->foyerID=$foyerID;
	}

	 public function getFoyer(){
		return $this->foyer;
	}

	 public function setFoyer($foyer){
		$this->foyer=$foyer;
	}

	 public function __toString(){
		return $this->kwh;
	}

}