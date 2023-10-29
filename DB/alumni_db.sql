-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 06:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnus_bio`
--

CREATE TABLE `alumnus_bio` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `batch` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `connected_to` text NOT NULL,
  `avatar` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= Unverified, 1= Verified',
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnus_bio`
--

INSERT INTO `alumnus_bio` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `batch`, `course_id`, `email`, `connected_to`, `avatar`, `status`, `date_created`) VALUES
(3, 'R', 'H', 'S', 'Male', 41, 1, 'rakhibulhasan98@gmail.com', 'iit', '1698576120_IMG_20230707_173427_783.jpg', 1, '2023-08-24'),
(4, 'Amina', 'Khatun', 'Boby', 'Female', 41, 4, 'aminaboby@gmail.com', 'IIT', '1698576060_boby.jpg', 1, '2023-09-09'),
(5, 'Tandra', ' ', 'Biswas', 'Female', 39, 4, 'tandra@juniv.edu', 'IIT', '1698583680_WhatsApp Image 2023-10-29 at 5.53.58 PM.jpeg', 1, '2023-09-17'),
(6, 'Sadia', 'Afrin', 'Riva', 'Female', 44, 4, 'riva@juniv.edu', 'Enfosis', '1698583560_WhatsApp Image 2023-10-29 at 5.55.13 PM.jpeg', 1, '2023-09-17'),
(7, 'nayon', ' ', 'karmoker', 'Male', 40, 4, 'nayonkarmoker3@gmail.com', 'IIT', '1694983140_istockphoto-1142213046-612x612.jpg', 0, '2023-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(30) NOT NULL,
  `company` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `job_title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `company`, `location`, `job_title`, `description`, `user_id`, `date_created`) VALUES
(1, 'IT Company', 'Home-Based', 'Web Developer', '&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. In tellus integer feugiat scelerisque varius morbi enim. Orci eu lobortis elementum nibh tellus molestie nunc. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum. Eleifend donec pretium vulputate sapien nec. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Quam adipiscing vitae proin sagittis nisl rhoncus. Sed viverra ipsum nunc aliquet bibendum. Enim ut sem viverra aliquet eget sit amet tellus. Integer feugiat scelerisque varius morbi enim nunc faucibus.&lt;/p&gt;&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Viverra justo nec ultrices dui. Leo vel orci porta non pulvinar neque laoreet. Id semper risus in hendrerit gravida rutrum quisque non tellus. Sit amet consectetur adipiscing elit ut. Id neque aliquam vestibulum morbi blandit cursus risus. Tristique senectus et netus et malesuada. Amet aliquam id diam maecenas ultricies mi eget mauris. Morbi tristique senectus et netus et malesuada. Diam phasellus vestibulum lorem sed risus. Tempor orci dapibus ultrices in. Mi sit amet mauris commodo quis imperdiet. Quisque sagittis purus sit amet volutpat. Vehicula ipsum a arcu cursus. Ornare quam viverra orci sagittis eu volutpat odio facilisis. Id volutpat lacus laoreet non curabitur. Cursus euismod quis viverra nibh cras pulvinar mattis nunc. Id aliquet lectus proin nibh nisl condimentum id venenatis. Eget nulla facilisi etiam dignissim diam quis enim lobortis. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet.&lt;/p&gt;', 3, '2020-10-15 14:14:27'),
(2, 'EnfosisIT', 'Dhaka, Bangladesh', 'Senior software developer', '&lt;p style=&quot;margin-top: 1.5em; margin-bottom: 1.5em; margin-right: unset; margin-left: unset; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;&lt;font color=&quot;#444444&quot; face=&quot;Open Sans, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;We are looking for a skilled software engineer who, along with our excellent software development team, will be responsible for working on projects that are currently being developed on by our company. Duties will include but are not limited to developing and directing software system validation and testing methods, as well as directing our software programming initiatives. You will also be working closely with clients and cross-functional departments to communicate project statuses and proposals.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 1.5em; margin-bottom: 1.5em; margin-right: unset; margin-left: unset; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;&lt;font color=&quot;#444444&quot; face=&quot;Open Sans, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px;&quot;&gt;A bachelor&amp;#x2019;s degree in computer science, software engineering, or another related field is required. You will also need at least five to seven years of software engineering or software development experience, preferably in a related field to be successful in this role.&lt;/span&gt;&lt;/font&gt;&lt;br&gt;&lt;/p&gt;', 1, '2020-10-15 15:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `about`) VALUES
(1, 'CSE', ''),
(3, 'PHYSICS', ''),
(4, 'IIT', ''),
(5, 'MATH', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `schedule` datetime NOT NULL,
  `banner` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `schedule`, `banner`, `date_created`) VALUES
(1, 'Get Together', '&lt;p style=&quot;margin-bottom: 15px;&quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; padding:=&quot;&quot; 0px;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;A get together is a small, casual gathering, usually designed for a group of friends who are all comfortable with each other. This differs from an event like a party, which may include a large mixed group, or a dinner, which is a formal event with a guest list which can vary considerably in size and composition. Many people enjoy attending or organizing get togethers, viewing them as an important part of their social lives.&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;margin-bottom: 15px;&quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; padding:=&quot;&quot; 0px;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt;We Hope to meet at Shahid Minar,JU in this special day.&lt;/p&gt;', '2023-10-29 18:00:00', '1698575880_ju.jpg', '2020-10-16 09:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `event_commits`
--

CREATE TABLE `event_commits` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_commits`
--

INSERT INTO `event_commits` (`id`, `event_id`, `user_id`) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 1, 4),
(4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `about` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `about`, `created`) VALUES
(6, 'Success comes at a cost', '2023-09-09 14:33:25'),
(7, 'Chancellor and vice-chancellor', '2023-09-09 14:33:37'),
(8, 'All togather', '2023-09-09 14:33:59'),
(9, 'Happiness', '2023-09-09 14:34:09'),
(12, 'Proud father with his son in convocation!!!', '2023-09-09 14:34:40'),
(13, 'Graduation is doneee.', '2023-09-09 14:34:49'),
(14, 'Freeee....', '2023-09-09 14:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `help_comments`
--

CREATE TABLE `help_comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help_comments`
--

INSERT INTO `help_comments` (`id`, `topic_id`, `comment`, `user_id`, `date_created`) VALUES
(6, 1, 'hi', 4, '2023-10-22 18:58:37'),
(7, 5, 'plz help&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 5, '2023-10-23 15:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `help_topics`
--

CREATE TABLE `help_topics` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help_topics`
--

INSERT INTO `help_topics` (`id`, `title`, `description`, `user_id`, `date_created`) VALUES
(4, 'Need Tutor For Son', '&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;b&gt;Tutor Wanted&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;b&gt;Lactation Azimpur&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;b&gt;Subject physics and higher math&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;b&gt;Days 4&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;b&gt;If you can help to manage or are interested,&lt;/b&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;b&gt;kindly contact tandraju@gmail.com&lt;/b&gt;&lt;br&gt;&lt;/p&gt;', 1, '2020-10-16 08:31:45'),
(6, 'Need money for study', 'I am Amina Boby, Student of Jahangirnagar University. For some trivial reasons, I have lost my part time job and in a desperate need of money to continue study. I want to pursue my higher studies degree and hope to return all your favors.&lt;br&gt;Thanks in advance.&lt;br&gt;&lt;p&gt;bkash: 01888888888&lt;/p&gt;&lt;p&gt;nagad: 01999999991&lt;/p&gt;&lt;p&gt;bank a/c: xyz09834567&lt;/p&gt;', 5, '2023-10-23 15:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `date_created`, `content`, `banner`) VALUES
(1, 'Events must end by 10.00PM', '2023-10-22 22:05:15', 'Jahangirnagar University (JU) administration has issued a notice asking all campus organisations to wrap up events by 10:00pm.The decision was taken in a special meeting of the syndicate members on September 20, reads the notice, reports our campus correspondent.&lt;p&gt;During winter, reunions and year-end celebrations of alumni organisations and various batches of various departments are often held in the open air till midnight, the notice reads adding that this is damaging to the educational and natural environment of the campus.&lt;/p&gt;&lt;p&gt;According to the notice, the late-night events are also conducive to criminal activities and create chaotic environment.&lt;/p&gt;&lt;p&gt;Any organisation holding a function after 10:00 pm will be blacklisted as well as electricity will be disconnected at the venue. They will not be allowed to organise further events on the campus premises, the notice added. &lt;/p&gt;', '1698573600_ju-day.jpeg'),
(3, 'JU students protest sectarian attacks', '2023-10-29 16:04:27', 'Students of Jahangirnagar University staged street plays, mime performances and others protesting at attacks on Hindus and Durga Puja mandaps across the country at a cultural programme organised by Jahangirnagar University Cultural Alliance on JU Central Shaheed Minar premises on Sunday.&lt;p&gt;The programme, titled Jahangirnagar Sangskritik Sandhya, began with Zahir Raihan auditorium-based theatre troupe Jahangirnagar Theatre staging a street play titled Sampradayik Bhut at 6.30pm.&lt;/p&gt;&lt;p&gt;Following which, JU Teachers Students Centre-based theatre troupe Jahangirnagar Theatre staged a street play titled Tomar Amar Banglay, Sampradayikatar Thai Nai.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Office secretary of the troupe Mahfuz Islam directed the play.Rangan Mime Academy staged a mime performance titled Sampritir Bangladesh, directed by the founder of Rangan Mime Academy and chairman of JU drama and dramatics department professor Esrafil Ahmed, at 7:30pm.&lt;/p&gt;', '1698573840_protest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date_created`, `content`, `banner`) VALUES
(1, 'Call for meeting', '2023-10-22 22:09:54', 'An important meeting has been called to take decision on the ongoing situations and about the next year courses. In this meeting, topic about winter vacation and tour will also be upheld.&lt;p&gt;Each and every member of this community are invited to join the meeting at given time.&lt;br&gt;Date:&nbsp; 23-11-23&lt;br&gt;Time:&nbsp; 08.00 PM&lt;br&gt;Meeting Link: AsdghTfghry/uytr&lt;br&gt;Password: WeLoveJU&lt;/p&gt;', '1698575940_ju3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `banner` text NOT NULL,
  `writer` varchar(250) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `content`, `banner`, `writer`, `user_id`) VALUES
(1, 'Road to Netflix', 'I was a student of IIT JU who had many dreams.\r\nI did many terrible mistakes on my way but I learnt a few things that made me what I am today.', '1698573960_netflix.jpg', 'Imranur Rahman', 1),
(3, 'IIT student conquer Google', '&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 20px; text-align: justify;&quot;&gt;His name is Md. Nafis Sadique. He was a student of Jahangirnagar University, Bangladesh. Currently he is working at Google as a Site Reliability Engineer. Previously He worked in Grab Singapore as a Software Engineer.He is dedicated and passionate about my work and a hard-worker. He believe hard-working is the key to success and that is the only way.&lt;/span&gt;', '1698574140_story1.jpg', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'JU Alumni Association', 'juniv@gmail.com', '01720688056', '1694216700_203760_157.jpg', 'Jahangirnagar was the former name of Dhaka. The Mughal city of Dhaka was named Jahangirnagar (City of Jahangir) in honour of the erstwhile ruling Mughal Emperor Jahangir by Islam Khan in 1610. Jahangirnagar University was established in 20 August 1970, but formally launched on 12 January 1971[15] under the Jahangirnagar Muslim University Ordinance, 1970[7] and this day is observed as University Day. Initially, it was named Jahangirnagar Muslim University, and the plan was to operate the university like Aligarh Muslim University. But after the independence of Bangladesh, its name changed to Jahangirnagar University under the Jahangirnagar University Act&rsquo; 1973.Its first vice-chancellor, Mafizuddin Ahmed (PhD in chemistry, Penn State) took up office on 24 September 1970. The first group of students, a total of 150, were enrolled in four departments: Economics, Geography, Mathematics, and Statistics. Its formal inauguration was delayed until 12 January 1971, when the university was launched by Rear Admiral S. M. Ahsan, the chancellor.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Alumni officer, 3= alumnus',
  `auto_generated_pass` text NOT NULL,
  `alumnus_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `auto_generated_pass`, `alumnus_id`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 1, '', 0),
(4, 'R S', 'rakhibulhasan98@gmail.com', '5a2dd3b5557333af7d0d89a8790379e9', 3, '', 3),
(5, 'Amina Boby', 'aminaboby@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '', 4),
(6, 'Tandra Biswas', 'tandra@juniv.edu', '81dc9bdb52d04dc20036dbd8313ed055', 3, '', 5),
(7, 'Sadia Riva', 'riva@juniv.edu', '81dc9bdb52d04dc20036dbd8313ed055', 3, '', 6),
(8, 'nayon karmoker', 'nayonkarmoker3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_commits`
--
ALTER TABLE `event_commits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_comments`
--
ALTER TABLE `help_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_topics`
--
ALTER TABLE `help_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_commits`
--
ALTER TABLE `event_commits`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `help_comments`
--
ALTER TABLE `help_comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `help_topics`
--
ALTER TABLE `help_topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
