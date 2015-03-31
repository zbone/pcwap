/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.1.73-log : Database - ligao
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ligao` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `ligao`;

/*Table structure for table `pailang_admin` */

DROP TABLE IF EXISTS `pailang_admin`;

CREATE TABLE `pailang_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_admin` */

insert  into `pailang_admin`(`id`,`user`,`pwd`,`author`,`status`) values (1,'jbone','fbb78b51d5e3606d7c07a6ce97deb830','赵',1);

/*Table structure for table `pailang_ads` */

DROP TABLE IF EXISTS `pailang_ads`;

CREATE TABLE `pailang_ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adurl` varchar(255) DEFAULT NULL,
  `adpic` varchar(255) DEFAULT NULL,
  `adremak` varchar(255) DEFAULT NULL,
  `isshow` smallint(1) unsigned DEFAULT '1',
  `time` varchar(255) DEFAULT NULL,
  `cate` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pailang_ads` */

/*Table structure for table `pailang_book` */

DROP TABLE IF EXISTS `pailang_book`;

CREATE TABLE `pailang_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `infoid` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pailang_book` */

/*Table structure for table `pailang_cate` */

DROP TABLE IF EXISTS `pailang_cate`;

CREATE TABLE `pailang_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `catetitle` varchar(255) DEFAULT NULL,
  `catekey` varchar(255) DEFAULT NULL,
  `catedesc` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `catetemp` varchar(255) DEFAULT NULL,
  `infotemp` varchar(255) DEFAULT NULL,
  `catepage` int(4) unsigned DEFAULT NULL,
  `catelogo` varchar(255) DEFAULT NULL,
  `catetype` int(10) unsigned DEFAULT '0',
  `pid` int(10) DEFAULT '0',
  `sort` int(6) DEFAULT '100',
  `menu` smallint(1) unsigned NOT NULL DEFAULT '1',
  `outurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_cate` */

insert  into `pailang_cate`(`id`,`catename`,`url`,`catetitle`,`catekey`,`catedesc`,`content`,`catetemp`,`infotemp`,`catepage`,`catelogo`,`catetype`,`pid`,`sort`,`menu`,`outurl`) values (1,'财富动态','cfnews','','','','','list_article','article_article',6,'',1,0,100,1,''),(4,'邮箱','remail','邮箱注册','邮箱注册','邮箱注册','','remail','',20,'',3,0,100,1,''),(5,'邮箱注册','emailzc','','','','','emailzc','',20,'',3,0,100,1,''),(6,'会员中心','myhome','','','','','myhome','',20,'',3,0,100,1,''),(7,'手机','rphone','','','','','rphone','',20,'',3,0,100,1,''),(8,'手机注册','phonezc','','','','','phonezc','',20,'',3,0,100,1,''),(9,'实名认证','setrz','','','','','setrz','',20,'',3,0,100,1,''),(10,'登录','login','','','','','login','',20,'',3,0,100,1,''),(11,'密码重置','setpwd','','','','','setpwd','',20,'',1,0,100,1,''),(12,'密码保护','protect','','','','','protect','',20,'',1,0,100,1,'');

/*Table structure for table `pailang_diy` */

DROP TABLE IF EXISTS `pailang_diy`;

CREATE TABLE `pailang_diy` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cid` int(5) NOT NULL,
  `diykey` varchar(20) NOT NULL,
  `value` varchar(255) DEFAULT ' ',
  `status` smallint(1) NOT NULL DEFAULT '1',
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pailang_diy` */

/*Table structure for table `pailang_info` */

DROP TABLE IF EXISTS `pailang_info`;

CREATE TABLE `pailang_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `key` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `cid` int(4) unsigned NOT NULL,
  `istop` smallint(1) unsigned DEFAULT '0',
  `isrec` smallint(1) unsigned DEFAULT '0',
  `isshow` smallint(1) unsigned DEFAULT '0',
  `isrev` smallint(1) DEFAULT '0',
  `ispic` smallint(1) DEFAULT '0',
  `pic` varchar(255) DEFAULT NULL,
  `hits` int(11) unsigned DEFAULT '0',
  `author` varchar(255) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `revs` int(11) unsigned DEFAULT '0',
  `pcs` varchar(255) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `temp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_info` */

insert  into `pailang_info`(`id`,`name`,`title`,`key`,`desc`,`content`,`cid`,`istop`,`isrec`,`isshow`,`isrev`,`ispic`,`pic`,`hits`,`author`,`price`,`revs`,`pcs`,`time`,`temp`) values (1,'新闻标题',NULL,NULL,'1122','1122',1,0,0,1,0,0,NULL,3,'派浪智能跨平台网站管理系统',NULL,0,NULL,'2015-01-27 19:44:53','article_article'),(2,'2015了？你还在使用银行理财？','','','1.投资门槛：P2P平台底、银行理财高\r\n\r\n\r\n现在各大银行推出各种理财产品，至少十万二十万才能投资，许多有心理财的年轻人都因为囊中羞涩而被拒之门','1.投资门槛：P2P平台底、银行理财高<br />\r\n<br />\r\n<br />\r\n现在各大银行推出各种理财产品，至少十万二十万才能投资，许多有心理财的年轻人都因为囊中羞涩而被拒之门外。相反P2P理财平台投资门槛十分低，只要50，100的就能进行投资，还时不时地放出一些注册就送的红包，全民都可参与。<br />\r\n<br />\r\n<br />\r\n2.收益率：P2P平台高、银行理财低<br />\r\n<br />\r\n<br />\r\n据统计，2014年上半年所有银行理财产品平均收益率为5.2%，而P2P平台收益普遍在10%左右，将近是理财产品的3-4倍。<br />\r\n<br />\r\n<br />\r\n3.手续费：P2P平台少、银行理财项目繁多<br />\r\n<br />\r\n<br />\r\n银行理财需要收取手续费、托管费、管理费等多种项目，无形中减少了理财投资者的不少收益。而P2P平台最多只要收取少量的提现手续费，相当于投资者无形中又得到一笔收益。<br />\r\n<br />\r\n<br />\r\n4.抵押担保：P2P严格审控、银行理财无<br />\r\n<br />\r\n<br />\r\n银行理财实际是投资者借给银行的一种信用贷款，除了银行信用之外，没有任何风险抵补措施和手段，虽然看似比较安全，但是一旦出现损失，投资者也只能吃哑巴亏。P2P理财虽然看似风险比较高，然而通过平台抵押模式，以及投资者心态摆正，不盲目追求需高收益，可以大大的降低风险。<br />\r\n<br />\r\n<br />\r\n5.真实项目挂钩：P2P清楚、银行理财糊涂<br />\r\n<br />\r\n<br />\r\n事实上银行理财经理大部分不清楚他们卖的是什么，甚至都不知道资金用作何用。P2P理财需要资金需求方提供真实的借款用途和项目信息，投资者可自主甄别和选择借款项目，做到了心中有数。<br />\r\n<br />\r\n<br />\r\n6.流动收益：P2P按月（季）付、银行理财到期付<br />\r\n<br />\r\n<br />\r\n银行理财普遍都是产品到期后一起结算本息，购买期间不能给投资者带来稳定的现金流收益，容易导致投资者流动性不足或紧张。P2P理财还款方式灵活可选，可以先息后本，按月付息、到期还本，灵活的本息结算方式既降低了理财风险，也能满足日常的流动性需求。<br />\r\n<br />\r\n<br />\r\nP2P的高收益伴随的高风险一直是投资者们观望的主要原因，而近日呼之欲出的一系列监管法则也能够对行业安全起到一定的作用，小编个人比较倾向P2P平台，也奉劝广大投资者在选择平台的时候需要谨慎，切不可被虚高的收益所诱惑，更不可透支消费理财，可以适当先用小额资金试水，观察一段时日后，再做选择。<br />',1,0,0,1,0,0,'',6,'力高财富','',0,'','2015-03-02 10:35:14','article_article'),(3,'P2P平台收益率将稳定涨幅','','','央行意外降息对市场产生的连锁反应还在持续，商业银行集体调整利率、股票市场全线蹿红，对于同样火热的P2P市场来说，不少业内人士在接受北京商','央行意外降息对市场产生的连锁反应还在持续，商业银行集体调整利率、股票市场全线蹿红，对于同样火热的P2P市场来说，不少业内人士在接受北京商报记者采 访时表示，P2P网贷平台的收益率将回归合理和正常。 不过，北京商报记者在采访过程中发现，不少P2P平台的负责人都认为，此次降息对P2P平台的影响有限，但是可以加速P2P平台规范。此次降息对P2P平 台影响不大，不但有利于吸引更多的小微企业通过网贷进行融资，同时将促进P2P收益应回归合理和正常值，降低平台风险。 “对网贷行业来说，降息会导致P2P网贷平台理财端产品的收益进一步下滑，但是由于降息有利于改善实体经济，降低借款人融资成本，坏账率也会随之降低，投 资人风险也会变小。”安丹方认为。 银行存款利息进一步降低，促使资金更多流向高收益的P2P市场，并让投资收益回归理性，由于民间借贷利率不得超过基准利率的4倍，借款人在任何合法渠道的 借款成本都将有所降低。 P2P行业是高度市场利率化的领域，市场风险决定了利率走向。 理财范则认为，央行降息对于互联网金融领域属于政策红利，而P2P平台合作企业准入门槛和银行准入层次不太一样，更多的小微企业可能也会涌向P2P行业， 此外贷款利率的下降可以让企业在银行信贷和P2P平台融资之间的额度管理上灵活配置。',1,0,0,1,0,0,'',4,'力高财富','',0,'','2015-03-02 10:36:13','article_article');

/*Table structure for table `pailang_links` */

DROP TABLE IF EXISTS `pailang_links`;

CREATE TABLE `pailang_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `remak` varchar(255) DEFAULT NULL,
  `sort` int(10) unsigned DEFAULT NULL,
  `isshow` smallint(1) DEFAULT '1',
  `time` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `cate` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pailang_links` */

/*Table structure for table `pailang_problem` */

DROP TABLE IF EXISTS `pailang_problem`;

CREATE TABLE `pailang_problem` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `uid` int(12) NOT NULL COMMENT '用户id',
  `problem` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '问题',
  `key` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '答案',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `pailang_problem` */

insert  into `pailang_problem`(`id`,`username`,`uid`,`problem`,`key`) values (4,'demo',10,'你最喜爱的人是？','嗡嗡'),(3,'jbone',9,'你最喜爱的人是？','嗡嗡');

/*Table structure for table `pailang_search` */

DROP TABLE IF EXISTS `pailang_search`;

CREATE TABLE `pailang_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pailang_search` */

/*Table structure for table `pailang_tags` */

DROP TABLE IF EXISTS `pailang_tags`;

CREATE TABLE `pailang_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `hits` int(10) unsigned DEFAULT '1',
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pailang_tags` */

/*Table structure for table `pailang_vip` */

DROP TABLE IF EXISTS `pailang_vip`;

CREATE TABLE `pailang_vip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(12) DEFAULT NULL COMMENT '身份证',
  `username` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `pwd` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `idcard` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '身份证',
  `relname` varchar(250) COLLATE utf8_bin DEFAULT NULL COMMENT '真实姓名',
  `class` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '邮箱',
  `phone` varchar(250) COLLATE utf8_bin NOT NULL COMMENT '手机号码',
  `qq` int(12) DEFAULT NULL COMMENT 'qq',
  `site` varchar(250) COLLATE utf8_bin DEFAULT NULL COMMENT '地址',
  `birthday` varchar(250) COLLATE utf8_bin DEFAULT NULL COMMENT '生日',
  `time` varchar(250) COLLATE utf8_bin DEFAULT NULL COMMENT '注册时间',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '可登陆',
  `ip` varchar(250) COLLATE utf8_bin DEFAULT NULL COMMENT 'IP',
  `rz` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '是否认证',
  `mb` enum('0','1') COLLATE utf8_bin DEFAULT '0' COMMENT '有无密保',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `pailang_vip` */

insert  into `pailang_vip`(`id`,`cid`,`username`,`pwd`,`idcard`,`relname`,`class`,`email`,`phone`,`qq`,`site`,`birthday`,`time`,`sort`,`status`,`ip`,`rz`,`mb`) values (10,NULL,'demo','cdf25ea8541593a4353f7d92d02c5f24',NULL,NULL,'phone','','15158321672',NULL,NULL,NULL,'2015-03-20',NULL,'1','211.140.18.115','0','1'),(11,NULL,'demo2','14e1b600b1fd579f47433b88e8d85291',NULL,NULL,'email','z15158321672@sina.com','',NULL,NULL,NULL,'2015-03-20',NULL,'1','39.188.210.211','0','0'),(9,NULL,'jbone','14e1b600b1fd579f47433b88e8d85291','330821199305020217','赵俊','email','962503677@qq.com','',962503677,'宁波市江东区','19930502','2015-03-20',NULL,'1','112.16.141.94','1','1');

/*Table structure for table `pailang_weixin_appid` */

DROP TABLE IF EXISTS `pailang_weixin_appid`;

CREATE TABLE `pailang_weixin_appid` (
  `appid` varchar(255) NOT NULL DEFAULT '',
  `secret` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_weixin_appid` */

insert  into `pailang_weixin_appid`(`appid`,`secret`,`id`) values ('465465','654654s',1);

/*Table structure for table `pailang_weixin_gz` */

DROP TABLE IF EXISTS `pailang_weixin_gz`;

CREATE TABLE `pailang_weixin_gz` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `leixin` tinyint(1) NOT NULL DEFAULT '1',
  `num` tinyint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_weixin_gz` */

insert  into `pailang_weixin_gz`(`id`,`cid`,`leixin`,`num`,`text`,`sort`) values (1,1,1,3,'欢迎关注我们',NULL);

/*Table structure for table `pailang_weixin_huifu` */

DROP TABLE IF EXISTS `pailang_weixin_huifu`;

CREATE TABLE `pailang_weixin_huifu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `leixin` smallint(1) DEFAULT '0',
  `cid` int(10) DEFAULT NULL,
  `num` smallint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_weixin_huifu` */

insert  into `pailang_weixin_huifu`(`id`,`key`,`leixin`,`cid`,`num`,`text`,`sort`) values (1,'你好',1,NULL,NULL,'你好，你的信息我们已收到',NULL),(2,'最新',2,NULL,NULL,NULL,NULL),(3,'热门',2,NULL,NULL,NULL,NULL),(4,'pcwap',2,6,3,NULL,NULL);

/*Table structure for table `pailang_weixin_menu` */

DROP TABLE IF EXISTS `pailang_weixin_menu`;

CREATE TABLE `pailang_weixin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `leixin` tinyint(1) DEFAULT '2',
  `url` varchar(255) DEFAULT NULL,
  `keys` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pailang_weixin_menu` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
