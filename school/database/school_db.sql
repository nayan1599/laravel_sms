-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2026 at 03:29 PM
-- Server version: 10.11.14-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` enum('income','expense') NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `transaction_date` date NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `category_id`, `transaction_type`, `title`, `amount`, `transaction_date`, `reference_no`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 2, 'income', 'Tuitions Fee', 500.00, '2026-01-14', NULL, NULL, 1, '2026-01-13 19:37:50', '2026-01-13 19:37:50'),
(3, 2, 'income', 'Tuitions Fee', 500.00, '2026-01-14', NULL, NULL, 1, '2026-01-13 19:38:50', '2026-01-13 19:38:50'),
(4, 2, 'income', 'Tuition Fee', 1500.00, '2026-01-14', NULL, NULL, 1, '2026-01-13 20:32:08', '2026-01-13 20:32:08'),
(5, 2, 'income', 'Tuition Fee', 500.00, '2026-01-14', NULL, NULL, 1, '2026-01-13 21:00:37', '2026-01-13 21:00:37'),
(6, 2, 'income', 'Session Fee', 450.00, '2026-01-14', NULL, NULL, 1, '2026-01-13 21:06:10', '2026-01-13 21:06:10'),
(8, 2, 'income', 'Session Fee', 500.00, '2026-01-14', NULL, NULL, 1, '2026-01-13 21:08:24', '2026-01-13 21:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `account_categories`
--

CREATE TABLE `account_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('income','expense') NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_categories`
--

INSERT INTO `account_categories` (`id`, `name`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Salary', 'expense', 'uygyofuygygyi', 1, '2026-01-13 10:24:37', '2026-01-13 10:24:37'),
(2, 'Fee', 'income', 'rtyrtryr', 1, '2026-01-13 19:15:26', '2026-01-13 19:15:26'),
(3, 'Salary / বেতন', 'income', 'মাসিক চাকরির বেতন', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(4, 'Freelance / ফ্রিল্যান্স', 'income', 'ফ্রিল্যান্স/আউটসোর্সিং থেকে আয়', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(5, 'Business Profit / ব্যবসার লাভ', 'income', 'দোকান/ব্যবসা থেকে নেট লাভ', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(6, 'Bonus / বোনাস', 'income', 'বার্ষিক/পারফরম্যান্স বোনাস', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(7, 'Overtime / অতিরিক্ত সময়', 'income', 'অতিরিক্ত কাজের টাকা', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(8, 'Rental Income / ভাড়ার আয়', 'income', 'বাড়ি/দোকান ভাড়া থেকে', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(9, 'Investment Return / বিনিয়োগের রিটার্ন', 'income', 'শেয়ার/এফডি/মিউচুয়াল ফান্ড', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(10, 'Gift Received / উপহার পাওয়া', 'income', 'জন্মদিন/ঈদের উপহার', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(11, 'Side Income / অতিরিক্ত আয়', 'income', 'টিউশন/ইউটিউব/অনলাইন', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(12, 'Food / খাবার', 'expense', 'সকাল-দুপুর-রাতের খাবার + রেস্টুরেন্ট', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(13, 'Groceries / মুদি সামগ্রী', 'expense', 'বাজার/দোকান থেকে কেনা খাবার', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(14, 'Transport / যাতায়াত', 'expense', 'বাস, সিএনজি, উবার, ফুয়েল', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(15, 'Rent / বাড়ি ভাড়া', 'expense', 'বাসা/অফিস ভাড়া', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(16, 'Utility Bills / বিল', 'expense', 'বিদ্যুৎ, পানি, গ্যাস', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(17, 'Internet & Mobile Recharge', 'expense', 'ইন্টারনেট + মোবাইল রিচার্জ', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(18, 'Shopping / কেনাকাটা', 'expense', 'কাপড়, জুতা, গ্যাজেট', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(19, 'Health / স্বাস্থ্য', 'expense', 'ওষুধ, ডাক্তার, হাসপাতাল', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(20, 'Education / পড়াশোনা', 'expense', 'স্কুল/কলেজ ফি, বই', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(21, 'Entertainment / বিনোদন', 'expense', 'সিনেমা, গেম, পার্টি', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(22, 'Personal Care / ব্যক্তিগত যত্ন', 'expense', 'সেলুন, কসমেটিকস', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(23, 'Household Items / ঘরের জিনিস', 'expense', 'সাবান, ডিটারজেন্ট, আসবাব', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(24, 'Loan/EMI Payment / লোন পরিশোধ', 'expense', 'ব্যাংক লোন/কিস্তি', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(25, 'Gift Given / উপহার দেওয়া', 'expense', 'অন্যকে উপহার', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(26, 'Travel / ভ্রমণ', 'expense', 'বেড়াতে যাওয়া', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26'),
(27, 'Miscellaneous / বিবিধ', 'expense', 'অপ্রত্যাশিত ছোট খরচ', 1, '2026-01-14 04:10:26', '2026-01-14 04:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent','late','leave') NOT NULL DEFAULT 'present',
  `remarks` varchar(255) DEFAULT NULL,
  `recorded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `class_id`, `section_id`, `subject_id`, `attendance_date`, `status`, `remarks`, `recorded_by`, `recorded_at`, `created_at`, `updated_at`) VALUES
(13, 2, 1, 1, 1, '2026-01-08', 'present', NULL, 1, '2026-01-08 14:31:15', '2026-01-08 13:25:19', '2026-01-08 14:31:15'),
(14, 3, 1, 1, 1, '2026-01-08', 'absent', NULL, 1, '2026-01-08 14:31:15', '2026-01-08 13:25:19', '2026-01-08 14:31:15'),
(15, 1, 1, 1, 1, '2026-01-08', 'present', 'gdsdfgdsg', 1, '2026-01-08 14:14:18', '2026-01-08 14:14:18', '2026-01-08 14:14:18'),
(16, 2, 1, 1, 1, '2026-01-12', 'present', NULL, 1, '2026-01-11 21:15:40', '2026-01-11 21:15:40', '2026-01-11 21:15:40'),
(17, 3, 2, 1, NULL, '2026-01-12', 'absent', NULL, 1, '2026-01-11 21:25:16', '2026-01-11 21:25:16', '2026-01-11 21:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `description`, `image`, `button_text`, `button_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hhh', NULL, NULL, 'banners/34LkJHpdcvbB40hF6X0lIeIlO9x5kCTVtodvChYn.jpg', NULL, NULL, 1, '2025-12-23 10:01:04', '2025-12-23 10:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2026-01-04 10:13:33', '2026-01-04 10:13:33'),
(2, 'A+', '2026-01-04 10:13:42', '2026-01-04 10:13:42'),
(3, 'A-', '2026-01-04 10:13:51', '2026-01-04 10:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_nayan@gmail.com|127.0.0.1', 'i:1;', 1767626930),
('laravel_cache_nayan@gmail.com|127.0.0.1:timer', 'i:1767626930;', 1767626930),
('laravel_cache_riton@gmail.com|127.0.0.1', 'i:1;', 1767585807),
('laravel_cache_riton@gmail.com|127.0.0.1:timer', 'i:1767585807;', 1767585807);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', NULL, 1, '2025-12-23 10:04:31', '2025-12-23 10:04:31'),
(2, 'Notice', 'notice', NULL, 1, '2025-12-23 10:05:20', '2025-12-23 10:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `certificate_type` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_numeric` int(11) NOT NULL,
  `class_code` varchar(100) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `group_name` varchar(20) DEFAULT NULL,
  `medium` enum('bangla','english','bilingual') NOT NULL DEFAULT 'bangla',
  `shift` enum('morning','day','evening') NOT NULL DEFAULT 'morning',
  `session_year` smallint(5) UNSIGNED DEFAULT NULL,
  `capacity` smallint(5) UNSIGNED DEFAULT 60,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_group` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_numeric`, `class_code`, `section`, `group_name`, `medium`, `shift`, `session_year`, `capacity`, `room_id`, `class_teacher_id`, `exam_group`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'নবম শ্রেণি', 9, '9A-SCI', 'A', 'science', 'bangla', 'morning', 2025, 60, 12, 45, 'JSC-2025', 'active', NULL, NULL, NULL),
(2, 'নবম শ্রেণি', 9, '9B-SCI', 'B', 'science', 'bangla', 'morning', 2025, 58, 14, 47, 'JSC-2025', 'active', NULL, NULL, NULL),
(3, 'দশম শ্রেণি', 10, '10A-SCI', 'A', 'science', 'bangla', 'morning', 2025, 62, 13, 46, 'SSC-2025', 'active', NULL, NULL, NULL),
(4, 'একাদশ শ্রেণি', 11, 'HSC-2025-SCI-A', 'A', 'science', 'bangla', 'morning', 2025, 65, 5, 32, 'HSC-2026', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 999,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `description`, `tag_id`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Science', 'science', 'বিজ্ঞান বিভাগ - Physics, Chemistry, Biology, Higher Math', 1, 1, 10, '2026-01-20 19:43:18', '2026-01-20 19:44:38'),
(2, 'Humanities', 'humanities', 'মানবিক বিভাগ - Bangla, English, Social Science, Economics', 1, 1, 20, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(3, 'Business Studies', 'business-studies', 'ব্যবসায় শিক্ষা বিভাগ - Accounting, Finance, Business Organization', 1, 1, 30, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(4, 'Bangla', 'bangla', 'বাংলা বিভাগ - Bangla 1st & 2nd Paper', 1, 1, 40, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(5, 'English', 'english', 'ইংরেজি বিভাগ - English Grammar & Composition', 1, 1, 50, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(6, 'Mathematics', 'mathematics', 'গণিত বিভাগ - General Math & Higher Math', 1, 1, 60, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(7, 'Religion & Moral Education', 'religion', 'ধর্ম ও নৈতিক শিক্ষা বিভাগ', 1, 1, 70, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(8, 'ICT', 'ict', 'তথ্য ও যোগাযোগ প্রযুক্তি বিভাগ', 1, 1, 80, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(9, 'Physical Education', 'physical-education', 'শারীরিক শিক্ষা ও স্বাস্থ্য বিভাগ', 1, 1, 90, '2026-01-20 19:43:18', '2026-01-20 19:44:47'),
(10, 'General / Others', 'general', 'সাধারণ / অন্যান্য বিষয় (Agriculture, Home Economics ইত্যাদি)', 1, 1, 999, '2026-01-20 19:43:18', '2026-01-20 19:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  `joining_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `total_marks` int(11) NOT NULL DEFAULT 100,
  `pass_marks` int(11) NOT NULL DEFAULT 33,
  `exam_type` enum('written','oral','practical','online') NOT NULL DEFAULT 'written',
  `status` enum('scheduled','completed','cancelled') NOT NULL DEFAULT 'scheduled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `class_id`, `section_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `total_marks`, `pass_marks`, `exam_type`, `status`, `created_at`, `updated_at`) VALUES
(3, 'last exam', 1, NULL, NULL, '2026-05-01', NULL, NULL, 100, 33, 'written', 'scheduled', '2026-01-05 11:37:05', '2026-01-05 11:37:05'),
(4, 'Half Yearly 2026', 8, 1, 3, '2026-03-18', '09:00:00', '12:00:00', 100, 33, 'written', 'scheduled', NULL, NULL),
(5, 'Class Test - Math', 9, 2, 3, '2026-02-05', '10:00:00', '10:45:00', 40, 33, 'written', 'scheduled', NULL, NULL),
(6, 'Annual Exam 2026', 10, 1, NULL, '2026-11-10', '09:00:00', '01:00:00', 100, 33, 'written', 'scheduled', NULL, NULL),
(7, 'Science Practical', 9, 3, 4, '2026-09-08', '09:30:00', '12:00:00', 50, 33, 'practical', 'scheduled', NULL, NULL),
(8, 'Online MCQ Test', 7, NULL, 8, '2026-04-15', NULL, NULL, 30, 33, 'online', 'scheduled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `month_year` varchar(7) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) DEFAULT 0.00,
  `discount` decimal(10,2) DEFAULT 0.00,
  `fine` decimal(10,2) DEFAULT 0.00,
  `due_date` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` enum('CASH','BKASH','NAGAD','BANK','CARD','OTHER') DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `status` enum('PENDING','PARTIAL','PAID','OVERDUE') DEFAULT 'PENDING',
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `fee_type_id`, `month_year`, `amount_due`, `amount_paid`, `discount`, `fine`, `due_date`, `payment_date`, `payment_method`, `transaction_id`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(12, 1, 2, '2026-01', 500.00, 480.00, 20.00, 0.00, '2026-01-14', '2026-01-14', 'CASH', 'INV-20260114-000001', 'PAID', NULL, '2026-01-13 21:57:58', '2026-01-13 21:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `is_recurring` tinyint(1) DEFAULT 0,
  `frequency` enum('ONE_TIME','MONTHLY','QUARTERLY','ANNUAL','PER_TERM','AS_NEEDED') DEFAULT 'ONE_TIME',
  `is_refundable` tinyint(1) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`id`, `name`, `name_bn`, `code`, `is_recurring`, `frequency`, `is_refundable`, `description`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Admission Fee', 'ভর্তি ফি', 'ADM', 0, 'ONE_TIME', 0, 'One-time admission charge for new students', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(2, 'Tuition Fee', 'টিউশন ফি', 'TUI', 1, 'MONTHLY', 0, 'Monthly tuition fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(3, 'Session Fee', 'সেশন ফি', 'SES', 0, 'ANNUAL', 0, 'Annual session/development fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(4, 'Development Fee', 'ডেভেলপমেন্ট ফি', 'DEV', 0, 'ANNUAL', 0, 'School development charge', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(5, 'Registration Fee', 'রেজিস্ট্রেশন ফি', 'REG', 0, 'ONE_TIME', 0, 'Enrollment/Registration fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(6, 'Examination Fee', 'পরীক্ষা ফি', 'EXM', 0, 'PER_TERM', 0, 'Term/Final exam fees', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(7, 'Lab Fee', 'ল্যাব ফি', 'LAB', 0, 'ANNUAL', 0, 'Science/Computer lab usage fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(8, 'Library Fee', 'লাইব্রেরি ফি', 'LIB', 0, 'ANNUAL', 0, 'Library access fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(9, 'Transport Fee', 'পরিবহন ফি', 'TRN', 1, 'MONTHLY', 0, 'School bus/transport fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(10, 'Activity Fee', 'এক্সট্রা-কারিকুলার ফি', 'ACT', 0, 'ANNUAL', 0, 'Co-curricular & activities fee', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(11, 'Book & Stationery Fee', 'বই-খাতা-স্টেশনারি ফি', 'BKS', 0, 'ANNUAL', 0, 'Books and stationery charges', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(12, 'Uniform Fee', 'ইউনিফর্ম ফি', 'UNI', 0, 'ONE_TIME', 0, 'School uniform charges', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(13, 'Security Deposit', 'সিকিউরিটি ডিপোজিট', 'SEC', 0, 'ONE_TIME', 1, 'Refundable caution money', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(14, 'Late Fee', 'লেট ফি', 'LATE', 0, 'AS_NEEDED', 0, 'Penalty for late payment', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1),
(15, 'Miscellaneous Fee', 'বিবিধ ফি', 'MISC', 0, 'AS_NEEDED', 0, 'Other miscellaneous charges', '2026-01-14 02:01:35', '2026-01-14 02:01:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `national_id` varchar(30) DEFAULT NULL,
  `relation` enum('father','mother','guardian') NOT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `education_level` varchar(100) DEFAULT NULL,
  `income_range` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `emergency_contact` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactive','deceased') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `leave_type` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `teacher_remark` text DEFAULT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `student_id`, `teacher_id`, `leave_type`, `reason`, `start_date`, `end_date`, `total_days`, `status`, `teacher_remark`, `applied_at`, `approved_at`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'Sick', 'sdfl sdfhi9hoshdfh sdhfsjdfhewhfweurhwhfsduhf sdjfhsdjfhdso', '2026-01-10', '2026-01-13', 4, 'rejected', NULL, '2026-01-10 11:38:36', NULL, '2026-01-10 11:38:36', '2026-01-15 02:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `marks_obtained` decimal(5,2) NOT NULL,
  `total_marks` int(11) NOT NULL DEFAULT 100,
  `grade` varchar(5) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `recorded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `exam_id`, `subject_id`, `marks_obtained`, `total_marks`, `grade`, `remarks`, `recorded_by`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 55.00, 100, 'A-', '', NULL, '2026-01-05 10:59:53', '2026-01-05 18:03:02'),
(2, 3, 3, 2, 66.00, 100, 'A-', '', NULL, '2026-01-05 11:16:40', '2026-01-05 18:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `route_name`, `parent_id`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', NULL, NULL, 0, 'active', '2025-12-23 10:02:42', '2025-12-23 10:03:53'),
(2, 'About', 'about', NULL, NULL, 2, 'active', '2025-12-23 10:03:11', '2025-12-23 10:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_23_041923_add_role_to_users_table', 1),
(5, '2025_06_25_163929_create_teachers_table', 1),
(6, '2025_06_26_050821_create_guardians_table', 1),
(7, '2025_06_30_163650_create_classes_table', 1),
(8, '2025_07_01_170155_create_sections_table', 1),
(9, '2025_07_06_164207_create_subjects_table', 1),
(10, '2025_07_06_165945_create_attendance_table', 1),
(11, '2025_07_07_033746_create_exams_table', 1),
(12, '2025_07_07_035938_create_marks_table', 1),
(13, '2025_07_08_165819_create_fees_table', 1),
(14, '2025_07_10_195559_create_employees_table', 1),
(15, '2025_07_13_041948_create_students_table', 1),
(16, '2025_07_14_030720_create_departments_table', 1),
(17, '2025_07_15_031532_create_teacher_attendances_table', 1),
(18, '2025_07_17_013817_create_fee_types_table', 1),
(19, '2025_07_17_024605_create_blood_groups_table', 1),
(20, '2025_07_17_040508_create_notices_table', 1),
(21, '2025_07_20_012145_create_school_committees_table', 1),
(22, '2025_07_20_021221_create_menus_table', 1),
(23, '2025_07_22_160724_create_organization_settings_table', 1),
(24, '2025_07_23_034105_create_banners_table', 1),
(25, '2025_07_24_033807_create_categories_table', 1),
(26, '2025_07_24_033930_create_posts_table', 1),
(27, '2025_12_15_030503_create_student_applications_table', 1),
(28, '2025_12_22_025605_create_certificates_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `notice_date` date NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `notice_date`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'new notics', 'this is a very new Notice', '2026-12-02', NULL, 'active', '2025-12-23 10:40:48', '2025-12-23 10:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `organization_settings`
--

CREATE TABLE `organization_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `established_year` year(4) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `trade_license` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_settings`
--

INSERT INTO `organization_settings` (`id`, `organization_name`, `slogan`, `address`, `email`, `phone`, `website`, `logo`, `favicon`, `established_year`, `owner_name`, `trade_license`, `vat_number`, `facebook_link`, `twitter_link`, `youtube_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(1, 'MY School', NULL, 'Sonargaon Narayjonaj dhaka', 'nayan1599@gmail.com', '01621881846', 'https://fast.com/', 'logos/XtHkfneukKakPBShntoxDA3GipX0sDKMP75XtMGP.png', NULL, '2025', 'Md nayan', '32658974', NULL, NULL, NULL, NULL, NULL, '2025-12-22 11:02:28', '2025-12-22 21:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period_number` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `duration_min` smallint(6) GENERATED ALWAYS AS (timestampdiff(MINUTE,`start_time`,`end_time`)) STORED,
  `is_break` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` tinyint(3) UNSIGNED NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='দিনের পিরিয়ড / টাইম স্লট মাস্টার (যেমন: 1st Period 10:00-10:45)';

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `period_number`, `name`, `start_time`, `end_time`, `is_break`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 0, 'Assembly / Morning Prayer', '09:45:00', '10:00:00', 1, 0, '2026-02-02 02:14:58', '2026-02-12 15:45:55'),
(2, 1, '1st Period', '10:00:00', '10:45:00', 0, 1, '2026-02-02 02:14:58', '2026-02-12 15:46:04'),
(3, 2, '2nd Period', '10:45:00', '11:30:00', 0, 2, '2026-02-02 02:14:58', '2026-02-12 15:46:11'),
(4, 3, '3rd Period', '11:30:00', '12:15:00', 0, 3, '2026-02-02 02:14:58', '2026-02-12 15:46:16'),
(5, 4, 'Tiffin / Short Break', '12:15:00', '12:30:00', 1, 4, '2026-02-02 02:14:58', '2026-02-12 15:46:23'),
(6, 5, '4th Period', '12:30:00', '01:15:00', 0, 5, '2026-02-02 02:14:58', '2026-02-12 15:46:27'),
(8, 6, '5th Period', '01:15:00', '02:00:00', 0, 6, '2026-02-02 02:14:58', '2026-02-12 15:46:31'),
(9, 7, 'Lunch & Prayer Break', '02:00:00', '02:30:00', 1, 7, '2026-02-02 02:14:58', '2026-02-12 15:46:33'),
(10, 8, '6th Period', '02:30:00', '03:15:00', 0, 8, '2026-02-02 02:14:58', '2026-02-12 15:46:37'),
(11, 9, '7th Period', '03:15:00', '04:00:00', 0, 9, '2026-02-02 02:14:58', '2026-02-12 15:46:40'),
(12, 10, 'Last Bell / Co-curricular', '04:00:00', '04:15:00', 1, 10, '2026-02-02 02:14:58', '2026-02-12 15:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Published, 0=Draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `excerpt`, `content`, `feature_image`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'sdfd sdfjd dfjdshfjd', 'sdfd-sdfjd-dfjdshfjd', NULL, NULL, NULL, 1, NULL, '2025-12-23 11:14:46', '2025-12-23 11:14:46'),
(3, 2, 'weewrwwerwwer', 'weewrwwerwwer', 'werwerwrw', 'sdfsfsfdf', NULL, 1, NULL, '2026-01-06 11:25:39', '2026-01-06 11:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `capacity` int(10) UNSIGNED DEFAULT 0,
  `floor` varchar(50) DEFAULT NULL,
  `building` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_number`, `capacity`, `floor`, `building`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Lecture Hall A', 'A-101', 120, '1st Floor', 'Academic Building-1', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(2, 'Lecture Hall B', 'A-102', 100, '1st Floor', 'Academic Building-1', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(3, 'Lecture Theatre', 'A-201', 180, '2nd Floor', 'Academic Building-1', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(4, 'Computer Lab-1', 'C-301', 60, '3rd Floor', 'Computer Science Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(5, 'Computer Lab-2 (Advanced)', 'C-302', 40, '3rd Floor', 'Computer Science Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(6, 'Physics Lab', 'S-101', 50, 'Ground Floor', 'Science Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(7, 'Chemistry Lab', 'S-102', 45, 'Ground Floor', 'Science Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(8, 'Seminar Room', 'B-105', 35, '1st Floor', 'Business Studies Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(9, 'Library Reading Room', 'L-001', 80, 'Ground Floor', 'Central Library', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(10, 'Tutorial Room Small', 'A-305', 25, '3rd Floor', 'Academic Building-1', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(11, 'Tutorial Room Medium', 'A-306', 40, '3rd Floor', 'Academic Building-1', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(12, 'Auditorium', 'AUD-01', 350, 'Ground Floor', 'Auditorium Complex', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(13, 'Old Lecture Hall (Renovation)', 'A-005', 90, 'Ground Floor', 'Academic Building-1', 0, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(14, 'Drawing Studio', 'F-201', 55, '2nd Floor', 'Fine Arts Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59'),
(15, 'Language Lab', 'H-110', 30, '1st Floor', 'Humanities Building', 1, '2026-02-12 14:32:59', '2026-02-12 14:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `salary_month` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `paid_at` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_committees`
--

CREATE TABLE `school_committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_db`
--

CREATE TABLE `school_db` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(10) NOT NULL,
  `section_capacity` int(11) NOT NULL DEFAULT 40,
  `section_teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `class_id`, `section_name`, `section_capacity`, `section_teacher_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rouse', 40, NULL, 'active', '2025-12-28 11:21:58', '2025-12-28 11:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('e4Ki0tc4kfP0kAQtiyh2mvfv1XoJkUJJllR4TQtt', 15, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVo4aU5PSDluQnJ2MmZmcnd6eEl0Slg4eThVcjlGc09TWGkyYmhCRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGFzcy10ZWFjaGVycy9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNTt9', 1770996533);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_bn` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_name_bn` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_name_bn` varchar(100) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_contact` varchar(15) DEFAULT NULL,
  `guardian_relation` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `name_bn`, `father_name`, `father_name_bn`, `mother_name`, `mother_name_bn`, `guardian_name`, `guardian_contact`, `guardian_relation`, `contact`, `email`, `present_address`, `permanent_address`, `class_id`, `section_id`, `roll`, `date_of_birth`, `blood_group`, `religion`, `gender`, `photo`, `created_at`, `updated_at`) VALUES
(1, 11, 'Md Ripon', NULL, 'Md Firuz Miya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '02', NULL, NULL, NULL, 'male', 'uploads/students/1767196357.png', '2025-12-22 22:21:12', '2025-12-31 09:52:37'),
(2, 0, 'masum', NULL, 'mr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 'male', 'uploads/students/1767196340.png', '2025-12-24 00:33:47', '2026-01-07 12:08:40'),
(3, 6, 'jerin', NULL, 'test Father name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2025-12-19', NULL, NULL, 'male', NULL, '2025-12-31 10:49:10', '2026-01-11 11:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('compulsory','optional') NOT NULL DEFAULT 'compulsory',
  `full_marks` int(11) NOT NULL DEFAULT 100,
  `pass_marks` int(11) NOT NULL DEFAULT 33,
  `practical_marks` int(11) NOT NULL DEFAULT 0,
  `subject_teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_code`, `class_id`, `type`, `full_marks`, `pass_marks`, `practical_marks`, `subject_teacher_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'বাংলা', 'BAN101', 6, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(2, 'ইংরেজি', 'ENG101', 6, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(3, 'গণিত', 'MAT101', 6, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(4, 'বিজ্ঞান', 'SCI101', 7, 'compulsory', 100, 33, 25, NULL, 'active', '2026-01-15 00:47:49', NULL),
(5, 'ইসলাম ধর্ম ও নৈতিক শিক্ষা', 'REL101', 6, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(6, 'তথ্য ও যোগাযোগ প্রযুক্তি', 'ICT101', 7, 'compulsory', 50, 17, 25, NULL, 'active', '2026-01-15 00:47:49', NULL),
(7, 'বাংলা ১ম পত্র', 'BAN201', 9, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(8, 'বাংলা ২য় পত্র', 'BAN202', 9, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(9, 'ইংরেজি ১ম পত্র', 'ENG201', 9, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(10, 'ইংরেজি ২য় পত্র', 'ENG202', 9, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(11, 'গণিত', 'MAT201', 9, 'compulsory', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(12, 'পদার্থবিজ্ঞান', 'PHY201', 9, 'compulsory', 75, 25, 25, NULL, 'active', '2026-01-15 00:47:49', NULL),
(13, 'রসায়ন', 'CHE201', 9, 'compulsory', 75, 25, 25, NULL, 'active', '2026-01-15 00:47:49', NULL),
(14, 'জীববিজ্ঞান', 'BIO201', 9, 'compulsory', 75, 25, 25, NULL, 'active', '2026-01-15 00:47:49', NULL),
(15, 'উচ্চতর গণিত', 'HMT201', 10, 'optional', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(16, 'হিসাববিজ্ঞান', 'ACC201', 10, 'optional', 100, 33, 0, NULL, 'active', '2026-01-15 00:47:49', NULL),
(17, 'কৃষি শিক্ষা', 'AGR201', 10, 'optional', 100, 33, 25, NULL, 'active', '2026-01-15 00:47:49', NULL),
(18, 'গার্হস্থ্য বিজ্ঞান', 'HSC201', 10, 'optional', 100, 33, 25, NULL, 'active', '2026-01-15 00:47:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT 'skill',
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', 'subject', 1, '2026-01-20 13:43:58', '2026-01-20 13:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `tag_types`
--

CREATE TABLE `tag_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_types`
--

INSERT INTO `tag_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'subject', 'বিভিন্ন বিষয় / Subject (যেমন: Bangla, Math, Physics)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(2, 'skill', 'ছাত্র-ছাত্রীর দক্ষতা / Skills (যেমন: Leadership, Coding, Public Speaking)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(3, 'interest', 'ছাত্র-ছাত্রীর আগ্রহ / Hobbies & Interests', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(4, 'activity', 'সহ-পাঠ্যক্রমিক কার্যক্রম / Co-curricular & Extra-curricular Activities', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(5, 'club', 'ক্লাব / Club Membership (যেমন: Debate Club, Science Club)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(6, 'sport', 'খেলাধুলা সংশ্লিষ্ট ট্যাগ / Sports & Games', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(7, 'house', 'হাউজ / School House System (Red House, Blue House ইত্যাদি)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(8, 'role', 'দায়িত্ব / Student Roles (Prefect, Monitor, Class Captain)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(9, 'achievement', 'অর্জন / Awards & Achievements', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(10, 'special_need', 'বিশেষ চাহিদা / Special Educational Needs (যদি প্রয়োজন হয়)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(11, 'language', 'ভাষা দক্ষতা / Language Proficiency (যেমন: English Fluent, Arabic Basic)', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(12, 'career', 'ক্যারিয়ার আগ্রহ / Career Interest Areas', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(13, 'personality', 'ব্যক্তিত্বের বৈশিষ্ট্য / Personality Traits', 1, '2026-01-20 19:29:19', '2026-01-20 19:29:19'),
(14, 'health', 'স্বাস্থ্য সম্পর্কিত ট্যাগ / Health Notes (যদি প্রয়োজন হয়)', 0, '2026-01-20 19:29:19', '2026-01-20 19:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alternate_phone` varchar(20) DEFAULT NULL,
  `employee_id` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `experience_years` int(11) NOT NULL DEFAULT 0,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`skills`)),
  `education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`education`)),
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `subject_specialization` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT 0.00,
  `last_increment_date` date DEFAULT NULL,
  `employment_type` enum('permanent','contract','part-time') NOT NULL DEFAULT 'permanent',
  `photo` varchar(255) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `national_id` varchar(30) DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `emergency_contact_name` varchar(100) DEFAULT NULL,
  `emergency_contact_phone` varchar(20) DEFAULT NULL,
  `status` enum('active','on_leave','resigned','retired') NOT NULL DEFAULT 'active',
  `remarks` text DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `email`, `phone`, `alternate_phone`, `employee_id`, `designation`, `department`, `gender`, `date_of_birth`, `qualification`, `experience_years`, `skills`, `education`, `date_of_joining`, `date_of_leaving`, `subject_specialization`, `salary`, `last_increment_date`, `employment_type`, `photo`, `blood_group`, `national_id`, `marital_status`, `present_address`, `permanent_address`, `emergency_contact_name`, `emergency_contact_phone`, `status`, `remarks`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 14, 'MD NAYAN', 'wsnayan8@gmail.com', NULL, NULL, '03', 'dsds', 'dsfsdf', NULL, NULL, 'fsdfsdfds', 0, NULL, NULL, '2025-01-19', NULL, NULL, 0.00, NULL, 'permanent', NULL, 'A', NULL, NULL, NULL, NULL, 'nayan', '01621881846', 'active', NULL, NULL, '2026-01-18 21:48:00', '2026-01-18 21:48:00'),
(2, 15, 'pagorr', 'pagol@gmail.com', NULL, NULL, '1233', 'sfsdfs', 'sdafsdf', NULL, NULL, 'sdfsdfsd', 21, NULL, '[{\"degree\":\"esdsdfsdf\",\"subject\":\"sdfsdfsf\",\"institute\":\"sdsdfdsfs\",\"year\":\"123\"}]', '2026-01-25', NULL, NULL, 333.00, NULL, 'permanent', NULL, 'A', NULL, NULL, NULL, NULL, 'pagol', '01930502915', 'active', NULL, NULL, '2026-01-18 21:53:41', '2026-01-18 21:53:41'),
(3, 16, 'new teacher', 'new@gmail.com', '01621881846', NULL, '0265', 'Orthopedics', NULL, 'male', '2026-01-05', NULL, 0, '[{\"company\":\"sdsdfasd\",\"role\":\"sfsdfs\",\"duration\":\"ssfsdf\"}]', '[{\"degree\":\"khig\",\"subject\":\"sdfsdf\",\"institute\":\"sfsdfsdf\",\"year\":\"2026\"}]', '2025-12-12', NULL, NULL, 0.00, NULL, 'permanent', NULL, 'A+', NULL, 'married', 'sdfsdfsf\r\n   sdfsdfs     sdsdfsfsd', 'sdfsdfsdfsdfsdfsdfsdfsdf', '016218853213', '01621881846', 'active', 'sfsdfsdfsafasd', NULL, '2026-01-19 18:53:53', '2026-01-19 18:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendances`
--

CREATE TABLE `teacher_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent') NOT NULL DEFAULT 'present',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_attendances`
--

INSERT INTO `teacher_attendances` (`id`, `teacher_id`, `attendance_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-01-08', 'present', '2026-01-08 13:56:13', '2026-01-08 13:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `day_of_week` tinyint(3) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Weekly Class Routine / Timetable - Teacher, Subject, Period assignment';

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `academic_year_id`, `class_id`, `day_of_week`, `period_id`, `subject_id`, `teacher_id`, `room_id`, `is_active`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 101, 1, '1st period Bangla', '2026-02-02 02:13:16', '2026-02-12 15:44:28'),
(2, 1, 1, 1, 2, 2, 1, 101, 1, 'English Grammar', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(3, 1, 1, 1, 4, 3, 1, 102, 1, 'Mathematics', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(4, 1, 1, 1, 5, 4, 1, 103, 1, 'Physics Theory', '2026-02-02 02:13:16', '2026-02-12 15:44:46'),
(5, 1, 1, 1, 7, 5, 1, 104, 1, 'Chemistry', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(6, 1, 1, 1, 9, 6, 1, 104, 1, 'Biology last period', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(7, 1, 1, 2, 1, 3, 1, 102, 1, 'Math warm-up', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(8, 1, 1, 2, 2, 4, 1, 103, 1, 'Physics', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(9, 1, 1, 2, 4, 6, 1, 104, 1, 'Biology Lab', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(10, 1, 1, 2, 5, 2, 1, 101, 1, 'English 2nd paper', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(11, 1, 1, 2, 7, 1, 1, 101, 1, 'Bangla Literature', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(12, 1, 2, 3, 1, 2, 1, 101, 1, 'English for 9B', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(13, 1, 2, 3, 2, 1, 1, 101, 1, 'Bangla', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(14, 1, 2, 3, 4, 5, 1, 104, 1, 'Chemistry Practical', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(15, 1, 2, 3, 5, 3, 1, 102, 1, 'Higher Math', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(16, 1, 2, 3, 7, 4, 1, 103, 1, 'Physics Numericals', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(17, 1, 1, 4, 1, 6, 1, 104, 1, 'Biology Diagrams', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(18, 1, 1, 4, 2, 3, 1, 102, 1, 'Math Test Preparation', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(19, 1, 1, 4, 4, 2, 1, 101, 1, 'English Comprehension', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(20, 1, 1, 4, 5, 1, 1, 101, 1, 'Bangla Composition', '2026-02-02 02:13:16', '2026-02-12 15:45:00'),
(21, 1, 1, 4, 7, 4, 1, 103, 1, 'Physics Revision', '2026-02-02 02:13:16', '2026-02-12 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Nayan', 'wsnayan6@gmail.com', NULL, 'uploads/user/1767454358.jpg', NULL, '$2y$12$Vi7lqBOz/JnKV48O3ByVvue7jIrCAW5RrQM8mkUmOyBHfd1X4JFdG', 'dcozJys77o4hKlWgdV3mhlHUsRWFVnFmC7WZ1dj2REmIRvJ6friKjtk8D4ua', '2025-12-22 10:45:21', '2026-01-03 09:32:38', 'admin'),
(2, 'sumaiya', 'sumaiya@gmail.com', '01621881846', NULL, NULL, '$2y$12$DtSmtbLCg2FhKbgFf3M6HuPeio92lm8ZnRqbsGDm5xBsYytnVH2R2', NULL, '2025-12-30 11:05:02', '2025-12-30 21:47:19', 'admin'),
(3, 'Ripon', 'ripon@gmail.com', NULL, NULL, NULL, '$2y$12$YGSNOp15IG2T.7zW9ZwOrOLLQIb3U/TVySFgzgzXmRA3SK6oSB4EG', NULL, '2025-12-30 11:14:07', '2025-12-30 21:47:39', 'student'),
(4, 'Foysal', 'foysal@gmail.com', NULL, NULL, NULL, '$2y$12$Zyb1MgNragvrEWeN/XkV.O8ksDYMMJAhjZn1eBspzO63O52AcNWc6', NULL, '2025-12-30 11:16:04', '2025-12-30 11:16:04', 'teacher'),
(6, 'jerin', 'jerin@gmail.com', NULL, 'uploads/user/1767202598.png', NULL, '$2y$12$HlEELBnmIX34mtI52.x/a.AU1EOou6QaXUY/E6jY3mc39ODv.bYaa', NULL, '2025-12-31 10:49:10', '2026-01-05 09:28:34', 'student'),
(7, 'hasan', 'hasan@gmail.com', NULL, 'uploads/user/1767202081.png', NULL, '$2y$12$3Cb6sS1GPMcwCu8ZYq70COPjt0jstkaZZaRHLgb/n1yLtWoinW2Du', NULL, '2025-12-31 11:04:19', '2025-12-31 11:28:01', 'student'),
(12, 'Md kamal khan', 'kamal@gmail.com', '01930502915', NULL, NULL, '$2y$12$ZwAnirnHqGjFqzxncTKeFe1j4Il4GT.u.V/RNtVqafkCvOhP0cw0i', NULL, '2026-01-06 11:54:43', '2026-01-06 11:54:43', 'teacher'),
(14, 'MD NAYAN', 'wsnayan8@gmail.com', '01621881846', NULL, NULL, '$2y$12$hN.4GxcLKSCNuXthPBY2eeC8W9.bN/IfHGulrW.s80UngjdE86F8W', NULL, '2026-01-18 21:48:00', '2026-01-18 21:48:00', 'teacher'),
(15, 'pagorr', 'pagol@gmail.com', '01930502915', NULL, NULL, '$2y$12$Lrny4Y0AKP0USdTgvKEse.juL60teWQoMarw1v.angGFfoSrT.VBe', NULL, '2026-01-18 21:53:41', '2026-01-18 21:53:41', 'teacher'),
(16, 'new teacher', 'new@gmail.com', '01621881846', NULL, NULL, '$2y$12$fH5N/dRPUUJJUzRLN/SQmOLCyq5G/zcWPXr4qPT.1iYnPIHOJ6lse', NULL, '2026-01-19 18:53:53', '2026-01-19 18:53:53', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `day_name` varchar(20) NOT NULL,
  `day_bn` varchar(20) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `is_working_day` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `day_name`, `day_bn`, `short_name`, `is_working_day`) VALUES
(1, 'Sunday', 'রবিবার', 'Sun', 1),
(2, 'Monday', 'সোমবার', 'Mon', 1),
(3, 'Tuesday', 'মঙ্গলবার', 'Tue', 1),
(4, 'Wednesday', 'বুধবার', 'Wed', 1),
(5, 'Thursday', 'বৃহস্পতিবার', 'Thu', 1),
(6, 'Friday', 'শুক্রবার', 'Fri', 0),
(7, 'Saturday', 'শনিবার', 'Sat', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_categories`
--
ALTER TABLE `account_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_student_id_attendance_date_subject_id_unique` (`student_id`,`attendance_date`,`subject_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blood_groups_name_unique` (`name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_class_code_unique` (`class_code`),
  ADD KEY `idx_class_search` (`class_numeric`,`section`,`shift`,`status`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_class_section_year` (`class_id`,`section_id`,`academic_year`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_slug` (`slug`),
  ADD KEY `idx_is_active` (`is_active`),
  ADD KEY `idx_head_teacher_id` (`tag_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_student_month` (`student_id`,`month_year`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guardians_national_id_unique` (`national_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marks_student_id_exam_id_subject_id_unique` (`student_id`,`exam_id`,`subject_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_settings`
--
ALTER TABLE `organization_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_period_time` (`period_number`,`start_time`,`end_time`),
  ADD KEY `idx_period_number` (`period_number`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salaries_employee` (`employee_id`);

--
-- Indexes for table `school_committees`
--
ALTER TABLE `school_committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_db`
--
ALTER TABLE `school_db`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_code_unique` (`subject_code`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tag_types`
--
ALTER TABLE `tag_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_employee_id` (`employee_id`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_employment_type` (`employment_type`);

--
-- Indexes for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_unique_assignment` (`academic_year_id`,`class_id`,`day_of_week`,`period_id`),
  ADD KEY `idx_class_day_period` (`class_id`,`day_of_week`,`period_id`),
  ADD KEY `idx_teacher_day_period` (`teacher_id`,`day_of_week`,`period_id`),
  ADD KEY `idx_day_period` (`day_of_week`,`period_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day_name` (`day_name`),
  ADD UNIQUE KEY `day_bn` (`day_bn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `account_categories`
--
ALTER TABLE `account_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_settings`
--
ALTER TABLE `organization_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_committees`
--
ALTER TABLE `school_committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_db`
--
ALTER TABLE `school_db`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag_types`
--
ALTER TABLE `tag_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_attendances`
--
ALTER TABLE `teacher_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `fk_salaries_employee` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
