<?php
namespace models;
class Identifiant{
	/**
	 * @id
	 * @column("name"=>"foyerID","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $foyerID;

	/**
	 * @column("name"=>"username","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $username;

	/**
	 * @column("name"=>"password","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $password;

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

	 public function getUsername(){
		return $this->username;
	}

	 public function setUsername($username){
		$this->username=$username;
	}

	 public function getPassword(){
		return $this->password;
	}

	 public function setPassword($password){
		$this->password=$password;
	}

	 public function getFoyer(){
		return $this->foyer;
	}

	 public function setFoyer($foyer){
		$this->foyer=$foyer;
	}

	 public function __toString(){
		return $this->username;
	}

}