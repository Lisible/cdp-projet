CREATE TABLE ApplicationUser (userId INT NOT NULL AUTO_INCREMENT,
                   userUsername VARCHAR(50) NOT NULL,
                   userPasswordHash VARCHAR(255) NOT NULL,
                   userEmail VARCHAR(255) NOT NULL,
                   userFirstName VARCHAR(50) NOT NULL,
                   userLastName VARCHAR(50) NOT NULL,
                    PRIMARY KEY (userId));

CREATE TABLE Project (projectId INT NOT NULL AUTO_INCREMENT,
                      projectName VARCHAR(50) NOT NULL,
                      projectDescription VARCHAR(500),
                      projectSprintDuration INT NOT NULL,
                      projectBeginDate DATE NOT NULL,
                      ownerId INT NOT NULL,
                      PRIMARY KEY (projectId),
                      CONSTRAINT fkProjectUser FOREIGN KEY (ownerId) REFERENCES ApplicationUser(userId));


CREATE TABLE Issue (issueId INT NOT NULL AUTO_INCREMENT,
                    issueNumber INT NOT NULL,
                    issueDescription VARCHAR(500) NOT NULL,
                    issuePriority ENUM('very low', 'low', 'medium', 'high', 'very high'),
                    issueDifficulty INT,
                    projectId INT NOT NULL,
                    PRIMARY KEY (issueId),
                    CONSTRAINT fkIssueProject FOREIGN KEY (projectId) REFERENCES Project(projectId));

CREATE TABLE ProjectMember (projectId INT NOT NULL,
                            userId INT NOT NULL,
                            PRIMARY KEY (projectId, userId),
                            CONSTRAINT fkProjectMemberProject FOREIGN KEY (projectId) REFERENCES Project(projectId),
                            CONSTRAINT fkProjectMemberUser FOREIGN KEY (userId) REFERENCES ApplicationUser(userId));                     

INSERT INTO ApplicationUser(userUsername, userPasswordHash, userEmail, userFirstName, userLastName)
VALUES ('root', 
        '$argon2i$v=19$m=1024,t=2,p=2$aTYvdExYVU1ENUZiTU1nRw$p1hDGLN5vMwjBhGNGnsfgevTXXTC+iPb+aTidQbzipc',
        'root@root.fr',
        'Root',
        'Root');