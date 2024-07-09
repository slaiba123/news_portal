-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: newsportal
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey` (
  `response_id` int NOT NULL,
  `question_id` int NOT NULL,
  PRIMARY KEY (`response_id`,`question_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`response_id`) REFERENCES `survey_response` (`response_id`),
  CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `survey_question` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_question`
--

DROP TABLE IF EXISTS `survey_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_question` (
  `question_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `question_text` text,
  PRIMARY KEY (`question_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `survey_question_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbladmin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_question`
--

LOCK TABLES `survey_question` WRITE;
/*!40000 ALTER TABLE `survey_question` DISABLE KEYS */;
INSERT INTO `survey_question` VALUES (1,1,'How satisfied are you with our service?'),(2,3,'Would you recommend our product to others?'),(3,4,'What improvements would you like to see in our website?');
/*!40000 ALTER TABLE `survey_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_response`
--

DROP TABLE IF EXISTS `survey_response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_response` (
  `response_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `response_text` text,
  PRIMARY KEY (`response_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `survey_response_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tblusers` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_response`
--

LOCK TABLES `survey_response` WRITE;
/*!40000 ALTER TABLE `survey_response` DISABLE KEYS */;
INSERT INTO `survey_response` VALUES (1,1,'I think current events are concerning.'),(2,2,'Overall, I am very satisfied with the service.'),(3,3,'Yes, I would definitely recommend it.');
/*!40000 ALTER TABLE `survey_response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbladmin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `AdminUserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `AdminUserName` (`AdminUserName`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmin`
--

LOCK TABLES `tbladmin` WRITE;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` VALUES (1,'admin','f925916e2754e5e03f75dd58a5733251','phpgurukulofficial@gmail.com',1,'2024-01-09 18:30:00','2024-01-31 05:42:52'),(3,'subadmin','f925916e2754e5e03f75dd58a5733251','sudamin@gmail.in',0,'2024-01-09 18:30:00','2024-01-31 05:43:01'),(4,'suadmin2','f925916e2754e5e03f75dd58a5733251','sbadmin@test.com',0,'2024-01-09 18:30:00','2024-01-31 05:43:01');
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategory`
--

LOCK TABLES `tblcategory` WRITE;
/*!40000 ALTER TABLE `tblcategory` DISABLE KEYS */;
INSERT INTO `tblcategory` VALUES (1,'Style','We stay in style','2024-01-11 13:30:00','2024-01-31 00:43:16',1),(2,'Food','For all Foodies','2024-01-11 13:30:00','2024-01-31 00:43:16',1),(3,'Sports','Related to sports news','2024-01-11 18:30:00','2024-01-31 05:43:16',1),(4,'Health','For All Health Freaks','2024-01-11 13:30:00','2024-01-31 00:43:16',1),(5,'Entertainment','Entertainment related  News','2024-01-11 18:30:00','2024-01-31 05:43:25',1),(6,'Politics','Politics','2024-01-11 18:30:00','2024-01-31 05:43:25',1);
/*!40000 ALTER TABLE `tblcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcomments`
--

DROP TABLE IF EXISTS `tblcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcomments` (
  `comm_id` int NOT NULL AUTO_INCREMENT,
  `postId` int DEFAULT NULL,
  `comment` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `id` (`comm_id`),
  KEY `postId` (`postId`),
  CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `tblposts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcomments`
--

LOCK TABLES `tblcomments` WRITE;
/*!40000 ALTER TABLE `tblcomments` DISABLE KEYS */;
INSERT INTO `tblcomments` VALUES (1,12,'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.','2024-01-17 18:30:00',1),(2,12,'This is sample text for testing.','2024-01-18 18:30:00',1),(3,7,'This is sample text for testing.','2024-01-22 18:30:00',0);
/*!40000 ALTER TABLE `tblcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpages`
--

DROP TABLE IF EXISTS `tblpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `Description` longtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpages`
--

LOCK TABLES `tblpages` WRITE;
/*!40000 ALTER TABLE `tblpages` DISABLE KEYS */;
INSERT INTO `tblpages` VALUES (1,'aboutus','About News Portal','<font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br>','2024-01-14 18:30:00','2024-01-31 05:44:12'),(2,'contactus','Contact Details','<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>phpgurukulofficial@gmail.com</p>','2024-01-15 18:30:00','2024-01-31 05:44:24');
/*!40000 ALTER TABLE `tblpages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblposts`
--

DROP TABLE IF EXISTS `tblposts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblposts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PostTitle` longtext,
  `CategoryId` int DEFAULT NULL,
  `SubCategoryId` int DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL,
  `PostUrl` mediumtext,
  `PostImage` varchar(255) DEFAULT NULL,
  `viewCounter` int DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `postcatid` (`CategoryId`),
  KEY `postsucatid` (`SubCategoryId`),
  KEY `subadmin` (`postedBy`),
  CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory` (`SubCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subadmin` FOREIGN KEY (`postedBy`) REFERENCES `tbladmin` (`AdminUserName`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblposts`
--

LOCK TABLES `tblposts` WRITE;
/*!40000 ALTER TABLE `tblposts` DISABLE KEYS */;
INSERT INTO `tblposts` VALUES (1,'New Tax Reforms Announced by the Government',6,7,'The government has announced a series of new tax reforms aimed at boosting the economy and reducing the fiscal deficit. These reforms include changes in income tax brackets and corporate tax rates.','2024-02-01 04:00:00','2024-07-06 12:57:04',1,'mid-adult-blonde-female-political-leader-addressing-world-important-issues-wit-SBV-346755528-preview(1).mp4','images.jpg',3000,'admin',NULL),(2,'Election Commission Releases 2024 Election Schedule',6,7,'The Election Commission has released the schedule for the upcoming 2024 general elections. The elections will be held in seven phases starting from April 11 and ending on May 19, with counting on May 23.','2024-02-02 05:00:00','2024-07-06 12:57:04',1,'election-commission-releases-2024-election-schedule','hands.jpg',2000,'admin',NULL),(3,'Prime Minister Addresses the Nation on Economic Policies',6,7,'In a televised address, the Prime Minister outlined the government’s economic policies and the steps being taken to ensure sustainable growth. He emphasized the need for fiscal discipline and innovative solutions.','2024-02-03 06:00:00','2024-07-06 12:57:04',1,'prime-minister-addresses-the-nation-on-economic-policies','fire.jpg',3000,'admin',NULL),(4,'Opposition Leaders Criticize New Healthcare Bill',6,7,'Opposition leaders have voiced strong criticism against the new healthcare bill introduced by the government. They argue that the bill will reduce access to essential healthcare services for the underprivileged.','2024-02-04 07:00:00','2024-07-06 13:01:47',1,'opposition-leaders-criticize-new-healthcare-bill','immo.jpg',4001,'admin',NULL),(5,'New Environmental Regulations Passed by Parliament',6,7,'Parliament has passed new environmental regulations aimed at reducing carbon emissions and promoting sustainable development. The regulations include stricter controls on industrial pollution and incentives for renewable energy projects.','2024-02-05 08:00:00','2024-07-06 12:40:46',1,'new-environmental-regulations-passed-by-parliament','mid-adult-blonde-female-political-leader-addressing-world-important-issues-wit-SBV-346755528-preview(1).mp4',5000,'admin',NULL),(6,'Foreign Minister Visits US to Strengthen Bilateral Ties',6,7,'The Foreign Minister is on an official visit to the United States to discuss ways to strengthen bilateral ties and enhance cooperation on various global issues, including trade, security, and climate change.','2024-02-06 09:00:00','2024-07-06 13:45:54',1,'foreign-minister-visits-us-to-strengthen-bilateral-ties','images_portal.jpg',6010,'admin',NULL),(7,'Jasprit Bumrah ruled out of England T20I series due to injury',3,4,'The Indian Cricket Team has received a huge blow right ahead of the commencement of the much-awaited series against England. Star speedster Jasprit Bumrah has been ruled out of the forthcoming 3-match T20I series as he suffered an injury in his left thumb.The 24-year-old pacer picked up a niggle during India’s first T20I match against Ireland played on June 27 at the Malahide cricket ground in Dublin. As per the reports, he is likely to be available for the ODI series against England scheduled to start from July 12.In the first, Bumrah exhibited a phenomenal performance with the ball. In his quota of four overs, he conceded 19 runs and picked 2 wickets at an economy rate of 4.75.Post his injury, he arrived at team’s optional training session on Thursday but didn’t train. Later, he was rested in the second face-off along with MS Dhoni, Shikhar Dhawan and Bhuvneshwar Kumar.of now, no replacement has been announced. However, Umesh Yadav may be be given chance in the team in Bumrah’s absence. foThe first T20I match between India and England will be played at Old Trafford, Manchester on July 3.','2024-01-15 18:30:00','2024-07-06 10:38:00',1,'Jasprit-Bumrah-ruled-out-of-England-T20I-series-due-to-injury','6d08a26c92cf30db69197a1fb7230626.jpg',24,'admin',NULL),(8,'Government Launches New Digital India Initiative',6,7,'The government has launched a new initiative under the Digital India campaign, aimed at improving digital infrastructure and promoting digital literacy across the country. The initiative includes new projects in e-governance and digital education.','2024-02-07 10:00:00','2024-07-06 13:06:29',1,'government-launches-new-digital-india-initiative','images8.jpg',7005,'admin',NULL),(9,'Budget 2024: Key Highlights and Reactions',6,7,'The Finance Minister has presented the Budget for 2024, outlining key fiscal measures and allocation of resources for various sectors. The budget has received mixed reactions from industry leaders and political analysts.','2024-02-08 11:00:00','2024-07-06 13:46:18',1,'budget-2024-key-highlights-and-reactions','images9.jpg',2005,'admin',NULL),(11,'UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping',6,8,'UNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeeping','2024-01-16 18:30:00','2024-07-06 11:09:08',1,'UNs-Jean-Pierre-Lacroix-thanks-India-for-contribution-to-peacekeeping','27095ab35ac9b89abb8f32ad3adef56a.jpg',8000,'admin',NULL),(12,'Shah holds meeting with NE states leaders in Manipur',6,7,'New Delhi: BJP president Amit Shah today held meetings with his party leaders who are in-charge of 11 Lok Sabha seats spread across seven northeast states as part of a drive to ensure that it wins the maximum number of these constituencies in the general election next year.Shah held separate meetings with Lok Sabha toli (group) of Arunachal Pradesh, Tripura, Meghalaya, Mizoram, Nagaland, Sikkim and Manipur in Manipur, the party\'s media head Anil Baluni said.Baluni said that Shah was in West Bengal for two days before he arrived in Manipur. The BJP chief would reach Odisha tomorrow','2024-01-17 18:30:00','2024-07-06 11:09:08',1,'Shah-holds-meeting-with-NE-states-leaders-in-Manipur','7fdc1a630c238af0815181f9faa190f5.jpg',9000,'admin',NULL),(13,'T20 World Cup 2021: Semi-final 1, England vs New Zealand',3,4,'New Zealand held their nerves admirably to make it a hat-trick of ICC event final entrances, trumping <strong>England</strong></a> in a see-sawing semi-final clash in Abu Dhabi. You would feel they are too nice to believe in revenging anything, even if it is as bitter as the fateful 2019 ODI World Cup loss, so let’s put it this way: the scores are settled. And in doing so, New Zealand have made it to the finals of a tournament no one counted them as the favourites of.After being inserted, a Jason Roy-less England managed 166/4 largely on the back of Dawid Malan (41 off 30), who got back his mojo at the right time, and Moeen Ali (51 off 37), who proved it for the umpteenth time what a marvellous short-format asset he is.','2024-01-18 18:30:00','2024-07-06 11:09:08',1,'T20-World-Cup-2021:-Semi-final-1,-England-vs-New-Zealand-â€“-Who-Said-What','8bc5c30be91dca9d07c1db858c60e39f.jpg',10000,'admin','subadmin'),(14,'Supreme Court Ruling on Electoral Bonds',6,7,'The Supreme Court has issued a ruling on the legality of electoral bonds, stating that they can be used for political funding but with strict regulations to ensure transparency and accountability.','2024-02-09 12:00:00','2024-07-06 13:45:59',1,'supreme-court-ruling-on-electoral-bonds','images14.jpg',4008,'admin',NULL),(15,'Top 10 Summer Fashion Trends for 2024',1,1,'Discover the top fashion trends for the summer of 2024. From bold colors to sustainable fabrics, here\'s what you need to stay stylish.','2024-05-01 04:00:00','2024-07-06 15:29:03',1,'top-10-summer-fashion-trends-2024','l2.jpg',1200,'admin',NULL),(16,'Healthy Lifestyle Tips for Busy Professionals',1,2,'Busy professionals often neglect their health. Here are some practical tips to maintain a healthy lifestyle despite a hectic schedule.','2024-05-05 05:00:00','2024-07-06 15:29:03',1,'healthy-lifestyle-tips-for-busy-professionals','f3.jpg',850,'admin',NULL),(17,'The Rise of Sustainable Fashion',1,1,'Sustainable fashion is gaining popularity as more people become aware of its impact on the environment. Learn about the key brands and trends in this movement.','2024-05-10 06:00:00','2024-07-06 16:05:56',1,'the-rise-of-sustainable-fashion','l1.jpg',951,'admin',NULL),(18,'Top Fitness Trends to Watch in 2024',1,2,'Stay ahead of the fitness game with these top trends for 2024. From virtual workouts to wearable technology, find out what\'s new in fitness.','2024-05-15 03:00:00','2024-07-06 15:37:27',1,'top-fitness-trends-to-watch-2024','helsinki-finland-october-20-2017-fashion-show-katri-niskanen-during-fair-i-lov-SBV-318429871-preview.mp4',720,'admin',NULL),(19,'How to Create a Capsule Wardrobe',1,1,'Simplify your wardrobe with a capsule collection. Learn the basics of building a versatile and stylish wardrobe with fewer pieces.','2024-05-20 04:30:00','2024-07-06 15:29:03',1,'how-to-create-a-capsule-wardrobe','f2.jpg',530,'admin',NULL),(20,'Mental Health and Lifestyle: Tips for Balance',1,2,'Balancing mental health and lifestyle can be challenging. Here are some tips to help you maintain a healthy mental state while living a busy life.','2024-05-25 02:00:00','2024-07-06 15:29:03',1,'mental-health-and-lifestyle-tips-for-balance','l5.jpg',670,'admin',NULL),(21,'Best Organic Beauty Products of 2024',1,1,'Looking for organic beauty products? Check out our list of the best organic beauty products of 2024 to keep your skin healthy and glowing.','2024-05-30 07:00:00','2024-07-06 15:29:03',1,'best-organic-beauty-products-2024','l5.jpg',780,'admin',NULL),(22,'Travel Guide: Top Lifestyle Destinations in 2024',1,2,'Explore the top lifestyle destinations to visit in 2024. From tropical beaches to bustling cities, find the perfect spot for your next vacation.','2024-06-01 06:00:00','2024-07-06 15:29:03',1,'travel-guide-top-lifestyle-destinations-2024','l3.jpg',650,'admin',NULL),(23,'Fashion Tips for the Modern Man',1,1,'Men\'s fashion is evolving. Get the latest fashion tips for the modern man to keep your wardrobe updated and stylish.','2024-06-05 03:30:00','2024-07-06 15:37:46',1,'fashion-tips-for-the-modern-man','f3.jpg',501,'admin',NULL),(24,'The Rise of Artisanal Sweets in the Market',2,9,'Artisanal sweets have been gaining popularity in the market, offering unique flavors and high-quality ingredients. Many small businesses are thriving by focusing on handcrafted confectioneries.','2024-07-06 05:00:00','2024-07-06 05:00:00',1,'the-rise-of-artisanal-sweets-in-the-market','s1.jpeg',150,'admin',NULL),(25,'Health Benefits of Natural Fruit Drinks',2,10,'Natural fruit drinks are becoming a popular choice for health-conscious consumers. These beverages are rich in vitamins, minerals, and antioxidants, making them a nutritious alternative to sugary sodas.','2024-07-06 06:00:00','2024-07-06 16:46:44',1,'health-benefits-of-natural-fruit-drinks','d1.jpeg',200,'admin',NULL),(26,'The Best Homemade Dessert Recipes for Summer',2,9,'With summer in full swing, it\'s the perfect time to try out some refreshing homemade dessert recipes. From fruit sorbets to no-bake cheesecakes, these recipes are easy to make and perfect for any occasion.','2024-07-06 07:00:00','2024-07-06 16:50:31',1,'the-best-homemade-dessert-recipes-for-summer','family-puts-food-on-plates-at-buffet-table-2-SBV-300066298-preview.mp4',180,'admin',NULL),(27,'Exploring Exotic Coffee Drinks from Around the World',2,10,'Coffee enthusiasts are always on the lookout for new and exciting flavors. This article explores some of the most exotic coffee drinks from around the world, including Turkish coffee, Vietnamese egg coffee, and Italian affogato.','2024-07-06 08:00:00','2024-07-06 16:46:44',1,'exploring-exotic-coffee-drinks-from-around-the-world','d2.jpeg',220,'subadmin',NULL),(28,'Vegan Sweets: Delicious and Cruelty-Free',2,9,'Vegan sweets are not only delicious but also cruelty-free, making them a great choice for those looking to enjoy treats without compromising their values. This article highlights some of the best vegan sweet recipes and brands.','2024-07-06 09:00:00','2024-07-06 16:46:44',1,'vegan-sweets-delicious-and-cruelty-free','s3.jpeg',175,'admin',NULL),(29,'The Popularity of Spicy Foods: Why We Love the Heat',2,11,'Spicy foods have a dedicated fan base, and their popularity continues to grow. This article delves into the reasons why people love spicy foods and explores some of the hottest dishes from around the world.','2024-07-06 10:00:00','2024-07-06 16:46:44',1,'the-popularity-of-spicy-foods-why-we-love-the-heat','h1.jpeg',300,'subadmin',NULL),(30,'The Popularity of Spicy Foods: Why We Love the Heat',2,11,'Spicy foods have a dedicated fan base, and their popularity continues to grow. This article delves into the reasons why people love spicy foods and explores some of the hottest dishes from around the world.','2024-07-06 10:00:00','2024-07-08 22:04:56',1,'the-popularity-of-spicy-foods-why-we-love-the-heat','h2.jpg',302,'subadmin',NULL),(31,'Top 10 Must-Watch Movies of 2024',5,3,'Discover the top 10 must-watch movies of 2024, featuring an exciting mix of action, drama, and comedy that you won\'t want to miss.','2024-07-01 05:00:00','2024-07-06 17:41:54',1,NULL,'e2.jpg',350,'admin',NULL),(32,'Exclusive Interview with Famous Director',5,6,'Get an exclusive insight into the life and career of a renowned director, as they discuss their latest blockbuster and upcoming projects.','2024-07-02 04:00:00','2024-07-06 17:41:54',1,NULL,'e3.jpg',280,'admin',NULL),(33,'Behind the Scenes of a Hit TV Series',5,3,'Take a peek behind the scenes of a popular TV series, from set design to scriptwriting, and meet the talented cast and crew.','2024-07-03 06:00:00','2024-07-06 17:41:54',1,NULL,'e4.png',410,'subadmin',NULL),(34,'The Rise of Virtual Reality in Gaming',5,6,'Explore how virtual reality technology is revolutionizing the gaming industry, providing immersive experiences and new gameplay possibilities.','2024-07-04 08:00:00','2024-07-06 17:41:54',1,NULL,'e5.jpg',320,'admin',NULL),(35,'Review: Concert of the Year',5,3,'Read our review of the concert that everyone is talking about, featuring top-notch performances and unforgettable moments.','2024-07-05 10:00:00','2024-07-06 18:37:49',1,NULL,'laser-light-show-with-people-dancing-at-night-in-the-middle-of-a-desert-music--SBV-347569638-preview.mp4',380,'subadmin',NULL),(36,'Top 10 TV Shows You Must Binge-Watch in 2024',5,4,'Explore the top 10 TV shows you must binge-watch in 2024. From gripping dramas to hilarious comedies, these shows are perfect for your entertainment!','2024-07-05 07:00:00','2024-07-06 17:41:54',1,NULL,'e1.jpg',280,'admin',NULL),(37,'Best Video Games of 2024 You Should Play',5,5,'Discover the best video games of 2024 that every gamer should play. From action-packed adventures to immersive RPGs, these games will keep you entertained!','2024-07-06 09:30:00','2024-07-06 17:41:54',1,NULL,'e7.jpg',320,'admin',NULL),(38,'Top 5 Music Albums Making Waves in 2024',5,6,'Check out the top 5 music albums making waves in 2024. Whether you are into pop, rock, or hip-hop, these albums showcase the best of this year\'s music scene!','2024-07-07 06:00:00','2024-07-06 17:41:54',1,NULL,'e8.jpg',250,'admin',NULL),(39,'The Importance of Regular Exercise',4,NULL,'Learn about the importance of regular exercise for maintaining good physical and mental health.','2024-07-06 04:00:00','2024-07-06 04:00:00',1,NULL,'he1.jpg',200,'admin',NULL),(40,'Healthy Eating Tips for Busy Professionals',4,NULL,'Discover practical tips for busy professionals to maintain a healthy diet amidst a hectic schedule.','2024-07-05 10:30:00','2024-07-05 10:30:00',1,NULL,'he2.jpg',180,'admin',NULL),(41,'Benefits of Meditation for Stress Relief',4,NULL,'Explore how meditation can effectively reduce stress and promote overall well-being.','2024-07-04 06:00:00','2024-07-04 06:00:00',1,NULL,'he3.jpg',220,'admin',NULL),(42,'Tips for Better Sleep Hygiene',4,NULL,'Learn practical tips to improve sleep hygiene and enhance overall sleep quality.','2024-07-03 12:45:00','2024-07-03 12:45:00',1,NULL,'he4.png',190,'admin',NULL),(43,'Common Mental Health Issues in Adolescents',4,NULL,'Identify common mental health issues that adolescents face and how they can be addressed.','2024-07-02 09:20:00','2024-07-02 09:20:00',1,NULL,'he5.jpg',160,'admin',NULL),(44,'Benefits of Regular Cardiovascular Exercise',4,NULL,'Explore the various benefits of incorporating regular cardiovascular exercise into your routine.','2024-07-01 07:00:00','2024-07-06 18:37:49',1,NULL,'doctor-explaining-x-ray-results-to-patient-during-hospital-visit-SBV-347292618-preview.mp4',230,'admin',NULL),(45,'Nutritional Benefits of Eating More Fruits and Vegetables',4,NULL,'Discover the nutritional benefits of adding more fruits and vegetables to your daily diet.','2024-06-30 05:30:00','2024-06-30 05:30:00',1,NULL,'he7.jpg',250,'admin',NULL),(46,'Tips for Managing Stress at Work',4,NULL,'Learn effective strategies for managing and reducing stress in the workplace.','2024-06-29 11:00:00','2024-06-29 11:00:00',1,NULL,'he8.jpg',210,'admin',NULL),(47,'The Importance of Mental Health Awareness',4,NULL,'Understand why raising awareness about mental health is crucial for overall well-being.','2024-06-28 08:45:00','2024-06-28 08:45:00',1,NULL,'he9.jpg',270,'admin',NULL),(48,'Top Football Transfer Rumors',3,5,'Explore the latest transfer rumors in football, including potential big-money moves and player transfers between clubs.','2024-07-02 06:45:00','2024-07-06 18:34:35',1,'top-football-transfer-rumors','fb1.jpg',250,'admin',NULL),(49,'Key Tactics for Winning Football Matches',3,5,'Discover key tactics and strategies used by top football teams to win matches, from defense to attack.','2024-07-01 05:15:00','2024-07-06 18:34:35',1,'winning-football-match-tactics','fb2.jpg',200,'admin',NULL),(50,'Upcoming Cricket Tournaments to Watch Out For',3,4,'Stay updated on the upcoming cricket tournaments around the world that promise thrilling cricket action.','2024-06-30 04:00:00','2024-07-06 18:37:49',1,'upcoming-cricket-tournaments','baseball-stadium-club-seat-fans-SBV-335761284-preview.mp4',230,'admin',NULL),(51,'Football Fitness Tips for Players',3,5,'Get essential fitness tips tailored for football players to improve endurance, strength, and agility on the field.','2024-06-29 10:30:00','2024-07-06 18:34:35',1,'football-fitness-tips','fb3.jpg',190,'admin',NULL);
/*!40000 ALTER TABLE `tblposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubcategory`
--

DROP TABLE IF EXISTS `tblsubcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int NOT NULL AUTO_INCREMENT,
  `CategoryId` int DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int DEFAULT NULL,
  PRIMARY KEY (`SubCategoryId`),
  KEY `catid` (`CategoryId`),
  CONSTRAINT `cat_id` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubcategory`
--

LOCK TABLES `tblsubcategory` WRITE;
/*!40000 ALTER TABLE `tblsubcategory` DISABLE KEYS */;
INSERT INTO `tblsubcategory` VALUES (1,1,'Lifestyle ','Lifestyle tips','2024-01-14 13:30:00','2024-01-31 00:48:30',1),(2,1,'Fashion','Fashion tips','2024-01-14 13:30:00','2024-01-31 00:48:30',1),(3,5,'Bollywood ','Bollywood masala','2024-01-14 18:30:00','2024-01-31 05:48:30',1),(4,3,'Cricket','Cricket\r\n\r\n','2024-01-14 18:30:00','2024-01-31 05:48:39',1),(5,3,'Football','Football','2024-01-14 18:30:00','2024-01-31 05:48:39',1),(6,5,'Television','TeleVision','2024-01-14 18:30:00','2024-01-31 05:48:39',1),(7,6,'National','National','2024-01-14 18:30:00','2024-01-31 05:48:39',1),(8,6,'International','International','2024-01-14 18:30:00','2024-01-31 05:48:39',1),(9,2,'Sweets','Various types of sweets including artisanal and vegan options.','2024-07-06 05:00:00','2024-07-06 05:00:00',1),(10,2,'Drinks','Health benefits of natural fruit drinks and exotic coffee varieties.','2024-07-06 06:00:00','2024-07-06 06:00:00',1),(11,2,'Spicy Food','Exploring the popularity and reasons why people love spicy foods.','2024-07-06 10:00:00','2024-07-06 10:00:00',1);
/*!40000 ALTER TABLE `tblsubcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblusers` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailId` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contactno` bigint DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusers`
--

LOCK TABLES `tblusers` WRITE;
/*!40000 ALTER TABLE `tblusers` DISABLE KEYS */;
INSERT INTO `tblusers` VALUES (1,'John Doe','john.doe@example.com',123,''),(2,'Jane Smith','jane.smith@example.com',987,''),(3,'Michael Johnson','michael.johnson@example.com',555,''),(4,'ayan','ayan123@gmail.com',123456789,'$2y$10$b59mobl8ZYTgHpTrw6nv7eqdzVcFGzwhBKB4hF/eW0KwFRF4uXBw.'),(5,'ayan','ayan123@gmail.com',123456789,'$2y$10$hdPNvnlPkqP/VM/Zb.FuoOFYAS7En9r6iNEGoZBpKrdQGxlPpsVSq'),(6,'ayan','ayan123@gmail.com',123456789,'$2y$10$flrXjR2TFPEZ0Y3RDGamEuQ4JKUSsZCjwNUGaL3Ez3aJCKS/lueMC');
/*!40000 ALTER TABLE `tblusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_comment`
--

DROP TABLE IF EXISTS `user_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_comment` (
  `comm_id` int NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`comm_id`,`userId`),
  KEY `userId` (`userId`),
  CONSTRAINT `comm_id` FOREIGN KEY (`comm_id`) REFERENCES `tblcomments` (`comm_id`),
  CONSTRAINT `user_comment_ibfk_1` FOREIGN KEY (`comm_id`) REFERENCES `tblcomments` (`comm_id`),
  CONSTRAINT `user_comment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `tblusers` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_comment`
--

LOCK TABLES `user_comment` WRITE;
/*!40000 ALTER TABLE `user_comment` DISABLE KEYS */;
INSERT INTO `user_comment` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `user_comment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-09 16:05:26
