DROP DATABASE IF EXISTS georgealleyne;
CREATE DATABASE georgealleyne;
USE georgealleyne;

-- Database: `georgealleyne`
-- Table structure for table `Applicants`
DROP TABLE IF EXISTS `Applicants`;
CREATE TABLE `Applicants` (
  `ApplicationID` int(11) NOT NULL auto_increment,
  `Status` varchar(15) NOT NULL default ' ',
  `First Name` varchar(50) NOT NULL default ' ',
  `Last Name` varchar(50) NOT NULL default ' ',
  `Middle Initial` varchar(10) NOT NULL default ' ',
  `DOB` date DEFAULT NULL,
  `Nationality` varchar(75) NOT NULL default ' ',
  `Gender` varchar(10) NOT NULL default ' ',
  `Marital Status` varchar(20) NOT NULL default ' ',
  `Family Type` varchar(50) NOT NULL default ' ',
  `Home Address` varchar(100) NOT NULL default ' ',
  `Mailing Address` varchar(100) NOT NULL default ' ',
  `Email Address` varchar(75) NOT NULL default ' ',
  `ID Number` varchar(15) NOT NULL default ' ',
  `Contact Name` varchar(50) NOT NULL default ' ',
  `Contact Relationship` varchar(50) NOT NULL default ' ',
  `Contact Telephone` varchar(15) NOT NULL default ' ',
  `Contact Address` varchar(100) NOT NULL default ' ',
  `Contact Email` varchar(75) NOT NULL default ' ',
  `Level of Study` varchar(25) NOT NULL default ' ',
  `Year of Study` varchar(15) NOT NULL default ' ',
  `Programme Name` varchar(50) NOT NULL default ' ',
  `Faculty Name` varchar(75) NOT NULL default ' ',
  `Name of School` varchar(75) NOT NULL default ' ',
  `Room Type` varchar(15) NOT NULL default ' ',
  `Roommate Preference` varchar(30) NOT NULL default ' ',
PRIMARY KEY (`ApplicationID`)
);

-- Table structure for table `Notices`
DROP TABLE IF EXISTS `Notices`;
CREATE TABLE `Notices` (
  `id` int(11) NOT NULL auto_increment,
  `author` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `title` varchar(100) NOT NULL default ' ',
  `date` date NULL,
  `time` varchar(100) NOT NULL default ' ',
  `location` varchar(100) NOT NULL default ' ',
  `description` varchar(4000) NOT NULL default ' ',
PRIMARY KEY (`id`)
);

-- Table structure for table `Residents`
CREATE TABLE `Residents` (
  `First Name` varchar(50) NOT NULL default ' ',
  `Last Name` varchar(50) NOT NULL default ' ',
  `Middle Initial` varchar(10) NOT NULL default ' ',
  `Resident ID` int(11) NOT NULL auto_increment,
  `Position` varchar(50) NOT NULL default 'Resident',
  `DOB` date DEFAULT NULL,
  `Nationality` varchar(75) NOT NULL default ' ',
  `Gender` varchar(10) NOT NULL default ' ',
  `Marital Status` varchar(20) NOT NULL default ' ',
  `Family Type` varchar(50) NOT NULL default ' ',
  `Home Address` varchar(100) NOT NULL default ' ',
  `Mailing Address` varchar(100) NOT NULL default ' ',
  `Email Address` varchar(75) NOT NULL default ' ',
  `Phone Number` varchar(15) default ' ',
  `ID Number` int(11) NOT NULL,
  `Contact Name` varchar(50) NOT NULL default ' ',
  `Contact Relationship` varchar(50) NOT NULL default ' ',
  `Contact Telephone` varchar(15) NOT NULL default ' ',
  `Contact Address` varchar(100) NOT NULL default ' ',
  `Contact Email` varchar(75) NOT NULL default ' ',
  `Level of Study` varchar(25) NOT NULL default ' ',
  `Year of Study` varchar(15) NOT NULL default ' ',
  `Programme Name` varchar(50) NOT NULL default ' ',
  `Faculty Name` varchar(75) NOT NULL default ' ',
  `Name of School` varchar(75) NOT NULL default ' ',
  `Room Number` varchar(10) default ' ',
PRIMARY KEY (`Resident ID`)
);

-- Table structure for table `Rooms`
CREATE TABLE `Rooms` (
  `Room Number` varchar(10) NOT NULL default ' ',
  `Room Type` varchar(15) NOT NULL default ' ',
  `Block` varchar(15) NOT NULL default ' ',
  `Availability Status` varchar(15) NOT NULL default ' ',
  `Resident ID #1` varchar(4) NOT NULL default ' ',
  `Resident ID #2` varchar(4) NOT NULL default ' ',
PRIMARY KEY (`Room Number`) 
);

-- Table structure for table `Users`
CREATE TABLE `Users` (
  `ID` int(11) NOT NULL auto_increment,
  `Username` varchar(10) NOT NULL default ' ',
  `Password` varchar(255) NOT NULL default ' ',
PRIMARY KEY (`ID`)
);




-- Dumping data for table `Applicants`
INSERT INTO `Applicants` (`ApplicationID`, `Status`, `First Name`, `Last Name`, `Middle Initial`, `DOB`, `Nationality`, `Gender`, `Marital Status`, `Family Type`, `Home Address`, `Mailing Address`, `Email Address`, `ID Number`, `Contact Name`, `Contact Relationship`, `Contact Telephone`, `Contact Address`, `Contact Email`, `Level of Study`, `Year of Study`, `Programme Name`, `Faculty Name`, `Name of School`, `Room Type`, `Roommate Preference`) VALUES
(1, 'Accepted', 'Mark', 'Fray', 'G.', '2002-11-05', 'Jamaican', 'Female', 'Married', 'Single', 'Office 4 94c Old Hope Rd Kingston 6\r\nKingston\r\nJamaica', 'Office 4 94c Old Hope Rd Kingston 6\r\nKingston\r\nJamaica', 'mark.fray@email.com', '333333', 'Kimberly Laughton', 'Mother', '1111111', 'Office 4 94c Old Hope Rd Kingston 6\r\nKingston\r\nJamaica', 'kimberlyclaughton@gmail.com', 'Undergraduate', '2', 'BSc Computer Science', 'Science and Technology', 'University of the West Indies', 'Single', 'Nicholas'),
(2, 'Pending', 'Calvin', 'Brooks', 'F.', '2013-09-18', 'Japanese', 'Female', 'Single', 'Extended', 'Shop 3 40 Cassia Pk Rd Kingston 10\r\nKingston\r\nJamaica', 'Shop 3 40 Cassia Pk Rd Kingston 10\r\nKingston\r\nJamaica', 'cstephenson882@gmail.com', '494949', 'Kareem Ellis', 'Brother', '18791220987', 'Shop 3 40 Cassia Pk Rd Kingston 10\r\nKingston\r\nJamaica', 'kareemellis55@gmail.com', 'Graduate', '1', 'BSc Software Engineering', 'Science and Technology', 'University of Technology', 'Double', 'Ricardo'),
(3, 'Pending', 'Booby', 'Bob', 'B.', '2022-11-01', 'African', 'Male', 'Married', 'Single', '123 Street\r\nMiddle of Nowhere\r\nAfrica', '123 Street\r\nMiddle of Nowhere\r\nAfrica', '123 Street\r\nMiddle of Nowhere\r\nAfrica', '010101', 'Bobbette Bob', 'Sister', '18763334444', '123 Street\r\nMiddle of Nowhere\r\nAfrica', 'bobbette@gmail.com', 'Undergraduate', '3', 'BSc Chemistry', 'Science and Technology', 'University of the West Indies', 'Single', 'Bobby'),
(4, 'Pending', 'Naruto', 'Uzumaki', 'N.', '2022-11-01', 'African', 'Male', 'Married', 'Single', '123 Street\r\nMiddle of Nowhere\r\nAfrica', '123 Street\r\nMiddle of Nowhere\r\nAfrica', '123 Street\r\nMiddle of Nowhere\r\nAfrica', '020202', 'Bobbette Bob', 'Sister', '18763335555', '123 Street\r\nMiddle of Nowhere\r\nAfrica', 'bobbette@gmail.com', 'Undergraduate', '3', 'BSc Chemistry', 'Science and Technology', 'University of the West Indies', 'Single', 'Bobby'),
(7, 'Rejected', 'Dora', 'Explorer', 'T. H. E.', '2023-02-06', 'Indian', 'Female', 'Single', 'Extended', 'Dora\'s House,\r\nPeruvian Jungle', 'Dora\'s House,\r\nPeruvian Jungle', 'doratheexplorer@hotmail.com', '125775753', 'The Map', '', '12342223333', 'Dora\'s Backpack', 'themap@hotmail.com', 'Undergraduate', '1', 'Exploring', 'Science and Technology', 'Jungle school', 'Double', 'Swiper'),
(8, 'Pending', 'John', 'Doe', 'P.', '2008-11-04', 'American', 'Male', 'Single', 'Nuclear', '123 Main Street, \r\nAnytown, \r\nUSA', '123 Main Street, \r\nAnytown, \r\nUSA', 'john.doe@email.com', '987321654', 'Mary Doe', 'Wife', '555-1234', '123 Main Street\r\nAnytown\r\nUSA', 'mary@google.com', 'Undergraduate', '3', 'Business Administration', 'Business', 'University of Anytown', 'Double', 'Marcus Bob'),
(16, 'Pending', 'Sarah', 'Jones', 'L.', '1993-06-17', 'British', 'Female', 'Divorced', 'Single-parent', 'Somewhere', 'Somewhere', 'sarah.jones@email.com', '313513566', 'David Brown', 'Husband', '1356636135', 'Somewhere', 'david.brown@email.com', 'Undergraduate', '-1', 'History', 'Arts and Humanities', 'University of Anytown', 'Single', ''),
(17, 'Pending', 'Kareem', 'Ellis', 'K.', '2023-02-07', 'British', 'Male', 'Single', 'Nuclear', 'asgasg', 'asgasg', 'kareemellis55@gmail.com', '12412523676', 'Briney', 'AadfawGFSAG', '1251255', 'LOT 297 DELA-VEGA CITY\r\n4TH SPANISH WAY', 'britney@google.com', 'Undergraduate', '0', 'Business Administration', 'Business', 'University of Anytown', 'Double', 'Roach'),
(18, 'Pending', 'David', 'Kim', 'P.', '1970-06-25', 'Korean', 'Male', 'Married', 'Nuclear', '789 Oak St.,\r\nAnytown,\r\nUSA', '789 Oak St.,\r\nAnytown,\r\nUSA', 'david.kim@email.com', '8901234567', 'Sarah Lee', 'Spouse', '555-8901', '789 Oak St.,\r\nAnytown,\r\nUSA', 'saral.lee@email.com', 'Undergraduate', '1', 'Marketing', 'Business', 'University of Anytown', 'Single', ''),
(22, 'Pending', 'Jessica', 'Nguyen', 'N.', '2000-12-25', 'Vietnamese', 'Female', 'Single', 'Nuclear', '456 Maple St.,\r\nAnytown,\r\nUSA', '456 Maple St.,\r\nAnytown,\r\nUSA', 'jessica.nguyen@email.com', '7890123456', 'Tom Nguyen', 'Brother', '555-7890', '456 Maple St.,\r\nAnytown,\r\nUSA', 'tom.nguyen@email.com', 'Undergraduate', '4', 'Chemistry', 'Natural Sciences', 'University of Anytown', 'Double', 'Ashley Bob'),
(24, 'Pending', 'Rachel', 'Patel', 'S.', '1987-02-25', 'Indian', 'Female', 'Single', 'Nuclear', '321 Maple St.,\r\nAnytown,\r\nUSA', '321 Maple St.,\r\nAnytown,\r\nUSA', 'rachel.patel@email.com', '9012345678', 'Michael Singh', 'Father', '555-9012', '321 Maple St.,\r\nAnytown,\r\nUSA', 'michael.singh@email.com', 'Undergraduate', '3', 'History', 'Arts and Humanities', 'University of Anytown', 'Double', 'Emily Chen'),
(28, 'Pending', 'Maria', 'Rodriguez', 'L.', '2002-08-21', 'Mexican', 'Female', 'Single', 'Single-parent', '789 Elm St,\r\nAnytown,\r\nUSA', '789 Elm St,\r\nAnytown,\r\nUSA', 'maria.rodriguez@email.com', '246813579', 'Juan Rodriguez', 'Father', '555-555-5555', '789 Elm St,\r\nAnytown,\r\nUSA', 'juan.rodriguez@email.com', 'Graduate', '1', 'Psychology', 'Social Sciences', 'University of Anytown', 'Single', ''),
(29, 'Pending', 'Emily', 'Johnson', 'A.', '1998-05-05', 'American', 'Female', 'Single', 'Single-parent', '1234 Elm St,\r\nAnytown,\r\nUSA', '1234 Elm St,\r\nAnytown,\r\nUSA', 'emily.johnson@email.com', '086055907', 'Sarah Johnson', 'Sister', '555-123-4567', '1234 Elm St,\r\nAnytown,\r\nUSA', 'sarah.johnson@email.com', 'Undergraduate', '1', 'Business Administration', 'Business', 'University of Anytown', 'Single', ''),
(30, 'Pending', 'Maria', 'Garcia', 'D.', '2004-07-22', 'Mexican', 'Female', 'Single', 'Extended', '3456 Main St,\r\nMexico City,\r\nMexico', '3456 Main St,\r\nMexico City,\r\nMexico', 'maria.garcia@email.com', '456789012', 'Juan Garcia', 'Father', '555-345-6789', '3456 Main St,\r\nMexico City,\r\nMexico', 'juan.garcia@email.com', 'Undergraduate', '2', 'Education', 'Humanities', 'Mexico City University', 'Single', '');

-- --------------------------------------------------------

-- Dumping data for table `Residents`
INSERT INTO `Residents` (`First Name`, `Last Name`, `Middle Initial`, `Resident ID`, `Position`, `DOB`, `Nationality`, `Gender`, `Marital Status`, `Family Type`, `Home Address`, `Mailing Address`, `Email Address`, `Phone Number`, `ID Number`, `Contact Name`, `Contact Relationship`, `Contact Telephone`, `Contact Address`, `Contact Email`, `Level of Study`, `Year of Study`, `Programme Name`, `Faculty Name`, `Name of School`, `Room Number`) VALUES
('Alexia2', 'Brooks', 'B.', 1, 'Standard Resident', '2022-11-16', 'Jamaican', 'Female', 'Single', 'Nuclear', 'somewhere', 'somewhere', 'AlexiaB@yahoo.com', '18764357890', 245677088, 'someone', 'Sister', 768905462, 'somewhere', 'someone@yahoo.com', 'Graduate', 'First Year', 'something', 'sci tech', 'uwi', 'L-001'),
('Kimberly', 'Laughton', 'C.', 2, 'Block Representative', '2002-10-23', 'German', 'Female', 'Married', 'Single', 'Somewhere\r\nSomewhere else\r\nSomewhere again', 'Somewhere\r\nSomewhere else\r\nSomewhere again', 'email@aafaffsafs.com', '18765549981', 215125125, 'Mary', 'Father', 1876000022, 'Somewhere\r\nSomewhere else\r\nSomewhere again', 'asasfasf@agawsgag.com', 'Undergraduate', '2', 'Medicine', 'Science and Technology', 'University of the West Indies', 'G-001'),
('Leon', 'Fray', 'C.', 3, 'Resident Advisor', '1993-03-03', 'Trinidadian', 'Male', 'Divorced', 'Nuclear', 'somewhere', 'somewhere', 'LeonCF@yahoo.com', '18765568907', 6754839, 'someone', 'brother', 876564790, 'somewhere', 'someone@yahoo.com', 'Undergraduate', 'second year', 'Computer Science', 'Sci Tech', 'Uwi', 'L-001'),
('Khayla', 'Malcolm', 'P.', 5, 'Resident Advisor', '2013-03-04', 'Jamaican', 'Female', 'Single', 'Nuclear', 'Somewhere', 'Somewhere', 'khayla.malcolm@email.com', '1254673245', 96759364, 'Karen Malcolm', 'Mother', 135136366, 'Somewhere', 'Somewhere', 'Undergraduate', '1', 'Chemistry', 'Science and Technology', 'University of Mexico', 'P-003'),
('Ash', 'Ketchum', 'P.', 6, 'Resident', '1999-03-10', 'Kanton', 'Male', 'Single', 'Single-parent', 'Pallet Town', 'Pallet Town', 'ash.ketchum@email.com', '957504733', 95476130, 'Pikachu', 'Pokemon', 1111, 'Ash\'s pokeball', 'pikachu@email.com', 'Undergraduate', '10', 'Pokemonology', 'Pokemon League', 'Pallet University', 'P-003');

-- --------------------------------------------------------
-- Dumping data for table `Rooms`
INSERT INTO `Rooms` (`Room Number`, `Room Type`, `Block`, `Availability Status`, `Resident ID #1`, `Resident ID #2`) VALUES
('G-001', 'Single', 'Genus', 'Occupied', '1', '2'),
('G-002', 'Double', 'Genus', 'Available', '', ''),
('G-003', 'Double', 'Genus', 'Available', '', ''),
('G-004', 'Double', 'Genus', 'Available', '', ''),
('G-005', 'Double', 'Genus', 'Available', '', ''),
('G-006', 'Double', 'Genus', 'Available', '', ''),
('G-007', 'Double', 'Genus', 'Available', '', ''),
('G-008', 'Double', 'Genus', 'Available', '', ''),
('G-009', 'Double', 'Genus', 'Available', '', ''),
('G-010', 'Double', 'Genus', 'Available', '', ''),
('L-001', 'Single', 'Lynx', 'Available', '', ''),
('L-002', 'Double', 'Lynx', 'Available', '', ''),
('L-003', 'Single', 'Lynx', 'Available', '', ''),
('L-004', 'Double', 'Lynx', 'Available', '', ''),
('L-005', 'Double', 'Lynx', 'Available', '', ''),
('L-006', 'Double', 'Lynx', 'Available', '', ''),
('L-007', 'Double', 'Lynx', 'Available', '', ''),
('L-008', 'Double', 'Lynx', 'Available', '', ''),
('L-009', 'Double', 'Lynx', 'Available', '', ''),
('L-010', 'Double', 'Lynx', 'Available', '', ''),
('P-001', 'Single', 'Pardus', 'Available', '', ''),
('P-002', 'Double', 'Pardus', 'Available', '', ''),
('P-003', 'Single', 'Pardus', 'Available', '', ''),
('P-004', 'Double', 'Pardus', 'Available', '', ''),
('P-005', 'Double', 'Pardus', 'Available', '', ''),
('P-006', 'Double', 'Pardus', 'Available', '', ''),
('P-007', 'Double', 'Pardus', 'Available', '', ''),
('P-008', 'Double', 'Pardus', 'Available', '', ''),
('P-009', 'Double', 'Pardus', 'Available', '', ''),
('P-010', 'Double', 'Pardus', 'Available', '', '');


-- --------------------------------------------------------
-- Dumping data for table `Users`
INSERT INTO `Users` (`ID`, `Username`, `Password`) VALUES
(2, 'kimberly', '123'),
(3, 'leon', '123'),
(1, 'Alexia', '123'),
(5, 'khayla', '$2y$10$9apzwWjaDTPV3b94jDotDek.iMfIXWsaQW88ZgwiEoP.fXrZXrOE.'),
(6, 'ash', '$2y$10$DQI3izOpeDur8tJmhl8dg.fAza..RmNT5uIj.VqJA4vxyWf51rMsG');


-- ALTER TABLE `Applicants`
--   ADD PRIMARY KEY (`ApplicationID`);


-- ALTER TABLE `Notices`
--   ADD PRIMARY KEY (`id`);


-- ALTER TABLE `Residents`
--   ADD PRIMARY KEY (`Resident ID`);


-- ALTER TABLE `Applicants`
--   MODIFY `ApplicationID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;


-- ALTER TABLE `Notices`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


-- ALTER TABLE `Residents`
--   MODIFY `Resident ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
-- COMMIT;

