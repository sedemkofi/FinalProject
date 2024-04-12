
--
-- Database: `musiccollab`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaborations`
--
Drop Database If Exists MusicCollab;
Create database MusicCollab;
Use MusicCollab;

CREATE TABLE `collaborations` (
  `CollaborationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `MusicFileID` int(11) DEFAULT NULL,
  `CollaborationDate` datetime DEFAULT NULL,
  `Feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `CollaborationID` int(11) DEFAULT NULL,
  `CollaboratorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `FollowerID` int(11) NOT NULL,
  `FollowerUserID` int(11) DEFAULT NULL,
  `FollowingUserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `musicfiles`
--

CREATE TABLE `musicfiles` (
  `MusicFileID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Artiste` varchar(100) DEFAULT NULL,
  `FileName` varchar(100) DEFAULT NULL,
  `FilePath` varchar(200) DEFAULT NULL,
  `FileType` varchar(10) DEFAULT NULL,
  `UploadDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musicfiles`
--



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ArtistName` varchar(100) DEFAULT NULL,
  `Bio` varchar(300) DEFAULT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `HeaderPath` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `ArtistName`, `Bio`, `RoleID`, `HeaderPath`) VALUES
(1, 'admin', '', 'admin@musiccollab.com', '$2y$10$xec566g4tOrTbblhc/mLXucWTaUOSvBykjHQUGaA0yBajk6Lv4tVe', 'admin', NULL, 1, NULL),
(2, 'Sedem', 'Kofi', 'sedem.amediku@ashesi.edu.gh', '$2y$10$wODA1NgyNMifDS3yIIPcFu1QXwYQrnIFrRAKRra9AoX0PKjgh.hL6', 'saintkofi', NULL, 3, '../images/default-header.png');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`RoleID`, `RoleName`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`CollaborationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `MusicFileID` (`MusicFileID`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD KEY `CollaborationID` (`CollaborationID`),
  ADD KEY `CollaboratorID` (`CollaboratorID`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`FollowerID`),
  ADD KEY `FollowerUserID` (`FollowerUserID`),
  ADD KEY `FollowingUserID` (`FollowingUserID`);

--
-- Indexes for table `musicfiles`
--
ALTER TABLE `musicfiles`
  ADD PRIMARY KEY (`MusicFileID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collaborations`
--
ALTER TABLE `collaborations`
  MODIFY `CollaborationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `FollowerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `musicfiles`
--
ALTER TABLE `musicfiles`
  MODIFY `MusicFileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD CONSTRAINT `collaborations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `collaborations_ibfk_2` FOREIGN KEY (`MusicFileID`) REFERENCES `musicfiles` (`MusicFileID`);

--
-- Constraints for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD CONSTRAINT `collaborators_ibfk_1` FOREIGN KEY (`CollaborationID`) REFERENCES `collaborations` (`CollaborationID`),
  ADD CONSTRAINT `collaborators_ibfk_2` FOREIGN KEY (`CollaboratorID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`FollowerUserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`FollowingUserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `musicfiles`
--
ALTER TABLE `musicfiles`
  ADD CONSTRAINT `musicfiles_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `userrole` (`RoleID`);

