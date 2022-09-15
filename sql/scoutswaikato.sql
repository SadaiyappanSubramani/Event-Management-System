-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2012 at 02:54 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scoutswaikato`
--

-- --------------------------------------------------------

/*DROP DATABASE IF EXISTS scoutswaikato;
CREATE DATABASE scoutswaikato;
*/

CREATE DATABASE scoutswaikato;

USE scoutswaikato;

--
-- Table structure for table `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `SecurityQuestionHint1` varchar(50) DEFAULT NULL,
  `SecurityQuestionHint2` varchar(50) DEFAULT NULL,
  `SecurityQuestionAnswer1` varchar(20) DEFAULT NULL,
  `SecurityQuestionAnswer2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`UserName`, `Password`, `FirstName`, `LastName`, `Email`, `SecurityQuestionHint1`, `SecurityQuestionHint2`, `SecurityQuestionAnswer1`, `SecurityQuestionAnswer2`) VALUES
('user1', 'password1', 'Kevin', 'Williams', 'kwills@yahoo.com', NULL, NULL, NULL, NULL),
('user2', 'password2', 'Peter', 'Carter', 'peter123@gmail.com', NULL, NULL, NULL, NULL),
('user3', 'password3', 'John', 'Dean', 'dean123@gmail.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE IF NOT EXISTS `emergencycontact` (
  `EmergencyContactID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `StreetAddress` varchar(50) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Landline` varchar(30) NOT NULL,
  `MobilePhone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`EmergencyContactID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `emergencycontact`
--

INSERT INTO `emergencycontact` (`EmergencyContactID`, `FirstName`, `LastName`, `StreetAddress`, `City`, `Landline`, `MobilePhone`) VALUES
(1, 'Ray', 'Terrence', '2 Vally Road', 'Huntly', '079834256', '0218787255'),
(2, 'Michelle', 'Zang', '76 Leeds Street', 'Matamata', '078794256', '0279787255'),
(3, 'Nigle', 'Bond', '12 Comris Avenue', 'Hamilton', '078560256', '0229723555'),

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontactrelationship`
--

CREATE TABLE IF NOT EXISTS `emergencycontactrelationship` (
  `Relationship` varchar(30) NOT NULL,
  `ScoutID` char(10) NOT NULL,
  `EmergencyContactID` int(11) NOT NULL,
  PRIMARY KEY (`ScoutID`,`EmergencyContactID`),
  KEY `fk_EmergencyContact_EmergencyContactRelationship` (`EmergencyContactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `EventName` varchar(50) DEFAULT NULL,
  `EventDate` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `DurationHours` int(11) DEFAULT NULL,
  `RegistrationDeadline` date DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `AgeRestrictionYears` int(11) DEFAULT NULL,
  `EventStatus` varchar(11) DEFAULT NULL,
  `Fees` double(6,2) DEFAULT NULL,
  `EquipmentURL` varchar(100) DEFAULT NULL,
  `GuidelineURL` varchar(100) DEFAULT NULL,
  `PhotoURL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `EventName`, `EventDate`, `StartTime`, `DurationHours`, `RegistrationDeadline`, `Description`, `Type`, `Location`, `AgeRestrictionYears`, `EventStatus`, `Fees`, `EquipmentURL`, `GuidelineURL`, `PhotoURL`) VALUES
(1, 'PioPio Adventure Camp', '2019-01-05', '09:00:00', 40, NULL, 'All event adventure camp', '2 Day Event', 'PioPio', 12, 'Open', 85.00, 'piopioequipment.pdf', 'piopioguideline.pdf', 'piopiophoto'),
(2, 'JOTA', '2019-02-12', '11:00:00', 4, NULL, 'Jamboree on the air', 'Day Event', 'Hamilton', 14, 'Open', 35.00, 'JOTAequipment.pdf', 'JOTAguideline.pdf', 'JOTAphoto'),
(3, 'Venture for Venturers', '2019-03-12', '09:00:00', 72, NULL, 'Greatbarrier Expedition', '3 Day Event', 'Greatbarrier Island', 18, 'Open', 450.00, 'Ventureequipment.pdf', 'ventureguideline.pdf', 'venturephoto'),

-- --------------------------------------------------------

--
-- Table structure for table `eventgroup`
--

CREATE TABLE IF NOT EXISTS `eventgroup` (
  `GroupName` varchar(30) NOT NULL,
  `ScoutID` char(10) NOT NULL,
  `EventID` int(11) NOT NULL,
  `IsGroupContact` enum('yes','no') DEFAULT NULL,
  PRIMARY KEY (`GroupName`,`EventID`,`ScoutID`),
  KEY `fk_Event_EventGroup` (`EventID`),
  KEY `fk_ScoutMember_EventGroup` (`ScoutID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventgroup`
--

INSERT INTO `eventgroup` (`GroupName`, `ScoutID`, `EventID`, `IsGroupContact`) VALUES
('Hamilton', '9133453289', 1, 'yes'),
('Taupo', '9126596789', 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `eventorganizer`
--

CREATE TABLE IF NOT EXISTS `eventorganizer` (
  `OrganizerID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  PRIMARY KEY (`OrganizerID`,`EventID`),
  KEY `fk_Event_EventOrganizer` (`EventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventorganizer`
--

INSERT INTO `eventorganizer` (`OrganizerID`, `EventID`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE IF NOT EXISTS `organizer` (
  `OrganizerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Landline` varchar(10) DEFAULT NULL,
  `MobilePhone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`OrganizerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`OrganizerID`, `FirstName`, `LastName`, `Email`, `Landline`, `MobilePhone`) VALUES
(1, 'John', 'Lovett', 'jlovett@gmail.com', '78356742', '0216542367'),
(2, 'Kevin', 'Cannell', 'kevin1234@yahoo.com', '72346742', '0276862367'),
(3, 'John', 'Lovett', 'jlovett@gmail.com', '78356742', '0216542367'),
(4, 'Kevin', 'Cannell', 'kevin1234@yahoo.com', '72346742', '0276862367');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `Role` char(10) DEFAULT NULL,
  `RegistrationStatus` char(10) DEFAULT NULL,
  `Medication` varchar(100) DEFAULT NULL,
  `Disability` varchar(100) DEFAULT NULL,
  `Allergies` varchar(100) DEFAULT NULL,
  `OtherInfo` varchar(100) DEFAULT NULL,
  `ScoutID` char(10) NOT NULL,
  `EventID` int(11) NOT NULL,
  PRIMARY KEY (`EventID`,`ScoutID`),
  KEY `fk_ScoutMember_Registration` (`ScoutID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Role`, `RegistrationStatus`, `Medication`, `Disability`, `Allergies`, `OtherInfo`, `ScoutID`, `EventID`) VALUES
('Leader', 'Pending', NULL, NULL, NULL, NULL, '9133453289', 1),
('Member', 'Pending', NULL, NULL, NULL, NULL, '9138756789', 1),
('Member', 'Pending', NULL, NULL, NULL, NULL, '9139596789', 1),
('Leader', 'Accepted', NULL, NULL, NULL, NULL, '9126596789', 2),
('Member', 'Pending', NULL, NULL, NULL, NULL, '9139596789', 2),
('Member', 'Pending', NULL, NULL, NULL, NULL, '9138756789', 3);

-- --------------------------------------------------------

--
-- Table structure for table `scoutemergencycontact`
--

CREATE TABLE IF NOT EXISTS `scoutemergencycontact` (
  `EmergencyContactID` int(11) NOT NULL,
  `ScoutID` char(10) NOT NULL,
  `EventID` int(11) NOT NULL,
  PRIMARY KEY (`EventID`,`ScoutID`,`EmergencyContactID`),
  KEY `fk_ScoutMember_ScoutEmergencyContact` (`ScoutID`),
  KEY `fk_EmergencyContact_ScoutEmergencyContact` (`EmergencyContactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoutemergencycontact`
--

INSERT INTO `scoutemergencycontact` (`EmergencyContactID`, `ScoutID`, `EventID`) VALUES
(1, '9133453289', 1),
(2, '9138756789', 1),
(2, '9138756789', 3),
(3, '9139596789', 1),
(3, '9139596789', 2),
(4, '9126596789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `scoutmember`
--

CREATE TABLE IF NOT EXISTS `scoutmember` (
  `ScoutID` char(10) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `StreetAddress` varchar(50) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Landline` varchar(10) DEFAULT NULL,
  `MobilePhone` varchar(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `ZoneName` varchar(20) NOT NULL,
  PRIMARY KEY (`ScoutID`),
  KEY `fk_Zone_ScoutMember` (`ZoneName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoutmember`
--

INSERT INTO `scoutmember` (`ScoutID`, `FirstName`, `LastName`, `StreetAddress`, `City`, `Email`, `Landline`, `MobilePhone`, `DOB`, `Gender`, `ZoneName`) VALUES
('9126596789', 'Tim', 'Rogers', '11 Horu Avenue', 'Taupo', 'rogerstim@hotmail.com', '076536176', '0216868765', '1985-06-14', 'Male', 'Taupo'),
('9128354789', 'Jane', 'Fonda', '125 Valey Street', 'Rotorua', 'fonda1234@gmail.com', '044536176', '0216934765', '1991-11-23', 'Female', 'Rotorua'),
('9133453289', 'Coolio', 'Terrence', '2 Vally Road', 'Huntly', 'terrency@yahoo.com', '079834256', '0218763245', '1991-01-12', 'Male', 'Huntly'),
('9133478789', 'Phil', 'Collans', '25 Victoria Street', 'Hamilton', 'phil543@gmail.com', '078634256', '0219893245', '1980-05-11', 'Male', 'Hamilton'),
('9138756789', 'Zing', 'Zang', '76 Leeds Street', 'Matamata', 'zingzang@yahoo.com', '078794256', '0279673245', '1988-03-19', 'Female', 'Matamata'),
('9139596789', 'James', 'Bond', '12 Comris Avenue', 'Hamilton', 'bond23@hotmail.com', '076534256', '0279868765', '1982-08-04', 'Male', 'Hamilton');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `ZoneName` varchar(30) NOT NULL,
  PRIMARY KEY (`ZoneName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`ZoneName`) VALUES
('Hamilton'),
('Huntly'),
('Matamata'),
('Opotiki'),
('Rotorua'),
('Taupo');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergencycontactrelationship`
--
ALTER TABLE `emergencycontactrelationship`
  ADD CONSTRAINT `fk_EmergencyContact_EmergencyContactRelationship` FOREIGN KEY (`EmergencyContactID`) REFERENCES `emergencycontact` (`EmergencyContactID`),
  ADD CONSTRAINT `fk_ScoutMember_EmergencyContactRelationship` FOREIGN KEY (`ScoutID`) REFERENCES `scoutmember` (`ScoutID`);

--
-- Constraints for table `eventgroup`
--
ALTER TABLE `eventgroup`
  ADD CONSTRAINT `fk_Event_EventGroup` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `fk_ScoutMember_EventGroup` FOREIGN KEY (`ScoutID`) REFERENCES `scoutmember` (`ScoutID`);

--
-- Constraints for table `eventorganizer`
--
ALTER TABLE `eventorganizer`
  ADD CONSTRAINT `fk_Event_EventOrganizer` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `fk_Organizer_EventOrganizer` FOREIGN KEY (`OrganizerID`) REFERENCES `organizer` (`OrganizerID`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `fk_Event_Registration` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `fk_ScoutMember_Registration` FOREIGN KEY (`ScoutID`) REFERENCES `scoutmember` (`ScoutID`);

--
-- Constraints for table `scoutemergencycontact`
--
ALTER TABLE `scoutemergencycontact`
  ADD CONSTRAINT `fk_Event_ScoutEmergencyContact` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `fk_ScoutMember_ScoutEmergencyContact` FOREIGN KEY (`ScoutID`) REFERENCES `scoutmember` (`ScoutID`),
  ADD CONSTRAINT `fk_EmergencyContact_ScoutEmergencyContact` FOREIGN KEY (`EmergencyContactID`) REFERENCES `emergencycontact` (`EmergencyContactID`);

--
-- Constraints for table `scoutmember`
--
ALTER TABLE `scoutmember`
  ADD CONSTRAINT `fk_Zone_ScoutMember` FOREIGN KEY (`ZoneName`) REFERENCES `zone` (`ZoneName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
