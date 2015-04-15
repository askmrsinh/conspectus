-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 11:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `00ashesh_2015_teitc601_se`
--

CREATE TABLE IF NOT EXISTS `00ashesh_2015_teitc601_se` (
  `m_id` int(2) DEFAULT NULL,
  `sm_id` int(2) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `sm_name` varchar(255) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `00ashesh_2015_teitc601_se`
--

INSERT INTO `00ashesh_2015_teitc601_se` (`m_id`, `sm_id`, `m_name`, `sm_name`, `hours`, `satrt_date`, `end_date`) VALUES
(1, NULL, 'Introduction to Software Engineering', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Professional Software Development', NULL, NULL, NULL),
(NULL, 2, NULL, 'Layered Technology', NULL, NULL, NULL),
(NULL, 3, NULL, 'Process framework', NULL, NULL, NULL),
(NULL, 4, NULL, 'CMM', NULL, NULL, NULL),
(NULL, 5, NULL, 'Process Patterns and Assessment', NULL, NULL, NULL),
(2, NULL, 'Process Models', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Prescriptive Models : Waterfall Model', NULL, NULL, NULL),
(NULL, 2, NULL, 'Incremental Model', NULL, NULL, NULL),
(NULL, 3, NULL, 'RAD Models', NULL, NULL, NULL),
(NULL, 4, NULL, 'Evolutionary Process Models : Prototyping', NULL, NULL, NULL),
(NULL, 5, NULL, 'Evolutionary Process Models : Spiral', NULL, NULL, NULL),
(NULL, 6, NULL, 'Evolutionary Process Models : Concurrent Development Model', NULL, NULL, NULL),
(NULL, 7, NULL, 'Specialized Models: Component based', NULL, NULL, NULL),
(NULL, 8, NULL, 'Specialized Models: Aspect Oriented development', NULL, NULL, NULL),
(3, NULL, 'Agile Software Development', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Agile Process and Process Models', NULL, NULL, NULL),
(NULL, 2, NULL, 'Adaptive and Dynamic system Development', NULL, NULL, NULL),
(NULL, 3, NULL, 'Scrum', NULL, NULL, NULL),
(NULL, 4, NULL, 'Feature Driven Development and Agile Modeling', NULL, NULL, NULL),
(4, NULL, 'Engineering and Modeling Practices', NULL, 4, NULL, NULL),
(NULL, 1, NULL, 'Core Principles', NULL, NULL, NULL),
(NULL, 2, NULL, 'Communication', NULL, NULL, NULL),
(NULL, 3, NULL, 'Planning', NULL, NULL, NULL),
(NULL, 4, NULL, 'Modeling', NULL, NULL, NULL),
(NULL, 5, NULL, 'Construction and deployment', NULL, NULL, NULL),
(NULL, 6, NULL, 'System Modeling and UML', NULL, NULL, NULL),
(5, NULL, 'Requirements Engineering and Analysis Model', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Requirements Engineering Tasks', NULL, NULL, NULL),
(NULL, 2, NULL, 'Elicitation', NULL, NULL, NULL),
(NULL, 3, NULL, 'building analysis model', NULL, NULL, NULL),
(NULL, 4, NULL, 'Data Modeling concepts', NULL, NULL, NULL),
(NULL, 5, NULL, 'Object Oriented Analysis', NULL, NULL, NULL),
(6, NULL, 'Design Engineering', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Design Concepts', NULL, NULL, NULL),
(NULL, 2, NULL, 'Design Model : Data', NULL, NULL, NULL),
(NULL, 3, NULL, 'Design Model : Architecture', NULL, NULL, NULL),
(NULL, 4, NULL, 'Design Model : Interface', NULL, NULL, NULL),
(NULL, 5, NULL, 'Design Model : Component Level and Deployment Level design elements', NULL, NULL, NULL),
(7, NULL, 'Testing strategies and tactics', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Testing strategies for conventional and Object Oriented architectures', NULL, NULL, NULL),
(NULL, 2, NULL, 'Validation and system testing', NULL, NULL, NULL),
(NULL, 3, NULL, 'Software testing fundamentals', NULL, NULL, NULL),
(NULL, 4, NULL, 'Black box and white box testing', NULL, NULL, NULL),
(NULL, 5, NULL, 'Object Oriented testing methods', NULL, NULL, NULL),
(8, NULL, 'Metrics for Process and Projects', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Process Metrics and Project Metrics', NULL, NULL, NULL),
(NULL, 2, NULL, 'Software Measurement', NULL, NULL, NULL),
(NULL, 3, NULL, 'Object Oriented Metrics', NULL, NULL, NULL),
(NULL, 4, NULL, 'Software Project Estimation', NULL, NULL, NULL),
(NULL, 5, NULL, 'Decomposition Techniques', NULL, NULL, NULL),
(NULL, 6, NULL, 'LOC based', NULL, NULL, NULL),
(NULL, 7, NULL, 'FP based and Use case based estimations', NULL, NULL, NULL),
(NULL, 8, NULL, 'Empirical estimation Models', NULL, NULL, NULL),
(9, NULL, 'Risk Management', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Risk strategies', NULL, NULL, NULL),
(NULL, 2, NULL, 'Software risks', NULL, NULL, NULL),
(NULL, 3, NULL, 'Risk Identification', NULL, NULL, NULL),
(NULL, 4, NULL, 'Projection', NULL, NULL, NULL),
(NULL, 5, NULL, 'RMMM', NULL, NULL, NULL),
(10, NULL, 'Quality Management', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Quality Concepts', NULL, NULL, NULL),
(NULL, 2, NULL, 'SQA activities', NULL, NULL, NULL),
(NULL, 3, NULL, 'Software reviews', NULL, NULL, NULL),
(NULL, 4, NULL, 'FTR', NULL, NULL, NULL),
(NULL, 5, NULL, 'Software reliability and measures', NULL, NULL, NULL),
(NULL, 6, NULL, 'SQA Plan', NULL, NULL, NULL),
(11, NULL, 'Change Management', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Software Configuration Management', NULL, NULL, NULL),
(NULL, 2, NULL, 'Elements of SCM', NULL, NULL, NULL),
(NULL, 3, NULL, 'SCM Process', NULL, NULL, NULL),
(NULL, 4, NULL, 'Change Control', NULL, NULL, NULL),
(1, NULL, 'Introduction to Software Engineering', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Professional Software Development', NULL, NULL, NULL),
(NULL, 2, NULL, 'Layered Technology', NULL, NULL, NULL),
(NULL, 3, NULL, 'Process framework', NULL, NULL, NULL),
(NULL, 4, NULL, 'CMM', NULL, NULL, NULL),
(NULL, 5, NULL, 'Process Patterns and Assessment', NULL, NULL, NULL),
(2, NULL, 'Process Models', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Prescriptive Models : Waterfall Model', NULL, NULL, NULL),
(NULL, 2, NULL, 'Incremental Model', NULL, NULL, NULL),
(NULL, 3, NULL, 'RAD Models', NULL, NULL, NULL),
(NULL, 4, NULL, 'Evolutionary Process Models : Prototyping', NULL, NULL, NULL),
(NULL, 5, NULL, 'Evolutionary Process Models : Spiral', NULL, NULL, NULL),
(NULL, 6, NULL, 'Evolutionary Process Models : Concurrent Development Model', NULL, NULL, NULL),
(NULL, 7, NULL, 'Specialized Models: Component based', NULL, NULL, NULL),
(NULL, 8, NULL, 'Specialized Models: Aspect Oriented development', NULL, NULL, NULL),
(3, NULL, 'Agile Software Development', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Agile Process and Process Models', NULL, NULL, NULL),
(NULL, 2, NULL, 'Adaptive and Dynamic system Development', NULL, NULL, NULL),
(NULL, 3, NULL, 'Scrum', NULL, NULL, NULL),
(NULL, 4, NULL, 'Feature Driven Development and Agile Modeling', NULL, NULL, NULL),
(4, NULL, 'Engineering and Modeling Practices', NULL, 4, NULL, NULL),
(NULL, 1, NULL, 'Core Principles', NULL, NULL, NULL),
(NULL, 2, NULL, 'Communication', NULL, NULL, NULL),
(NULL, 3, NULL, 'Planning', NULL, NULL, NULL),
(NULL, 4, NULL, 'Modeling', NULL, NULL, NULL),
(NULL, 5, NULL, 'Construction and deployment', NULL, NULL, NULL),
(NULL, 6, NULL, 'System Modeling and UML', NULL, NULL, NULL),
(5, NULL, 'Requirements Engineering and Analysis Model', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Requirements Engineering Tasks', NULL, NULL, NULL),
(NULL, 2, NULL, 'Elicitation', NULL, NULL, NULL),
(NULL, 3, NULL, 'building analysis model', NULL, NULL, NULL),
(NULL, 4, NULL, 'Data Modeling concepts', NULL, NULL, NULL),
(NULL, 5, NULL, 'Object Oriented Analysis', NULL, NULL, NULL),
(6, NULL, 'Design Engineering', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Design Concepts', NULL, NULL, NULL),
(NULL, 2, NULL, 'Design Model : Data', NULL, NULL, NULL),
(NULL, 3, NULL, 'Design Model : Architecture', NULL, NULL, NULL),
(NULL, 4, NULL, 'Design Model : Interface', NULL, NULL, NULL),
(NULL, 5, NULL, 'Design Model : Component Level and Deployment Level design elements', NULL, NULL, NULL),
(7, NULL, 'Testing strategies and tactics', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Testing strategies for conventional and Object Oriented architectures', NULL, NULL, NULL),
(NULL, 2, NULL, 'Validation and system testing', NULL, NULL, NULL),
(NULL, 3, NULL, 'Software testing fundamentals', NULL, NULL, NULL),
(NULL, 4, NULL, 'Black box and white box testing', NULL, NULL, NULL),
(NULL, 5, NULL, 'Object Oriented testing methods', NULL, NULL, NULL),
(8, NULL, 'Metrics for Process and Projects', NULL, 6, NULL, NULL),
(NULL, 1, NULL, 'Process Metrics and Project Metrics', NULL, NULL, NULL),
(NULL, 2, NULL, 'Software Measurement', NULL, NULL, NULL),
(NULL, 3, NULL, 'Object Oriented Metrics', NULL, NULL, NULL),
(NULL, 4, NULL, 'Software Project Estimation', NULL, NULL, NULL),
(NULL, 5, NULL, 'Decomposition Techniques', NULL, NULL, NULL),
(NULL, 6, NULL, 'LOC based', NULL, NULL, NULL),
(NULL, 7, NULL, 'FP based and Use case based estimations', NULL, NULL, NULL),
(NULL, 8, NULL, 'Empirical estimation Models', NULL, NULL, NULL),
(9, NULL, 'Risk Management', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Risk strategies', NULL, NULL, NULL),
(NULL, 2, NULL, 'Software risks', NULL, NULL, NULL),
(NULL, 3, NULL, 'Risk Identification', NULL, NULL, NULL),
(NULL, 4, NULL, 'Projection', NULL, NULL, NULL),
(NULL, 5, NULL, 'RMMM', NULL, NULL, NULL),
(10, NULL, 'Quality Management', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Quality Concepts', NULL, NULL, NULL),
(NULL, 2, NULL, 'SQA activities', NULL, NULL, NULL),
(NULL, 3, NULL, 'Software reviews', NULL, NULL, NULL),
(NULL, 4, NULL, 'FTR', NULL, NULL, NULL),
(NULL, 5, NULL, 'Software reliability and measures', NULL, NULL, NULL),
(NULL, 6, NULL, 'SQA Plan', NULL, NULL, NULL),
(11, NULL, 'Change Management', NULL, 3, NULL, NULL),
(NULL, 1, NULL, 'Software Configuration Management', NULL, NULL, NULL),
(NULL, 2, NULL, 'Elements of SCM', NULL, NULL, NULL),
(NULL, 3, NULL, 'SCM Process', NULL, NULL, NULL),
(NULL, 4, NULL, 'Change Control', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
