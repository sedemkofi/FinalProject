Drop database if exists MusicCollab;
Create database MusicCollab;
Use MusicCollab;

create table UserRole(
RoleID int auto_increment primary key,
RoleName varchar(100)
);

INSERT INTO UserRole (RoleID, RoleName) VALUES 
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

-- Creating the Users table
CREATE TABLE User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Email VARCHAR(100) UNIQUE,
    Password VARCHAR(100),
    ArtistName VARCHAR(100),
    Bio VARCHAR(300),
    RoleID INT,
    HeaderPath VARCHAR(200),
    FOREIGN KEY (RoleID) REFERENCES UserRole(RoleID)
);
Insert into User (FirstName, LastName, Email, RoleID) values ('admin', '$2y$10$xec566g4tOrTbblhc/mLXucWTaUOSvBykjHQUGaA0yBajk6Lv4tVe', 'admin@musiccollab.com', 1);

-- Creating the MusicFiles table
CREATE TABLE MusicFiles (
    MusicFileID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Title VARCHAR(100),
    Artiste VARCHAR(100),
    FileName VARCHAR(100),
    FileType VARCHAR(10),
    FilePath VARCHAR(300),
    UploadDate DATETIME,
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- Creating the Collaborations table
CREATE TABLE Collaborations (
    CollaborationID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    MusicFileID INT,
    CollaborationDate DATETIME,
    Feedback TEXT,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (MusicFileID) REFERENCES MusicFiles(MusicFileID)
);

-- Creating the Collaborators table
CREATE TABLE Collaborators (
    CollaborationID INT,
    CollaboratorID INT,
    FOREIGN KEY (CollaborationID) REFERENCES Collaborations(CollaborationID),
    FOREIGN KEY (CollaboratorID) REFERENCES User(UserID)
);


