-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019-06-02 16:00:53
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- 表的结构 `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int(100) NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `location` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `contain` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `sum` int(100) NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `location`, `date`, `contain`, `sum`) VALUES
(1, '中国图书馆最美故事', '逸夫图书馆5楼', '2019-06-06', '为7000名0至18岁未成年读者提供阅读指导服务与暑期实践机会', 54),
(2, '书香飘万家', '校本部图书馆东区4楼', '2019-05-25', '“家风家训伴我成长”之诗礼家风讲座', 0);

-- --------------------------------------------------------

--
-- 表的结构 `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `library_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`library_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `area`
--

INSERT INTO `area` (`library_id`, `name`, `location`) VALUES
(1, '逸夫图书馆', '西安市未央区长大南路356号长大南路长安大学渭水校区'),
(2, '长安大学本部东院图书馆（雁塔校区）', '西安市雁塔区长安大学本部东院'),
(3, '长安大学本部北院图书馆（雁塔校区）', '西安市碑林区二环南路东段54米附近'),
(4, '长安大学图书馆（小寨校区）', '西安市雁塔区长安中路161号长安大学小寨校区');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `writer` varchar(100) CHARACTER SET utf8 NOT NULL,
  `publish` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sum` int(4) NOT NULL,
  `rest_num` int(4) NOT NULL,
  `book_cat` varchar(100) CHARACTER SET utf8 NOT NULL,
  `floor` int(4) NOT NULL,
  `library_id` int(10) NOT NULL,
  `infromation` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `publish_time` date NOT NULL,
  `price` int(10) NOT NULL,
  `score` int(100) NOT NULL,
  `yuyue` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `likes` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`book_id`, `name`, `writer`, `publish`, `sum`, `rest_num`, `book_cat`, `floor`, `library_id`, `infromation`, `publish_time`, `price`, `score`, `yuyue`, `likes`) VALUES
('xs-001', '白夜行', '东野圭吾', '天津出版社', 1, 0, '小说', 1, 1, '1973年，大阪一栋废弃建筑中发现一名遭利器刺死的男子。警方怀疑一个叫西本文代的女人，但缺少证据。不久西本被判定因意外事故死亡，从此案件成谜。此后19年，众多案件相关者的命运出现了离奇的转折，有人走向上流社会，有人在暗夜中游走挣扎。只有一个老警察追查不休，渐渐拼出了惊人的真相。', '2017-08-01', 45, 1447, '2017', '0'),
('sc-002', '时间简史', '史蒂芬·霍金', '湖南科技出版社', 1, 1, '科学', 1, 1, '该书内容是关于宇宙本性的*前沿知识，但是从那以后无论在微观还是宏观宇宙世界的观测技术方面都有了非凡的进展。这些观测证实了霍金教授在该书*版中的许多理论预言，其中包括宇宙背景探险者卫星（COBE）的发现，它在时间上回溯探测到离宇宙创生的30万年之内，并显露了他所计算的在时空结构中的涟漪。', '2014-06-03', 35, 2402, NULL, '2'),
('fl-003', '法律法规全书（第十六版）', '国务院法制办公室', '中国法制出版社', 1, 1, '法律', 2, 2, '2010年年底，我国全面完成了对现行法律和行政法规、地方性法规的集中清理工作。目前，涵盖社会关系各个方面的法律部门已经齐全，各法律部门中基本的、主要的法律已经制定，相应的行政法规和地方性法规比较完备，法律体系内部总体做到科学和谐统一。本书在此基础上，根据此前国家法律和行政法规的大规模清理工作，收录了截至2018年3月我国所有现行有效的法律和行政法规以及新公布或修订、修正的法律和行政法规，以满足读者及时了解国家立法动态的需要。', '2018-06-11', 104, 1246, NULL, '3'),
('ec-004', '经济学原理 （第7版）', '曼昆', '北京大学出版社', 1, 1, '经济', 2, 2, '目前国内市场上最受欢迎的引进版经济学教材之一，其特点是它的“学生导向”，它更多地强调经济学原理的应用和政策分析，而非经济学模型。第7版在延续该书一贯风格的同时，对第6版作了全面修订和改进。大幅更新了“新闻摘录”“案例研究”等专栏，拓展了章后习题。', '2015-05-21', 90, 131, NULL, '0'),
('lzh-005', '励志胜经：赢在习惯的起跑线', '禹田', '五洲传播出版社', 1, 0, '励志', 3, 3, '本书围绕“习惯养成”这一主题，精心挑选了近百篇引人入胜的小故事，并在每篇故事的篇末设置了“非常有理”小栏目，以期孩子们在轻松愉快的阅读过程中，深入体会独立思考、专心、细心、坚持不懈、自我反省、自立和自强的重要意义，自觉养成良好的习惯，走出一条自强之路。', '2018-01-01', 21, 578, NULL, '0'),
('ar-006', '军事百科典藏书系--空军武器大百科（第二版）', '军情视点', '化学工业出版社', 1, 1, '军事', 4, 4, '本书详细介绍了自空军诞生以来所使用的各种武器，主要包括战斗机、截击机、攻击机、战斗轰炸机、轰炸机、直升机、无人机和导弹等，对每种武器都简明扼要地介绍了制造厂商、服役时间、生产数量、使用国家、主体构造、作战性能及实战表现等知识。此外，还加入了不少与之相关的趣闻，以增强阅读的趣味性。通过阅读本书，读者可对世界各国的空军武器有一个全面和系统的认识。', '2017-07-07', 59, 790, NULL, '0'),
('mh-007', '漫画版世界名著系列：悲惨世界', '维克多·雨果', '中信出版社', 1, 0, '漫画', 4, 4, '《悲惨世界》另有中文译名《孤星泪》，是由法国大作家维克多•雨果于1862年所发表的一部长篇小说，涵盖了拿破仑战争和之后的十几年的时间，是十九世纪非常知名的小说之一。故事的主线围绕主人公获释罪犯冉•阿让（Jean Valjean）试图赎罪的历程，融进了法国的历史、建筑、政治、道德哲学、法律、正义、宗教信仰等时代背景下复杂的组成元素，探讨了人性在不同社会时期的状态和痛苦。', '2018-04-05', 42, 799, '1234567', '1'),
('fa-001', '时尚经典', '姜旻枝', '北方文艺出版社', 1, 1, '时尚', 1, 1, '这是一本时尚和漫画结合的时尚宝典。讲述了玛丽莲·梦露、奥黛丽·赫本、戴安娜、麦当娜、凯特王妃等18位明星的传奇故事，以漫画形式，通过明星的时尚穿搭和配色，结合时尚品牌和设计风格，展现世界百年时尚史的风采和魅力。本书由韩国著名时尚插画家绘制，画风绚丽多彩，语言轻松诙谐，是时尚爱好者、商务人士、设计师的必备参考书。', '2018-11-02', 101, 1030, '1234567', '6'),
('ed-002', '儿童教育心理学', '阿德勒', '中华工商联合出版社', 1, 1, '教育', 2, 2, ' 《儿童教育心理学》主要围绕如何帮助儿童形成一个正确、健康的人格这一核心问题来展开。他强调要用正确的方法培养儿童独立、自信、勇敢的品质，以及与他人合作的意识和能力。', '2017-11-02', 56, 492, NULL, '1'),
('la-002', '语言学与应用语言学百科全书', '梅德明', '北京大学出版社', 1, 1, '语言', 3, 3, '《语言学与应用语言学百科全书》以词典学、专科辞书编纂学、术语学以及语言学等理论为指导，借鉴国内外语言学专科辞书编纂的成功经验，致力于编纂一部内容覆盖面广、释义准确清晰、相关百科知识丰富、宏观结构合理、体例规范统一、参照结构完善严密、专业性、权威性强的中型综合性语言学百科全书。', '2017-05-05', 285, 1769, NULL, '0'),
('pa-004', '政治学通识', '包刚升', '北京大学出版社', 1, 1, '政治', 4, 4, '这本书不是针对具体某个话题，而主要是进行政治学基本知识的普及，接地气地告诉读者“政治学”是一门什么样的学问、它为什么重要、普通读者又怎么样参与政治和怎样用政治学的逻辑思维去思考身边的政治学问题。', '2015-11-03', 38, 1356, NULL, '0'),
('mg-002', '时尚芭莎', '芭莎', '天津出版社', 1, 1, '杂志', 2, 2, '时尚杂志女性流行趋势期刊化妆穿衣搭配服饰美容美妆明星娱乐优雅气质培养书籍。', '2019-04-04', 16, 1592, NULL, '0'),
('ma-003', '医学免疫学（第7版/本科临床/配增值）', '曹雪涛', '人民卫生出版社', 1, 1, '医学', 3, 3, '本套教材为全国高等学校五年制本科临床医学专业第九轮规划教材，是我国医学教育领域起步早、历史悠久、修订版次多的权威、规范、科学、经典的规划教材。第八轮教材自2013年秋季出版至今，已经4年时间，修订再版是学科知识及医学教育发展的需要。', '2018-07-09', 57, 386, NULL, '0'),
('cp-005', '计算机科学技术百科全书（第三版）', '张效祥', '清华大学出版社', 1, 1, '计算机', 5, 5, '《全书》根据计算机学科的内在联系、相关程度与性质特点，划分为“计算机科学理论”、“计算机组织与体系结构”、“计算机软件”、“计算机硬件”、“计算机应用技术”和“人工智能”6大分支，按4级框架，共设置1293个条目200多万字。由于中文信息处理是我国及全球汉字通用地区计算机应用中的重要技术，特在“计算机应用技术”分支中，设置有关中文信息处理条目80余条，以供读者查阅。', '2018-05-06', 393, 702, NULL, '0'),
('xs-004', '小王子', '安托万·德·圣·埃克苏佩里', '天津出版社', 1, 1, '小说', 1, 1, '本书的主人公是来自外星球的小王子。书中以一位飞行员作为故事叙述者，讲述了小王子从自己星球出发前往地球的过程中，所经历的各种历险。作者以小王子的孩子式的眼光，透视出成人的空虚、盲目，愚妄和死板教条，用浅显天真的语言写出了人类的孤独寂寞、没有根基随风流浪的命运。同时，也表达出作者对金钱关系的批判，对真善美的讴歌。', '2019-05-16', 43, 1250, '', '4'),
('xs-002', '白夜行', '东野圭吾', '天津出版社', 1, 0, '小说', 1, 1, '1973年，大阪一栋废弃建筑中发现一名遭利器刺死的男子。警方怀疑一个叫西本文代的女人，但缺少证据。不...', '2019-05-09', 45, 23148, '1234567', '0'),
('pa-002', '史记', '司马迁', '天津出版社', 1, 1, '政治', 2, 2, '《史记》全书包括十二本纪（记历代帝王政绩）、三十世家（记诸侯国和汉代诸侯、勋贵兴亡）、七十列传（记重要人物的言行事迹，主要叙人臣，其中最后一篇为自序）、十表（大事年表）、八书（记各种典章制度记礼、乐、音律、历法、天文、封禅、水利、财用）。《史记》共一百三十篇，五十二万六千五百余字，比《淮南子》多三十九万五千余字，比《吕氏春秋》多二十八万八千余字。', '2017-03-05', 56, 2, '', '0');

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `borrow_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `book_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `borrow_time` timestamp NOT NULL,
  `return_time` varchar(100) DEFAULT NULL,
  `shreturn` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `reader_id`, `book_id`, `borrow_time`, `return_time`, `shreturn`) VALUES
(1, 2017903756, 'xs-001', '2019-06-01 06:26:26', '2019-06-01 14:27:58', '2019-08-01 14:26:26'),
(2, 2017903756, 'xs-001', '2019-06-01 06:35:30', '2019-06-01 14:37:08', '2019-08-01 14:35:30'),
(9, 2017903756, 'ec-004', '2019-06-02 12:18:22', '2019-06-02 20:34:34', '2019-05-02 20:18:06'),
(4, 2017903756, 'xs-001', '2019-06-01 08:46:16', '2019-06-01 17:16:26', '2019-08-01 16:46:16'),
(6, 1234567, 'mh-007', '2019-06-02 09:58:51', NULL, '2019-05-01 22:11:39'),
(10, 2017903756, 'lzh-005', '2019-06-02 12:21:56', NULL, '2019-05-02 20:21:41'),
(8, 1234567, 'fl-003', '2019-06-02 09:57:43', '2019-06-02 17:29:09', '2019-05-02 17:26:45');

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `book_id` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`collect_id`, `reader_id`, `book_id`) VALUES
(16, 2017903756, 'ed-002'),
(13, 1234567, 'sc-002'),
(14, 1234567, 'xs-002'),
(17, 2017903756, ''),
(18, 2017903756, 'lzh-005');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `book_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comments` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `reader_id`, `book_id`, `comments`) VALUES
(2, 2017903756, 'ma-003', '成功的科学家往往是兴趣广泛的人，他们的独创精神来自他们的博学。'),
(7, 2017903756, 'cp-005', '语言是心灵和文化教养的反映。');

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` int(100) NOT NULL,
  `phone` int(100) NOT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`manager_id`, `name`, `password`, `phone`) VALUES
(2017903756, '文雅', 0, 0),
(21321323, 'e', 12, 213);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `book_id` varchar(100) NOT NULL,
  `know` int(100) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`news_id`, `reader_id`, `content`, `book_id`, `know`) VALUES
(1, 2017903756, '您已经超过还书期限，请尽快归还书籍，请在个人中心中查询您的欠费金额！', 'lzh-005', NULL),
(2, 2017903756, '您已经超过还书期限，请尽快归还书籍，请在个人中心中查询您的欠费金额！', 'lzh-005', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `reader`
--

CREATE TABLE IF NOT EXISTS `reader` (
  `reader_id` int(10) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(110) CHARACTER SET utf8 NOT NULL,
  `class` varchar(100) CHARACTER SET utf8 NOT NULL,
  `major` varchar(100) CHARACTER SET utf8 NOT NULL,
  `borrowed` varchar(200) CHARACTER SET utf8 NOT NULL,
  `not_return` varchar(200) CHARACTER SET utf8 NOT NULL,
  `can_borrow` int(3) NOT NULL,
  PRIMARY KEY (`reader_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `reader`
--

INSERT INTO `reader` (`reader_id`, `password`, `name`, `phone`, `class`, `major`, `borrowed`, `not_return`, `can_borrow`) VALUES
(2017903756, '12345', '文雅', '12345', '信息', '计算机', '6', '2', 1),
(1234567, '321', 'yyy', '3455', 'ggh', 'dhtd', '7', '0', 3);

-- --------------------------------------------------------

--
-- 表的结构 `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `sg_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `suggest` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`sg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `suggestion`
--

INSERT INTO `suggestion` (`sg_id`, `reader_id`, `suggest`, `time`) VALUES
(10, 2017903756, '再高深的学问也是从字母学起的。', '2019-06-02 12:44:30'),
(5, 2017903756, '再高深的学问也是从字母学起的。', '2019-06-02 12:44:40'),
(6, 2017903756, '再高深的学问也是从字母学起的。', '2019-06-02 12:44:49'),
(7, 2017903756, '下次 ', '2019-06-01 00:31:57'),
(8, 2017903756, '高尚的语言包含着真诚的动机。', '2019-06-02 12:45:04'),
(9, 1234567, '666', '2019-06-01 14:01:14');

-- --------------------------------------------------------

--
-- 表的结构 `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `money_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `book_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `over_date` int(100) NOT NULL,
  `money` int(100) NOT NULL,
  `give` int(10) DEFAULT NULL,
  PRIMARY KEY (`money_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `ticket`
--

INSERT INTO `ticket` (`money_id`, `reader_id`, `book_id`, `over_date`, `money`, `give`) VALUES
(15, 2017903756, 'ec-004', 31, 16, 1),
(12, 2017903756, 'xs-002', 3, 2, 1),
(6, 1234567, 'xs-002', 3, 2, 1),
(14, 2017903756, 'ec-004', 31, 16, 1),
(16, 2017903756, 'lzh-005', 31, 16, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yuyue`
--

CREATE TABLE IF NOT EXISTS `yuyue` (
  `yuyue_id` int(100) NOT NULL AUTO_INCREMENT,
  `reader_id` int(100) NOT NULL,
  `book_id` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `give` int(10) DEFAULT NULL,
  PRIMARY KEY (`yuyue_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `yuyue`
--

INSERT INTO `yuyue` (`yuyue_id`, `reader_id`, `book_id`, `give`) VALUES
(2, 1234567, 'xs-002', 1),
(3, 1234567, 'fa-001', NULL),
(5, 1234567, 'xs-002', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
