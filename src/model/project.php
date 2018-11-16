<?php

class Project {
	private $id;
	private $name;
	private $description;
	private $sprintDuration;
	private $beginDate;
	private $ownerId;

	function __construct(){
		$this->id = -1;
		$this->name = 'unnamed project';
		$this->description = '';
		$this->sprintDuration = 2;
		$this->beginDate = mktime(0,0,0,1,1,1970);
		$this->ownerId = -1;
	}

	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}

	function getName(){
		return $this->name;
	}
	function setName($name){
		$this->name = $name;
	}

	function getDescription(){
		return $this->description;
	}
	function setDescription($description){
		$this->description = $description;
	}

	function getSprintDuration(){
		return $this->sprintDuration;
	}
	function setSprintDuration($sprintDuration){
		$this->sprintDuration = $sprintDuration;
	}

	function getBeginDate(){
		return $this->beginDate;
	}
	function setBeginDate($timestamp){
		$this->beginDate = $timestamp;
	}

	function getOwnerId() {
		return $this->ownerId;
	}
	function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}
}