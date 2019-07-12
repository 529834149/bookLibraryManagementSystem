/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : books

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-07-12 19:00:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '1', '首页', 'fa-bar-chart', '/', null, null, '2019-07-12 03:15:50');
INSERT INTO `admin_menu` VALUES ('2', '0', '2', 'Admin', 'fa-tasks', '', null, null, null);
INSERT INTO `admin_menu` VALUES ('3', '2', '3', 'Users', 'fa-users', 'auth/users', null, null, null);
INSERT INTO `admin_menu` VALUES ('4', '2', '4', 'Roles', 'fa-user', 'auth/roles', null, null, null);
INSERT INTO `admin_menu` VALUES ('5', '2', '5', 'Permission', 'fa-ban', 'auth/permissions', null, null, null);
INSERT INTO `admin_menu` VALUES ('6', '2', '6', 'Menu', 'fa-bars', 'auth/menu', null, null, null);
INSERT INTO `admin_menu` VALUES ('7', '2', '7', 'Operation log', 'fa-history', 'auth/logs', null, null, null);
INSERT INTO `admin_menu` VALUES ('8', '0', '0', '用户管理', 'fa-bars', 'members', '*', '2019-07-12 03:16:40', '2019-07-12 06:19:58');
INSERT INTO `admin_menu` VALUES ('9', '0', '0', '图书分类', 'fa-clone', 'booksCategories', '*', '2019-07-12 03:19:25', '2019-07-12 08:29:14');
INSERT INTO `admin_menu` VALUES ('10', '0', '0', '书籍信息', 'fa-bars', 'booksInformation', '*', '2019-07-12 03:20:46', '2019-07-12 09:58:11');
INSERT INTO `admin_menu` VALUES ('11', '0', '0', '图书借阅信息', 'fa-bars', 'books_borrowing', '*', '2019-07-12 03:22:04', '2019-07-12 03:22:04');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES ('1', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 02:35:41', '2019-07-12 02:35:41');
INSERT INTO `admin_operation_log` VALUES ('2', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 02:36:15', '2019-07-12 02:36:15');
INSERT INTO `admin_operation_log` VALUES ('3', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 02:36:16', '2019-07-12 02:36:16');
INSERT INTO `admin_operation_log` VALUES ('4', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 02:36:20', '2019-07-12 02:36:20');
INSERT INTO `admin_operation_log` VALUES ('5', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 02:37:38', '2019-07-12 02:37:38');
INSERT INTO `admin_operation_log` VALUES ('6', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 02:37:45', '2019-07-12 02:37:45');
INSERT INTO `admin_operation_log` VALUES ('7', '1', 'admin/auth/logout', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 02:37:49', '2019-07-12 02:37:49');
INSERT INTO `admin_operation_log` VALUES ('8', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:03:48', '2019-07-12 03:03:48');
INSERT INTO `admin_operation_log` VALUES ('9', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 03:04:16', '2019-07-12 03:04:16');
INSERT INTO `admin_operation_log` VALUES ('10', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:04:29', '2019-07-12 03:04:29');
INSERT INTO `admin_operation_log` VALUES ('11', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:04:40', '2019-07-12 03:04:40');
INSERT INTO `admin_operation_log` VALUES ('12', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:05:03', '2019-07-12 03:05:03');
INSERT INTO `admin_operation_log` VALUES ('13', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:05:54', '2019-07-12 03:05:54');
INSERT INTO `admin_operation_log` VALUES ('14', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:14:22', '2019-07-12 03:14:22');
INSERT INTO `admin_operation_log` VALUES ('15', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:14:27', '2019-07-12 03:14:27');
INSERT INTO `admin_operation_log` VALUES ('16', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:14:46', '2019-07-12 03:14:46');
INSERT INTO `admin_operation_log` VALUES ('17', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:14:56', '2019-07-12 03:14:56');
INSERT INTO `admin_operation_log` VALUES ('18', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 03:15:12', '2019-07-12 03:15:12');
INSERT INTO `admin_operation_log` VALUES ('19', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 03:15:36', '2019-07-12 03:15:36');
INSERT INTO `admin_operation_log` VALUES ('20', '1', 'admin/auth/menu/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 03:15:39', '2019-07-12 03:15:39');
INSERT INTO `admin_operation_log` VALUES ('21', '1', 'admin/auth/menu/1', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u9996\\u9875\",\"icon\":\"fa-bar-chart\",\"uri\":\"\\/\",\"roles\":[null],\"permission\":null,\"_token\":\"TBWdQdGlHZklk26GgQuFRbBlT6T7eEoyXPvvwVQU\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/book.org\\/admin\\/auth\\/menu\"}', '2019-07-12 03:15:50', '2019-07-12 03:15:50');
INSERT INTO `admin_operation_log` VALUES ('22', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:15:51', '2019-07-12 03:15:51');
INSERT INTO `admin_operation_log` VALUES ('23', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:15:53', '2019-07-12 03:15:53');
INSERT INTO `admin_operation_log` VALUES ('24', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 03:15:58', '2019-07-12 03:15:58');
INSERT INTO `admin_operation_log` VALUES ('25', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u7528\\u6237\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":\"member\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"TBWdQdGlHZklk26GgQuFRbBlT6T7eEoyXPvvwVQU\"}', '2019-07-12 03:16:40', '2019-07-12 03:16:40');
INSERT INTO `admin_operation_log` VALUES ('26', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:16:40', '2019-07-12 03:16:40');
INSERT INTO `admin_operation_log` VALUES ('27', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:16:43', '2019-07-12 03:16:43');
INSERT INTO `admin_operation_log` VALUES ('28', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u56fe\\u4e66\\u5206\\u7c7b\",\"icon\":\"fa-clone\",\"uri\":\"books_categories\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"TBWdQdGlHZklk26GgQuFRbBlT6T7eEoyXPvvwVQU\"}', '2019-07-12 03:19:25', '2019-07-12 03:19:25');
INSERT INTO `admin_operation_log` VALUES ('29', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:19:26', '2019-07-12 03:19:26');
INSERT INTO `admin_operation_log` VALUES ('30', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:19:27', '2019-07-12 03:19:27');
INSERT INTO `admin_operation_log` VALUES ('31', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:19:37', '2019-07-12 03:19:37');
INSERT INTO `admin_operation_log` VALUES ('32', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4e66\\u7c4d\\u4fe1\\u606f\",\"icon\":\"fa-bars\",\"uri\":\"books_Information\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"TBWdQdGlHZklk26GgQuFRbBlT6T7eEoyXPvvwVQU\"}', '2019-07-12 03:20:46', '2019-07-12 03:20:46');
INSERT INTO `admin_operation_log` VALUES ('33', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:20:46', '2019-07-12 03:20:46');
INSERT INTO `admin_operation_log` VALUES ('34', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:20:51', '2019-07-12 03:20:51');
INSERT INTO `admin_operation_log` VALUES ('35', '1', 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u56fe\\u4e66\\u501f\\u9605\\u4fe1\\u606f\",\"icon\":\"fa-bars\",\"uri\":\"books_borrowing\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"TBWdQdGlHZklk26GgQuFRbBlT6T7eEoyXPvvwVQU\"}', '2019-07-12 03:22:03', '2019-07-12 03:22:03');
INSERT INTO `admin_operation_log` VALUES ('36', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:22:04', '2019-07-12 03:22:04');
INSERT INTO `admin_operation_log` VALUES ('37', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:22:06', '2019-07-12 03:22:06');
INSERT INTO `admin_operation_log` VALUES ('38', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:24:58', '2019-07-12 03:24:58');
INSERT INTO `admin_operation_log` VALUES ('39', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 03:25:01', '2019-07-12 03:25:01');
INSERT INTO `admin_operation_log` VALUES ('40', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:25:01', '2019-07-12 03:25:01');
INSERT INTO `admin_operation_log` VALUES ('41', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 03:25:11', '2019-07-12 03:25:11');
INSERT INTO `admin_operation_log` VALUES ('42', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 06:19:43', '2019-07-12 06:19:43');
INSERT INTO `admin_operation_log` VALUES ('43', '1', 'admin/auth/menu/8/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 06:19:51', '2019-07-12 06:19:51');
INSERT INTO `admin_operation_log` VALUES ('44', '1', 'admin/auth/menu/8', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u7528\\u6237\\u7ba1\\u7406\",\"icon\":\"fa-bars\",\"uri\":\"members\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/book.org\\/admin\\/auth\\/menu\"}', '2019-07-12 06:19:58', '2019-07-12 06:19:58');
INSERT INTO `admin_operation_log` VALUES ('45', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 06:19:58', '2019-07-12 06:19:58');
INSERT INTO `admin_operation_log` VALUES ('46', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 06:20:00', '2019-07-12 06:20:00');
INSERT INTO `admin_operation_log` VALUES ('47', '1', 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 06:20:02', '2019-07-12 06:20:02');
INSERT INTO `admin_operation_log` VALUES ('48', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 06:20:04', '2019-07-12 06:20:04');
INSERT INTO `admin_operation_log` VALUES ('49', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 06:21:35', '2019-07-12 06:21:35');
INSERT INTO `admin_operation_log` VALUES ('50', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 06:21:38', '2019-07-12 06:21:38');
INSERT INTO `admin_operation_log` VALUES ('51', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:08:00', '2019-07-12 07:08:00');
INSERT INTO `admin_operation_log` VALUES ('52', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:10:09', '2019-07-12 07:10:09');
INSERT INTO `admin_operation_log` VALUES ('53', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:10:26', '2019-07-12 07:10:26');
INSERT INTO `admin_operation_log` VALUES ('54', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:13:05', '2019-07-12 07:13:05');
INSERT INTO `admin_operation_log` VALUES ('55', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:13:25', '2019-07-12 07:13:25');
INSERT INTO `admin_operation_log` VALUES ('56', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:13:50', '2019-07-12 07:13:50');
INSERT INTO `admin_operation_log` VALUES ('57', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:13:53', '2019-07-12 07:13:53');
INSERT INTO `admin_operation_log` VALUES ('58', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:18:35', '2019-07-12 07:18:35');
INSERT INTO `admin_operation_log` VALUES ('59', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:27:03', '2019-07-12 07:27:03');
INSERT INTO `admin_operation_log` VALUES ('60', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:27:11', '2019-07-12 07:27:11');
INSERT INTO `admin_operation_log` VALUES ('61', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:32:56', '2019-07-12 07:32:56');
INSERT INTO `admin_operation_log` VALUES ('62', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:34:57', '2019-07-12 07:34:57');
INSERT INTO `admin_operation_log` VALUES ('63', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:41:24', '2019-07-12 07:41:24');
INSERT INTO `admin_operation_log` VALUES ('64', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:45:37', '2019-07-12 07:45:37');
INSERT INTO `admin_operation_log` VALUES ('65', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:47:03', '2019-07-12 07:47:03');
INSERT INTO `admin_operation_log` VALUES ('66', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:47:06', '2019-07-12 07:47:06');
INSERT INTO `admin_operation_log` VALUES ('67', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:47:38', '2019-07-12 07:47:38');
INSERT INTO `admin_operation_log` VALUES ('68', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:47:46', '2019-07-12 07:47:46');
INSERT INTO `admin_operation_log` VALUES ('69', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:47:56', '2019-07-12 07:47:56');
INSERT INTO `admin_operation_log` VALUES ('70', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:48:07', '2019-07-12 07:48:07');
INSERT INTO `admin_operation_log` VALUES ('71', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:48:14', '2019-07-12 07:48:14');
INSERT INTO `admin_operation_log` VALUES ('72', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:48:40', '2019-07-12 07:48:40');
INSERT INTO `admin_operation_log` VALUES ('73', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:49:10', '2019-07-12 07:49:10');
INSERT INTO `admin_operation_log` VALUES ('74', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:49:19', '2019-07-12 07:49:19');
INSERT INTO `admin_operation_log` VALUES ('75', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:49:28', '2019-07-12 07:49:28');
INSERT INTO `admin_operation_log` VALUES ('76', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:49:36', '2019-07-12 07:49:36');
INSERT INTO `admin_operation_log` VALUES ('77', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:49:41', '2019-07-12 07:49:41');
INSERT INTO `admin_operation_log` VALUES ('78', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:50:05', '2019-07-12 07:50:05');
INSERT INTO `admin_operation_log` VALUES ('79', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:50:06', '2019-07-12 07:50:06');
INSERT INTO `admin_operation_log` VALUES ('80', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:50:36', '2019-07-12 07:50:36');
INSERT INTO `admin_operation_log` VALUES ('81', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:50:48', '2019-07-12 07:50:48');
INSERT INTO `admin_operation_log` VALUES ('82', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":\"31231231\",\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:50:54', '2019-07-12 07:50:54');
INSERT INTO `admin_operation_log` VALUES ('83', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\",\"guid\":\"11\"}', '2019-07-12 07:50:57', '2019-07-12 07:50:57');
INSERT INTO `admin_operation_log` VALUES ('84', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":\"11\"}', '2019-07-12 07:51:26', '2019-07-12 07:51:26');
INSERT INTO `admin_operation_log` VALUES ('85', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":null,\"realname\":null,\"identification_card\":null,\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:51:34', '2019-07-12 07:51:34');
INSERT INTO `admin_operation_log` VALUES ('86', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":null,\"realname\":null,\"identification_card\":null}', '2019-07-12 07:52:25', '2019-07-12 07:52:25');
INSERT INTO `admin_operation_log` VALUES ('87', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:52:26', '2019-07-12 07:52:26');
INSERT INTO `admin_operation_log` VALUES ('88', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:52:30', '2019-07-12 07:52:30');
INSERT INTO `admin_operation_log` VALUES ('89', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:52:52', '2019-07-12 07:52:52');
INSERT INTO `admin_operation_log` VALUES ('90', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:53:05', '2019-07-12 07:53:05');
INSERT INTO `admin_operation_log` VALUES ('91', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:53:07', '2019-07-12 07:53:07');
INSERT INTO `admin_operation_log` VALUES ('92', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:53:09', '2019-07-12 07:53:09');
INSERT INTO `admin_operation_log` VALUES ('93', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:53:10', '2019-07-12 07:53:10');
INSERT INTO `admin_operation_log` VALUES ('94', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:53:11', '2019-07-12 07:53:11');
INSERT INTO `admin_operation_log` VALUES ('95', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:53:37', '2019-07-12 07:53:37');
INSERT INTO `admin_operation_log` VALUES ('96', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":null,\"realname\":\"sfsf\",\"identification_card\":null,\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:53:57', '2019-07-12 07:53:57');
INSERT INTO `admin_operation_log` VALUES ('97', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\",\"guid\":null,\"realname\":\"sfsf1\",\"identification_card\":null}', '2019-07-12 07:53:59', '2019-07-12 07:53:59');
INSERT INTO `admin_operation_log` VALUES ('98', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":null,\"realname\":\"sfsf1\",\"identification_card\":null}', '2019-07-12 07:54:02', '2019-07-12 07:54:02');
INSERT INTO `admin_operation_log` VALUES ('99', '1', 'admin/members', 'GET', '127.0.0.1', '{\"guid\":null,\"realname\":null,\"identification_card\":null,\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:54:06', '2019-07-12 07:54:06');
INSERT INTO `admin_operation_log` VALUES ('100', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\",\"_export_\":\"page:1\"}', '2019-07-12 07:56:22', '2019-07-12 07:56:22');
INSERT INTO `admin_operation_log` VALUES ('101', '1', 'admin', 'GET', '127.0.0.1', '[]', '2019-07-12 07:56:47', '2019-07-12 07:56:47');
INSERT INTO `admin_operation_log` VALUES ('102', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:56:51', '2019-07-12 07:56:51');
INSERT INTO `admin_operation_log` VALUES ('103', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:56:53', '2019-07-12 07:56:53');
INSERT INTO `admin_operation_log` VALUES ('104', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 07:58:51', '2019-07-12 07:58:51');
INSERT INTO `admin_operation_log` VALUES ('105', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 07:58:53', '2019-07-12 07:58:53');
INSERT INTO `admin_operation_log` VALUES ('106', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 07:59:19', '2019-07-12 07:59:19');
INSERT INTO `admin_operation_log` VALUES ('107', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:00:55', '2019-07-12 08:00:55');
INSERT INTO `admin_operation_log` VALUES ('108', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:00:57', '2019-07-12 08:00:57');
INSERT INTO `admin_operation_log` VALUES ('109', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 08:10:30', '2019-07-12 08:10:30');
INSERT INTO `admin_operation_log` VALUES ('110', '1', 'admin/members/performance-now.js.map', 'GET', '127.0.0.1', '[]', '2019-07-12 08:10:31', '2019-07-12 08:10:31');
INSERT INTO `admin_operation_log` VALUES ('111', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:10:31', '2019-07-12 08:10:31');
INSERT INTO `admin_operation_log` VALUES ('112', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:11:53', '2019-07-12 08:11:53');
INSERT INTO `admin_operation_log` VALUES ('113', '1', 'admin/members/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:11:56', '2019-07-12 08:11:56');
INSERT INTO `admin_operation_log` VALUES ('114', '1', 'admin/members', 'POST', '127.0.0.1', '{\"realname\":\"\\u9648\\u5b9d\\u91d1\",\"email\":\"529834149@qq.com\",\"gender\":\"f\",\"mobile\":\"138 4868 1897\",\"identification_card\":\"150429854874587451\",\"is_borrowing\":\"y\",\"return_date\":\"2019-07-31 02:02:02\",\"is_pay_deposit\":\"y\",\"deposit\":\"300\",\"deduction\":\"0\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\",\"_previous_\":\"http:\\/\\/book.org\\/admin\\/members\"}', '2019-07-12 08:12:39', '2019-07-12 08:12:39');
INSERT INTO `admin_operation_log` VALUES ('115', '1', 'admin/members/create', 'GET', '127.0.0.1', '[]', '2019-07-12 08:12:39', '2019-07-12 08:12:39');
INSERT INTO `admin_operation_log` VALUES ('116', '1', 'admin/members', 'POST', '127.0.0.1', '{\"realname\":\"\\u9648\\u5b9d\\u91d1\",\"email\":\"529834149@qq.com\",\"gender\":\"f\",\"mobile\":\"138 4868 1897\",\"identification_card\":\"150429854874587451\",\"is_borrowing\":\"y\",\"return_date\":\"2019-07-31 02:02:02\",\"is_pay_deposit\":\"y\",\"deposit\":\"300\",\"deduction\":\"0\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\"}', '2019-07-12 08:13:06', '2019-07-12 08:13:06');
INSERT INTO `admin_operation_log` VALUES ('117', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:13:06', '2019-07-12 08:13:06');
INSERT INTO `admin_operation_log` VALUES ('118', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:13:09', '2019-07-12 08:13:09');
INSERT INTO `admin_operation_log` VALUES ('119', '1', 'admin/members/2', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:13:18', '2019-07-12 08:13:18');
INSERT INTO `admin_operation_log` VALUES ('120', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:13:20', '2019-07-12 08:13:20');
INSERT INTO `admin_operation_log` VALUES ('121', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:15:29', '2019-07-12 08:15:29');
INSERT INTO `admin_operation_log` VALUES ('122', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:20:03', '2019-07-12 08:20:03');
INSERT INTO `admin_operation_log` VALUES ('123', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:21:35', '2019-07-12 08:21:35');
INSERT INTO `admin_operation_log` VALUES ('124', '1', 'admin/members/2', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:21:36', '2019-07-12 08:21:36');
INSERT INTO `admin_operation_log` VALUES ('125', '1', 'admin/members/2', 'GET', '127.0.0.1', '[]', '2019-07-12 08:23:02', '2019-07-12 08:23:02');
INSERT INTO `admin_operation_log` VALUES ('126', '1', 'admin/members/2', 'GET', '127.0.0.1', '[]', '2019-07-12 08:24:22', '2019-07-12 08:24:22');
INSERT INTO `admin_operation_log` VALUES ('127', '1', 'admin/members/2', 'GET', '127.0.0.1', '[]', '2019-07-12 08:24:24', '2019-07-12 08:24:24');
INSERT INTO `admin_operation_log` VALUES ('128', '1', 'admin/members/2', 'GET', '127.0.0.1', '[]', '2019-07-12 08:24:25', '2019-07-12 08:24:25');
INSERT INTO `admin_operation_log` VALUES ('129', '1', 'admin/members/2', 'GET', '127.0.0.1', '[]', '2019-07-12 08:24:26', '2019-07-12 08:24:26');
INSERT INTO `admin_operation_log` VALUES ('130', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:25:00', '2019-07-12 08:25:00');
INSERT INTO `admin_operation_log` VALUES ('131', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 08:25:29', '2019-07-12 08:25:29');
INSERT INTO `admin_operation_log` VALUES ('132', '1', 'admin/members/2', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:25:31', '2019-07-12 08:25:31');
INSERT INTO `admin_operation_log` VALUES ('133', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:25:33', '2019-07-12 08:25:33');
INSERT INTO `admin_operation_log` VALUES ('134', '1', 'admin/members/2/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:25:35', '2019-07-12 08:25:35');
INSERT INTO `admin_operation_log` VALUES ('135', '1', 'admin/members/2/edit', 'GET', '127.0.0.1', '[]', '2019-07-12 08:25:43', '2019-07-12 08:25:43');
INSERT INTO `admin_operation_log` VALUES ('136', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:26:26', '2019-07-12 08:26:26');
INSERT INTO `admin_operation_log` VALUES ('137', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:29:01', '2019-07-12 08:29:01');
INSERT INTO `admin_operation_log` VALUES ('138', '1', 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:29:08', '2019-07-12 08:29:08');
INSERT INTO `admin_operation_log` VALUES ('139', '1', 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u56fe\\u4e66\\u5206\\u7c7b\",\"icon\":\"fa-clone\",\"uri\":\"booksCategories\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/book.org\\/admin\\/auth\\/menu\"}', '2019-07-12 08:29:14', '2019-07-12 08:29:14');
INSERT INTO `admin_operation_log` VALUES ('140', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 08:29:14', '2019-07-12 08:29:14');
INSERT INTO `admin_operation_log` VALUES ('141', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 08:45:35', '2019-07-12 08:45:35');
INSERT INTO `admin_operation_log` VALUES ('142', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:45:39', '2019-07-12 08:45:39');
INSERT INTO `admin_operation_log` VALUES ('143', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 08:45:40', '2019-07-12 08:45:40');
INSERT INTO `admin_operation_log` VALUES ('144', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 08:46:48', '2019-07-12 08:46:48');
INSERT INTO `admin_operation_log` VALUES ('145', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 08:51:52', '2019-07-12 08:51:52');
INSERT INTO `admin_operation_log` VALUES ('146', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 08:58:01', '2019-07-12 08:58:01');
INSERT INTO `admin_operation_log` VALUES ('147', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:03:47', '2019-07-12 09:03:47');
INSERT INTO `admin_operation_log` VALUES ('148', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:03:48', '2019-07-12 09:03:48');
INSERT INTO `admin_operation_log` VALUES ('149', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:04:05', '2019-07-12 09:04:05');
INSERT INTO `admin_operation_log` VALUES ('150', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:05:02', '2019-07-12 09:05:02');
INSERT INTO `admin_operation_log` VALUES ('151', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:05:08', '2019-07-12 09:05:08');
INSERT INTO `admin_operation_log` VALUES ('152', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:07:41', '2019-07-12 09:07:41');
INSERT INTO `admin_operation_log` VALUES ('153', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:09:32', '2019-07-12 09:09:32');
INSERT INTO `admin_operation_log` VALUES ('154', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:11:27', '2019-07-12 09:11:27');
INSERT INTO `admin_operation_log` VALUES ('155', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:14:01', '2019-07-12 09:14:01');
INSERT INTO `admin_operation_log` VALUES ('156', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:14:08', '2019-07-12 09:14:08');
INSERT INTO `admin_operation_log` VALUES ('157', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:14:10', '2019-07-12 09:14:10');
INSERT INTO `admin_operation_log` VALUES ('158', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:14:52', '2019-07-12 09:14:52');
INSERT INTO `admin_operation_log` VALUES ('159', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:17:00', '2019-07-12 09:17:00');
INSERT INTO `admin_operation_log` VALUES ('160', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:17:04', '2019-07-12 09:17:04');
INSERT INTO `admin_operation_log` VALUES ('161', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:17:04', '2019-07-12 09:17:04');
INSERT INTO `admin_operation_log` VALUES ('162', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:17:18', '2019-07-12 09:17:18');
INSERT INTO `admin_operation_log` VALUES ('163', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:17:19', '2019-07-12 09:17:19');
INSERT INTO `admin_operation_log` VALUES ('164', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '[]', '2019-07-12 09:18:50', '2019-07-12 09:18:50');
INSERT INTO `admin_operation_log` VALUES ('165', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '[]', '2019-07-12 09:18:58', '2019-07-12 09:18:58');
INSERT INTO `admin_operation_log` VALUES ('166', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '[]', '2019-07-12 09:24:26', '2019-07-12 09:24:26');
INSERT INTO `admin_operation_log` VALUES ('167', '1', 'admin/booksCategories', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4e2d\\u6587\\u56fe\\u4e66\",\"desc\":\"\\u4e2d\\u6587\\u56fe\\u4e66\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\"}', '2019-07-12 09:25:24', '2019-07-12 09:25:24');
INSERT INTO `admin_operation_log` VALUES ('168', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '[]', '2019-07-12 09:25:25', '2019-07-12 09:25:25');
INSERT INTO `admin_operation_log` VALUES ('169', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:25:58', '2019-07-12 09:25:58');
INSERT INTO `admin_operation_log` VALUES ('170', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:26:00', '2019-07-12 09:26:00');
INSERT INTO `admin_operation_log` VALUES ('171', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '[]', '2019-07-12 09:27:19', '2019-07-12 09:27:19');
INSERT INTO `admin_operation_log` VALUES ('172', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '[]', '2019-07-12 09:28:37', '2019-07-12 09:28:37');
INSERT INTO `admin_operation_log` VALUES ('173', '1', 'admin/booksCategories', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4e2d\\u6587\\u56fe\\u4e66\",\"order\":\"1\",\"desc\":\"\\u8bba\\u4e2d\\u56fd\\u6587\\u5b66\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\"}', '2019-07-12 09:29:22', '2019-07-12 09:29:22');
INSERT INTO `admin_operation_log` VALUES ('174', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:29:22', '2019-07-12 09:29:22');
INSERT INTO `admin_operation_log` VALUES ('175', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:30:46', '2019-07-12 09:30:46');
INSERT INTO `admin_operation_log` VALUES ('176', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:31:32', '2019-07-12 09:31:32');
INSERT INTO `admin_operation_log` VALUES ('177', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:44:15', '2019-07-12 09:44:15');
INSERT INTO `admin_operation_log` VALUES ('178', '1', 'admin/booksCategories', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u62a5\\u520a\\u8d44\\u6599\",\"order\":\"2\",\"desc\":\"\\u62a5\\u520a\\u8d44\\u6599\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\",\"_previous_\":\"http:\\/\\/book.org\\/admin\\/booksCategories\"}', '2019-07-12 09:45:05', '2019-07-12 09:45:05');
INSERT INTO `admin_operation_log` VALUES ('179', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:45:05', '2019-07-12 09:45:05');
INSERT INTO `admin_operation_log` VALUES ('180', '1', 'admin/booksCategories/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:46:30', '2019-07-12 09:46:30');
INSERT INTO `admin_operation_log` VALUES ('181', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:46:34', '2019-07-12 09:46:34');
INSERT INTO `admin_operation_log` VALUES ('182', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:51:12', '2019-07-12 09:51:12');
INSERT INTO `admin_operation_log` VALUES ('183', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:53:10', '2019-07-12 09:53:10');
INSERT INTO `admin_operation_log` VALUES ('184', '1', 'admin/booksCategories/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:53:16', '2019-07-12 09:53:16');
INSERT INTO `admin_operation_log` VALUES ('185', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:53:20', '2019-07-12 09:53:20');
INSERT INTO `admin_operation_log` VALUES ('186', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:53:52', '2019-07-12 09:53:52');
INSERT INTO `admin_operation_log` VALUES ('187', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:54:24', '2019-07-12 09:54:24');
INSERT INTO `admin_operation_log` VALUES ('188', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:55:09', '2019-07-12 09:55:09');
INSERT INTO `admin_operation_log` VALUES ('189', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '[]', '2019-07-12 09:55:11', '2019-07-12 09:55:11');
INSERT INTO `admin_operation_log` VALUES ('190', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:55:13', '2019-07-12 09:55:13');
INSERT INTO `admin_operation_log` VALUES ('191', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:56:57', '2019-07-12 09:56:57');
INSERT INTO `admin_operation_log` VALUES ('192', '1', 'admin/booksCategories/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:56:58', '2019-07-12 09:56:58');
INSERT INTO `admin_operation_log` VALUES ('193', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:57:23', '2019-07-12 09:57:23');
INSERT INTO `admin_operation_log` VALUES ('194', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:57:24', '2019-07-12 09:57:24');
INSERT INTO `admin_operation_log` VALUES ('195', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:57:25', '2019-07-12 09:57:25');
INSERT INTO `admin_operation_log` VALUES ('196', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:57:57', '2019-07-12 09:57:57');
INSERT INTO `admin_operation_log` VALUES ('197', '1', 'admin/auth/menu/10/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 09:58:01', '2019-07-12 09:58:01');
INSERT INTO `admin_operation_log` VALUES ('198', '1', 'admin/auth/menu/10', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4e66\\u7c4d\\u4fe1\\u606f\",\"icon\":\"fa-bars\",\"uri\":\"booksInformation\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/book.org\\/admin\\/auth\\/menu\"}', '2019-07-12 09:58:11', '2019-07-12 09:58:11');
INSERT INTO `admin_operation_log` VALUES ('199', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 09:58:11', '2019-07-12 09:58:11');
INSERT INTO `admin_operation_log` VALUES ('200', '1', 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2019-07-12 10:09:39', '2019-07-12 10:09:39');
INSERT INTO `admin_operation_log` VALUES ('201', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:09:42', '2019-07-12 10:09:42');
INSERT INTO `admin_operation_log` VALUES ('202', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '[]', '2019-07-12 10:15:39', '2019-07-12 10:15:39');
INSERT INTO `admin_operation_log` VALUES ('203', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '[]', '2019-07-12 10:15:41', '2019-07-12 10:15:41');
INSERT INTO `admin_operation_log` VALUES ('204', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:15:45', '2019-07-12 10:15:45');
INSERT INTO `admin_operation_log` VALUES ('205', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '[]', '2019-07-12 10:18:08', '2019-07-12 10:18:08');
INSERT INTO `admin_operation_log` VALUES ('206', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '[]', '2019-07-12 10:19:23', '2019-07-12 10:19:23');
INSERT INTO `admin_operation_log` VALUES ('207', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '[]', '2019-07-12 10:19:24', '2019-07-12 10:19:24');
INSERT INTO `admin_operation_log` VALUES ('208', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:19:27', '2019-07-12 10:19:27');
INSERT INTO `admin_operation_log` VALUES ('209', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:19:28', '2019-07-12 10:19:28');
INSERT INTO `admin_operation_log` VALUES ('210', '1', 'admin/members', 'GET', '127.0.0.1', '[]', '2019-07-12 10:20:24', '2019-07-12 10:20:24');
INSERT INTO `admin_operation_log` VALUES ('211', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:20:27', '2019-07-12 10:20:27');
INSERT INTO `admin_operation_log` VALUES ('212', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:20:29', '2019-07-12 10:20:29');
INSERT INTO `admin_operation_log` VALUES ('213', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:20:32', '2019-07-12 10:20:32');
INSERT INTO `admin_operation_log` VALUES ('214', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '[]', '2019-07-12 10:21:41', '2019-07-12 10:21:41');
INSERT INTO `admin_operation_log` VALUES ('215', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '[]', '2019-07-12 10:21:56', '2019-07-12 10:21:56');
INSERT INTO `admin_operation_log` VALUES ('216', '1', 'admin/booksInformation', 'POST', '127.0.0.1', '{\"book_number\":\"gaoerji001\",\"book_title\":\"\\u6bcd\\u4eb2\",\"book_author\":\"\\u9ad8\\u5c14\\u57fa\",\"categories_id\":\"8\",\"price\":\"47\",\"press\":\"\\u897f\\u5b89\\u4ea4\\u901a\\u5927\\u5b66\\u51fa\\u7248\\u793e\",\"abstract\":\"\\u672c\\u4e66\\u53d1\\u8868\\u4e8e1906\\u5e74\\uff0c\\u662f\\u9ad8\\u5c14\\u57fa\\u4e00\\u90e8\\u4ee3\\u8868\\u6027\\u4f5c\\u54c1\\uff0c\\u53cd\\u6620\\u4e86\\u4fc4\\u56fd1905\\u5e74\\u9769\\u547d\\u51c6\\u5907\\u65f6\\u671f\\u5de5\\u4eba\\u8fd0\\u52a8\",\"number_of_collections\":\"32\",\"number_of_Books_in_library\":\"12\",\"storage_location\":\"AT001\",\"borrowed_number\":\"254\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\"}', '2019-07-12 10:25:12', '2019-07-12 10:25:12');
INSERT INTO `admin_operation_log` VALUES ('217', '1', 'admin/booksInformation/create', 'GET', '127.0.0.1', '[]', '2019-07-12 10:25:12', '2019-07-12 10:25:12');
INSERT INTO `admin_operation_log` VALUES ('218', '1', 'admin/booksInformation', 'POST', '127.0.0.1', '{\"book_number\":\"gaoerji001\",\"book_title\":\"\\u6bcd\\u4eb2\",\"book_author\":\"\\u9ad8\\u5c14\\u57fa\",\"categories_id\":\"8\",\"price\":\"47\",\"press\":\"\\u897f\\u5b89\\u4ea4\\u901a\\u5927\\u5b66\\u51fa\\u7248\\u793e\",\"abstract\":\"\\u672c\\u4e66\\u53d1\\u8868\\u4e8e1906\\u5e74\\uff0c\\u662f\\u9ad8\\u5c14\\u57fa\\u4e00\\u90e8\\u4ee3\\u8868\\u6027\\u4f5c\\u54c1\\uff0c\\u53cd\\u6620\\u4e86\\u4fc4\\u56fd1905\\u5e74\\u9769\\u547d\\u51c6\\u5907\\u65f6\\u671f\\u5de5\\u4eba\\u8fd0\\u52a8\",\"number_of_collections\":\"32\",\"number_of_Books_in_library\":\"12\",\"storage_location\":\"AT001\",\"borrowed_number\":\"254\",\"_token\":\"RFOjsaGZzN4D8U92aT2F6JGvykJFCTSWx0IBI13E\"}', '2019-07-12 10:25:47', '2019-07-12 10:25:47');
INSERT INTO `admin_operation_log` VALUES ('219', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '[]', '2019-07-12 10:25:47', '2019-07-12 10:25:47');
INSERT INTO `admin_operation_log` VALUES ('220', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:26:14', '2019-07-12 10:26:14');
INSERT INTO `admin_operation_log` VALUES ('221', '1', 'admin/booksInformation/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:30:29', '2019-07-12 10:30:29');
INSERT INTO `admin_operation_log` VALUES ('222', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:30:32', '2019-07-12 10:30:32');
INSERT INTO `admin_operation_log` VALUES ('223', '1', 'admin/booksInformation/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:30:35', '2019-07-12 10:30:35');
INSERT INTO `admin_operation_log` VALUES ('224', '1', 'admin/booksInformation/1/edit', 'GET', '127.0.0.1', '[]', '2019-07-12 10:31:21', '2019-07-12 10:31:21');
INSERT INTO `admin_operation_log` VALUES ('225', '1', 'admin/booksInformation/1/edit', 'GET', '127.0.0.1', '[]', '2019-07-12 10:32:29', '2019-07-12 10:32:29');
INSERT INTO `admin_operation_log` VALUES ('226', '1', 'admin/booksInformation/1/edit', 'GET', '127.0.0.1', '[]', '2019-07-12 10:34:35', '2019-07-12 10:34:35');
INSERT INTO `admin_operation_log` VALUES ('227', '1', 'admin/booksInformation/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:40', '2019-07-12 10:34:40');
INSERT INTO `admin_operation_log` VALUES ('228', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:42', '2019-07-12 10:34:42');
INSERT INTO `admin_operation_log` VALUES ('229', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:45', '2019-07-12 10:34:45');
INSERT INTO `admin_operation_log` VALUES ('230', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:46', '2019-07-12 10:34:46');
INSERT INTO `admin_operation_log` VALUES ('231', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:47', '2019-07-12 10:34:47');
INSERT INTO `admin_operation_log` VALUES ('232', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:49', '2019-07-12 10:34:49');
INSERT INTO `admin_operation_log` VALUES ('233', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:50', '2019-07-12 10:34:50');
INSERT INTO `admin_operation_log` VALUES ('234', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:51', '2019-07-12 10:34:51');
INSERT INTO `admin_operation_log` VALUES ('235', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:52', '2019-07-12 10:34:52');
INSERT INTO `admin_operation_log` VALUES ('236', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:52', '2019-07-12 10:34:52');
INSERT INTO `admin_operation_log` VALUES ('237', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:53', '2019-07-12 10:34:53');
INSERT INTO `admin_operation_log` VALUES ('238', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:54', '2019-07-12 10:34:54');
INSERT INTO `admin_operation_log` VALUES ('239', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:55', '2019-07-12 10:34:55');
INSERT INTO `admin_operation_log` VALUES ('240', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:55', '2019-07-12 10:34:55');
INSERT INTO `admin_operation_log` VALUES ('241', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:56', '2019-07-12 10:34:56');
INSERT INTO `admin_operation_log` VALUES ('242', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:57', '2019-07-12 10:34:57');
INSERT INTO `admin_operation_log` VALUES ('243', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:34:59', '2019-07-12 10:34:59');
INSERT INTO `admin_operation_log` VALUES ('244', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:35:00', '2019-07-12 10:35:00');
INSERT INTO `admin_operation_log` VALUES ('245', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:35:01', '2019-07-12 10:35:01');
INSERT INTO `admin_operation_log` VALUES ('246', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:35:01', '2019-07-12 10:35:01');
INSERT INTO `admin_operation_log` VALUES ('247', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:35:09', '2019-07-12 10:35:09');
INSERT INTO `admin_operation_log` VALUES ('248', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:35:11', '2019-07-12 10:35:11');
INSERT INTO `admin_operation_log` VALUES ('249', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:33', '2019-07-12 10:48:33');
INSERT INTO `admin_operation_log` VALUES ('250', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:34', '2019-07-12 10:48:34');
INSERT INTO `admin_operation_log` VALUES ('251', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:34', '2019-07-12 10:48:34');
INSERT INTO `admin_operation_log` VALUES ('252', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:35', '2019-07-12 10:48:35');
INSERT INTO `admin_operation_log` VALUES ('253', '1', 'admin/members', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:48', '2019-07-12 10:48:48');
INSERT INTO `admin_operation_log` VALUES ('254', '1', 'admin/booksCategories', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:48', '2019-07-12 10:48:48');
INSERT INTO `admin_operation_log` VALUES ('255', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:49', '2019-07-12 10:48:49');
INSERT INTO `admin_operation_log` VALUES ('256', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '[]', '2019-07-12 10:48:53', '2019-07-12 10:48:53');
INSERT INTO `admin_operation_log` VALUES ('257', '1', 'admin/booksInformation', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2019-07-12 10:48:56', '2019-07-12 10:48:56');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', 'All permission', '*', '', '*', null, null);
INSERT INTO `admin_permissions` VALUES ('2', 'Dashboard', 'dashboard', 'GET', '/', null, null);
INSERT INTO `admin_permissions` VALUES ('3', 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', null, null);
INSERT INTO `admin_permissions` VALUES ('4', 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', null, null);
INSERT INTO `admin_permissions` VALUES ('5', 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', null, null);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', 'Administrator', 'administrator', '2019-07-12 02:29:34', '2019-07-12 02:29:34');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES ('1', '2', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '8', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '9', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '10', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '11', null, null);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$mmUsmkq18Vz3wwvtsyI7V.pdewgbq0sYPd/EylUmf7yEkMhWmaw5G', 'Administrator', null, 'AoAOCE79wjxyOnzxg3z3ubMiZQIFIcpOnZHxe7tUKaKTtdsuAQc8T0hmqSMk', '2019-07-12 02:29:34', '2019-07-12 02:29:34');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for books_borrowing
-- ----------------------------
DROP TABLE IF EXISTS `books_borrowing`;
CREATE TABLE `books_borrowing` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '正借阅表',
  `books_information_number` int(11) NOT NULL COMMENT '书号',
  `books_member_card_number` int(11) DEFAULT NULL COMMENT '用户卡号',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`books_information_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books_borrowing
-- ----------------------------

-- ----------------------------
-- Table structure for books_categories
-- ----------------------------
DROP TABLE IF EXISTS `books_categories`;
CREATE TABLE `books_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of books_categories
-- ----------------------------
INSERT INTO `books_categories` VALUES ('1', '0', '1', '马克思主义、列宁主义、毛泽东思想、邓小平理论', '2019-07-12 09:29:22', '2019-07-12 17:48:20', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('2', '0', '1', '哲学、宗教', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('3', '0', '1', '社会科学总论', '2019-07-12 09:29:22', '2019-07-12 17:48:32', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('4', '0', '1', ' 政治、法律', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('5', '0', '1', '军事', '2019-07-12 09:29:22', '2019-07-12 17:48:46', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('6', '0', '1', '经济', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('7', '0', '1', '文化、科学、教育、体育', '2019-07-12 09:29:22', '2019-07-12 17:49:02', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('8', '0', '1', '语言、文字', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('9', '0', '1', '文学', '2019-07-12 09:29:22', '2019-07-12 17:49:14', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('10', '0', '1', '艺术', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('11', '0', '1', '历史、地理', '2019-07-12 09:29:22', '2019-07-12 17:49:23', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('12', '0', '1', '自然科学总论', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('13', '0', '1', '数理科学和化学', '2019-07-12 09:29:22', '2019-07-12 17:49:34', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('14', '0', '1', '天文学、地球科学', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('15', '0', '1', '生物科学', '2019-07-12 09:29:22', '2019-07-12 17:49:42', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('16', '0', '1', ' 医药、卫生', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('17', '0', '1', ' 农业科学', '2019-07-12 09:29:22', '2019-07-12 17:50:15', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('18', '0', '1', '工业技术', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('19', '0', '1', '交通运输', '2019-07-12 09:29:22', '2019-07-12 17:50:24', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('20', '0', '1', ' 航空、航天', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');
INSERT INTO `books_categories` VALUES ('21', '0', '1', '环境科学、劳动保护科学（安全科学）', '2019-07-12 09:29:22', '2019-07-12 17:50:34', '论中国文学', 'images/6021676ee6566b15dce6d8c7c33304a9.png');
INSERT INTO `books_categories` VALUES ('22', '0', '1', ' 综合性图书', '2019-07-12 09:45:05', '2019-07-12 17:51:03', '报刊资料', 'images/1312ebdc4e69e1d1185688291edbd888.png');

-- ----------------------------
-- Table structure for books_information
-- ----------------------------
DROP TABLE IF EXISTS `books_information`;
CREATE TABLE `books_information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_number` char(50) DEFAULT NULL COMMENT '书号',
  `book_title` varchar(255) DEFAULT NULL COMMENT '书名',
  `book_author` varchar(255) DEFAULT NULL COMMENT '作者',
  `categories_id` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL COMMENT '价格',
  `press` varchar(255) DEFAULT NULL COMMENT '出版社',
  `abstract` varchar(255) DEFAULT NULL COMMENT '摘要',
  `number_of_collections` int(11) DEFAULT NULL COMMENT '馆藏册数',
  `number_of_Books_in_library` char(50) DEFAULT NULL COMMENT '再馆册数',
  `storage_location` varchar(255) DEFAULT NULL COMMENT '存放位置',
  `borrowed_number` int(11) DEFAULT NULL COMMENT '被借次数',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books_information
-- ----------------------------
INSERT INTO `books_information` VALUES ('1', 'gaoerji001', '母亲', '高尔基', '8', '47', '西安交通大学出版社', '本书发表于1906年，是高尔基一部代表性作品，反映了俄国1905年革命准备时期工人运动', '32', '12', 'AT001', '254', '2019-07-12 10:25:47', '2019-07-12 10:25:47');

-- ----------------------------
-- Table structure for books_member
-- ----------------------------
DROP TABLE IF EXISTS `books_member`;
CREATE TABLE `books_member` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `realname` char(50) NOT NULL COMMENT '姓名',
  `gender` char(3) DEFAULT NULL COMMENT '性别',
  `mobile` char(50) DEFAULT NULL COMMENT '手机号',
  `identification_card` varchar(255) DEFAULT NULL COMMENT '身份证',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_borrowing` char(5) DEFAULT NULL COMMENT '是否借阅',
  `return_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '归还日期',
  `is_pay_deposit` char(5) DEFAULT NULL COMMENT '是否缴纳押金',
  `deposit` int(5) DEFAULT NULL COMMENT '押金',
  `deduction` int(5) DEFAULT '1' COMMENT '每天扣除多少钱',
  `email` varchar(255) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `card_number` char(50) DEFAULT NULL COMMENT '卡号',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books_member
-- ----------------------------
INSERT INTO `books_member` VALUES ('2', '陈宝金', 'f', '138 4868 1897', '150429854874587451', '2019-07-12 08:13:06', '2019-07-12 08:13:06', 'y', '2019-07-31 02:02:02', 'y', '300', '0', '529834149@qq.com', null, null);

-- ----------------------------
-- Table structure for books_shelf_mark
-- ----------------------------
DROP TABLE IF EXISTS `books_shelf_mark`;
CREATE TABLE `books_shelf_mark` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '书架号',
  `shelf_mark_number` int(11) DEFAULT NULL COMMENT '书架号',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books_shelf_mark
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for working_man
-- ----------------------------
DROP TABLE IF EXISTS `working_man`;
CREATE TABLE `working_man` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '工作人员',
  `work_name` varchar(255) DEFAULT NULL,
  `work_num` int(11) DEFAULT NULL,
  `job` char(50) DEFAULT NULL,
  ` pay` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of working_man
-- ----------------------------
