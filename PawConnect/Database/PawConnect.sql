-- Create database
CREATE DATABASE PawConnect;
GO

-- Use database
USE PawConnect;
GO

-- Create table
CREATE TABLE Organisations (
    OrganisationID varchar(8) PRIMARY KEY NOT NULL,
    Type varchar(255) NOT NULL,
    Name varchar(255) NOT NULL,
    BRNCode varchar(15) NOT NULL,
    ContactNumber varchar(15) NOT NULL,
    Verification varchar(20) NOT NULL,
    Status varchar(20) NOT NULL,
    Image blob DEFAULT NULL,
    Statement blob DEFAULT NULL,
    Description varchar(255) NOT NULL
);

CREATE TABLE Users (
    UserID varchar(8) PRIMARY KEY NOT NULL,
    Role varchar(20) NOT NULL,
    Name varchar(50) NOT NULL,
    ContactNumber varchar(15) NOT NULL,
    Gender varchar(10) NOT NULL,
    Email varchar(50) NOT NULL,
    Password varchar(50) NOT NULL,
    Image blob DEFAULT NULL,
    Status varchar(20) NOT NULL
);

CREATE TABLE Organisations_Members (
    OMID varchar(8) PRIMARY KEY NOT NULL,
    OrganisationRole varchar(20) NOT NULL,
    UserID varchar(8) NOT NULL,
    OrganisationID varchar(8) NOT NULL,
    FOREIGN KEY (OrganisationID) REFERENCES Organisations(OrganisationID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Insert data for members
INSERT INTO Organisations (OrganisationID, Type, Name, BRNCode, ContactNumber, Verification, Status, Image, Statement, Description)
VALUES 
('ORG00001', 'Registered', 'SPCA Selangor', '202008198765', '01235684398', 'Verified', 'Approved', NULL, NULL, '...'),
('ORG00002', 'Unregistered', 'PAWS Animal Welfare Society', '-', '01234567890', 'Unverified', 'Approved', NULL, NULL, '...'),
('ORG00003', 'Registered', 'Society for the Prevention of Cruelty to Animals Sabah', '201808765432', '01234567890', 'Verified', 'Approved', NULL, NULL, '...'),
('ORG00004', 'Registered', 'Kuala Lumpur and Selangor Animal Welfare Society', '201707654321', '01234567890', 'Unverified', 'Approved', NULL, NULL, '...'),
('ORG00005', 'Unregistered', 'AnimalCare Malaysia', '-', '01234567890', 'Unverified', 'Pending', NULL, NULL, '...'),
('ORG00006', 'Registered', 'Malaysian Dogs Deserve Better', '201505432109', '01234567890', 'Unverified', 'Rejected', NULL, NULL, '...'),
('ORG00007', 'Registered', 'Hope for Strays', '201404321088', '01234567890', 'Unverified', 'Pending', NULL, NULL, '...'),
('ORG00008', 'Registered', 'Furry Friends Farm', '201303210777', '01234567890', 'Unverified', 'Pending', NULL, NULL, '...'),
('ORG00009', 'Unregistered', 'Animal Malaysia', '-', '01234567890', 'Unverified', 'Pending', NULL, NULL, '...'),
('ORG00010', 'Registered', 'Noahs Ark Cattery', '201101098777', '01234567890', 'Unverified', 'Pending', NULL, NULL, '...');

INSERT INTO Users (UserID, Role, Name, ContactNumber, Gender, Email, Password, Image, Status)
VALUES 
    ('MEM00001', 'Member', 'John Doe', '0123456789', 'Male', 'john@example.com', '123', NULL, 'Active'),
    ('MEM00002', 'Member', 'Jane Smith', '01123456789', 'Female', 'jane@example.com', '123', NULL, 'Active'),
    ('MEM00003', 'Member', 'Alice Johnson', '0198765432', 'Female', 'alice@example.com', '123', NULL, 'Active'),
    ('MEM00004', 'Member', 'Bob Brown', '0134567890', 'Male', 'bob@example.com', '123', NULL, 'Active'),
    ('MEM00005', 'Member', 'Sarah Johnson', '0178901234', 'Female', 'sarah@example.com', '123', NULL, 'Active'),
    ('MEM00006', 'Member', 'Michael Brown', '0167890123', 'Male', 'michael@example.com', '123', NULL, 'Active'),
    ('MEM00007', 'Member', 'Emily Rodriguez', '0154321098', 'Female', 'emily@example.com', '123', NULL, 'Active'),
    ('MEM00008', 'Member', 'Emma Lee', '0143210987', 'Female', 'emma@example.com', '123', NULL, 'Active'),
    ('MEM00009', 'Member', 'Daniel Smith', '0187654321', 'Male', 'daniel@example.com', '123', NULL, 'Active');

-- Insert data for admins
INSERT INTO Users (UserID, Role, Name, ContactNumber, Gender, Email, Password, Image, Status)
VALUES 
    ('ADM001', 'Admin', 'Admin1', '1234567890', 'Male', 'admin1@example.com', '456', NULL, 'Active'),
    ('ADM002', 'Admin', 'ViNie Goh', '9876543210', 'Female', 'admin2@example.com', '456', NULL, 'Active');

INSERT INTO Organisations_Members (OMID, OrganisationRole, UserID, OrganisationID)
VALUES
('OMB00001', 'Owner', 'MEM00001', 'ORG00001'),
('OMB00002', 'Admin', 'MEM00001', 'ORG00001'),
('OMB00003', 'Member', 'MEM00001', 'ORG00001'),
('OMB00004', 'Pending', 'MEM00001', 'ORG00001'),
('OMB00005', 'Owner', 'MEM00001', 'ORG00002'),
('OMB00006', 'Pending', 'MEM00001', 'ORG00002'),
('OMB00007', 'Admin', 'MEM00001', 'ORG00001');

-- Check the inserted data
SELECT * FROM Users;
