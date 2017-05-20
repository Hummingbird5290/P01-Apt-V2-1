/*
MySQL Data Transfer
Source Host: localhost
Source Database: data_table
Target Host: localhost
Target Database: data_table
Date: 23/3/2016 15:17:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tbl_content
-- ----------------------------
DROP TABLE IF EXISTS `tbl_content`;
CREATE TABLE `tbl_content` (
  `content_id` int(10) NOT NULL auto_increment,
  `content_title` varchar(255) default NULL COMMENT 'ชื่อเรื่องบทความ',
  `content_create` datetime default NULL COMMENT 'วันที่สร้าง',
  `content_update` datetime default NULL COMMENT 'วันที่ปรับปรุง',
  `content_group_id` int(10) default NULL COMMENT 'กลุ่มของบทความ',
  `sku` varchar(255) default NULL,
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_content_group
-- ----------------------------
DROP TABLE IF EXISTS `tbl_content_group`;
CREATE TABLE `tbl_content_group` (
  `content_group_id` int(10) NOT NULL auto_increment,
  `content_group_name` varchar(255) default NULL COMMENT 'ชื่อกลุ่มของ content',
  `content_group_update` datetime default NULL COMMENT 'วันที่ Update',
  `sku` varchar(255) default NULL,
  PRIMARY KEY  (`content_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `tbl_content` VALUES ('3', 'โปรแกรมเมอร์', '2006-10-31 11:22:12', '2015-11-03 01:22:48', '4', 'โปรแกรมเมอร์');
INSERT INTO `tbl_content` VALUES ('6', 'ร่างกายใน 1 วัน', '2006-10-31 23:42:55', '2015-11-05 15:04:52', '10', 'ร่างกายใน-1-วัน');
INSERT INTO `tbl_content` VALUES ('7', 'กินให้ดี มีชัย', '2006-10-31 23:49:02', '2015-11-19 14:39:36', '10', 'กินให้ดี-มีชัย');
INSERT INTO `tbl_content` VALUES ('8', '10 คำถาม สัมภาษณ์งาน', '2006-10-31 23:56:22', '2015-11-05 15:03:48', '11', '10-คำถาม-สัมภาษณ์งาน');
INSERT INTO `tbl_content` VALUES ('9', 'จุดอ่อนของผู้สมัครงาน', '2006-10-31 23:59:16', '2015-11-05 15:03:37', '11', 'จุดอ่อนของผู้สมัครงาน');
INSERT INTO `tbl_content` VALUES ('10', 'การเขียน Resume ', '2006-11-01 00:02:22', '2015-11-05 14:56:47', '11', 'การเขียน-resume');
INSERT INTO `tbl_content` VALUES ('11', 'คาถาบูชา1', '2006-11-01 00:07:35', '2015-11-05 15:02:35', '12', 'คาถาบูชา1');
INSERT INTO `tbl_content` VALUES ('12', 'Com ENG กับ Com SCI', '2006-11-01 00:17:50', '2015-11-05 14:57:31', '4', 'com-eng-กับ-com-sci');
INSERT INTO `tbl_content` VALUES ('13', 'วิตามิน สารอาหาร', '2006-11-01 00:23:41', '2015-11-05 15:01:48', '10', 'วิตามิน-สารอาหาร');
INSERT INTO `tbl_content` VALUES ('14', 'ตรวจสอบเว็บไซต์', '2006-11-02 11:00:23', '2015-11-05 14:56:31', '13', 'ตรวจสอบเว็บไซต์');
INSERT INTO `tbl_content` VALUES ('16', 'อานิสงส์ทำบุญ', '2006-11-02 11:15:50', '2015-11-30 14:11:14', '12', 'อานิสงส์ทำบุญ');
INSERT INTO `tbl_content` VALUES ('17', 'SQL Server กับ Oracle', '2006-11-02 11:18:36', '2015-11-03 02:01:58', '4', 'sql-server-กับ-oracle');
INSERT INTO `tbl_content` VALUES ('20', 'กำลังใจดีดี', '2006-11-03 15:53:35', '2015-11-05 15:14:57', '14', 'กำลังใจดีดี');
INSERT INTO `tbl_content` VALUES ('21', 'คำแนะนำจาก Google', '2006-11-05 12:32:58', '2015-11-03 01:56:49', '13', 'คำแนะนำจาก-google');
INSERT INTO `tbl_content` VALUES ('22', 'คำขอขมา', '2006-11-05 12:43:42', '2015-11-30 14:11:55', '12', 'คำขอขมา');
INSERT INTO `tbl_content` VALUES ('24', 'บัณฑิต', '2006-11-05 14:21:11', '2015-11-05 15:03:17', '4', 'บัณฑิต');
INSERT INTO `tbl_content` VALUES ('25', 'ฟื้นร่างกาย ', '2006-11-05 15:12:52', '2015-11-05 15:03:06', '10', 'ฟื้นร่างกาย');
INSERT INTO `tbl_content` VALUES ('27', 'ทำภาพแบบค่อย ๆ ชัด', '2006-11-09 00:06:14', '2015-11-05 15:32:43', '19', 'ทำภาพแบบค่อย-ๆ-ชัด');
INSERT INTO `tbl_content` VALUES ('28', 'ไม้มงคลประจำวันเกิด', '2006-11-11 08:55:11', '2015-11-05 15:09:42', '12', 'ไม้มงคลประจำวันเกิด');
INSERT INTO `tbl_content` VALUES ('29', 'คุณ กำ อะไรอยู่', '2006-11-11 09:17:49', '2015-11-05 15:15:20', '14', 'คุณ-กำ-อะไรอยู่');
INSERT INTO `tbl_content` VALUES ('30', 'เหยือกเต็มหรือยัง.', '2006-11-11 09:44:06', '2015-11-05 15:15:30', '14', 'เหยือกเต็มหรือยัง');
INSERT INTO `tbl_content` VALUES ('31', 'ข้อคิด', '2006-11-11 09:58:52', '2015-11-05 15:16:34', '14', 'ข้อคิด');
INSERT INTO `tbl_content` VALUES ('32', 'มองแต่แง่ดีเถิด คำสอนท่านพุทธทาสภิกขุ', '2006-11-11 10:23:56', '2015-11-04 11:52:30', '12', 'มองแต่แง่ดีเถิด-คำสอนท่านพุทธทาสภิกขุ');
INSERT INTO `tbl_content` VALUES ('33', 'ความลับของ Google', '2006-11-11 10:42:37', '2015-11-05 15:18:55', '13', 'ความลับของ-google');
INSERT INTO `tbl_content` VALUES ('34', 'เหตุ-ผล', '2006-11-16 21:13:01', '2015-11-05 15:18:33', '12', 'เหตุ-ผล');
INSERT INTO `tbl_content` VALUES ('36', 'เวิร์กฮาร์ดกับเวิร์กสมาร์ต', '2006-11-16 22:37:02', '2015-11-05 15:09:13', '11', 'เวิร์กฮาร์ดกับเวิร์กสมาร์ต');
INSERT INTO `tbl_content` VALUES ('37', 'คำสั่งด้าน Network (DOS)', '2006-11-16 23:15:58', '2015-11-05 15:04:11', '4', 'คำสั่งด้าน-network-dos');
INSERT INTO `tbl_content` VALUES ('40', 'Stored Procedure', '2006-11-17 21:43:11', '2015-11-05 15:18:44', '17', 'stored-procedure');
INSERT INTO `tbl_content` VALUES ('41', 'แก้แฮงค์', '2006-11-19 13:14:59', '2015-11-05 14:50:51', '10', 'แก้แฮงค์');
INSERT INTO `tbl_content` VALUES ('42', 'Array', '2006-12-09 13:04:46', '2015-11-05 15:09:32', '19', 'array');
INSERT INTO `tbl_content` VALUES ('43', 'กินตามราศี', '2006-12-09 13:09:55', '2015-11-05 14:57:50', '10', 'กินตามราศี');
INSERT INTO `tbl_content` VALUES ('44', 'XML คืออะไร', '2006-12-09 20:18:50', '2015-11-03 01:56:29', '21', 'xml-คืออะไร');
INSERT INTO `tbl_content` VALUES ('46', '175 submit', '2006-12-09 23:03:52', '2015-11-05 15:19:06', '13', '175-submit');
INSERT INTO `tbl_content` VALUES ('47', 'Sort Array', '2006-12-09 23:36:07', '2015-11-05 15:31:45', '24', 'sort-array');
INSERT INTO `tbl_content` VALUES ('49', 'อันตรายจากบุหรี่', '2006-05-02 21:14:03', '2015-11-05 15:44:02', '10', 'อันตรายจากบุหรี่');
INSERT INTO `tbl_content` VALUES ('50', '4 เรื่องสุขภาพ', '2006-06-02 21:09:26', '2015-11-05 15:10:11', '10', '4-เรื่องสุขภาพ');
INSERT INTO `tbl_content` VALUES ('51', 'เป็นมนุษย์เป็นได้เพราะใจสูง', '2006-09-02 23:30:43', '2015-11-05 15:10:22', '12', 'เป็นมนุษย์เป็นได้เพราะใจสูง');
INSERT INTO `tbl_content` VALUES ('52', 'ดูว่า table ประกอบด้วย field ใดบ้าง', '2006-09-02 23:32:10', '2015-11-05 15:05:09', '17', 'ดูว่า-table-ประกอบด้วย-field-ใดบ้าง');
INSERT INTO `tbl_content` VALUES ('53', 'การใช้ WhileLoop ใน SP', '2006-09-02 23:37:53', '2015-11-05 15:02:57', '17', 'การใช้-whileloop-ใน-sp');
INSERT INTO `tbl_content` VALUES ('54', 'msFlexGrid', '2006-09-02 23:41:52', '2015-11-03 01:58:47', '22', 'msflexgrid');
INSERT INTO `tbl_content` VALUES ('56', 'สร้าง odbc_connect อัตโนมัติ', '2006-09-02 23:46:00', '2015-11-05 15:10:45', '22', 'สร้าง-odbc_connect-อัตโนมัติ');
INSERT INTO `tbl_content` VALUES ('57', 'งานพิเศษ รายได้เสริม', '2006-09-02 23:53:29', '2015-11-05 15:10:54', '11', 'งานพิเศษ-รายได้เสริม');
INSERT INTO `tbl_content` VALUES ('58', 'การตั้งชื่อตัวแปร', '2006-10-02 19:16:00', '2015-11-05 15:13:17', '4', 'การตั้งชื่อตัวแปร');
INSERT INTO `tbl_content` VALUES ('60', 'รหัส Ascii กับ HTML', '2006-10-02 20:31:32', '2015-11-05 15:13:28', '4', 'รหัส-ascii-กับ-html');
INSERT INTO `tbl_content` VALUES ('61', 'คาถาผู้สูงอายุ', '2006-10-02 21:16:09', '2015-11-05 15:13:39', '12', 'คาถาผู้สูงอายุ');
INSERT INTO `tbl_content` VALUES ('62', 'css คืออะไร', '2007-04-01 00:10:33', '2015-11-05 15:20:00', '18', 'css-คืออะไร');
INSERT INTO `tbl_content` VALUES ('64', 'การเพิ่ม css ไว้ในแต่ละหน้า', '2007-04-01 00:33:53', '2015-11-30 14:28:30', '18', 'การเพิ่ม-css-ไว้ในแต่ละหน้า');
INSERT INTO `tbl_content` VALUES ('65', 'การเพิ่ม css ไว้ในเว็บไซต์', '2007-04-01 00:39:40', '2015-11-05 15:21:14', '18', 'การเพิ่ม-css-ไว้ในเว็บไซต์');
INSERT INTO `tbl_content` VALUES ('120', 'การลดกรรม 45 อย่าง ', '2009-03-16 10:45:05', '2015-11-05 15:28:20', '12', 'การลดกรรม-45-อย่าง');
INSERT INTO `tbl_content` VALUES ('121', 'เปลี่ยนตัวอักษรใน Field ให้เป็นตัวเล็ก', '2009-03-16 12:24:40', '2015-11-05 15:33:37', '36', 'เปลี่ยนตัวอักษรใน-field-ให้เป็นตัวเล็ก');
INSERT INTO `tbl_content` VALUES ('122', 'การสร้าง CURSOR บน SP', '2009-03-18 15:10:26', '2015-11-05 15:28:39', '17', 'การสร้าง-cursor-บน-sp');
INSERT INTO `tbl_content` VALUES ('124', 'ASP.NET 2008 กับ CRYSTAL REPORT ', '2009-03-24 17:53:39', '2015-11-30 14:52:01', '37', 'asp-net-2008-กับ-crystal-report');
INSERT INTO `tbl_content` VALUES ('126', 'แปลงวันที่จาก Integer เป็นวันที่ภาษาไทย', '2009-04-20 08:51:54', '2015-11-03 02:00:41', '37', 'แปลงวันที่จาก-integer-เป็นวันที่ภาษาไทย');
INSERT INTO `tbl_content` VALUES ('127', 'select between datetime', '2009-04-29 11:43:50', '2015-11-05 15:33:11', '35', 'select-between-datetime');
INSERT INTO `tbl_content` VALUES ('128', 'mysql select datediff', '2009-04-29 11:57:13', '2015-11-05 15:31:08', '35', 'mysql-select-datediff');
INSERT INTO `tbl_content` VALUES ('129', 'ความเกรงใจ', '2009-05-05 09:44:55', '2015-11-05 15:29:25', '12', 'ความเกรงใจ');
INSERT INTO `tbl_content` VALUES ('130', 'ความซื่อสัตย์', '2009-05-05 09:45:33', '2015-11-05 15:29:33', '12', 'ความซื่อสัตย์');
INSERT INTO `tbl_content` VALUES ('131', 'ตรงต่อเวลา', '2009-05-05 09:46:20', '2015-11-05 15:29:41', '12', 'ตรงต่อเวลา');
INSERT INTO `tbl_content` VALUES ('132', 'อย่าเกียจคร้าน', '2009-05-05 09:46:51', '2015-11-05 15:29:57', '12', 'อย่าเกียจคร้าน');
INSERT INTO `tbl_content` VALUES ('133', 'ช่วยกันทำงาน', '2009-05-05 09:47:25', '2015-11-05 15:29:50', '12', 'ช่วยกันทำงาน');
INSERT INTO `tbl_content` VALUES ('134', 'IF-ELSE บน SP', '2009-05-07 10:20:54', '2015-11-05 15:30:05', '17', 'if-else-บน-sp');
INSERT INTO `tbl_content` VALUES ('135', 'หา ความกว้าง,ความสูง,ขนาด ของภาพที่ทำการ Upload', '2009-06-15 12:23:52', '2015-11-05 15:33:19', '35', 'หา-ความกว้าง,ความสูง,ขนาด-ของภาพที่ทำการ-upload');
INSERT INTO `tbl_content` VALUES ('136', 'คาถาเสริมความงาม', '2009-06-16 13:51:36', '2015-11-05 15:30:12', '12', 'คาถาเสริมความงาม');
INSERT INTO `tbl_content` VALUES ('137', 'คำสั่งในการ Optimize Table', '2009-06-21 22:08:51', '2015-11-05 15:33:47', '36', 'คำสั่งในการ-optimize-table');
INSERT INTO `tbl_content` VALUES ('138', 'ASP.NET(C#) CONNECT MYSQL', '2009-06-23 16:44:10', '2015-11-05 15:33:58', '25', 'asp-netc-connect-mysql');
INSERT INTO `tbl_content` VALUES ('167', 'คาถาของคนทำงาน(อย่างเราๆ) ', '2010-11-25 11:35:21', '2015-11-03 01:07:35', '12', 'คาถาของคนทำงานอย่างเราๆ');
INSERT INTO `tbl_content` VALUES ('168', 'ช่วงเวลาแห่งความสุข ', '2010-12-08 09:28:42', '2015-11-03 01:11:14', '14', 'ช่วงเวลาแห่งความสุข');
INSERT INTO `tbl_content` VALUES ('169', 'การหาจำวน (COUNT) ใน Table เดียวกัน', '2010-12-13 11:51:17', '2015-11-03 01:06:57', '36', 'การหาจำวน-count-ใน-table-เดียวกัน');
INSERT INTO `tbl_content` VALUES ('171', 'ดูการเปลี่ยนแปลงของ VIEW และ TABLE', '2010-12-22 10:21:53', '2015-11-19 16:48:25', '17', 'ดูการเปลี่ยนแปลงของ-view-และ-table');
INSERT INTO `tbl_content` VALUES ('172', 'รอยแผลจากคำพูด', '2011-01-04 13:14:17', '2015-11-05 15:43:52', '14', 'รอยแผลจากคำพูด');
INSERT INTO `tbl_content` VALUES ('173', 'หน้าที่ของเด็ก (เด็กเอ๋ยเด็กดี)', '2011-01-07 18:08:07', '2015-11-30 14:07:34', '12', 'หน้าที่ของเด็ก-เด็กเอ๋ยเด็กดี');
INSERT INTO `tbl_content` VALUES ('174', 'onmouseover cursor hand', '2011-01-13 15:41:01', '2015-11-05 14:54:58', '19', 'onmouseover-cursor-hand');
INSERT INTO `tbl_content` VALUES ('175', 'Firefox ช้า ต้องคืนแรม ด่วน!!', '2011-05-08 13:37:59', '2015-11-05 14:54:43', '4', 'firefox-ช้า-ต้องคืนแรม-ด่วน!!');
INSERT INTO `tbl_content` VALUES ('176', 'Event Close(X) บน ฟอร์ม ครับ', '2011-05-22 17:54:10', '2015-11-03 01:55:50', '38', 'event-closex-บน-ฟอร์ม-ครับ');
INSERT INTO `tbl_content` VALUES ('177', 'GOOGLE APP SETUP', '2011-05-26 11:52:30', '2015-11-05 14:51:51', '13', 'google-app-setup');
INSERT INTO `tbl_content` VALUES ('178', 'TEXT SHADOW', '2011-05-29 10:40:29', '2015-11-05 14:54:32', '18', 'text-shadow');
INSERT INTO `tbl_content` VALUES ('179', 'CSS HR STYLE', '2011-05-29 10:50:44', '2015-11-30 14:26:42', '18', 'css-hr-style');
INSERT INTO `tbl_content` VALUES ('180', 'รัน ASP บน IIS7', '2011-05-30 15:20:07', '2015-11-05 14:55:09', '24', 'รัน-asp-บน-iis7');
INSERT INTO `tbl_content` VALUES ('181', 'SP RETURN STRING VALUE', '2011-06-03 10:15:38', '2015-11-05 14:55:19', '17', 'sp-return-string-value');
INSERT INTO `tbl_content` VALUES ('182', 'โรคเกาต์ เมื่ออาหารทำร้ายสุขภาพ', '2011-07-22 12:07:11', '2015-11-03 01:54:44', '10', 'โรคเกาต์-เมื่ออาหารทำร้ายสุขภาพ');
INSERT INTO `tbl_content` VALUES ('183', 'SQL Server Date Time Format', '2011-08-18 19:59:38', '2015-11-05 15:51:42', '17', 'sql-server-date-time-format');
INSERT INTO `tbl_content` VALUES ('184', 'การเข้ารหัส field in table', '2011-08-20 15:47:48', '2015-11-05 14:55:29', '17', 'การเข้ารหัส-field-in-table');
INSERT INTO `tbl_content` VALUES ('185', 'CHANGE IDENTITY COLUMN VALUES', '2011-08-28 16:03:39', '2015-11-05 14:54:14', '17', 'change-identity-column-values');
INSERT INTO `tbl_content` VALUES ('186', 'CDATE() TimeZone', '2011-09-06 21:27:55', '2015-11-03 01:59:07', '24', 'cdate-timezone');
INSERT INTO `tbl_content` VALUES ('187', 'PHP OOP CONNECT MYSQL', '2011-09-27 02:34:37', '2015-11-05 14:51:32', '35', 'php-oop-connect-mysql');
INSERT INTO `tbl_content` VALUES ('188', 'CSS3 IMAGE SHADOW', '2011-09-29 11:48:16', '2015-11-05 14:55:41', '18', 'css3-image-shadow');
INSERT INTO `tbl_content` VALUES ('189', 'PHP AUTO INCLUDE FILE', '2011-10-06 14:18:27', '2015-11-03 01:11:54', '35', 'php-auto-include-file');
INSERT INTO `tbl_content` VALUES ('190', 'การทำ mod rewrite บน localhost', '2012-02-03 23:52:08', '2015-11-05 14:53:31', '35', 'การทำ-mod-rewrite-บน-localhost');
INSERT INTO `tbl_content` VALUES ('191', 'ทำขอบมนให้รูปภาพ', '2012-03-06 00:59:00', '2015-11-30 15:00:51', '18', 'ทำขอบมนให้รูปภาพ');
INSERT INTO `tbl_content` VALUES ('193', 'พุธห้ามตัด', '2012-04-18 02:33:09', '2015-11-30 14:10:40', '12', 'พุธห้ามตัด');
INSERT INTO `tbl_content` VALUES ('194', 'mysql update with replace', '2012-04-24 09:26:31', '2015-11-03 01:06:00', '39', 'mysql-update-with-replace');
INSERT INTO `tbl_content` VALUES ('195', 'mySQL DISTINCT AND ORDER BY', '2012-10-09 22:33:07', '2015-11-05 14:50:39', '39', 'mysql-distinct-and-order-by');
INSERT INTO `tbl_content` VALUES ('196', 'การแก้ปัญหา Compatibility View ใน IE 9', '2012-11-30 00:50:17', '2015-11-03 01:59:56', '19', 'การแก้ปัญหา-compatibility-view-ใน-ie-9');
INSERT INTO `tbl_content` VALUES ('197', 'Google App ไม่ฟรี อีกต่อไป ', '2012-12-25 22:18:20', '2015-11-05 10:53:04', '13', 'google-app-ไม่ฟรี-อีกต่อไป');
INSERT INTO `tbl_content` VALUES ('198', 'ปิดการแจ้งเตือนใน Line', '2014-02-27 22:02:42', '2015-11-03 00:55:41', '40', 'ปิดการแจ้งเตือนใน-line');
INSERT INTO `tbl_content` VALUES ('199', 'Mod Rewrite ใน Localhost', null, '2015-11-12 11:49:10', '35', 'mod-rewrite-ใน-localhost');
INSERT INTO `tbl_content` VALUES ('200', 'การทำ Online Marketing ด้วยตนเอง', null, '2015-11-05 15:44:27', '20', 'การทำ-online-marketing-ด้วยตนเอง');
INSERT INTO `tbl_content` VALUES ('206', 'PHP Connect to MySQL', null, '2016-01-28 12:47:08', '35', 'php-connect-to-mysql');
INSERT INTO `tbl_content` VALUES ('205', 'Social Media', null, '2015-12-01 13:10:35', '20', 'social-media');
INSERT INTO `tbl_content` VALUES ('201', 'การแปลง URL ให้สั้นลง', null, '2015-11-10 02:26:25', '13', 'การแปลง-url-ให้สั้นลง');
INSERT INTO `tbl_content` VALUES ('202', 'explode data ใน PHP ', null, '2015-11-10 03:11:47', '35', 'explode-data-ใน-php');
INSERT INTO `tbl_content` VALUES ('203', 'สร้างลิ้งบนเบอร์โทรให้โทรออกได้เลย', null, '2015-11-14 14:06:59', '19', 'สร้างลิ้งบนเบอร์โทรให้โทรออกได้เลย');
INSERT INTO `tbl_content` VALUES ('204', 'เครื่องมือการทำ SEO', null, '2015-11-21 04:52:08', '20', 'เครื่องมือการทำ-seo');
INSERT INTO `tbl_content` VALUES ('207', '10 ข้อผิดพลาดของการทำเว็บไซต์', null, '2016-03-17 14:44:49', '20', '10-ข้อผิดพลาดของการทำเว็บไซต์');
INSERT INTO `tbl_content_group` VALUES ('4', 'วิทยาการคอมพ์', '2011-05-08 13:37:59', 'วิทยาการคอมพ์');
INSERT INTO `tbl_content_group` VALUES ('10', 'สุขภาพ', '2011-07-22 12:07:11', 'สุขภาพ');
INSERT INTO `tbl_content_group` VALUES ('11', 'การงาน', '2012-04-04 02:13:57', 'การงาน');
INSERT INTO `tbl_content_group` VALUES ('12', 'มงคล', '2012-04-18 02:34:03', 'มงคล');
INSERT INTO `tbl_content_group` VALUES ('13', 'Google', '2012-12-25 22:28:23', 'google');
INSERT INTO `tbl_content_group` VALUES ('14', 'กำลังใจ', '2011-01-04 13:14:17', 'กำลังใจ');
INSERT INTO `tbl_content_group` VALUES ('17', 'MS SQL Server', '2011-08-28 16:03:39', 'ms-sql-server');
INSERT INTO `tbl_content_group` VALUES ('18', 'CSS', '2012-03-06 04:01:49', 'css');
INSERT INTO `tbl_content_group` VALUES ('19', 'JavaScript', '2012-11-30 00:50:17', 'javascript');
INSERT INTO `tbl_content_group` VALUES ('20', 'SEO', '2009-12-19 10:24:35', 'seo');
INSERT INTO `tbl_content_group` VALUES ('21', 'XML', '2008-11-17 23:41:47', 'xml');
INSERT INTO `tbl_content_group` VALUES ('22', 'VB', '2008-11-17 23:44:32', 'vb');
INSERT INTO `tbl_content_group` VALUES ('24', 'ASP', '2011-09-06 21:27:55', 'asp');
INSERT INTO `tbl_content_group` VALUES ('25', 'ASP.NET', '2009-06-23 16:44:10', 'asp-net');
INSERT INTO `tbl_content_group` VALUES ('26', 'AJAX', '2008-11-18 00:01:52', 'ajax');
INSERT INTO `tbl_content_group` VALUES ('35', 'PHP', '2012-05-03 11:25:26', 'php');
INSERT INTO `tbl_content_group` VALUES ('36', 'SQL', '2012-10-09 22:33:07', 'sql');
INSERT INTO `tbl_content_group` VALUES ('37', 'Crystal Report', '2012-03-08 08:19:29', 'crystal-report');
INSERT INTO `tbl_content_group` VALUES ('38', 'VB.NET', '2011-05-22 17:54:10', 'vb-net');
INSERT INTO `tbl_content_group` VALUES ('39', 'mySql', '2012-10-09 22:34:44', 'mysql');
INSERT INTO `tbl_content_group` VALUES ('40', 'Mobile', '2014-02-27 22:06:04', 'mobile');
