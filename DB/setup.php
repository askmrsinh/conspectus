<!-- THIS FILE CREATES THE MINIMAL DATABASE REQUIRED FOR CONSPECTUS TO WORK -->

<!-- Make sure a username "root" with password "root" already exists -->
<!-- Alternatively you may change the username and password in each of the PHP files -->


<!-- connect to MySQL -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$connection = mysqli_connect($db_host, $db_user, $db_pass) or die("database conncetion Failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

//create and select the "project_se" database
$sql = "CREATE DATABASE IF NOT EXISTS `project_se`";
$result = mysqli_query($connection, $sql) or die("database creation Failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");;

mysqli_select_db($connection, 'project_se');
?>

<?php
//-- --------------------------------------------------------
//  --
//  -- Table structure for table `accounts`
//  --
$sql = "CREATE TABLE IF NOT EXISTS `accounts` (";
$sql .= "`Username` varchar(24) NOT NULL PRIMARY KEY,";
$sql .= "`Password` char(60) NOT NULL,";
$sql .= "`Fullname` varchar(36) NOT NULL UNIQUE KEY";
$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$create_accounts_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
//-- --------------------------------------------------------


//-- --------------------------------------------------------
//  --
//  -- Table structure for table `courses`
//  --
$sql = "CREATE TABLE IF NOT EXISTS `courses` (";
$sql .= "`course_id` varchar(24) NOT NULL PRIMARY KEY,";
$sql .= "`course_name` varchar(255) NOT NULL,";
$sql .= "`engineering_year` varchar(4) NOT NULL,";
$sql .= "`discipline` varchar(255) NOT NULL,";
$sql .= "`semester` int(1) NOT NULL";
$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$create_courses_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

//  --
//  -- Dumping data for table `courses`
//  --
$sql = "INSERT INTO `courses` (`course_id`, `course_name`, `engineering_year`, `discipline`, `semester`) VALUES";
$sql .= "('teitc502_os', 'Operating System', 'T.E.', 'Information Technology', 5),";
$sql .= "('teitc601_se', 'Software Engineering', 'T.E.', 'Information Technology', 6);";
$insert_course_tabel_result = mysqli_query($connection, $sql) or die("INSERT database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
//-- --------------------------------------------------------


//-- --------------------------------------------------------
//  --
//  -- Table structure for table `dashboard`
//  --
$sql = "CREATE TABLE IF NOT EXISTS `dashboard` (";
$sql .= "`year` int(4) DEFAULT NULL,";
$sql .= "`Username` varchar(24) NOT NULL,";
$sql .= "`course_thought` varchar(24) NOT NULL,";
$sql .= "`course_table_id` varchar(255) NOT NULL PRIMARY KEY";
$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$create_dashboard_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
//-- --------------------------------------------------------
?>



<?php
//-- --------------------------------------------------------


//  --
//  -- Table structure for table `teitc502_os`
//  --
$sql = "CREATE TABLE IF NOT EXISTS `teitc502_os` (";
$sql .= "`m_id` int(2) DEFAULT NULL,";
$sql .= "`sm_id` int(2) DEFAULT NULL,";
$sql .= "`m_name` varchar(255) DEFAULT NULL,";
$sql .= "`sm_name` varchar(255) DEFAULT NULL,";
$sql .= "`hours` int(11) DEFAULT NULL";
$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$create_teitc502_os_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

//  --
//  -- Dumping data for table `teitc502_os`
//  --
$sql = "INSERT INTO `teitc502_os` (`m_id`, `sm_id`, `m_name`, `sm_name`, `hours`) VALUES";
$sql .= "(1, NULL, 'Overview of Operating system', NULL, 4),";
$sql .= "(NULL, 1, NULL, 'Overview of Operating system objectives and functions', NULL),";
$sql .= "(NULL, 2, NULL, 'Evolution of OS', NULL),";
$sql .= "(NULL, 3, NULL, 'Characteristics of modern OS', NULL),";
$sql .= "(NULL, 4, NULL, 'Basic concepts: Processes', NULL),";
$sql .= "(NULL, 5, NULL, 'System calls', NULL),";
$sql .= "(NULL, 6, NULL, 'Shell', NULL),";
$sql .= "(NULL, 7, NULL, 'Kernel architectures: Monolithic', NULL),";
$sql .= "(NULL, 8, NULL, 'Micro-kernel', NULL),";
$sql .= "(NULL, 9, NULL, 'Layered', NULL),";
$sql .= "(NULL, 10, NULL, 'Kernel mode of operations', NULL),";
$sql .= "(2, NULL, 'Process Management', NULL, 10),";
$sql .= "(NULL, 1, NULL, 'Process', NULL),";
$sql .= "(NULL, 2, NULL, 'Process States', NULL),";
$sql .= "(NULL, 3, NULL, 'Process Control Block (PCB),', NULL),";
$sql .= "(NULL, 4, NULL, 'Threads', NULL),";
$sql .= "(NULL, 5, NULL, 'Thread management', NULL),";
$sql .= "(NULL, 6, NULL, 'Process Scheduling: Types', NULL),";
$sql .= "(NULL, 7, NULL, 'Comparison of different scheduling policies', NULL),";
$sql .= "(3, NULL, 'Process Co-ordination', NULL, 10),";
$sql .= "(NULL, 1, NULL, 'Principles of Concurrency', NULL),";
$sql .= "(NULL, 2, NULL, 'Race condition and critical section', NULL),";
$sql .= "(NULL, 3, NULL, 'Mutual Exclusion- Hardware and Software approaches', NULL),";
$sql .= "(NULL, 4, NULL, 'Semaphores', NULL),";
$sql .= "(NULL, 5, NULL, 'Monitors', NULL),";
$sql .= "(NULL, 6, NULL, 'Message Passing', NULL),";
$sql .= "(NULL, 7, NULL, 'Producer Consumer Problem', NULL),";
$sql .= "(NULL, 8, NULL, 'Deadlock: Principles of Deadlock', NULL),";
$sql .= "(NULL, 9, NULL, 'Deadlock Detection', NULL),";
$sql .= "(NULL, 10, NULL, 'Deadlock Avoidance', NULL),";
$sql .= "(NULL, 11, NULL, 'Deadlock Prevention', NULL),";
$sql .= "(4, NULL, 'Memory Management', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Memory Management Requirements', NULL),";
$sql .= "(NULL, 2, NULL, 'Memory Partitioning', NULL),";
$sql .= "(NULL, 3, NULL, 'Virtual memory: Paging', NULL),";
$sql .= "(NULL, 4, NULL, 'Segmentation', NULL),";
$sql .= "(NULL, 5, NULL, 'Page replacement policies', NULL),";
$sql .= "(NULL, 6, NULL, 'Page faults', NULL),";
$sql .= "(5, NULL, 'Input Output Management', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'I/O Devices', NULL),";
$sql .= "(NULL, 2, NULL, 'Organization of the I/O Function', NULL),";
$sql .= "(NULL, 3, NULL, 'Operating System Design Issues', NULL),";
$sql .= "(NULL, 4, NULL, 'I/O Buffering', NULL),";
$sql .= "(NULL, 5, NULL, 'Disk Scheduling and disk scheduling algorithms', NULL),";
$sql .= "(NULL, 6, NULL, 'Disk cache', NULL),";
$sql .= "(6, NULL, 'File Management', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Overview', NULL),";
$sql .= "(NULL, 2, NULL, 'File Organization', NULL),";
$sql .= "(NULL, 3, NULL, 'File Sharing', NULL),";
$sql .= "(NULL, 4, NULL, 'Record Blocking', NULL),";
$sql .= "(NULL, 5, NULL, 'Secondary Storage Management', NULL),";
$sql .= "(7, NULL, 'Case Studies', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Producer Consumer Problem', NULL),";
$sql .= "(NULL, 2, NULL, 'Multithreading', NULL),";
$sql .= "(NULL, 3, NULL, 'RAID', NULL),";
$sql .= "(NULL, 4, NULL, 'File systems of Windows and Linux', NULL),";
$sql .= "(NULL, 5, NULL, 'Overview of Android OS', NULL);";
$insert_teitc502_os_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");


//  --
//  -- Table structure for table `teitc601_se`
//  --
$sql = "CREATE TABLE IF NOT EXISTS `teitc601_se` (";
$sql .= "`m_id` int(2) DEFAULT NULL,";
$sql .= "`sm_id` int(2) DEFAULT NULL,";
$sql .= "`m_name` varchar(255) DEFAULT NULL,";
$sql .= "`sm_name` varchar(255) DEFAULT NULL,";
$sql .= "`hours` int(11) DEFAULT NULL";
$sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$create_teitc601_se_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

//  --
//  -- Dumping data for table `teitc601_se`
//  --
$sql = "INSERT INTO `teitc601_se` (`m_id`, `sm_id`, `m_name`, `sm_name`, `hours`) VALUES";
$sql .= "(1, NULL, 'Introduction to Software Engineering', NULL, 3),";
$sql .= "(NULL, 1, NULL, 'Professional Software Development', NULL),";
$sql .= "(NULL, 2, NULL, 'Layered Technology', NULL),";
$sql .= "(NULL, 3, NULL, 'Process framework', NULL),";
$sql .= "(NULL, 4, NULL, 'CMM', NULL),";
$sql .= "(NULL, 5, NULL, 'Process Patterns and Assessment', NULL),";
$sql .= "(2, NULL, 'Process Models', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Prescriptive Models : Waterfall Model', NULL),";
$sql .= "(NULL, 2, NULL, 'Incremental Model', NULL),";
$sql .= "(NULL, 3, NULL, 'RAD Models', NULL),";
$sql .= "(NULL, 4, NULL, 'Evolutionary Process Models : Prototyping', NULL),";
$sql .= "(NULL, 5, NULL, 'Evolutionary Process Models : Spiral', NULL),";
$sql .= "(NULL, 6, NULL, 'Evolutionary Process Models : Concurrent Development Model', NULL),";
$sql .= "(NULL, 7, NULL, 'Specialized Models: Component based', NULL),";
$sql .= "(NULL, 8, NULL, 'Specialized Models: Aspect Oriented development', NULL),";
$sql .= "(3, NULL, 'Agile Software Development', NULL, 3),";
$sql .= "(NULL, 1, NULL, 'Agile Process and Process Models', NULL),";
$sql .= "(NULL, 2, NULL, 'Adaptive and Dynamic system Development', NULL),";
$sql .= "(NULL, 3, NULL, 'Scrum', NULL),";
$sql .= "(NULL, 4, NULL, 'Feature Driven Development and Agile Modeling', NULL),";
$sql .= "(4, NULL, 'Engineering and Modeling Practices', NULL, 4),";
$sql .= "(NULL, 1, NULL, 'Core Principles', NULL),";
$sql .= "(NULL, 2, NULL, 'Communication', NULL),";
$sql .= "(NULL, 3, NULL, 'Planning', NULL),";
$sql .= "(NULL, 4, NULL, 'Modeling', NULL),";
$sql .= "(NULL, 5, NULL, 'Construction and deployment', NULL),";
$sql .= "(NULL, 6, NULL, 'System Modeling and UML', NULL),";
$sql .= "(5, NULL, 'Requirements Engineering and Analysis Model', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Requirements Engineering Tasks', NULL),";
$sql .= "(NULL, 2, NULL, 'Elicitation', NULL),";
$sql .= "(NULL, 3, NULL, 'building analysis model', NULL),";
$sql .= "(NULL, 4, NULL, 'Data Modeling concepts', NULL),";
$sql .= "(NULL, 5, NULL, 'Object Oriented Analysis', NULL),";
$sql .= "(6, NULL, 'Design Engineering', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Design Concepts', NULL),";
$sql .= "(NULL, 2, NULL, 'Design Model : Data', NULL),";
$sql .= "(NULL, 3, NULL, 'Design Model : Architecture', NULL),";
$sql .= "(NULL, 4, NULL, 'Design Model : Interface', NULL),";
$sql .= "(NULL, 5, NULL, 'Design Model : Component Level and Deployment Level design elements', NULL),";
$sql .= "(7, NULL, 'Testing strategies and tactics', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Testing strategies for conventional and Object Oriented architectures', NULL),";
$sql .= "(NULL, 2, NULL, 'Validation and system testing', NULL),";
$sql .= "(NULL, 3, NULL, 'Software testing fundamentals', NULL),";
$sql .= "(NULL, 4, NULL, 'Black box and white box testing', NULL),";
$sql .= "(NULL, 5, NULL, 'Object Oriented testing methods', NULL),";
$sql .= "(8, NULL, 'Metrics for Process and Projects', NULL, 6),";
$sql .= "(NULL, 1, NULL, 'Process Metrics and Project Metrics', NULL),";
$sql .= "(NULL, 2, NULL, 'Software Measurement', NULL),";
$sql .= "(NULL, 3, NULL, 'Object Oriented Metrics', NULL),";
$sql .= "(NULL, 4, NULL, 'Software Project Estimation', NULL),";
$sql .= "(NULL, 5, NULL, 'Decomposition Techniques', NULL),";
$sql .= "(NULL, 6, NULL, 'LOC based', NULL),";
$sql .= "(NULL, 7, NULL, 'FP based and Use case based estimations', NULL),";
$sql .= "(NULL, 8, NULL, 'Empirical estimation Models', NULL),";
$sql .= "(9, NULL, 'Risk Management', NULL, 3),";
$sql .= "(NULL, 1, NULL, 'Risk strategies', NULL),";
$sql .= "(NULL, 2, NULL, 'Software risks', NULL),";
$sql .= "(NULL, 3, NULL, 'Risk Identification', NULL),";
$sql .= "(NULL, 4, NULL, 'Projection', NULL),";
$sql .= "(NULL, 5, NULL, 'RMMM', NULL),";
$sql .= "(10, NULL, 'Quality Management', NULL, 3),";
$sql .= "(NULL, 1, NULL, 'Quality Concepts', NULL),";
$sql .= "(NULL, 2, NULL, 'SQA activities', NULL),";
$sql .= "(NULL, 3, NULL, 'Software reviews', NULL),";
$sql .= "(NULL, 4, NULL, 'FTR', NULL),";
$sql .= "(NULL, 5, NULL, 'Software reliability and measures', NULL),";
$sql .= "(NULL, 6, NULL, 'SQA Plan', NULL),";
$sql .= "(11, NULL, 'Change Management', NULL, 3),";
$sql .= "(NULL, 1, NULL, 'Software Configuration Management', NULL),";
$sql .= "(NULL, 2, NULL, 'Elements of SCM', NULL),";
$sql .= "(NULL, 3, NULL, 'SCM Process', NULL),";
$sql .= "(NULL, 4, NULL, 'Change Control', NULL);";
$insert_teitc601_se_tabel_result = mysqli_query($connection, $sql) or die("CREATE database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
//-- --------------------------------------------------------


header("Location: ../login.php");//redirect to login page
?>
