-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 03:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `des` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `des`) VALUES
(1, 'banner_01.jpg', '<h2>How does Diazepam / Valium Work?</h2>\r\n<p>If you order online diazepam UK tablets, patients will have access to a medication that is proven to be effective.\r\n Originally marketed as Valium, it belongs to the benzodiazepine class of medications and it works by increasing \r\nlevels of a neurotransmitter called GABA. Neurotransmitters are chemicals that are stored in nerve cells in the \r\ncentral nervous system (CNS). GABA is a naturally occurring chemical that helps calm nerves and reduces overactivity \r\nin the CNS. Its role is to reduce anxiety, relax muscles and induce sleep.</p>\r\n<h2>What other Conditions can be treated with Diazepam Tablets?</h2>\r\n<ul>\r\n<li>Insomnia – if you buy diazepam online expect a medication that is effective at  reducing the time it takes to \r\nfall asleep. It also reduces the number of  awakenings during the night. People who suffer from acute or chronic \r\ninsomnia  can use this medication to help them regain a consistent sleep schedule.</li>\r\n<li>Muscle spasms –-term muscle tension is a symptom of  conditions like a lower back injury or a neurological \r\nproblem such as multiple  sclerosis. It is also known as spasticity, can restrict muscle movement and can  \r\nlead to extreme pain. Diazepam  tablets ease tension in muscles which relieves discomfort and allows a  patient to \r\nhave more control over movement.</li>\r\n<li>Seizures – if you buy Valium online take further comfort that this medication can  help reduce seizures or \r\nprevent them by calming irregular electrical activity  in the brain</li>\r\n<li>Preoperative anxiety – this type of anxiety is usually described  as a tense and uncomfortable mood before a\r\n surgery or dental procedure. It  affects up to 40% of adults and diazepam can be used to help relax nervous  \r\npatients before a procedure.</li>\r\n<li>Alcohol withdrawal – when you buy Valium online it should be noted that this  medication can prevent some of the\r\n symptoms of alcohol withdrawal such as seizures,  tremors, convulsions and anxiety.&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;\r\n</li>\r\n</ul>\r\n<h2>What are the benefits of Diazepam?</h2>\r\n<p>Anxiety can be a debilitating condition but fortunately medication like diazepam can help. Research shows that \r\nonly about 37 percent of anxiety sufferers receive effective treatment. Patients who use this medication on a \r\nshort-term basis and as recommended can benefit from the relief of anxiety. Some patients may see improvements \r\nin their condition after a few days while others may experience positive results after a few weeks.</p>\r\n<h2>How to use Diazepam 10mg Tablets</h2>\r\n<p>Diazepam tablets are generally well tolerated and only likely to cause mild to moderate side effects in a small \r\nproportion of people. Side effects that may affect up to 10 percent of patients include:</p>\r\n<h2>Does Diazepam have Side Effect</h2>\r\n<p>Diazepam tablets are generally well tolerated and only likely to cause mild to moderate side effects in a small \r\nproportion of people. Side effects that may affect up to 10 percent of patients include:</p>\r\n'),
(5, 'banner_011.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cardHolderName` varchar(255) DEFAULT NULL,
  `cardName` varchar(255) DEFAULT NULL,
  `cardNo` varchar(20) DEFAULT NULL,
  `cvvNumber` int(3) DEFAULT NULL,
  `cardExpiryMonth` varchar(20) DEFAULT NULL,
  `cardExpiryYear` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`id`, `order_id`, `cardHolderName`, `cardName`, `cardNo`, `cvvNumber`, `cardExpiryMonth`, `cardExpiryYear`) VALUES
(1, 1, 'ahmed', '5105105105105100', 'Mastercard', 123, '02', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `cotegories`
--

CREATE TABLE `cotegories` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(255) NOT NULL,
  `c_description` longtext DEFAULT NULL,
  `c_create_on` varchar(50) DEFAULT NULL,
  `c_update_on` varchar(50) DEFAULT NULL,
  `c_created_by` int(11) DEFAULT NULL,
  `c_controller` varchar(255) DEFAULT 'shop',
  `c_method` varchar(255) DEFAULT 'category'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cotegories`
--

INSERT INTO `cotegories` (`c_id`, `c_title`, `c_description`, `c_create_on`, `c_update_on`, `c_created_by`, `c_controller`, `c_method`) VALUES
(1, 'health', NULL, NULL, NULL, NULL, 'shop', 'category');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`co_id`, `co_name`) VALUES
(1, 'england'),
(2, 'australia'),
(3, 'usa'),
(4, 'canada'),
(5, 'ireland');

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_heading` varchar(255) DEFAULT NULL,
  `page_description` longtext DEFAULT NULL,
  `create_on` varchar(255) DEFAULT NULL,
  `update_on` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`id`, `page_name`, `page_heading`, `page_description`, `create_on`, `update_on`) VALUES
(1, 'diazepamuk', NULL, '<h1>Buy Diazepam Tablets</h1>\r\n<h2>Remove Your ANXIETY</h2>\r\n<p>UK/ EU BRANDED Daizepam Tablets<br>FROM £0.76 EACH</p><p>GENERIC DIAZEPAM Tablets</p><p>FROM £0.70 EACH</p>', NULL, NULL),
(2, 'diazepamuk', NULL, '<h2>What are Diazepam 10mg Tablets?</h2><p>Diazepam is a sedative that relieves anxiety and panic attacks. It is one of the most \r\ncommonly used medications for anxiety. More people in the UK and Europe suffer from anxiety disorders than any other psychiatric\r\n condition. If you buy diazepam online you will have a tried and trusted medication that can help treat the symptoms, as it helps calm \r\nan anxious mind by producing feelings of tranquility</p>\r\n', NULL, NULL),
(3, 'diazepamuk', NULL, '<h2>How does Diazepam / Valium Work?</h2>\r\n<p>If you order online diazepam UK tablets, patients will have access to a medication that is proven to be effective.\r\n 		Originally marketed as Valium, it belongs to the benzodiazepine class of medications and it works by increasing \r\n		levels of a neurotransmitter called GABA. Neurotransmitters are chemicals that are stored in nerve cells in the \r\n		central nervous system (CNS). GABA is a naturally occurring chemical that helps calm nerves and reduces overactivity \r\n		in the CNS. Its role is to reduce anxiety, relax muscles and induce sleep.\r\n	</p>\r\n\r\n<h2>What other Conditions can be treated with Diazepam Tablets?</h2>\r\n<ul>\r\n		<li>Insomnia – if you buy diazepam online expect a medication that is effective at  reducing the time it takes to \r\n			fall asleep. It also reduces the number of  awakenings during the night. People who suffer from acute or chronic \r\n			insomnia  can use this medication to help them regain a consistent sleep schedule.\r\n		</li>\r\n		<li>Muscle spasms –-term muscle tension is a symptom of  conditions like a lower back injury or a neurological \r\n			problem such as multiple  sclerosis. It is also known as spasticity, can restrict muscle movement and can  \r\n			lead to extreme pain. Diazepam  tablets ease tension in muscles which relieves discomfort and allows a  patient to \r\n			have more control over movement.\r\n		</li>\r\n		<li>Seizures – if you buy Valium online take further comfort that this medication can  help reduce seizures or \r\n			prevent them by calming irregular electrical activity  in the brain\r\n		</li>\r\n		<li>Preoperative anxiety – this type of anxiety is usually described  as a tense and uncomfortable mood before a\r\n 			surgery or dental procedure. It  affects up to 40% of adults and diazepam can be used to help relax nervous  \r\n			patients before a procedure.\r\n		</li>\r\n		<li>Alcohol withdrawal – when you buy Valium online it should be noted that this  medication can prevent some of the\r\n 			symptoms of alcohol withdrawal such as seizures,  tremors, convulsions and anxiety.&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;\r\n		</li>\r\n	</ul>\r\n<h2>What are the benefits of Diazepam?</h2>\r\n<p>\r\n	Anxiety can be a debilitating condition but fortunately medication like diazepam can help. Research shows that \r\nonly about 37 percent of anxiety sufferers receive effective treatment. Patients who use this medication on a \r\nshort-term basis and as recommended can benefit from the relief of anxiety. Some patients may see improvements \r\nin their condition after a few days while others may experience positive results after a few weeks.\r\n</p>\r\n<h2>How to use Diazepam 10mg Tablets</h2>\r\n<ul>\r\n	<li>For anxiety, take 5 to 30mg per day in divided doses.</li>\r\n	<li>To help you sleep, take 5 to 15mg at bedtime.</li>\r\n	<li>For cerebral palsy, take 5 to 60mg per day in divided doses.</li>\r\n	<li>For a muscle spasm, take 5 to 15mg per day, in divided doses.</li>\r\n	<li>To help with epilepsy, take 2 to 60mg per day, in divided doses.</li>\r\n	<li>To help with alcohol withdrawal, take 5 to 20mg, which may be  repeated after 2 to 4 hours, if necessary.</li>\r\n	<li>When you opt to buy  Valium UK and EU patients who use it to help with dental anxiety should  take 5mg the night before treatment, 5mg on waking\r\n		 and 5mg two hours before  the operation.\r\n	</li>\r\n	<li>To help with preoperative anxiety, take 5 to 20mg before the  operation.</li>\r\n</ul>\r\n<h2>Does Diazepam have Side Effects?</h2>\r\n<ul>\r\n	<p>Diazepam tablets are generally well tolerated and only likely to cause mild to moderate side effects in a small proportion of people. Side effects that may affect up to 10 percent of patients include:</p>\r\n	<li>fatigue </li>\r\n	<li>confusion </li>\r\n	<li>lack of coordination</li>\r\n</ul>\r\n<p>Less common side effects that may affect up to 1 percent of people include:</p>\r\n<ul>	\r\n	\r\n	<li>headache </li>\r\n	<li>dizziness </li>\r\n	<li>difficulty concentrating</li>\r\n\r\n</ul>\r\n\r\n<h2>Warnings and Special Precautions for Diazepam 10mg Tablets</h2>\r\n<p>When you buy diazepam online you are selecting a medication that is suitable for most people - however it should be used with caution in certain circumstances. Practice caution if you have a history of alcoholism or drug abuse. Use this medication with caution as well if you have severe kidney failure or problems with your heart and lungs. </p>\r\n<h2>Can I Buy Diazepam Online in the UK?</h2>\r\n<p>You can buy cheap diazepam without the need for a prescription from our leading online pharmacy. We use the latest encryption technology to ensure safe and secure \r\ntransactions. We sell licensed generics which are available at lower prices than a physically located pharmacy. When you buy diazepam UK next day delivery is available, \r\nbut it still only takes around 3 working days in the UK and 5 to 7 working days in the EU for your order to arrive when using standard delivery.</p>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `m_tag_id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`m_tag_id`, `url`, `title`, `keywords`, `description`) VALUES
(1, 'about-us', 'Diazepam UK: About', 'a,b,c,d', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book'),
(2, 'delivery', 'Diazepam UK: Delivery', 'x,y,z', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book'),
(3, 'diazepamuk', 'Diazepam UK: Buy Diazepam Tablets Online, Cheap Diazepam Sleeping Tablets', NULL, 'Diazepam UK - Buy the cheapest diazepam / Valium sleeping tablets online in the UK for the relief of anxiety and panic attacks. Buy diazepam / Valium sleeping pills with fast delivery from our Diazepam UK online pharmacy.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  `b_firstname` varchar(255) DEFAULT NULL,
  `b_lastname` varchar(255) DEFAULT NULL,
  `b_email` varchar(255) DEFAULT NULL,
  `b_phone` varchar(255) DEFAULT NULL,
  `b_address1` varchar(255) DEFAULT NULL,
  `b_address2` varchar(255) DEFAULT NULL,
  `b_city` varchar(255) DEFAULT NULL,
  `b_state` varchar(255) DEFAULT NULL,
  `b_country` varchar(255) DEFAULT NULL,
  `b_zipcode` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT '0',
  `order_payment_type` tinyint(1) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order_create_on` varchar(255) DEFAULT NULL,
  `order_update_on` varchar(255) DEFAULT NULL,
  `b_payment` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_no`, `b_firstname`, `b_lastname`, `b_email`, `b_phone`, `b_address1`, `b_address2`, `b_city`, `b_state`, `b_country`, `b_zipcode`, `total`, `order_status`, `order_payment_type`, `link`, `order_create_on`, `order_update_on`, `b_payment`) VALUES
(1, NULL, 'Ghulam', 'Dayo', 'rajadayo1@gmail.com', '+923048917309', 'H-No 1/48 Hathi Dar Pir Kamal Shah Shikarpur', '', 'Shikarpur', 'pakistan', 'Austria', '78100', '60', '0', 3, 'nCRwoMRead28F4ykpk5uWjDP4jU0wt2SQvJgPFxl9GrmuoTNKKSsyfbBQvLtCJAp', '1604494505', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `o_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `order_create_on` varchar(255) DEFAULT NULL,
  `order_update_on` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`o_detail_id`, `order_id`, `pr_id`, `qty`, `subtotal`, `order_create_on`, `order_update_on`) VALUES
(1, NULL, 1, 1, '60', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_url`) VALUES
(1, 'main', NULL),
(2, 'about', 'about-us'),
(3, 'delivery', 'delivery'),
(4, 'contact', 'contact-us'),
(5, 'faqs', 'faqs'),
(6, 'Privacy Policy', 'privacy-policay'),
(7, 'Terms & Conditions', 'privacy-policay'),
(8, 'Refund Policy', 'refund-policy');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `txn_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_excerpt` varchar(255) DEFAULT NULL,
  `post_description` longtext DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `post_tag` varchar(255) DEFAULT NULL,
  `post_category` varchar(255) DEFAULT NULL,
  `post_created_on` varchar(255) DEFAULT NULL,
  `post_updated_on` varchar(255) DEFAULT NULL,
  `post_added_by` varchar(255) DEFAULT NULL,
  `post_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_excerpt`, `post_description`, `post_img`, `post_tag`, `post_category`, `post_created_on`, `post_updated_on`, `post_added_by`, `post_status`) VALUES
(1, 'Maintain Energy When You Buy Diazepam Online', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify; background-color: rgb(255, 255, 255);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', '159diazepamuk.jpg', '1,2,3,4', 'shairt, paint, new jackect, Winter', '1593790062', NULL, '2', 1),
(4, 'Where does it come from', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions ', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '159diazepamuk.jpg', 'one,two,three', 'shairt, paint, new jackect, Winter', '1594028313', NULL, '2', 1),
(5, 'Where does it come from 2', 'dfgdfg', '<p>dfgsdfgfsdfgdf</p>', '159diazepamuk.jpg', 'xzy', 'NULL', '1594028474', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `pr_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_qun` varchar(255) DEFAULT NULL,
  `pro_pri` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`pr_id`, `pro_id`, `pro_qun`, `pro_pri`) VALUES
(1, 1, '30', '2'),
(2, 1, '60', '1.85'),
(3, 1, '90', '1.5'),
(4, 1, '120', '1.2'),
(5, 1, '150', '1'),
(6, 1, '200', '0.85'),
(7, 2, '30', '10'),
(8, 2, '60', '9'),
(9, 2, '90', '8'),
(10, 2, '120', '7'),
(11, 2, '150', '6'),
(12, 2, '200', '3'),
(33, 24, '30', '60'),
(34, 25, '60', '60'),
(35, 26, '90', '60'),
(36, 27, '30', '60');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_category_id` varchar(11) DEFAULT NULL,
  `p_short_description` varchar(250) DEFAULT NULL,
  `p_long_description` longtext DEFAULT NULL,
  `p_keywords` varchar(255) DEFAULT NULL,
  `p_created_on` varchar(50) DEFAULT NULL,
  `p_created_by` int(11) DEFAULT NULL,
  `p_update_on` varchar(50) DEFAULT NULL,
  `p_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_title`, `p_image`, `p_category_id`, `p_short_description`, `p_long_description`, `p_keywords`, `p_created_on`, `p_created_by`, `p_update_on`, `p_status`) VALUES
(1, 'EU/UK DIAZEPAM', 'eu_uk_diazepam_tablets.png', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'a,b,c,d', '120920898999', 1, NULL, 1),
(2, 'EU/USA DIAZEPAM', 'eu_uk_diazepam_tablets.png', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'a,b,c,d', '120920898999', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`s_id`, `s_name`, `c_id`) VALUES
(1, 'a', 1),
(2, 'b', 1),
(3, 'brisban', 2),
(4, 'd', 3),
(5, 'e', 4),
(6, 'f', 3),
(7, 'g', 4),
(8, 'h', 3),
(9, 'sydney', 2),
(10, 'melbourene', 2),
(11, 'k', 3),
(12, 'perth', 2),
(13, 'm', 1),
(14, 'n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_first_name` varchar(255) NOT NULL,
  `u_last_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_roll_id` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_first_name`, `u_last_name`, `u_email`, `u_password`, `u_roll_id`) VALUES
(1, 'ACB', 'XYZ', 'uk@gmail.com', '12345', 1),
(2, 'ex', 'lm', 'ex@gmail.com', '123', 2),
(3, 'akram', 'khan', 'akram@gmail.com', '123', 2),
(4, 'yasin', 'dayo', 'rajadayo1@gmail.com', '1234', 2),
(5, 'xyz', 'aaa', 'xzy@gmail.com', '123', 2),
(6, 'tariq', 'abro', 'rajadayo7@gmail.com', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_info`
--
ALTER TABLE `card_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cotegories`
--
ALTER TABLE `cotegories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`m_tag_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`o_detail_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_info`
--
ALTER TABLE `card_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cotegories`
--
ALTER TABLE `cotegories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `m_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `o_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
