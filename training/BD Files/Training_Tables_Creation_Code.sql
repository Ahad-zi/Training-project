CREATE TABLE TrainingOrganization (
    OrganizationID INT PRIMARY KEY,
    OrganizationName VARCHAR(100),
    Description TEXT,
    ContactInformation VARCHAR(100),
    Website VARCHAR(100),
    Logo BLOB
);

CREATE TABLE TrainingProgram (
    TrainingProgramID INT PRIMARY KEY,
    ProgramName VARCHAR(100),
    Description TEXT,
    StartDate DATE,
    EndDate DATE,
    Capacity INT,
    Fee DECIMAL(10,2),
    Prerequisites TEXT,
    OrganizationID INT, 
    FOREIGN KEY (OrganizationID) REFERENCES TrainingOrganization(OrganizationID)
);

 CREATE TABLE Advisor (
    AdvisorID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(50),
    MobileNumber VARCHAR(20),
    Address TEXT,
    CreatedDate DATETIME
);

 
CREATE TABLE User (
    UserID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(50),
    ContactNumber VARCHAR(20),
    BirthDate DATE,
    Address TEXT,
    CreatedDate DATETIME,
    GPA float(4),
    MajOr TEXT, 
    AdvisorID INT,
	FOREIGN KEY (AdvisorID) REFERENCES Advisor(AdvisorID)
);

CREATE TABLE Admin (
    AdminID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(50),
    ContactNumber VARCHAR(20),
    BirthDate DATE,
    Address TEXT,
    CreatedDate DATETIME,
    Hiredate datetime
);


CREATE TABLE Evaluation (
    EvaluationID INT PRIMARY KEY,
    UserID INT, -- Foreign Key to User
    TrainingProgramID INT, -- Foreign Key to TrainingProgram
    Rating INT,
    Feedback TEXT,
    EvaluationDate DATE,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (TrainingProgramID) REFERENCES TrainingProgram(TrainingProgramID)
);


CREATE TABLE Report (
    ReportID INT PRIMARY KEY,
    UserID INT, -- Foreign Key to User
    TrainingProgramID INT, -- Foreign Key to TrainingProgram
    Status VARCHAR(50),
    CreatedDate DATETIME,
    File BLOB, 
    AdvisorID INT, 
    FOREIGN KEY (UserID) REFERENCES User(UserID),
	FOREIGN KEY (AdvisorID) REFERENCES Advisor(AdvisorID),
    FOREIGN KEY (TrainingProgramID) REFERENCES TrainingProgram(TrainingProgramID)
);



CREATE TABLE Application (
    ApplicationID INT PRIMARY KEY,
    UserID INT, -- Foreign Key to User
    TrainingProgramID INT, -- Foreign Key to TrainingProgram
    ApplicationDate DATE,
    Status VARCHAR(50),
    ApplicationNotes TEXT,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (TrainingProgramID) REFERENCES TrainingProgram(TrainingProgramID)
);


CREATE TABLE TechnicalSupport (
    TicketID INT PRIMARY KEY,
    UserID INT, -- Foreign Key to User
    AdminID INT, -- Foreign Key to Advisor
    Subject VARCHAR(100),
    Description TEXT,
    Status VARCHAR(50),
    CreatedDate DATETIME,
    ResolvedDate DATETIME,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (AdminID) REFERENCES Admin(AdminID)
);




SELECT * FROM admin;

-- DROP TABLE Admin;
-- DROP TABLE application;
-- DROP TABLE certificate;
-- DROP TABLE evaluation;
-- DROP TABLE technicalsupport;
-- DROP TABLE trainingorganization;
-- DROP TABLE trainingprogram;
-- DROP TABLE user;








