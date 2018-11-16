<?php

include_once('model/project.php');
include_once('model/user_story.php');

class DAO
{
	public static function createProject($userId, $project)
	{
		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'INSERT INTO Project(projectName, projectDescription, projectSprintDuration, projectBeginDate, ownerId) 
						 VALUES(?,?,?,?,?);';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute([$project->getName(), 
								$project->getDescription(), 
								$project->getSprintDuration(), 
								$project->getBeginDate(),
								$userId]);
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

	public static function getProjectById($projectId)
    {
        $project = null;

        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM Project WHERE projectId = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($projectId));
            $queryResult = $statement->fetch();
            $project = self::createProjectFromQueryResult($queryResult);
        }
        catch (\PDOException $e) {
            die($e);
        }

        return $project;
    }
	
	public static function createUserStory($userStory) 
	{
		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'INSERT INTO Issue(issueNumber, issueDescription, issuePriority, issueDifficulty, projectId) 
						 VALUES(?,?,?,?,?);';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute([$userStory->getNumber(), 
								$userStory->getDescription(), 
								$userStory->getPriority(), 
								$userStory->getDifficulty(),
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

	public static function connectUser($login, $pass) {
		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'SELECT userId, userPasswordHash FROM ApplicationUser WHERE userUserName = ?;';
			$statement = $pdo->prepare($sqlQuery);
			$statement->execute([$login]);
			$queryResults = $statement->fetch(PDO::FETCH_ASSOC);

			if(password_verify($pass, $queryResults['userPasswordHash'])){
				$_SESSION['connected'] = true;
				$_SESSION['userId'] = $queryResults['userId'];
				return true;
			}

			return false;
		}
		catch(\PDOException $e) {
			die($e);
		}
	}

	public static function createUser($login, $password, $firstname, $lastname, $email) {
		$hashedPassword = DAO::hashPassword($password);

		/// TODO
	}

	private static function hashPassword($password) {
		return password_hash($password, PASSWORD_ARGON2I, ['memory_cost' => 1024, 'time_cost' => 4, 'threads' => 3]);
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
		$userStory->setNumber($queryResult['issueNumber']);
		$userStory->setDescription($queryResult['issueDescription']);
		$userStory->setPriority($queryResult['issuePriority']);
		$userStory->setDifficulty($queryResult['issueDifficulty']);
		$userStory->setProjectId($queryResult['projectId']);
		return $userStory;
	}

}
