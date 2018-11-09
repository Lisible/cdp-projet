<?php

include_once('model/project.php');
include_once('model/user_story.php');

class DAO
{
	public static function createProject($project)
	{
		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'INSERT INTO Project(projectName, projectDescription, projectSprintDuration, projectBeginDate) VALUES(?,?,?,?);';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute([$project->getName(), 
								$project->getDescription(), 
								$project->getSprintDuration(), 
								$project->getBeginDate()]);
		}
		catch(\PDOException $e) {
			die($e);
		}
	}

	public static function getProjects()
	{
		$projects = [];

		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'SELECT * FROM Project;';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute();
			$queryResults = $statement->fetchAll();

			foreach($queryResults as $queryResult){
				$project = DAO::createProjectFromQueryResult($queryResult);
				array_push($projects, $project);
			}
		}
		catch(\PDOException $e) {
			die($e);
		}

		return $projects;
	}
	
	public static function createUserStory($userStory) 
	{
		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'INSERT INTO Issue(issueName, issueDescription, issuePriority, issueDifficulty, projectId) VALUES(?,?,?,?,?);';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute([$userStory->getName(), 
								$userStory->getDescription(), 
								$userStory->getSprintDuration(), 
								$userStory->getBeginDate(),
								$userStory->getProjectId()]);
		}
		catch(\PDOException $e) {
			die($e);
		}
	}

	public static function getUserStories($projectId)
	{
		$userStories = [];

		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'SELECT * FROM Issue WHERE projectId = ?;';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute([$projectId]);
			$queryResults = $statement->fetchAll();

			foreach($queryResults as $queryResult){
				$userStory = DAO::createUserStoryFromQueryResult($queryResult);
				array_push($userStories, $userStory);
			}
		}
		catch(\PDOException $e) {
			die($e);
		}

		return $userStories;
	}

	private static function createProjectFromQueryResult($queryResult) {
		$project = new Project();
		$project->setId($queryResult['projectId']);
		$project->setName($queryResult['projectName']);
		$project->setDescription($queryResult['projectDescription']);
		$project->setSprintDuration($queryResult['projectSprintDuration']);
		$project->setBeginDate($queryResult['projectBeginDate']);
		return $project;
	}
	private static function createUserStoryFromQueryResult($queryResult) {
		$userStory = new UserStory();
		$userStory->setId($queryResult['issueId']);
		$userStory->setDescription($queryResult['issueDescription']);
		$userStory->setPriority($queryResult['issuePriority']);
		$userStory->setDifficulty($queryResult['issueDifficulty']);
		$userStory->setProjectId($queryResult['projectId']);
		return $userStory;
	}
}
