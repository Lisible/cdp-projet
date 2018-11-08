<?php

abstract class UserStoryPriority {
    const VERY_LOW = 'very low';
    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';
    const VERY_HIGH = 'very high';
}

class UserStory {
	private $id;
	private $description;
    private $priority;
    private $difficulty;
    private $projectId;

	function __construct(){
		$this->id = -1;;
		$this->description = '';
		$this->priority = UserStoryPriority::VERY_LOW;
        $this->difficulty = 1;
        $this->projectId = -1;
	}

	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}

	function getDescription(){
		return $this->description;
	}
	function setDescription($description){
		$this->description = $description;
	}

	function getPriority(){
		return $this->priority;
	}
	function setPriority($priority){
		$this->priority = $priority;
	}

	function getDifficulty(){
		return $this->difficulty;
	}
	function setDifficulty($difficulty){
		$this->difficulty = $difficulty;
    }
    
    function getProjectId(){
		return $this->projectId;
	}
	function setProjectId($projectId){
		$this->projectId = $projectId;
	}
}