-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-12-25 02:57:55
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pso`
--

-- --------------------------------------------------------

--
-- 表的结构 `pso_admin`
--

CREATE TABLE IF NOT EXISTS `pso_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  `login_time` varchar(50) NOT NULL,
  `logout_time` varchar(50) NOT NULL DEFAULT '0',
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `pso_admin`
--

INSERT INTO `pso_admin` (`id`, `username`, `passwd`, `login_time`, `logout_time`, `ip`) VALUES
(1, 'admin', 'd12b339d91f4acabe260734e779bd3e0', '1513942543', '0', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `pso_download`
--

CREATE TABLE IF NOT EXISTS `pso_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `download_url` varchar(255) NOT NULL,
  `create_time` int(20) NOT NULL,
  `data_type` varchar(10) NOT NULL,
  `record_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pso_email_config`
--

CREATE TABLE IF NOT EXISTS `pso_email_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_from_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email_smtp` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email_username` varchar(70) CHARACTER SET utf8 NOT NULL,
  `email_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email_smtp_secure` varchar(10) CHARACTER SET utf8 NOT NULL,
  `email_port` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '25',
  `edit_time` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `pso_email_config`
--

INSERT INTO `pso_email_config` (`id`, `email_from_name`, `email_smtp`, `email_username`, `email_password`, `email_smtp_secure`, `email_port`, `edit_time`) VALUES
(1, 'Platform of Personal Drug Choice for psoriasis', 'smtp-mail.outlook.com', 'Ronlee12355@outlook.com', 'yETN5kTMlVGbu9mU', 'tls', '587', NULL),
(2, 'Platform of Personal Drug Choice for psoriasis', 'smtp-mail.outlook.com', 'Ronlee12355@outlook.com', 'yETN5kTMlVGbu9mU', 'tls', '587', '1513927299');

-- --------------------------------------------------------

--
-- 表的结构 `pso_file_upload`
--

CREATE TABLE IF NOT EXISTS `pso_file_upload` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `input_url` varchar(255) NOT NULL,
  `control_url` varchar(255) NOT NULL,
  `upload_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pso_upload`
--

CREATE TABLE IF NOT EXISTS `pso_upload` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `upload_file` varchar(200) CHARACTER SET utf8 NOT NULL,
  `upload_img` varchar(200) CHARACTER SET utf8 NOT NULL,
  `upload_text` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `pso_upload`
--

INSERT INTO `pso_upload` (`id`, `upload_file`, `upload_img`, `upload_text`) VALUES
(2, '/PSO/uploads/2017/12/21/5a3b66b0a1220.pdf', '/PSO/uploads/2017/12/21/5a3b66b60cb20.jpg', '&lt;p&gt;bjdebvjbjrjrjibirjnbjfbdvrwitjjrnbwit fjntwijnuibnjfnbwinit&lt;br/&gt;&lt;/p&gt;'),
(3, '/PSO/uploads/2017/12/21/5a3b6b9ea4cb8.pdf', '/PSO/uploads/2017/12/21/5a3b6ba55a550.jpg', '&lt;p&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;wnckdnvkefnvkenbvknbk&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;asnvnfovinroeinbionbiongbtionbiotbniotrno&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- 表的结构 `pso_user`
--

CREATE TABLE IF NOT EXISTS `pso_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `institution` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0',
  `register_time` varchar(50) NOT NULL,
  `active_time` varchar(50) DEFAULT '0',
  `verify` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `pso_user`
--

INSERT INTO `pso_user` (`id`, `email`, `username`, `passwd`, `designation`, `institution`, `address`, `user_type`, `status`, `register_time`, `active_time`, `verify`) VALUES
(22, '857748998@qq.com', 'ronlee', 'f97c8d31f6fea668053e453bd2b353cf', 'master', 'bbbbbbbbb', 'wuhan beijing', 'academic', '1', '1513134064', '1513943995', 1),
(27, 'ronlee12355@gmail.com', 'google', '220f20c854b3736cea621d21ad3c23b0', 'master', 'hzau', 'jingzhou', 'academic', '1', '1513600611', '0', 1),
(28, 'ronlee12355@gmail.com', 'google', 'sdavcdsvevebwefvbweb', 'ebefvbfvrevfdvfdber', 'vffdbrebvfbfbrev', 'aberbfbfbrebreb', 'svfbvbe', '-1', '152215112', '0', 1),
(29, '591026065@qq.com', 'xxu', '4e56d478777c7946190b31b8bdb5896d', '123', '123', '123', 'academic', '-1', '1513929374', '0', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
