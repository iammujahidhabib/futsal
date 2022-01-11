-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 25, 2021 at 04:43 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ejots`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id_department` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id_department`, `department`, `created_at`) VALUES
(1, 'RBP', '2021-08-09 19:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id_discipline` int(11) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id_discipline`, `discipline`, `created_at`) VALUES
(1, 'Instrument', '2021-07-07 15:31:09'),
(2, 'Piping', '2021-07-07 15:31:09'),
(3, 'Penunjang Teknik', '2021-07-07 15:31:09'),
(4, 'Electrical', '2021-07-07 15:31:09'),
(5, 'Rendal & Manajemen Proyek', '2021-07-07 15:32:02'),
(6, 'Static', '2021-07-07 15:32:02'),
(7, 'Process', '2021-07-07 15:32:02'),
(8, 'Civil & Architecture', '2021-07-07 15:32:02'),
(9, 'Rotating', '2021-07-07 15:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `badge` varchar(255) NOT NULL,
  `discipline` varchar(255) DEFAULT NULL,
  `department` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1:Manager RBP,2:Superintendent RMP,3:Engineer Senior / Superintendent,4:Engineer / Staff ',
  `avatar` varchar(255) NOT NULL DEFAULT 'user.jpg',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1:aktif,2:banned',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id_employee`, `name`, `badge`, `discipline`, `department`, `username`, `email`, `password`, `role`, `avatar`, `status`, `created_at`) VALUES
(1, 'Manager RBP', 'manager', '', 1, 'manager', 'manager@brp.com', '1d0258c2440a8d19e716292b231e3190', 1, 'user.jpg', 1, '2021-07-08 10:59:47'),
(2, 'Oliver Sykes', 'bmth-01', '3', 1, 'oliver', 'oliver@gmail.com', 'acae273a5a5c88b46b36d65a25f5f435', 2, 'user.jpg', 1, '2021-07-08 11:11:02'),
(3, 'Jordan Fish', 'bmth-02111', '3', 1, 'jordan', 'jordan@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 3, 'user.jpg', 1, '2021-07-08 11:11:43'),
(4, 'Lee Malia', 'bmth-03', '3', 1, 'lee', 'lee@gmail.com', 'b0f8b49f22c718e9924f5b1165111a67', 4, 'user.jpg', 1, '2021-07-08 11:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_number` varchar(255) NOT NULL,
  `id_subordinated` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `job_title`, `job_number`, `id_subordinated`, `created_at`) VALUES
(1, 'Permohonan Evaluasi Alat Loading dari Truck ke Kapal', 'POK-0719-273', 2, '2021-07-05 17:19:52'),
(2, 'Test', 'Testing', 3, '2021-07-08 15:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `created_at`) VALUES
(1, 'Manager RBP', NULL),
(2, 'Superintendent RMP', NULL),
(3, 'Engineer Senior / Superintendent', NULL),
(4, 'Engineer / Staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subordinated`
--

CREATE TABLE `subordinated` (
  `id_subordinated` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `time_sheets`
--

CREATE TABLE `time_sheets` (
  `id_time_sheet` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` int(11) NOT NULL,
  `approve_date` date DEFAULT NULL,
  `approve_status` int(11) DEFAULT NULL,
  `detail_job` text NOT NULL,
  `subordinated` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_employee` int(11) NOT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_sheets`
--

INSERT INTO `time_sheets` (`id_time_sheet`, `id_job`, `date`, `hour`, `approve_date`, `approve_status`, `detail_job`, `subordinated`, `created_at`, `id_employee`, `approve_by`, `note`) VALUES
(1, 1, '2021-08-09', 7, '2021-08-09', 1, 'asdasdas', 'COORDINATOR', '2021-08-09 20:10:01', 2, 1, NULL),
(5, 1, '2021-08-08', 6, '2021-08-08', 1, 'asdasdas', 'COORDINATOR', '2021-08-09 20:10:01', 2, NULL, NULL),
(6, 2, '2021-08-08', 4, '2021-08-08', 1, 'zzxzxzx', 'MEMBER', '2021-08-09 20:10:01', 2, NULL, NULL),
(9, 2, '2021-08-09', 2, '2021-08-09', 1, 'asdasda 1231', 'MEMBER', '2021-08-09 21:09:31', 2, 1, NULL),
(10, 1, '2021-08-09', 9, '2021-08-09', 1, 'asdasdasd', 'MEMBER', '2021-08-09 21:54:30', 4, NULL, NULL),
(11, 1, '2021-07-06', 6, '2021-07-06', 1, 'asdasdas', 'COORDINATOR', '2021-08-09 20:10:01', 2, NULL, NULL),
(12, 1, '2021-08-25', 4, NULL, 2, 'asdas dasd asd asd as', 'MEMBER', '2021-08-25 21:30:49', 4, NULL, 'Mohon perjelas detail pekerjaannya.'),
(13, 2, '2021-08-25', 4, NULL, 2, 'asdasdasd', 'MEMBER', '2021-08-25 21:30:49', 4, NULL, 'Mohon perjelas detail pekerjaannya.'),
(14, 1, '2021-08-25', 3, NULL, NULL, 'asda asd asdas das da', 'coordinator', '2021-08-25 21:33:15', 2, NULL, NULL),
(15, 2, '2021-08-25', 3, NULL, NULL, 'asdasda sdas das dasd', 'COORDINATOR', '2021-08-25 21:37:26', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_employees`
-- (See below for the actual view)
--
CREATE TABLE `view_employees` (
`id_employee` int(11)
,`name` varchar(255)
,`badge` varchar(255)
,`discipline` varchar(255)
,`username` varchar(255)
,`email` varchar(255)
,`password` varchar(60)
,`role` int(11)
,`avatar` varchar(255)
,`status` int(11)
,`created_at` timestamp
,`discipline_name` varchar(255)
,`department` int(11)
,`department_name` varchar(255)
,`role_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_time_sheet_all`
-- (See below for the actual view)
--
CREATE TABLE `view_time_sheet_all` (
`id_time_sheet` int(11)
,`id_job` int(11)
,`date` date
,`hour` int(11)
,`note` text
,`approve_date` date
,`approve_status` int(11)
,`detail_job` text
,`subordinated` varchar(255)
,`created_at` datetime
,`id_employee` int(11)
,`approve_by` int(11)
,`job_title` varchar(255)
,`job_number` varchar(255)
,`department` int(11)
,`department_name` varchar(255)
,`discipline` varchar(255)
,`discipline_name` varchar(255)
,`employee_name` varchar(255)
,`badge` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_time_sheet_employees`
-- (See below for the actual view)
--
CREATE TABLE `view_time_sheet_employees` (
`id_time_sheet` int(11)
,`id_job` int(11)
,`date` date
,`hour` int(11)
,`note` text
,`approve_date` date
,`approve_status` int(11)
,`detail_job` text
,`subordinated` varchar(255)
,`created_at` datetime
,`id_employee` int(11)
,`approve_by` int(11)
,`job_title` varchar(255)
,`job_number` varchar(255)
,`discipline_name` varchar(255)
,`discipline_id` varchar(255)
,`badge` varchar(255)
,`employee_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_time_sheet_jobs`
-- (See below for the actual view)
--
CREATE TABLE `view_time_sheet_jobs` (
`id_time_sheet` int(11)
,`id_job` int(11)
,`date` date
,`hour` int(11)
,`note` text
,`approve_date` date
,`approve_status` int(11)
,`detail_job` text
,`subordinated` varchar(255)
,`created_at` datetime
,`id_employee` int(11)
,`approve_by` int(11)
,`job_title` varchar(255)
,`job_number` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_time_sheet_jobs_department`
-- (See below for the actual view)
--
CREATE TABLE `view_time_sheet_jobs_department` (
`id_time_sheet` int(11)
,`id_job` int(11)
,`date` date
,`hour` int(11)
,`note` text
,`approve_date` date
,`approve_status` int(11)
,`detail_job` text
,`subordinated` varchar(255)
,`created_at` datetime
,`id_employee` int(11)
,`approve_by` int(11)
,`job_title` varchar(255)
,`job_number` varchar(255)
,`department` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_time_sheet_jobs_discpiline`
-- (See below for the actual view)
--
CREATE TABLE `view_time_sheet_jobs_discpiline` (
`id_time_sheet` int(11)
,`id_job` int(11)
,`date` date
,`note` text
,`hour` int(11)
,`approve_date` date
,`approve_status` int(11)
,`detail_job` text
,`subordinated` varchar(255)
,`created_at` datetime
,`id_employee` int(11)
,`approve_by` int(11)
,`job_title` varchar(255)
,`job_number` varchar(255)
,`discipline` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_employees`
--
DROP TABLE IF EXISTS `view_employees`;

CREATE VIEW `view_employees`  AS SELECT `employees`.`id_employee` AS `id_employee`, `employees`.`name` AS `name`, `employees`.`badge` AS `badge`, `employees`.`discipline` AS `discipline`, `employees`.`username` AS `username`, `employees`.`email` AS `email`, `employees`.`password` AS `password`, `employees`.`role` AS `role`, `employees`.`avatar` AS `avatar`, `employees`.`status` AS `status`, `employees`.`created_at` AS `created_at`, `disciplines`.`discipline` AS `discipline_name`, `employees`.`department` AS `department`, `departments`.`department` AS `department_name`, `roles`.`role` AS `role_name` FROM (((`employees` left join `disciplines` on((`disciplines`.`id_discipline` = `employees`.`discipline`))) join `roles` on((`roles`.`id_role` = `employees`.`role`))) join `departments` on((`departments`.`id_department` = `employees`.`department`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_time_sheet_all`
--
DROP TABLE IF EXISTS `view_time_sheet_all`;

CREATE VIEW `view_time_sheet_all`  AS SELECT `time_sheets`.`id_time_sheet` AS `id_time_sheet`, `time_sheets`.`id_job` AS `id_job`, `time_sheets`.`date` AS `date`, `time_sheets`.`hour` AS `hour`, `time_sheets`.`note` AS `note`, `time_sheets`.`approve_date` AS `approve_date`, `time_sheets`.`approve_status` AS `approve_status`, `time_sheets`.`detail_job` AS `detail_job`, `time_sheets`.`subordinated` AS `subordinated`, `time_sheets`.`created_at` AS `created_at`, `time_sheets`.`id_employee` AS `id_employee`, `time_sheets`.`approve_by` AS `approve_by`, `jobs`.`job_title` AS `job_title`, `jobs`.`job_number` AS `job_number`, `view_employees`.`department` AS `department`, `view_employees`.`department_name` AS `department_name`, `view_employees`.`discipline` AS `discipline`, `view_employees`.`discipline_name` AS `discipline_name`, `view_employees`.`name` AS `employee_name`, `view_employees`.`badge` AS `badge` FROM ((`time_sheets` join `jobs` on((`jobs`.`id_job` = `time_sheets`.`id_job`))) join `view_employees` on((`view_employees`.`id_employee` = `time_sheets`.`id_employee`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_time_sheet_employees`
--
DROP TABLE IF EXISTS `view_time_sheet_employees`;

CREATE VIEW `view_time_sheet_employees`  AS SELECT `time_sheets`.`id_time_sheet` AS `id_time_sheet`, `time_sheets`.`id_job` AS `id_job`, `time_sheets`.`date` AS `date`, `time_sheets`.`hour` AS `hour`, `time_sheets`.`note` AS `note`, `time_sheets`.`approve_date` AS `approve_date`, `time_sheets`.`approve_status` AS `approve_status`, `time_sheets`.`detail_job` AS `detail_job`, `time_sheets`.`subordinated` AS `subordinated`, `time_sheets`.`created_at` AS `created_at`, `time_sheets`.`id_employee` AS `id_employee`, `time_sheets`.`approve_by` AS `approve_by`, `jobs`.`job_title` AS `job_title`, `jobs`.`job_number` AS `job_number`, `view_employees`.`discipline_name` AS `discipline_name`, `view_employees`.`discipline` AS `discipline_id`, `view_employees`.`badge` AS `badge`, `view_employees`.`name` AS `employee_name` FROM ((`time_sheets` join `jobs` on((`jobs`.`id_job` = `time_sheets`.`id_job`))) join `view_employees` on((`view_employees`.`id_employee` = `time_sheets`.`id_employee`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_time_sheet_jobs`
--
DROP TABLE IF EXISTS `view_time_sheet_jobs`;

CREATE VIEW `view_time_sheet_jobs`  AS SELECT `time_sheets`.`id_time_sheet` AS `id_time_sheet`, `time_sheets`.`id_job` AS `id_job`, `time_sheets`.`date` AS `date`, `time_sheets`.`hour` AS `hour`, `time_sheets`.`note` AS `note`, `time_sheets`.`approve_date` AS `approve_date`, `time_sheets`.`approve_status` AS `approve_status`, `time_sheets`.`detail_job` AS `detail_job`, `time_sheets`.`subordinated` AS `subordinated`, `time_sheets`.`created_at` AS `created_at`, `time_sheets`.`id_employee` AS `id_employee`, `time_sheets`.`approve_by` AS `approve_by`, `jobs`.`job_title` AS `job_title`, `jobs`.`job_number` AS `job_number` FROM (`time_sheets` join `jobs` on((`jobs`.`id_job` = `time_sheets`.`id_job`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_time_sheet_jobs_department`
--
DROP TABLE IF EXISTS `view_time_sheet_jobs_department`;

CREATE VIEW `view_time_sheet_jobs_department`  AS SELECT `time_sheets`.`id_time_sheet` AS `id_time_sheet`, `time_sheets`.`id_job` AS `id_job`, `time_sheets`.`date` AS `date`, `time_sheets`.`hour` AS `hour`, `time_sheets`.`note` AS `note`, `time_sheets`.`approve_date` AS `approve_date`, `time_sheets`.`approve_status` AS `approve_status`, `time_sheets`.`detail_job` AS `detail_job`, `time_sheets`.`subordinated` AS `subordinated`, `time_sheets`.`created_at` AS `created_at`, `time_sheets`.`id_employee` AS `id_employee`, `time_sheets`.`approve_by` AS `approve_by`, `jobs`.`job_title` AS `job_title`, `jobs`.`job_number` AS `job_number`, `employees`.`department` AS `department` FROM ((`time_sheets` join `jobs` on((`jobs`.`id_job` = `time_sheets`.`id_job`))) join `employees` on((`employees`.`id_employee` = `time_sheets`.`id_employee`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_time_sheet_jobs_discpiline`
--
DROP TABLE IF EXISTS `view_time_sheet_jobs_discpiline`;

CREATE VIEW `view_time_sheet_jobs_discpiline`  AS SELECT `time_sheets`.`id_time_sheet` AS `id_time_sheet`, `time_sheets`.`id_job` AS `id_job`, `time_sheets`.`date` AS `date`, `time_sheets`.`note` AS `note`, `time_sheets`.`hour` AS `hour`, `time_sheets`.`approve_date` AS `approve_date`, `time_sheets`.`approve_status` AS `approve_status`, `time_sheets`.`detail_job` AS `detail_job`, `time_sheets`.`subordinated` AS `subordinated`, `time_sheets`.`created_at` AS `created_at`, `time_sheets`.`id_employee` AS `id_employee`, `time_sheets`.`approve_by` AS `approve_by`, `jobs`.`job_title` AS `job_title`, `jobs`.`job_number` AS `job_number`, `employees`.`discipline` AS `discipline` FROM ((`time_sheets` join `jobs` on((`jobs`.`id_job` = `time_sheets`.`id_job`))) join `employees` on((`employees`.`id_employee` = `time_sheets`.`id_employee`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id_discipline`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `tidak bole sama` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `subordinated`
--
ALTER TABLE `subordinated`
  ADD PRIMARY KEY (`id_subordinated`);

--
-- Indexes for table `time_sheets`
--
ALTER TABLE `time_sheets`
  ADD PRIMARY KEY (`id_time_sheet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id_discipline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subordinated`
--
ALTER TABLE `subordinated`
  MODIFY `id_subordinated` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_sheets`
--
ALTER TABLE `time_sheets`
  MODIFY `id_time_sheet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
