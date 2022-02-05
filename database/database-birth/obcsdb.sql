

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Test', 'admin', 8979555556, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-02-13 12:05:09');



CREATE TABLE `tblapplication` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) NOT NULL,
  `ApplicationID` varchar(200) DEFAULT NULL,
  `DateofBirth` varchar(200) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PlaceofBirth` varchar(200) DEFAULT NULL,
  `NameofFather` varchar(200) DEFAULT NULL,
  `PermanentAdd` mediumtext DEFAULT NULL,
  `PostalAdd` mediumtext DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Dateofapply` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO `tblapplication` (`ID`, `UserID`, `ApplicationID`, `DateofBirth`, `Gender`, `FullName`, `PlaceofBirth`, `NameofFather`, `PermanentAdd`, `PostalAdd`, `MobileNumber`, `Email`, `Dateofapply`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 1, '905226110', '2019-05-09', 'Female', 'Shravani', 'New Delhi', 'Mr. Tushar Singh', 'I-989, 9 floor Gaur Apartment Noida', 'I-989, 9 floor Gaur Apartment Noida', 7878878787, 'tushar@gmail.com', '2020-02-12 11:45:12', 'Your Application Has been Verified', 'Verified', '2020-02-13 14:35:50'),
(2, 2, '294108345', '2018-05-01', 'Male', 'Parth', 'Luckmow', 'Mr. Tushar Singh', 'I-989, 9 floor Gaur Apartment Noida', 'I-989, 9 floor Gaur Apartment Noida', 7878878787, 'tushar@gmail.com', '2020-02-13 06:06:45', 'Rejected due to incomplete information', 'Rejected', '2020-02-13 14:37:15'),
(3, 2, '555131983', '2020-02-07', 'Male', 'Tarun', 'Merrut', 'R.K Sukla', 'hgtyfrytrftfry', 'tyfyhgyhjgukygkg', 5465644545, 'p@gmail.com', '2020-02-14 12:31:37', NULL, NULL, NULL),
(4, 4, '868843519', '2019-11-09', 'Female', 'Abc', 'Max hospital New Delhi', 'XYZ', 'Mayur Vihar New Delhi', 'Mayur Vihar New Delhi', 9632123698, 'test@gmail.com', '2020-02-20 17:24:53', 'Record verified', 'Verified', '2020-02-20 17:26:10');





CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Address`, `Password`, `RegDate`) VALUES
(1, 'Himanshu', 'MIshra', 7987897897, 'J&K Block Laxmi Nagar New Delhi', '202cb962ac59075b964b07152d234b70', '2020-02-11 11:26:29'),
(2, 'Meera', 'Jain', 8797977797, 'U-890 VVIP Ghazibad', '202cb962ac59075b964b07152d234b70', '2020-02-11 11:27:35'),
(3, 'Kunal', 'Kumar', 9754774987, 'K-123, Nangloi New Delhi', '202cb962ac59075b964b07152d234b70', '2020-02-19 16:49:03'),
(4, 'Anuj', 'Kumar', 9632123698, 'New Delhi India 110001', '5c428d8875d2948607f3e3fe134d71b4', '2020-02-20 17:23:05');




ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `tblapplication`
  ADD PRIMARY KEY (`ID`);



ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);



ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;




ALTER TABLE `tblapplication`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


