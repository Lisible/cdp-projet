CREATE TABLE Project (projectId INT NOT NULL AUTO_INCREMENT,
                      projectName VARCHAR(50) NOT NULL,
                      projectDescription VARCHAR(500),
                      projectSprintDuration INT NOT NULL,
                      projectBeginDate DATE NOT NULL,
                      PRIMARY KEY (projectId));


CREATE TABLE Issue (issueId INT NOT NULL AUTO_INCREMENT,
                    issueDescription VARCHAR(500) NOT NULL,
                    issuePriority ENUM('very low', 'low', 'medium', 'high', 'very high'),
                    issueDifficulty INT,
                    projectId INT NOT NULL,
                    PRIMARY KEY (issueId),
                    CONSTRAINT fkIssueProject FOREIGN KEY (projectId) REFERENCES Project(projectId));


                      