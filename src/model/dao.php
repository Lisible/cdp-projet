<?php

class DAO
{
	public static function createProject($project)
	{
		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'INSERT INTO project(name, description, sprintDuration, beginDate) VALUES(?,?,?,?);';
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
			$sqlQuery = 'SELECT * FROM project;';
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

	private static function createProjectFromQueryResult($queryResult) {
		$project = new Project();
		$project->setId($queryResult['id']);
		$project->setName($queryResult['name']);
		$project->setDescription($queryResult['description']);
		$project->setSprintDuration($queryResult['sprintDuration']);
		$project->setBeginDate($queryResult['beginDate']);
		return $project;
	}
}