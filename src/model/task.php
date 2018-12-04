<?php

class Task 
{
	private $id;
	private $title;
	private $description;
	private $workload;
	private $issue;
	private $state;
	private $implementor;
	private $projectId;
	private $sprintId;

	function __construct(){
		$this->id = -1;
		$this->title = 'Untitled task';
		$this->description = '';
		$this->workload = 1;
		$this->issue = '';
		$this->state = 'todo';
		$this->implementor = null;
		$this->projectId = -1;
		$this->sprintId = -1;
	}

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
	}

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
	}

	public function getWorkload() {
		return $this->workload;
	}
	public function setWorkload($workload) {
		$this->workload = $workload;
	}

	public function getIssue() {
		return $this->issue;
	}
	public function setIssue($issue) {
		$this->issue = $issue;
	}

	public function getState() {
		return $this->state;
	}
	public function setState($state) {
		$this->state = $state;
	}

	public function getImplementor() {
		return $this->implementor;
	}
	public function setImplementor($implementor) {
		$this->implementor = $implementor;
	}

	public function getProjectId() {
		return $this->projectId;
	}
	public function setProjectId($projectId) {
		$this->projectId = $projectId;
	}

	public function getSprintId() {
		return $this->sprintId;
	}
	public function setSprintId($sprintId) {
		$this->sprintId = $sprintId;
	}
}