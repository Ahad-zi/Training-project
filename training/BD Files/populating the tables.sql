INSERT INTO TrainingOrganization (OrganizationID, OrganizationName, Description, ContactInformation, Website)
VALUES
  (1, 'TechGuru Academy', 'Providing IT training and certifications', 'info@techguracademy.com', 'www.techguracademy.com'),
  (2, 'SkillUp Institute', 'Upskilling professionals for the future', 'contact@skillupinstitute.com', 'www.skillupinstitute.com'),
  (3, 'DataSciencePro', 'Specializing in data science and analytics training', 'info@datasciencepro.com', 'www.datasciencepro.com');


INSERT INTO TrainingProgram (TrainingProgramID, ProgramName, Description, StartDate, EndDate, Capacity, Fee, Prerequisites, OrganizationID)
VALUES
  (1, 'Python Programming', 'Learn Python from basics to advanced', '2024-01-01', '2024-03-31', 30, 999.99, 'Basic computer skills', 1),
  (2, 'Data Analysis with Python', 'Master data analysis using Python libraries', '2024-04-01', '2024-06-30', 25, 1299.99, 'Python programming basics', 1),
  (3, 'Data Science Bootcamp', 'Comprehensive data science training', '2024-07-01', '2024-12-31', 20, 2999.99, 'Python, statistics, machine learning basics', 3);



INSERT INTO Advisor (AdvisorID, FirstName, LastName, Email, Password, MobileNumber, Address, CreatedDate)
VALUES
  (1, 'John', 'Doe', 'johndoe@example.com', 'password123', '1234567890', '123 Main St', '2023-11-15 12:00:00'),
  (2, 'Jane', 'Smith', 'janesmith@example.com', 'password456', '9876543210', '456 Elm St', '2023-12-01 15:30:00'),
  (3, 'Michael', 'Johnson', 'michaeljohnson@example.com', 'password789', '5551234567', '789 Oak St', '2024-01-10 09:15:00');



INSERT INTO User (UserID, FirstName, LastName, Email, Password, ContactNumber, BirthDate, Address, CreatedDate, GPA, Major, AdvisorID)
VALUES
  (1, 'Alice', 'Brown', 'alicebrown@example.com', 'password123', '1112223333', '1995-05-15', '789 Oak St', '2024-01-15 10:00:00', 3.5, 'Computer Science', 1),
  (2, 'Bob', 'Carter', 'bobcarter@example.com', 'password456', '2223334444', '1997-08-22', '456 Elm St', '2024-02-20 14:30:00', 3.2, 'Mathematics', 2),
  (3, 'Charlie', 'Davis', 'charliedavis@example.com', 'password789', '3334445555', '1996-11-07', '123 Main St', '2024-03-10 09:15:00', 3.8, 'Statistics', 3);



INSERT INTO Admin (AdminID, FirstName, LastName, Email, Password, ContactNumber, BirthDate, Address, CreatedDate, HireDate)
VALUES
  (1, 'John', 'Smith', 'johnsmith@example.com', 'admin123', '1112223333', '1980-05-15', '123 Main St', '2023-11-15 12:00:00', '2020-01-01'),
  (2, 'Jane', 'Doe', 'janedoe@example.com', 'admin456', '2223334444', '1982-08-22', '456 Elm St', '2023-12-01 15:30:00', '2021-04-15'),
  (3, 'Michael', 'Brown', 'michaelbrown@example.com', 'admin789', '3334445555', '1985-11-07', '789 Oak St', '2024-01-10 09:15:00', '2022-07-20');


INSERT INTO Evaluation (EvaluationID, UserID, TrainingProgramID, Rating, Feedback, EvaluationDate)
VALUES
  (1, 1, 1, 4, 'Good course, but could use more practical exercises', '2024-02-15'),
  (2, 2, 2, 5, 'Excellent course, learned a lot', '2024-03-10'),
  (3, 3, 3, 3, 'Course content was good, but pacing was too fast', '2024-04-05');



INSERT INTO Report (ReportID, UserID, TrainingProgramID, Status, CreatedDate, AdvisorID)
VALUES
  (1, 1, 1, 'Pending', '2024-02-20', 1),
  (2, 2, 2, 'Approved', '2024-03-15', 2),
  (3, 3, 3, 'Rejected', '2024-04-10', 3);


INSERT INTO Application (ApplicationID, UserID, TrainingProgramID, ApplicationDate, Status, ApplicationNotes)
VALUES
  (1, 1, 1, '2024-01-15', 'Accepted', 'Strong candidate with relevant experience'),
  (2, 2, 2, '2024-02-10', 'Pending', 'Requires additional information'),
  (3, 3, 3, 'Rejected', 'Insufficient qualifications');


INSERT INTO TechnicalSupport (TicketID, UserID, AdminID, Subject, Description, Status, CreatedDate)
VALUES
  (1, 1, 1, 'Login Issue', 'Unable to login to the platform', 'Resolved', '2024-02-18'),
  (2, 2, 2, 'Course Material Error', 'Incorrect information in course module 3', 'In Progress', '2024-03-12'),
  (3, 3, 3, 'Payment Problem', 'Payment declined', 'Resolved', '2024-04-08');


