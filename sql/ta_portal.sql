-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 10:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_obs_fos`
--

CREATE TABLE `lib_obs_fos` (
  `obs_fos_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `obs_fos_name` varchar(163) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lib_obs_fos`
--

INSERT INTO `lib_obs_fos` (`obs_fos_id`, `office_id`, `obs_fos_name`) VALUES
(1, 1, 'Administrative Service (AS)'),
(2, 1, 'Agency Operations Service (AOS)'),
(3, 1, 'Bangsamoro Umpungan sa Nutrisyon (BangUn) Program'),
(4, 1, 'Beneficiary FIRST (BFIRST) Project Management Unit'),
(5, 1, 'Digital Media Service (DMS)'),
(6, 1, 'Disaster Response Management Bureau (DRMB)'),
(7, 1, 'Enhanced Partnership Against Hunger and Poverty National Program Management Office (EPAHP NPMO)'),
(8, 1, 'Financial Management Service (FMS)'),
(9, 1, 'Human Resource Management and Development Service (HRMDS)'),
(10, 1, 'Information and Communication Technology Management Service (ICTMS)'),
(11, 1, 'Internal Audit Service (IAS)'),
(12, 1, 'Kapit-Bisig Laban sa Kahirapan-Comprehensive and Integrated Delivery of Social Services (KALAHI-CIDSS)-NPMO'),
(13, 1, 'Legal Service (LS)'),
(14, 1, 'National Household Targeting Office (NHTO)'),
(15, 1, 'National Household Targeting System and Pantawid Pamilyang Pilipino Program (NHTS-4Ps)'),
(16, 1, 'National Resource and Logistics Management Bureau (NRLMB)'),
(17, 1, 'OAS for Community Engagement'),
(18, 1, 'OAS for e-Governance and Information and Technology (IT) Concerns'),
(19, 1, 'OAS for External Assistance and Development'),
(20, 1, 'OAS for Inclusive-Sustainable Peace and Special Concerns'),
(21, 1, 'OAS for Innovations'),
(22, 1, 'OAS for International Affairs, and Attached and Supervised Agencies (ASAs) under the Office of the Secretary'),
(23, 1, 'OAS for Office of the Secretary (OSEC)-Concerns'),
(24, 1, 'OAS for Partnerships Building and Resource Mobilization under the Office of the Secretary'),
(25, 1, 'OAS for Policy and Plans'),
(26, 1, 'OAS for Regional Operations under the Operations Group'),
(27, 1, 'OAS for SCBG'),
(28, 1, 'OAS for Specialized Programs under Operations Group'),
(29, 1, 'OAS for Statutory Programs under Operations Group'),
(30, 1, 'OAS for Strategic Communications'),
(31, 1, 'OAS for the General Administration and Support Services Group'),
(32, 1, 'OAS for the National Household Targeting System and Pantawid Pamilyang Pilipino Program (NHTS-4Ps)'),
(33, 1, 'Office of the Secretary'),
(34, 1, 'OSA for Disaster Response and Management Group (DRMG)'),
(35, 1, 'OSAS for Special Projects (SP) under the Office of the Secretary'),
(36, 1, 'OUS for Disaster Response Management Group (DRMG)'),
(37, 1, 'OUS for General Administration and Support Services Group (GASSG)'),
(38, 1, 'OUS for Inclusive-Sustainable Peace and Special Concerns'),
(39, 1, 'OUS for Innovations'),
(40, 1, 'OUS for International Affairs, Attached and Supervised Agencies (ASAs)'),
(41, 1, 'OUS for Legislative Liaison and Coordination Group'),
(42, 1, 'OUS for National Household Targeting System and Pantawid Pamilyang Pilipino Program (4Ps)'),
(43, 1, 'OUS for Operations Group'),
(44, 1, 'OUS for Policy and Plans Group (PPG)'),
(45, 1, 'OUS for Standards and Capacity Building (SCBG)'),
(46, 1, 'Pantawid Pamilyang Pilipino Program (4Ps)-National Program Management Office (NPMO)'),
(47, 1, 'Policy Development and Planning Bureau (PDPB)'),
(48, 1, 'Program Management Bureau (PMB)'),
(49, 1, 'Social Technology Bureau (STB)'),
(50, 1, 'Social Welfare Institutional Development Bureau (SWIDB)'),
(51, 1, 'Standards Bureau (SB)'),
(52, 1, 'Sustainable Livelihood Program (SLP)'),
(53, 1, 'Traditional Media Service (TMS)'),
(54, 2, 'Field Office I'),
(55, 2, 'Field Office II'),
(56, 2, 'Field Office III'),
(57, 2, 'Field Office IV-A (CALABARZON)'),
(58, 2, 'Field Office IV-B (MIMAROPA)'),
(59, 2, 'Field Office V'),
(60, 2, 'Field Office VI'),
(61, 2, 'Field Office VII'),
(62, 2, 'Field Office VIII'),
(63, 2, 'Field Office IX'),
(64, 2, 'Field Office X'),
(65, 2, 'Field Office XI'),
(66, 2, 'Field Office XII'),
(67, 2, 'Field Office NCR'),
(68, 2, 'Field Office CARAGA'),
(69, 2, 'Field Office CAR');

-- --------------------------------------------------------

--
-- Table structure for table `lib_office`
--

CREATE TABLE `lib_office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lib_office`
--

INSERT INTO `lib_office` (`office_id`, `office_name`) VALUES
(1, 'Central Office'),
(2, 'Field Office');

-- --------------------------------------------------------

--
-- Table structure for table `lib_region`
--

CREATE TABLE `lib_region` (
  `region_id` int(9) NOT NULL,
  `region_name` varchar(60) NOT NULL,
  `region_nick` varchar(10) DEFAULT NULL,
  `region_director` varchar(80) DEFAULT NULL,
  `psgc_rgn` char(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lib_region`
--

INSERT INTO `lib_region` (`region_id`, `region_name`, `region_nick`, `region_director`, `psgc_rgn`) VALUES
(1, 'NCR [National Capital Region]', 'NCR', 'Thelsa P. Biolena', '130000000'),
(2, 'CAR [Cordillera Administrative Region]', 'CAR', 'Porfiria M. Bernardez', '140000000'),
(3, 'REGION I [Ilocos Region]', 'I', 'Marlene Febes D. Peralta', '010000000'),
(4, 'REGION II [Cagayan Valley]', 'II', 'Arnel B. Garcia', '020000000'),
(5, 'REGION III [Central Luzon]', 'III', 'Minda B. Brigoli', '030000000'),
(6, 'REGION IV-A [CALABARZON]', 'IV-A', 'Honorita B. Bayudan', '040000000'),
(7, 'REGION MIMAROPA', 'MIMAROPA', 'Violeta Cruz', '170000000'),
(8, 'REGION V [Bicol Region]', 'V', 'Remia T. Tapispisan', '050000000'),
(9, 'REGION VI [Western Visayas]', 'VI', 'Teresita S. Rosales', '060000000'),
(10, 'REGION VII [Central Visayas]', 'VII', 'Ma. Evelyn B. Macapobre', '070000000'),
(11, 'REGION VIII [Eastern Visayas]', 'VIII', 'Leticia T. Corillo', '080000000'),
(12, 'REGION IX [Zamboanga Peninsula]', 'IX', 'Tedulo R. Romo', '090000000'),
(13, 'REGION X [Northern Mindanao]', 'X', 'Atty. Araceli F. Solamillo', '100000000'),
(14, 'REGION XI [Davao Region]', 'XI', 'Ester A. Versoza', '110000000'),
(15, 'REGION XII [Soccsksargen]', 'XII', 'Bai Zorahayda T. Taha', '120000000'),
(16, 'REGION XIII [Caraga]', 'CARAGA', 'Mita G. Lim', '160000000'),
(17, 'ARMM [Autonomous Region in Muslim Mindanao]', 'ARMM', 'Ernestina Z. Solloso', '150000000'),
(18, 'Central Office', 'C.O.', NULL, '000000000'),
(20, 'BARMM (Bangsamoro Autonomous Region in Muslim Mindanao)', 'BARMM', '', '180000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cb_accomplishment`
--

CREATE TABLE `tbl_cb_accomplishment` (
  `cb_accomp_id` int(11) NOT NULL,
  `cb_accomp_quarter` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `obs_fos_name` varchar(200) NOT NULL,
  `cb_accomp_activity_title` text NOT NULL,
  `cb_accomp_start_date` int(11) NOT NULL,
  `cb_accomp_end_date` int(11) NOT NULL,
  `cb_accomp_venue` int(11) NOT NULL,
  `cb_co_accomp_pax_male` int(11) NOT NULL,
  `cb_co_accomp_pax_female` int(11) NOT NULL,
  `cb_fo_accomp_pax_male` int(11) NOT NULL,
  `cb_fo_accomp_pax_female` int(11) NOT NULL,
  `cb_center_accomp_pax_male` int(11) NOT NULL,
  `cb_center_accomp_pax_female` int(11) NOT NULL,
  `cb_lgu_accomp_pax_male` int(11) NOT NULL,
  `cb_lgu_accomp_pax_female` int(11) NOT NULL,
  `cb_lswdo_accomp_pax_male` int(11) NOT NULL,
  `cb_lswdo_accomp_pax_female` int(11) NOT NULL,
  `cb_ngo_accomp_pax_male` int(11) NOT NULL,
  `cb_ngo_accomp_pax_female` int(11) NOT NULL,
  `cb_nga_accomp_pax_male` int(11) NOT NULL,
  `cb_nga_accomp_pax_female` int(11) NOT NULL,
  `cb_org_accomp_pax_male` int(11) NOT NULL,
  `cb_org_accomp_pax_female` int(11) NOT NULL,
  `cb_bene_accomp_pax_male` int(11) NOT NULL,
  `cb_bene_accomp_pax_female` int(11) NOT NULL,
  `cb_other_accomp_pax_male` int(11) NOT NULL,
  `cb_other_accomp_pax_female` int(11) NOT NULL,
  `cb_accomp_poor_rating` int(11) NOT NULL,
  `cb_accomp_fair_rating` int(11) NOT NULL,
  `cb_accomp_satisfactory_rating` int(11) NOT NULL,
  `cb_accomp_very_satisfactory_rating` int(11) NOT NULL,
  `cb_accomp_excelent_rating` int(11) NOT NULL,
  `cb_accomp_budget_disbursed` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `encoded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cb_accomplishment`
--

INSERT INTO `tbl_cb_accomplishment` (`cb_accomp_id`, `cb_accomp_quarter`, `office_id`, `obs_fos_name`, `cb_accomp_activity_title`, `cb_accomp_start_date`, `cb_accomp_end_date`, `cb_accomp_venue`, `cb_co_accomp_pax_male`, `cb_co_accomp_pax_female`, `cb_fo_accomp_pax_male`, `cb_fo_accomp_pax_female`, `cb_center_accomp_pax_male`, `cb_center_accomp_pax_female`, `cb_lgu_accomp_pax_male`, `cb_lgu_accomp_pax_female`, `cb_lswdo_accomp_pax_male`, `cb_lswdo_accomp_pax_female`, `cb_ngo_accomp_pax_male`, `cb_ngo_accomp_pax_female`, `cb_nga_accomp_pax_male`, `cb_nga_accomp_pax_female`, `cb_org_accomp_pax_male`, `cb_org_accomp_pax_female`, `cb_bene_accomp_pax_male`, `cb_bene_accomp_pax_female`, `cb_other_accomp_pax_male`, `cb_other_accomp_pax_female`, `cb_accomp_poor_rating`, `cb_accomp_fair_rating`, `cb_accomp_satisfactory_rating`, `cb_accomp_very_satisfactory_rating`, `cb_accomp_excelent_rating`, `cb_accomp_budget_disbursed`, `remarks`, `encoded_by`) VALUES
(1, 1, 1, 'Agency Operations Service (AOS)', 'JHGFJHGJK', 2024, 2024, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cb_plan`
--

CREATE TABLE `tbl_cb_plan` (
  `cb_plan_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `obs_fos_name` varchar(200) NOT NULL,
  `cb_activity_objective` text NOT NULL,
  `cb_activity_title` text NOT NULL,
  `cb_start_date` date NOT NULL,
  `cb_end_date` date NOT NULL,
  `cb_venue` varchar(200) NOT NULL,
  `cb_co_target_pax` int(11) NOT NULL,
  `cb_fo_target_pax` int(11) NOT NULL,
  `cb_center_target_pax` int(11) NOT NULL,
  `cb_lgu_target_pax` int(11) NOT NULL,
  `cb_lswdo_target_pax` int(11) NOT NULL,
  `cb_ngo_target_pax` int(11) NOT NULL,
  `cb_nga_target_pax` int(11) NOT NULL,
  `cb_org_target_pax` int(11) NOT NULL,
  `cb_bene_target_pax` int(11) NOT NULL,
  `cb_other_target_pax` int(11) NOT NULL,
  `cb_fund_source` int(11) NOT NULL,
  `cb_fund_source_others` varchar(100) NOT NULL,
  `cb_expected_output` text NOT NULL,
  `cb_alloted_budget` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `cb_status` int(20) NOT NULL,
  `cb_updated_status_by` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `encoded_by` int(11) NOT NULL,
  `date_time_encoded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cb_plan`
--

INSERT INTO `tbl_cb_plan` (`cb_plan_id`, `office_id`, `obs_fos_name`, `cb_activity_objective`, `cb_activity_title`, `cb_start_date`, `cb_end_date`, `cb_venue`, `cb_co_target_pax`, `cb_fo_target_pax`, `cb_center_target_pax`, `cb_lgu_target_pax`, `cb_lswdo_target_pax`, `cb_ngo_target_pax`, `cb_nga_target_pax`, `cb_org_target_pax`, `cb_bene_target_pax`, `cb_other_target_pax`, `cb_fund_source`, `cb_fund_source_others`, `cb_expected_output`, `cb_alloted_budget`, `remarks`, `cb_status`, `cb_updated_status_by`, `filename`, `encoded_by`, `date_time_encoded`) VALUES
(7, 0, 'Field Office CAR', 'OBJECTIVE', 'TITLE', '2024-03-01', '2024-03-09', 'VENUE', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 2, 'OTHER SOURCE', 'EXPECTED OUTPUT', 1000000, 'REMARKSSSSSSSSSS', 1, 1, '211720240322w3logo.jpg', 1, '2024-03-22 06:50:16'),
(8, 0, '', 'ASDF', 'ASDFSDF', '2024-03-08', '2024-03-13', 'ASDF', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 'ASDFA', 123, 'ASDF', 1, 1, '764120240322TO_27782.pdf', 1, '2024-03-22 06:51:20'),
(9, 0, 'Bangsamoro Umpungan sa Nutrisyon (BangUn) Program', 'ASDF', 'ASDF123', '2024-03-08', '2024-03-08', 'ASDF', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', 'ASDF', 12, 'ASDF', 0, 1, '', 1, '2024-03-22 06:04:40'),
(10, 0, 'Field Office I', 'OBJECTIVE', 'ACTIVITY', '2024-03-14', '2024-03-30', 'VENUE', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 'OTHER SOURCE', 'OUTPUT', 1, 'REMARKS', 0, 1, '', 1, '2024-03-22 06:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_swadcap_calendar`
--

CREATE TABLE `tbl_swadcap_calendar` (
  `swadcap_id` int(11) NOT NULL,
  `swadcap_event_name` text NOT NULL,
  `swadcap_pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ta_request`
--

CREATE TABLE `tbl_ta_request` (
  `ta_request_id` int(11) NOT NULL,
  `office_id` int(200) NOT NULL,
  `obs_fos_name` varchar(200) NOT NULL,
  `ta_requester_name` varchar(100) NOT NULL,
  `ta_services` int(11) NOT NULL,
  `ta_service_other` varchar(200) NOT NULL,
  `ta_description` text NOT NULL,
  `ta_status` int(11) NOT NULL,
  `ta_encoded_by` int(11) NOT NULL,
  `ta_date_encoded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_ta_request`
--

INSERT INTO `tbl_ta_request` (`ta_request_id`, `office_id`, `obs_fos_name`, `ta_requester_name`, `ta_services`, `ta_service_other`, `ta_description`, `ta_status`, `ta_encoded_by`, `ta_date_encoded`) VALUES
(1, 1, 'Policy Development and Planning Bureau (PDPB)', 'rommel', 1, 'other', 'description', 1, 1, '2024-03-21 09:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `region_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `ext_name` varchar(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `region_id`, `first_name`, `middle_name`, `last_name`, `ext_name`, `email`, `user_type`, `status`) VALUES
(1, 'rommel', '202cb962ac59075b964b07152d234b70', 3, 'rommel', 'm', 'javier', '', 'rommeljavier1205@gmail.com', 'admin', 0),
(2, 'daniel', '202cb962ac59075b964b07152d234b70', 3, 'Daniel', 'D', 'Alejandre', '', 'ddalejandre@dswd.gov.ph', '', 1),
(3, 'daniel', '202cb962ac59075b964b07152d234b70', 3, 'Daniel', 'D', 'Alejandre', '', 'ddalejandre@dswd.gov.ph', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_obs_fos`
--
ALTER TABLE `lib_obs_fos`
  ADD PRIMARY KEY (`obs_fos_id`);

--
-- Indexes for table `lib_office`
--
ALTER TABLE `lib_office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `lib_region`
--
ALTER TABLE `lib_region`
  ADD PRIMARY KEY (`region_id`) USING BTREE,
  ADD UNIQUE KEY `psgc_rgn` (`psgc_rgn`) USING BTREE,
  ADD KEY `region_name` (`region_name`) USING BTREE;

--
-- Indexes for table `tbl_cb_accomplishment`
--
ALTER TABLE `tbl_cb_accomplishment`
  ADD PRIMARY KEY (`cb_accomp_id`);

--
-- Indexes for table `tbl_cb_plan`
--
ALTER TABLE `tbl_cb_plan`
  ADD PRIMARY KEY (`cb_plan_id`);

--
-- Indexes for table `tbl_swadcap_calendar`
--
ALTER TABLE `tbl_swadcap_calendar`
  ADD PRIMARY KEY (`swadcap_id`);

--
-- Indexes for table `tbl_ta_request`
--
ALTER TABLE `tbl_ta_request`
  ADD PRIMARY KEY (`ta_request_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lib_obs_fos`
--
ALTER TABLE `lib_obs_fos`
  MODIFY `obs_fos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `lib_office`
--
ALTER TABLE `lib_office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lib_region`
--
ALTER TABLE `lib_region`
  MODIFY `region_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_cb_accomplishment`
--
ALTER TABLE `tbl_cb_accomplishment`
  MODIFY `cb_accomp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cb_plan`
--
ALTER TABLE `tbl_cb_plan`
  MODIFY `cb_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_swadcap_calendar`
--
ALTER TABLE `tbl_swadcap_calendar`
  MODIFY `swadcap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ta_request`
--
ALTER TABLE `tbl_ta_request`
  MODIFY `ta_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
