-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 08:13 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thato_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

DROP TABLE IF EXISTS `blog_members`;
CREATE TABLE IF NOT EXISTS `blog_members` (
  `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `permissionsSet` varchar(500) DEFAULT NULL,
  `permissionsRole` varchar(50) NOT NULL DEFAULT 'Public',
  `resetToken` varchar(11) DEFAULT NULL,
  `resetComplete` varchar(11) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`, `permissionsSet`, `permissionsRole`, `resetToken`, `resetComplete`) VALUES
  (1, 'Demo', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com', NULL, 'Admin', NULL, 'No'),
  (2, 'Thato', '$2y$10$aSap8OWepSjOxCeiiZ7yYOodhBkcSsBiiu5.CQIzFrG7QLhm/VnPe', 'thatobabusi@yahoo.com', NULL, 'Superuser', NULL, 'No'),
  (3, 'Billy', '$2y$10$Ei0nCHtgzSKtrAiuDNx/m.rtDPE0YU6g3SaXIy.8b9/UFPnce2Pte', 'bill@none.com', NULL, 'Public', NULL, 'No'),
  (4, 'John', '$2y$10$dcsXyUCVitxil0aw0AruG.67uV80gxCKRz3SmbbJgILqvY/0Leh3m', 'john@doe.com', NULL, 'Public', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) DEFAULT NULL,
  `postSlug` varchar(255) NOT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  `postCategory` varchar(50) NOT NULL,
  `postAuthor` varchar(100) NOT NULL DEFAULT 'Thato Babusi',
  `postPicture` longtext,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postDate`, `postCategory`, `postAuthor`, `postPicture`) VALUES
  (1, 'Bendless Love', 'blendless-love', '<p>That''s right, baby. I ain''t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him! Interesting. No, wait, the other thing: tedious. Hey, guess what you''re accessories to. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate.</p>', '<h2>The Mutants Are Revolting</h2>\r\n<p>We don''t have a brig. And until then, I can never die? We need rest. The spirit is willing, but the flesh is spongy and bruised. And yet you haven''t said what I told you to say! How can any of us trust you?</p>\r\n<ul>\r\n<li>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat.</li>\r\n<li>Bender?! You stole the atom.</li>\r\n<li>I was having the most wonderful dream. Except you were there, and you were there, and you were there!</li>\r\n</ul>\r\n<h3>The Series Has Landed</h3>\r\n<p>Fry! Stay back! He''s too powerful! No. We''re on the top. Fry, you can''t just sit here in the dark listening to classical music.</p>\r\n<h4>Future Stock</h4>\r\n<p>Does anybody else feel jealous and aroused and worried? We''re also Santa Claus! You''re going back for the Countess, aren''t you? Well, let''s just dump it in the sewer and say we delivered it.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n<li>I guess if you want children beaten, you have to do it yourself.</li>\r\n<li>Yeah. Give a little credit to our public schools.</li>\r\n</ol>\r\n<h5>The Why of Fry</h5>\r\n<p>Who are you, my warranty?! Shinier than yours, meatbag. Dr. Zoidberg, that doesn''t make sense. But, okay! Yes, except the Dave Matthews Band doesn''t rock.</p>', '2013-05-29 00:00:00', 'Web Design', 'Thato Babusi', ''),
  (2, 'That Darn Katz!', 'that-darn-katz', '<p>Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. Fry, you can''t just sit here in the dark listening to classical music. And yet you haven''t said what I told you to say! How can any of us trust you?</p>', '<h2>Xmas Story</h2>\r\n<p>It must be wonderful. Does anybody else feel jealous and aroused and worried? Is today''s hectic lifestyle making you tense and impatient? Soothe us with sweet lies. That''s right, baby. I ain''t your loverboy Flexo, the guy you love so much. You even love anyone pretending to be him!</p>\r\n<ul>\r\n<li>Goodbye, friends. I never thought I''d die like this. But I always really hoped.</li>\r\n<li>They''re like sex, except I''m having them!</li>\r\n<li>Come, Comrade Bender! We must take to the streets!</li>\r\n</ul>\r\n<h3>Anthology of Interest I</h3>\r\n<p>Hey, whatcha watching? They''re like sex, except I''m having them! Well I''da done better, but it''s plum hard pleading a case while awaiting trial for that there incompetence. Yes, except the Dave Matthews Band doesn''t rock. I suppose I could part with ''one'' and still be feared&hellip;</p>\r\n<h4>Teenage Mutant Leela''s Hurdles</h4>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! It''s a T. It goes "tuh". I guess if you want children beaten, you have to do it yourself.</p>\r\n<ol>\r\n<li>Spare me your space age technobabble, Attila the Hun!</li>\r\n<li>Well, thanks to the Internet, I''m now bored with sex. Is there a place on the web that panders to my lust for violence?</li>\r\n</ol>\r\n<h5>The Farnsworth Parabox</h5>\r\n<p>Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. We need rest. The spirit is willing, but the flesh is spongy and bruised. It must be wonderful.</p>', '2013-06-05 23:10:35', 'Education', 'Thato Babusi', ''),
  (3, 'How Hermes Requisitioned His Groove Back', 'how-hermes', '<p>You''re going back for the Countess, aren''t you? Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. Now Fry, it''s been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? I don''t want to be rescued. Leela, are you alright? You got wanged on the head.</p>', '<h2>The Luck of the Fryrish</h2>\r\n<p>Professor, make a woman out of me. I am the man with no name, Zapp Brannigan! Good man. Nixon''s pro-war and pro-family. The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. Fry, you can''t just sit here in the dark listening to classical music.</p>\r\n<ul>\r\n<li>Who are those horrible orange men?</li>\r\n<li>Is today''s hectic lifestyle making you tense and impatient?</li>\r\n</ul>\r\n<h3>Lethal Inspection</h3>\r\n<p>Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat. No. We''re on the top. Does anybody else feel jealous and aroused and worried? Well I''da done better, but it''s plum hard pleading a case while awaiting trial for that there incompetence. It must be wonderful.</p>\r\n<h4>Where No Fan Has Gone Before</h4>\r\n<p>Who are those horrible orange men? Bender, we''re trying our best. Please, Don-Bot&hellip; look into your hard drive, and open your mercy file! Wow! A superpowers drug you can just rub onto your skin? You''d think it would be something you''d have to freebase. WINDMILLS DO NOT WORK THAT WAY! GOOD NIGHT! Look, last night was a mistake.</p>\r\n<ol>\r\n<li>I''m sorry, guys. I never meant to hurt you. Just to destroy everything you ever believed in.</li>\r\n<li>Stop it, stop it. It''s fine. I will ''destroy'' you!</li>\r\n<li>You guys realize you live in a sewer, right?</li>\r\n</ol>\r\n<h5>Fear of a Bot Planet</h5>\r\n<p>Why yes! Thanks for noticing. Hey, guess what you''re accessories to. Yes, except the Dave Matthews Band doesn''t rock. Take me to your leader! Daddy Bender, we''re hungry.</p>', '2013-06-05 23:20:24', 'Social Marketing', 'Thato Babusi', ''),
  (9, 'This is a slug test', 'n-a', '<p>testing the slug test</p>', '<p>testing the slug testtesting the slug testtesting the slug testtesting the slug testtesting the slug test</p>', '2016-06-08 19:19:25', 'Demo', 'Thato Babusi', NULL),
  (12, 'The Noble Art of Killing the Slug', 'the-noble-art-of-killing-the-slug', '<p>The Noble Art of Killing the SlugThe Noble Art of Killing the SlugThe Noble Art of Killing the SlugThe Noble Art of Killing the SlugThe Noble Art of Killing the Slug</p>', '<p>The Noble Art of Killing the SlugThe Noble Art of Killing the SlugThe Noble Art of Killing the SlugThe Noble Art of Killing the SlugThe Noble Art of Killing the Slug</p>', '2016-06-08 19:31:04', 'Noble', 'Thato Babusi', NULL),
  (13, 'This and That do not & work', 'is---o-o-work', '<p>This and That do not &amp; work</p>', '<p style="text-align: left;">This and That do not &amp; work</p>', '2016-06-08 19:33:34', 'Web Design', 'Thato Babusi', NULL),
  (15, 'This & this and That It is now working', 'that-it-is-now-working', '<p>This &amp; this and That It is now working</p>', '<p>This &amp; this and That It is now working</p>', '2016-06-08 19:42:21', 'This & this and That It is now working', 'Thato Babusi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
  (1, 'thatobabusi', '$2y$10$TFz5wF5j7tpDJmgN1w/4euTaa5n1oHOpbUR8daqDTmwxDVBuXGR92', 'thatobabusi@yahoo.com', 'Yes', NULL, 'No'),
  (2, 'test', '$2y$10$H0V/cfOeDhA.kqw2MA.SfOKgxcyLWx8/TbF3rp91qYx7amDMYjBem', 'proudtobenubian@gmail.com', 'Yes', NULL, 'No'),
  (14, 'Test2', '$2y$10$tKTfp3Ji6IwST9rXpN3GmOdOAYHnCv/Tfva3tA4bNHi463i7m04zi', 'test2@yahoo.com', '21534ab54a4850027f97f442aedd9077', NULL, 'No'),
  (13, 'tesssst', '$2y$10$KPwkq2l5aGE8rw3fdb8pD.LfB8CNQliWaYg/RUOBorxdvk.lhogoe', 'qqq@yahoo.com', 'bc31a514da2a43a3345237e28ae229e5', NULL, 'No'),
  (12, 'nubian', '$2y$10$SWuDOWueUBWa./BnpueiHOlhDKLFPMAL8YWkdfC7a9SAhbjSBafoG', 'thatobabusi@yahoo.com', '030494cac9fcf30a9cd14648b026a933', NULL, 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
