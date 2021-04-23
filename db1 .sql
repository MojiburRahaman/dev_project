-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 09:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `year` varchar(100) NOT NULL,
  `progress` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `title`, `year`, `progress`) VALUES
(1, 'ssc', '2014', 90),
(2, 'HSC', '2016', 80),
(3, 'diplioma in computer', '2020', 95);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `feature_item` int(11) NOT NULL,
  `active_product` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature_item`, `active_product`, `year`, `client`) VALUES
(1, 10, 2, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `adress` varchar(250) NOT NULL,
  `country` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1' COMMENT '1=primary , 2 =sceondary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `adress`, `country`, `phone`, `email`, `status`) VALUES
(12, '123/A, Miranda City Likaoli Prikano, Dope', '', 1111, 'ok@example.com', '1'),
(13, 'Miranda City Likaoli Prikano, Dope', 'Chandpur', 2147483647, 'mdsanto034@gmail.com', '2'),
(14, 'Miranda City Likaoli Prikano, Dope', 'Dhaaka', 2147483647, 'santo034@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `image`, `status`) VALUES
(8, '4522.png', 1),
(12, '3875.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `catagory` varchar(200) NOT NULL,
  `title` varchar(250) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `portfolio_image` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `catagory`, `title`, `thumbnail`, `portfolio_image`, `summary`, `status`) VALUES
(6, 'Web', 'Responsive Web Deisgin', '6.jpg', '9.jpg', 'Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nRxpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestlibers dolosr auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.\r\n\r\nVehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc.\r\n\r\nExpress dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with desktop publishing software like Aldus PageMaker including versions.\r\n\r\nVehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus.', 1),
(10, 'Cyber Security', 'Cyber Security', '10.jpg', '10.jpg', 'Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with desktop publishing software like Aldus PageMaker including versions.', 1),
(11, 'Web Development', 'Web Development', '11.jpg', '11.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'user_default_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `tagline`, `about`, `user_image`) VALUES
(1, 'Mojibur Rahaman', 'professional web developer and cyber security expert with long time experience in this field​.', '           ipsum\'s dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime blanditiis culpa vitae velit. Numquam!    ', 'user_default_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `image`, `status`) VALUES
(3, '1263.png', 1),
(6, '3564.png', 1),
(7, '4497.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `icon`, `summary`, `status`) VALUES
(1, 'CREATIVE DESIGN', 'fa fa-edit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 1),
(2, 'Features', 'fab fa-free-code-camp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `icon`, `link`, `status`) VALUES
(1, 'Facebook', 'fab fa-facebook', 'http://facebook.com/mojibur.rahaman736', 1),
(8, 'Twitter', 'fab fa-twitter', 'https://www.facebook.com/mojibur.rahaman736', 1),
(10, 'github', 'fab fa-github', 'https://github.com/MojiburRahaman', 1),
(11, 'messenger', 'fab fa-facebook-messenger', 'm.me/mojibur.rahaman736', 1),
(15, 'Facebook', 'fab fa-facebook', 'https://www.facebook.com/mojibur.rahaman736', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'active =1\r\ninactive =2',
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'user=1,employee=2.admin=3',
  `profile_img` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `passwords`, `status`, `role`, `profile_img`) VALUES
(28, 'santo156', 'mojibur454@gmail.com', '$2y$10$.0huKMEapi7pvnRxbhNhj.yQiH78J8r60MoXLGdc/OSW6ENrb2XWy', 1, 1, 'default.png'),
(31, 'rahaman', 'rahaman@gmail.com', '$2y$10$3JH6RC/rxY2auR/FzEpqD.GU8aPm2TSLXxHAICL8ykwpyfSY5KHxO', 1, 3, 'default.png'),
(35, 'tuhin', 'jaskjhaskj@gmail.com', '$2y$10$r1n8y1sLqGFiHUkq35mStuuDW4UPAKRW24FjOyDo65yzgls23OMDK', 1, 1, 'default.png'),
(37, 'santo345', 'santo8676564@gmail.com', '$2y$10$oKzwzJTaWRK4wMQRtWbpM.Pfkk0Ri7WUWOm/hnpak9jTNPvHNYBsG', 1, 1, 'default.png'),
(38, 'santo rehman', 'santorehman4523@gmail.com', '$2y$10$a/a542FozsWXwp33myTOrejypC4RP1jVAyKJbTG6dcNqtfbYcEPVm', 1, 1, 'default.png'),
(39, 'sdfa', 'santorehman43366@gmail.com', '$2y$10$exJAuQzHOQi8n3U8XyZP6O8Gus1cTy19Ft2DFQjPnvcp0ALOL7bWi', 1, 1, 'default.png'),
(40, 's', 'santorehman16758@gmail.com', '$2y$10$99b..V/.un.WfFUBR5a5qesVIufqNpWTT8fb9zM9/.O0MEBkvVU56', 1, 2, 'default.png'),
(41, 'santo156', 'mojibur45324@gmail.com', '$2y$10$.0huKMEapi7pvnRxbhNhj.yQiH78J8r60MoXLGdc/OSW6ENrb2XWy', 1, 1, 'default.png'),
(42, 'ashraful', 'zeebon224523@honeys.be', '$2y$10$536yn9WJa9w0QkqHPCD6B.QaA8GpPK7m5jf7I1Bws78kcKBCF8txi', 1, 1, 'default.png'),
(43, 'rahaman', 'rahaman342@gmail.com', '$2y$10$3JH6RC/rxY2auR/FzEpqD.GU8aPm2TSLXxHAICL8ykwpyfSY5KHxO', 1, 1, 'default.png'),
(46, 'emran', 'emran@gmail.com', '$2y$10$VHXLifASoA0vtrzjPmt.ROQiMHRn5ySDETHto37RWC./nP.T0jVS2', 1, 1, 'default.png'),
(47, 'taher', 'kjbdkjba6473@gmail.com', '$2y$10$9XeS.bY1mBGvUbSBRkFBb.nzWMaFgelAyjkeTHnYJGOQfUaK2Enwe', 1, 1, 'default.png'),
(48, 'Santo', 'mdsanto034@gmail.com', '$2y$10$t.lNIvNZOphxSTEFmu/AMOKrnY50V1v0r.IT8zL3lj/RnobDIflDm', 1, 3, '48.png'),
(49, 'mojibur', 'mdsanto57034@gmail.com', '$2y$10$vPkeArv1EJuXodyuXen38.LBk0YE8D7.dkX7H2PeRFvP5M9fU8oQy', 1, 2, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
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
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
