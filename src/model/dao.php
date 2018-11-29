<?php

include_once('model/project.php');
include_once('model/user_story.php');
include_once('model/user.php');

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

	public static function getProjectsByOwnerId($ownerId) {
        $projects = [];

        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM Project WHERE ownerId = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($ownerId));
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

    public static function getSprintsByProjectId($projectId) {
	    $sprints = [];

        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM ProjectSprint WHERE projectId = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($projectId));
            $queryResults = $statement->fetchAll();

            foreach($queryResults as $queryResult){
                array_push($sprints, $queryResult['sprintId']);
            }
        }
        catch (\PDOException $e) {
            die($e);
        }

        return $sprints;
    }

    public static function addSprintToProject($projectId) {
        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQueryCount = 'SELECT count(*) FROM ProjectSprint WHERE projectId = ?;';
            $statementCount = $pdo->prepare($sqlQueryCount);
            $statementCount->execute([$projectId]);
            $sprintIdToInsert = $statementCount->fetchColumn();
            $sprintIdToInsert++;

            $sqlQuery = 'INSERT INTO ProjectSprint(projectId, sprintId)
                         VALUES(?, ?);';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute([$projectId, $sprintIdToInsert]);
        }
        catch (\PDOException $e) {
            die($e);
        }
    }

    public static function deleteSprint($sprintID, $projectID){
      try {
        $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
        $sqlQuery = 'DELETE FROM ProjectSprint WHERE projectId = ? AND sprintId = ?;';
        $statement = $pdo->prepare($sqlQuery);
        $statement->execute([$projectID, $sprintID]);
      }
      catch (\PDOException $e){
        die($e);
      }
    }

    public static function deleteUserStory($userStoryId){
      try {
        $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
        $sqlQuery = 'DELETE FROM Issue WHERE issueId = ?;';
        $statement = $pdo->prepare($sqlQuery);
        $statement->execute(array($userStoryId));
        }
        catch (\PDOException $e) {
          die($e);
        }
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

		try {
			$pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
			$sqlQuery = 'INSERT INTO ApplicationUser(userUsername, userPasswordHash, userEmail, userFirstName, userLastName) VALUES(?,?,?,?,?);';
			$statement = $pdo->prepare($sqlQuery);
			$status = $statement->execute([$login, $hashedPassword, $email, $firstname, $lastname]);
			return $status;
		}
		catch(\PDOException $e) {
			var_dump($e);
			return false;
		}
	}

	private static function hashPassword($password) {
		return password_hash($password, PASSWORD_ARGON2I, ['memory_cost' => 1024, 'time_cost' => 4, 'threads' => 3]);
	}

	public static function existProject($projectId) {
        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM Project WHERE projectId = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($projectId));
            $queryResult = $statement->fetch();
            return $queryResult != null ? true : false ;
        }
        catch (\PDOException $e) {
            die($e);
        }
    }

    public static function existUser($username) {
        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM ApplicationUser WHERE userUsername = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($username));
            $queryResult = $statement->fetch();
            return $queryResult != null ? true : false ;
        }
        catch (\PDOException $e) {
            die($e);
        }
    }

    public static function addUserToProject($membreId, $projectId) {
	    try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'INSERT INTO ProjectMember(projectId, userId)
                          VALUES (?,?)';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute([$projectId, $membreId]);
        }
        catch (\PDOException $e) {
	        die($e);
        }
    }

    public static function getUserByUserName($username) {
	    try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM ApplicationUser WHERE userUsername = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($username));
            $queryResult = $statement->fetch();
            return self::createUserFromQueryResult($queryResult);
        }
        catch (\PDOException $e) {
	        die($e);
        }
    }

    public static function getMembersByProjectId($projectId) {
        $members = [];

        try {
            $pdo = new PDO('mysql:host=mysql;dbname=cdp;charset=utf8mb4', 'root', 'root');
            $sqlQuery = 'SELECT * FROM 
                          (ProjectMember INNER JOIN ApplicationUser ON ApplicationUser.userId=ProjectMember.userId) 
                          WHERE projectId = ?;';
            $statement = $pdo->prepare($sqlQuery);
            $statement->execute(array($projectId));
            $queryResults = $statement->fetchAll();

            foreach($queryResults as $queryResult){
                $member = self::createUserFromQueryResult($queryResult);
                array_push($members, $member);
            }
        }
        catch (\PDOException $e) {
            die($e);
        }

        return $members;
    }

	private static function createProjectFromQueryResult($queryResult) {
		$project = new Project();
		$project->setId($queryResult['projectId']);
		$project->setName($queryResult['projectName']);
		$project->setDescription($queryResult['projectDescription']);
		$project->setSprintDuration($queryResult['projectSprintDuration']);
		$project->setBeginDate($queryResult['projectBeginDate']);
		$project->setOwnerId($queryResult['ownerId']);
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

    private static function createUserFromQueryResult($queryResult) {
        $user = new User();
        $user->setId($queryResult['userId']);
        $user->setFirstname($queryResult['userFirstName']);
        $user->setLastname($queryResult['userLastName']);
        $user->setEmail($queryResult['userEmail']);
        $user->setUsername($queryResult['userUsername']);
        return $user;
    }
}
