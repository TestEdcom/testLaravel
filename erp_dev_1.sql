/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : erp_dev_1

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-02-07 21:41:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `areas_cities_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `areas_cities_tbl`;
CREATE TABLE `areas_cities_tbl` (
  `area_code` varchar(255) DEFAULT NULL,
  `city_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of areas_cities_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `areas_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `areas_tbl`;
CREATE TABLE `areas_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) DEFAULT NULL,
  `area_code` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of areas_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `channel`
-- ----------------------------
DROP TABLE IF EXISTS `channel`;
CREATE TABLE `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `trash` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of channel
-- ----------------------------
INSERT INTO `channel` VALUES ('1', 'WWWW 1111 444444', 'CH00001', 'WWWWWWWWW EEEEEEEEEE 2222222222 55555555', '1');
INSERT INTO `channel` VALUES ('2', 'wwwwwwwww', 'CH00002', 'ASsasDD', '1');
INSERT INTO `channel` VALUES ('3', 'SDFSDF ASDASDASDASD', 'CH00003', 'SDFSDF', '0');
INSERT INTO `channel` VALUES ('4', 'Promotions', 'CH00004', 'Test TESt', '0');

-- ----------------------------
-- Table structure for `cities_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `cities_tbl`;
CREATE TABLE `cities_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) DEFAULT NULL,
  `city_code` varchar(255) DEFAULT NULL,
  `districts_code` varchar(255) DEFAULT NULL,
  `province_code` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cities_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for `district_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `district_tbl`;
CREATE TABLE `district_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `districts_name` varchar(255) NOT NULL,
  `districts_code` varchar(255) DEFAULT NULL,
  `province_code` varchar(255) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of district_tbl
-- ----------------------------
INSERT INTO `district_tbl` VALUES ('8', 'Ampara', 'DISTRICT001', 'PROVINCE002', null, null);
INSERT INTO `district_tbl` VALUES ('9', 'Anuradhapura', 'DISTRICT002', 'PROVINCE003', null, null);
INSERT INTO `district_tbl` VALUES ('10', 'Badulla', 'DISTRICT003', 'PROVINCE008', null, null);
INSERT INTO `district_tbl` VALUES ('11', 'Batticaloa', 'DISTRICT004', 'PROVINCE002', null, null);
INSERT INTO `district_tbl` VALUES ('12', 'Colombo', 'DISTRICT005', 'PROVINCE009', null, null);
INSERT INTO `district_tbl` VALUES ('13', 'Galle', 'DISTRICT006', 'PROVINCE007', null, null);
INSERT INTO `district_tbl` VALUES ('14', 'Gampaha', 'DISTRICT007', 'PROVINCE009', null, null);
INSERT INTO `district_tbl` VALUES ('15', 'Hambantota', 'DISTRICT008', 'PROVINCE007', null, null);
INSERT INTO `district_tbl` VALUES ('16', 'Jaffna', 'DISTRICT009', 'PROVINCE004', null, null);
INSERT INTO `district_tbl` VALUES ('17', 'Kalutara', 'DISTRICT010', 'PROVINCE009', null, null);
INSERT INTO `district_tbl` VALUES ('18', 'Kandy', 'DISTRICT011', 'PROVINCE001', null, null);
INSERT INTO `district_tbl` VALUES ('19', 'Kegalle', 'DISTRICT012', 'PROVINCE006', null, null);
INSERT INTO `district_tbl` VALUES ('20', 'Kilinochchi', 'DISTRICT013', 'PROVINCE004', null, null);
INSERT INTO `district_tbl` VALUES ('21', 'Kurunegala', 'DISTRICT014', 'PROVINCE005', null, null);
INSERT INTO `district_tbl` VALUES ('22', 'Mannar', 'DISTRICT015', 'PROVINCE004', null, null);
INSERT INTO `district_tbl` VALUES ('23', 'Matale', 'DISTRICT016', 'PROVINCE001', null, null);
INSERT INTO `district_tbl` VALUES ('24', 'Matara', 'DISTRICT017', 'PROVINCE007', null, null);
INSERT INTO `district_tbl` VALUES ('25', 'Monaragala', 'DISTRICT018', 'PROVINCE008', null, null);
INSERT INTO `district_tbl` VALUES ('26', 'Mullaitivu', 'DISTRICT019', 'PROVINCE004', null, null);
INSERT INTO `district_tbl` VALUES ('27', 'Nuwara Eliya', 'DISTRICT020', 'PROVINCE001', null, null);
INSERT INTO `district_tbl` VALUES ('28', 'Polonnaruwa', 'DISTRICT021', 'PROVINCE003', null, null);
INSERT INTO `district_tbl` VALUES ('29', 'Puttalam', 'DISTRICT022', 'PROVINCE005', null, null);
INSERT INTO `district_tbl` VALUES ('30', 'Ratnapura', 'DISTRICT023', 'PROVINCE006', null, null);
INSERT INTO `district_tbl` VALUES ('31', 'Trincomalee', 'DISTRICT024', 'PROVINCE002', null, null);
INSERT INTO `district_tbl` VALUES ('32', 'Vavuniya', 'DISTRICT025', 'PROVINCE004', null, null);

-- ----------------------------
-- Table structure for `merchandiser`
-- ----------------------------
DROP TABLE IF EXISTS `merchandiser`;
CREATE TABLE `merchandiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `trash` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of merchandiser
-- ----------------------------
INSERT INTO `merchandiser` VALUES ('1', 'kasun11111', 'MERCH001', 'hiranthad1111117e@gmail.com', '211111', '0');
INSERT INTO `merchandiser` VALUES ('2', 'AAAA111', 'MERCH002', 'hiranthad17e@gmail.com', '111', '1');
INSERT INTO `merchandiser` VALUES ('3', 'WWWW', 'MERCH003', 'hiranthadWWWWW7e@gmail.com', '333334444444444', '1');
INSERT INTO `merchandiser` VALUES ('4', 'sdaSD !!!!!!!!!', 'MERCH004', 'ASD', 'ASDAS', '0');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_23_055451_create_tax_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `payment_method`
-- ----------------------------
DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE `payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trash` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of payment_method
-- ----------------------------
INSERT INTO `payment_method` VALUES ('1', 'AAAA11110000', '1453625415', '1453626893', '0');
INSERT INTO `payment_method` VALUES ('2', 'SSSSS', '1453625458', '', '0');
INSERT INTO `payment_method` VALUES ('3', 'DDDDDD', '1453625463', '', '0');
INSERT INTO `payment_method` VALUES ('4', 'FFFFFF', '1453625468', '', '1');
INSERT INTO `payment_method` VALUES ('5', 'GGGGGG', '1453625473', '', '1');
INSERT INTO `payment_method` VALUES ('6', 'HHHHHH', '1453625480', '', '0');
INSERT INTO `payment_method` VALUES ('7', 'QQQQQQ', '1453625486', '', '0');

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'edit_topic', 'user will be able to edit the topic', '2016-01-31 08:15:56', '2016-01-31 08:15:56');
INSERT INTO `permissions` VALUES ('2', 'delete_topic', 'Can Delete the topic', '2016-01-31 08:31:23', '2016-01-31 08:31:23');
INSERT INTO `permissions` VALUES ('3', 'save topic', 'only save can be done', '2016-01-31 11:42:29', '2016-01-31 11:48:30');

-- ----------------------------
-- Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('3', '3');

-- ----------------------------
-- Table structure for `provinces_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `provinces_tbl`;
CREATE TABLE `provinces_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(255) DEFAULT NULL,
  `province_code` varchar(255) NOT NULL DEFAULT '',
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`province_code`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of provinces_tbl
-- ----------------------------
INSERT INTO `provinces_tbl` VALUES ('17', 'Central', 'PROVINCE001', null);
INSERT INTO `provinces_tbl` VALUES ('18', 'Eastern', 'PROVINCE002', null);
INSERT INTO `provinces_tbl` VALUES ('19', 'North Central', 'PROVINCE003', null);
INSERT INTO `provinces_tbl` VALUES ('20', 'Northern', 'PROVINCE004', null);
INSERT INTO `provinces_tbl` VALUES ('21', 'North Western', 'PROVINCE005', null);
INSERT INTO `provinces_tbl` VALUES ('22', 'Sabaragamuwa', 'PROVINCE006', null);
INSERT INTO `provinces_tbl` VALUES ('23', 'Southern', 'PROVINCE007', null);
INSERT INTO `provinces_tbl` VALUES ('24', 'Uva', 'PROVINCE008', null);
INSERT INTO `provinces_tbl` VALUES ('25', 'Western', 'PROVINCE009', null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super admin', 'This is super admi of the systemn', '2016-01-31 07:20:05', '2016-01-31 07:20:05');
INSERT INTO `roles` VALUES ('2', 'admin', 'All Admin Permission', '2016-01-31 08:30:08', '2016-01-31 08:30:08');
INSERT INTO `roles` VALUES ('3', 'admin 2', 'low level of admin', '2016-01-31 11:47:38', '2016-01-31 11:47:38');

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1');
INSERT INTO `role_user` VALUES ('2', '2');

-- ----------------------------
-- Table structure for `salesperson_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `salesperson_tbl`;
CREATE TABLE `salesperson_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesperson_code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_land` varchar(15) NOT NULL,
  `phone_mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `trash` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salesperson_tbl
-- ----------------------------
INSERT INTO `salesperson_tbl` VALUES ('1', '001', 'dfg', 'sdfg', 'sdf', 'sdfg', '1', '0');
INSERT INTO `salesperson_tbl` VALUES ('2', '002', 'dfg @@@@@@@@@@@@@@ %%%%%%%%%%%%%%', 'sdfg', 'sdf', 'sdfg', '1', '1');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(100) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'company_name', 'AAAAAA');
INSERT INTO `settings` VALUES ('2', 'company_address', 'SSSS');
INSERT INTO `settings` VALUES ('3', 'company_email', 'aa55555aa@gmail.com');
INSERT INTO `settings` VALUES ('4', 'company_phone', '33333444444');

-- ----------------------------
-- Table structure for `suppliers_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `suppliers_tbl`;
CREATE TABLE `suppliers_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(50) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `contact_person_name` varchar(100) NOT NULL,
  `phone_land` varchar(15) NOT NULL,
  `phone_mobile` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web_address` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `address_1` varchar(100) NOT NULL,
  `address_2` varchar(100) NOT NULL,
  `city` varchar(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `trash` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers_tbl
-- ----------------------------
INSERT INTO `suppliers_tbl` VALUES ('1', '001', 'sdfasd !!!!!!!!!!!!!!!!!!!!!', 'aSDasd', '333333', '44444', '4444', 'hiranthad7e@gmail.com', 'asdfsdf', 'asdf @@@@@@@@@@@@@@@', 'sadf', 'asd', 'asd', 'asd', '1', '1');

-- ----------------------------
-- Table structure for `tax_rates`
-- ----------------------------
DROP TABLE IF EXISTS `tax_rates`;
CREATE TABLE `tax_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_rate` decimal(4,2) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `trash` char(1) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tax_rates
-- ----------------------------
INSERT INTO `tax_rates` VALUES ('1', 'test', '12.12', '0000-00-00 00:00:00', '1', '1');
INSERT INTO `tax_rates` VALUES ('2', 'Withholding Taxes', '1.10', '1453746927', '1', '1');
INSERT INTO `tax_rates` VALUES ('3', 'Economic Service Charge', '1.00', '1453741616', '1', '0');
INSERT INTO `tax_rates` VALUES ('4', 'Sales Tax Rate ', '1.10', '1453747233', '1', '0');
INSERT INTO `tax_rates` VALUES ('5', 'Corporate Income Tax​ ', '1.00', '1454859332', '1', '0');
INSERT INTO `tax_rates` VALUES ('9', 'asdasd', '1.10', '1453912298', '1', '0');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Administrator', 'sampathgamage3@gmail.com', '$2y$10$raohqlQXGQkVOps154aIUeSSdxGbGchz6cg3114RGiVo1CmB82gpa', 'EwBzk05jB6ZYyzOp4Ekr37yoNN2fNTvWpvLUTCgLA6tOQgx5LEwB2cem6F2w', '2016-01-25 18:28:08', '2016-02-06 06:03:56');
INSERT INTO `users` VALUES ('2', 'Admin', 'sam@sam.com', '$2y$10$4nF54C8O9X84ZgjMrrcYSuPjRxNbCJHLfj0iIewvFhw3v4sHD81YW', null, '2016-01-31 13:00:12', '2016-01-31 13:00:12');

-- ----------------------------
-- Table structure for `user_log_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `user_log_tbl`;
CREATE TABLE `user_log_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `taskID` varchar(255) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_log_tbl
-- ----------------------------
INSERT INTO `user_log_tbl` VALUES ('1', '1', 'Tax Rates', 'Tax Record Updated', '4', '1453745975');
INSERT INTO `user_log_tbl` VALUES ('3', '1', '\"Tax Rates\"', '\"Tax Record Updated\"', '2', '1453746927');
INSERT INTO `user_log_tbl` VALUES ('4', '1', '\"Tax Rates\"', 'Tax Record Updated', '4', '1453747099');
INSERT INTO `user_log_tbl` VALUES ('5', '1', '\'Tax Rates\'', '\'Tax Record Updated\'', '4', '1453747141');
INSERT INTO `user_log_tbl` VALUES ('6', '1', '\'Tax Rates\'', '\'.Tax Record Updated.\'', '4', '1453747164');
INSERT INTO `user_log_tbl` VALUES ('7', '1', '.$event.', '.$task.', '4', '1453747189');
INSERT INTO `user_log_tbl` VALUES ('8', '1', '`Tax Rates`', '.$task.', '4', '1453747233');
INSERT INTO `user_log_tbl` VALUES ('9', '1', 'Tax Rates', 'Tax Record Updated', '5', '1453747279');
INSERT INTO `user_log_tbl` VALUES ('10', '1', 'Tax Rates', 'New Tax Record Saved', '9', '1453912298');
