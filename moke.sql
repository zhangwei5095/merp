set charset utf8;
CREATE TABLE `t_account` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` char(16) DEFAULT NULL,
  `admin_pwd` char(32) DEFAULT NULL,
  `gid` int(1) DEFAULT NULL COMMENT '管理用户组ID',
  `createtime` int(10) DEFAULT NULL COMMENT '创建时间',
  `lastlogintime` int(10) DEFAULT NULL COMMENT '最后登录时间',
  `admin_realname` varchar(40) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `state` int(3) DEFAULT NULL COMMENT '状态1停用 0可用 3删除',
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
insert into `t_account`(`admin_id`,`admin_name`,`admin_pwd`,`gid`,`createtime`,`lastlogintime`,`admin_realname`,`phone`,`note`,`state`,`email`) values('5','admin','e10adc3949ba59abbe56e057f20f883e','1','1424574552','1431347470','湘湘','18501330285','','1','814851524@qq.com');
insert into `t_account`(`admin_id`,`admin_name`,`admin_pwd`,`gid`,`createtime`,`lastlogintime`,`admin_realname`,`phone`,`note`,`state`,`email`) values('14','test1','e10adc3949ba59abbe56e057f20f883e','1','1425823964','1425823991','测试用户1','','','1','');
insert into `t_account`(`admin_id`,`admin_name`,`admin_pwd`,`gid`,`createtime`,`lastlogintime`,`admin_realname`,`phone`,`note`,`state`,`email`) values('15','test2','e10adc3949ba59abbe56e057f20f883e','2','1425823982','1425824092','测试用户2','','','1','');
CREATE TABLE `t_category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL COMMENT '父ID',
  `is_show` tinyint(1) DEFAULT NULL COMMENT '是否显示',
  `isdel` tinyint(1) DEFAULT '0' COMMENT '是否可用1不可用 0可用',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='商品分类表';
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('29','天使之魅','0','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('30','黛莱美','0','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('31','植美村','0','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('32','纾雅','0','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('33','素佳','0','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('34','护手霜','33','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('35','日用卫生巾','32','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('36','夜用卫生巾','32','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('37','卫生护垫','32','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('38','面膜','30','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('39','洗面奶','30','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('40','BB霜','30','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('41','眼唇精华','30','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('42','蓝莓面膜','29','1','1');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('43','面膜','29','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('44','美颜水','29','1','0');
insert into `t_category`(`cat_id`,`cat_name`,`pid`,`is_show`,`isdel`) values('45','套盒','31','1','0');
CREATE TABLE `t_goods` (
  `goods_id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(100) DEFAULT NULL,
  `goods_sn` varchar(32) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `stock` float DEFAULT '0' COMMENT '库存',
  `warn_stock` tinyint(3) DEFAULT '1' COMMENT '库存警告',
  `weight` varchar(32) DEFAULT NULL,
  `unit` varchar(32) DEFAULT NULL COMMENT '单位',
  `out_price` decimal(8,2) DEFAULT NULL COMMENT '销售价',
  `in_price` decimal(8,2) DEFAULT NULL COMMENT '进价',
  `market_price` decimal(8,2) DEFAULT NULL COMMENT '市场价',
  `promote_price` decimal(8,2) DEFAULT NULL COMMENT '促销价',
  `ispromote` tinyint(1) DEFAULT '0' COMMENT '是否启用',
  `promote_start_date` date DEFAULT NULL COMMENT '促销开始时间（废弃）',
  `promote_end_date` date DEFAULT NULL COMMENT '促销结束时间（废弃）',
  `ismemberprice` tinyint(1) DEFAULT '1' COMMENT '是否享受会员价',
  `creatymd` date DEFAULT NULL COMMENT '商品添加时间',
  `creatdateline` int(10) DEFAULT NULL,
  `lastinymd` date DEFAULT NULL COMMENT '最后进货时间',
  `lastindateline` int(10) DEFAULT NULL,
  `goods_desc` varchar(200) DEFAULT NULL COMMENT '商品简介',
  `countamount` float(10,2) unsigned DEFAULT NULL COMMENT '商品总进价【废弃】',
  `salesamount` float(10,2) unsigned DEFAULT NULL COMMENT '销售总额【废弃】',
  `isdel` tinyint(1) DEFAULT '0' COMMENT '是否可用1不可用 0可用',
  `specification` varchar(100) DEFAULT NULL COMMENT '商品规格',
  PRIMARY KEY (`goods_id`),
  UNIQUE KEY `goods_sn` (`goods_sn`),
  KEY `creatymd` (`creatymd`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='商品表';
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('12','素佳纤柔倍润护手霜','001','34','11','1','0.05','盒','28.00','12.00','28.00','','0','','','0','2015-03-08','','','','护手霜','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('13','纾雅卫生护垫（纯棉表层）','002','37','48','1','','盒','12.80','6.00','12.80','','0','','','0','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('14','纾雅超薄夜用（纯棉表层）','003','36','48','1','','盒','19.80','9.00','19.80','','0','','','0','2015-03-08','','','','夜用卫生巾','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('15','纾雅超薄日用（纯棉表层）','004','35','47','1','','盒','19.80','9.00','19.80','','0','','','1','2015-03-08','','','','日用卫生巾','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('16','植美村致美焕颜保湿优惠礼盒','005','45','14','1','','盒','298.00','120.00','298.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('17','黛莱美紧致提升眼唇精华液','006','41','10','1','','瓶','248.00','80.00','248.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('18','黛莱美焕彩水润无瑕BB霜','007','40','15','1','','瓶','158.00','60.00','158.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('19','黛莱美焕彩净润洁面乳','008','39','17','1','','瓶','98.00','34.00','98.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('20','黛莱美多重修护面膜','009','38','14','1','','盒','198.00','80.00','198.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('21','天使之魅魅时美颜水','010','44','7','1','','瓶','198.00','80.00','198.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('22','天使之魅蓝莓面膜','011','43','16','1','','盒','268.00','80.00','268.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('23','天使之魅冰膜','012','43','4','1','','盒','278.00','80.00','278.00','','0','','','1','2015-03-08','','','','','','','0','');
insert into `t_goods`(`goods_id`,`goods_name`,`goods_sn`,`cat_id`,`stock`,`warn_stock`,`weight`,`unit`,`out_price`,`in_price`,`market_price`,`promote_price`,`ispromote`,`promote_start_date`,`promote_end_date`,`ismemberprice`,`creatymd`,`creatdateline`,`lastinymd`,`lastindateline`,`goods_desc`,`countamount`,`salesamount`,`isdel`,`specification`) values('24','天使之魅男士面膜','013','43','0','1','','盒','398.00','80.00','398.00','','0','','','1','2015-03-08','','','','','','','0','');
CREATE TABLE `t_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT NULL COMMENT '日志类型：0添加商品1商品入库2商品出库',
  `goods_id` int(10) DEFAULT NULL COMMENT '商品ID',
  `content` text,
  `user_id` int(10) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `dateymd` date DEFAULT NULL,
  `dateline` int(10) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `dateymd` (`dateymd`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='商品管理日志表';
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('1','1','1','增加入库：名称：龙凤呈祥,数量：10','1','管理员','2012-02-06','1328520664');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('2','1','1','增加入库：名称：龙凤呈祥,数量：10','1','管理员','2012-02-06','1328520698');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('3','1','1','增加入库：名称：龙凤呈祥,数量：10','1','管理员','2012-02-06','1328520858');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('4','1','1','增加入库：名称：龙凤呈祥,数量：2','1','管理员','2012-02-06','1328520909');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('5','1','2','增加入库：名称：龙凤呈祥2,数量：10','1','管理员','2012-02-06','1328520953');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('6','1','2','增加入库：名称：龙凤呈祥2,数量：10','1','管理员','2012-02-06','1328520960');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('7','1','2','增加入库：名称：龙凤呈祥2,数量：10','1','管理员','2012-02-06','1328520966');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('8','1','2','增加入库：名称：龙凤呈祥2,数量：3','1','管理员','2012-02-06','1328520975');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('9','1','1','增加入库：名称：龙凤呈祥,数量：2','1','管理员','2012-02-07','1328584427');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('10','1','2','增加入库：名称：龙凤呈祥2,数量：10','1','管理员','2012-02-07','1328584441');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('11','0','1','修改商品：龙凤呈祥','1','管理员','2012-02-07','1328593504');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('12','0','1','修改商品：龙凤呈祥','1','管理员','2012-02-07','1328593540');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('13','2','2','退款商品ID：2数量:1退款总金额：10.00','1','管理员','2012-02-09','1328774193');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('14','0','3','新增商品：茅台酒','1','管理员','2012-02-09','1328774380');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('15','1','3','增加入库：名称：茅台酒,数量：10','1','管理员','2012-02-09','1328774416');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('16','2','3','退款商品ID：3数量:1退款总金额：200.00','1','管理员','2012-02-09','1328774635');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('17','2','3','商品ID：3出库:2','1','管理员','2012-02-09','1328776033');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('18','2','3','商品ID：3出库:1','1','管理员','2012-02-09','1328776132');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('19','2','3','退款商品ID：3数量:1退款总金额：100.00','1','管理员','2012-02-09','1328776256');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('20','0','4','新增商品：海飞丝去屑洗发水','1','管理员','2012-02-09','1328779753');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('21','1','4','增加入库：名称：海飞丝去屑洗发水,数量：10','1','管理员','2012-02-09','1328779778');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('22','2','4','商品ID：4出库:2','1','管理员','2012-02-09','1328779829');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('23','2','4','退款商品ID：4数量:1退款总金额：8.00','1','管理员','2012-02-09','1328779873');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('24','2','1','商品ID：1出库:1','1','管理员','2012-02-10','1328861152');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('25','2','3','商品ID：3出库:1','1','管理员','2012-02-10','1328861152');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('26','2','4','商品ID：4出库:1','1','管理员','2012-02-10','1328861274');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('27','0','5','新增商品：我的优乐美','1','管理员','2012-02-15','1329276341');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('28','2','4','商品ID：4出库:2','1','管理员','2012-02-17','1329457313');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('29','2','4','退款商品ID：4数量:2退款总金额：16.00','1','管理员','2012-02-17','1329458642');
insert into `t_log`(`log_id`,`type`,`goods_id`,`content`,`user_id`,`username`,`dateymd`,`dateline`) values('30','2','4','商品ID：4出库:3','1','管理员','2012-02-17','1329462898');
CREATE TABLE `t_member` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `membercardid` varchar(16) DEFAULT NULL COMMENT '会员卡ID【废弃】',
  `realname` varchar(32) DEFAULT NULL COMMENT '真实名字',
  `phone` varchar(16) DEFAULT '' COMMENT '座机',
  `mobile` varchar(16) DEFAULT NULL COMMENT '手机',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `prov_id` int(10) DEFAULT NULL COMMENT '省份ID',
  `prov_name` varchar(32) DEFAULT NULL COMMENT '省份名称',
  `city_id` int(10) DEFAULT NULL COMMENT '城市ID',
  `city_name` varchar(32) DEFAULT NULL COMMENT '城市名称',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `zipcode` int(7) DEFAULT NULL COMMENT '邮编',
  `cardid` varchar(18) DEFAULT NULL COMMENT '身份证',
  `state` tinyint(1) DEFAULT '1' COMMENT '状态0停用 1可用 3删除',
  `grade` tinyint(1) DEFAULT '1' COMMENT '会员等级',
  `credit` int(10) DEFAULT '0' COMMENT '购物积分',
  `regdateymd` date DEFAULT NULL COMMENT '注册时间YMD',
  `regdateline` int(10) DEFAULT NULL COMMENT '注册时间',
  `lastdateline` int(10) DEFAULT NULL COMMENT '最后购物时间',
  `wecha_account` varchar(40) DEFAULT NULL COMMENT '微信号',
  `wecha_name` varchar(40) DEFAULT NULL COMMENT '微信名',
  `qq` varchar(40) DEFAULT NULL COMMENT '微信名',
  `district_id` int(10) DEFAULT NULL COMMENT '区ID',
  `district_name` varchar(32) DEFAULT NULL COMMENT '区名称',
  `birthday` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mid`),
  UNIQUE KEY `membercardid` (`membercardid`),
  KEY `regdateymd` (`regdateymd`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='会员信息表';
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('6','','李蓉','','13455233215','1321337272@qq.com','','山东','','青岛市','城阳街道 盈福祥小区西门','200200','','1','3','0','','','','qq1321337272','来自星星的裤袜','1321337272','','城阳区','');
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('7','','吴采红','','13590696690','315579190@qq.com','','广东','','佛山市','北滘镇美的新海岸自由立方9橦','0','','1','3','0','','','','wch315579190','彩彩','315579190','','顺德区','');
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('8','','殷晓蒙','','18515660946','285446938@qq.com','','北京','','市辖区','木林镇茶棚村','0','','1','3','0','','','','crq4818','陪伴','285446938','','顺义区','');
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('9','','范冬梅','','18810279660','','','北京','','市辖区','清河学府树家园3~8','0','','1','1','0','','','','18810279660','范冬梅','18810279660','','海淀区','');
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('10','','宋跃峰','','18207550336','435205754@qq.com','','广东','','深圳市','沙头街道深圳市国家税务局','0','','1','1','0','','','','syuefeng03','一峰','435205754','','福田区','');
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('11','','熊占丽','','18600804716','2359689615@qq.com','','北京','','市辖区','复兴路甲14号华鹰大厦B座429室','0','','1','1','1','','','','yezi00321','叶子','2359689615','','海淀区','');
insert into `t_member`(`mid`,`membercardid`,`realname`,`phone`,`mobile`,`email`,`prov_id`,`prov_name`,`city_id`,`city_name`,`address`,`zipcode`,`cardid`,`state`,`grade`,`credit`,`regdateymd`,`regdateline`,`lastdateline`,`wecha_account`,`wecha_name`,`qq`,`district_id`,`district_name`,`birthday`) values('12','','小琴','','','','','北京','','市辖区','华鹰大厦附近卡玛服装店','0','','1','1','0','','','','','小琴','','','海淀区','');
CREATE TABLE `t_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `mid` int(10) DEFAULT NULL COMMENT '会员ID',
  `order_no` varchar(14) DEFAULT NULL COMMENT '订单号',
  `dateymd` date DEFAULT NULL COMMENT '创建时间',
  `dateline` int(10) DEFAULT NULL,
  `order_type` int(4) DEFAULT '1' COMMENT '1 零售 2代理商批发',
  `order_status` int(4) DEFAULT '1' COMMENT '0已确认；1 已付款；2已发货；3已完成；4退货中；5退货完成',
  `pay_status` int(4) DEFAULT '1' COMMENT '1) 未付款2) 部分付款3) 已付款4) 部分退款5完全退款',
  `pay_type` int(4) DEFAULT '1' COMMENT '1) 银行转账2) 支付宝3) 微信支付4) 理财通支付5) 其他',
  `num_total` int(10) DEFAULT '0' COMMENT '合计数量',
  `num_delivered` int(10) DEFAULT NULL COMMENT '已发货数量',
  `num_refund` int(10) DEFAULT '0' COMMENT '退货数量',
  `weight` varchar(10) DEFAULT NULL,
  `amount_freight` float(10,2) DEFAULT '0.00' COMMENT '运费金额',
  `amount_goods` float(10,2) DEFAULT '0.00' COMMENT '商品金额',
  `amount_total` float(10,2) DEFAULT '0.00' COMMENT '总计金额',
  `amount_payed` float(10,2) DEFAULT '0.00' COMMENT '已支付额',
  `amount_refund` float(10,2) DEFAULT '0.00' COMMENT '已退款额',
  `logistics_company` varchar(40) CHARACTER SET utf8 COLLATE utf8_romanian_ci DEFAULT NULL,
  `logistics_no` varchar(40) DEFAULT NULL COMMENT '物流单号',
  `delivery_address` varchar(200) DEFAULT NULL COMMENT '地址',
  `zipcode` int(7) DEFAULT NULL COMMENT '邮编',
  `consignee` varchar(40) DEFAULT NULL COMMENT '收货人',
  `bill_persion` varchar(40) DEFAULT NULL COMMENT '账单人(废弃)',
  `bill_address` varchar(200) DEFAULT NULL COMMENT '账单地址(废弃)',
  `state` int(3) DEFAULT NULL COMMENT '状态0停用1可用 3删除',
  `order_time` varchar(20) DEFAULT NULL COMMENT '下单时间',
  `consignee_phone` varchar(40) DEFAULT NULL COMMENT '收货人',
  `refund_time` date DEFAULT NULL COMMENT '退货时间',
  `amount_in_price` int(10) DEFAULT NULL COMMENT '总进价',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
insert into `t_order`(`order_id`,`mid`,`order_no`,`dateymd`,`dateline`,`order_type`,`order_status`,`pay_status`,`pay_type`,`num_total`,`num_delivered`,`num_refund`,`weight`,`amount_freight`,`amount_goods`,`amount_total`,`amount_payed`,`amount_refund`,`logistics_company`,`logistics_no`,`delivery_address`,`zipcode`,`consignee`,`bill_persion`,`bill_address`,`state`,`order_time`,`consignee_phone`,`refund_time`,`amount_in_price`) values('16','9','1425827076','2015-03-08','1425828087','1','3','3','2','2','2','0','','0.00','0.00','406.00','406.00','0.00','','','北京市辖区海淀区清河学府树家园3~8','0','范冬梅','','','1','2015-03-08','18810279660','','180');
insert into `t_order`(`order_id`,`mid`,`order_no`,`dateymd`,`dateline`,`order_type`,`order_status`,`pay_status`,`pay_type`,`num_total`,`num_delivered`,`num_refund`,`weight`,`amount_freight`,`amount_goods`,`amount_total`,`amount_payed`,`amount_refund`,`logistics_company`,`logistics_no`,`delivery_address`,`zipcode`,`consignee`,`bill_persion`,`bill_address`,`state`,`order_time`,`consignee_phone`,`refund_time`,`amount_in_price`) values('17','10','1425827837','2015-03-08','1425828124','1','3','2','2','4','4','0','','0.00','0.00','844.00','300.00','0.00','','','广东深圳市福田区沙头街道深圳市国家税务局','0','宋跃峰','','','1','2015-03-08','18207550336','','314');
insert into `t_order`(`order_id`,`mid`,`order_no`,`dateymd`,`dateline`,`order_type`,`order_status`,`pay_status`,`pay_type`,`num_total`,`num_delivered`,`num_refund`,`weight`,`amount_freight`,`amount_goods`,`amount_total`,`amount_payed`,`amount_refund`,`logistics_company`,`logistics_no`,`delivery_address`,`zipcode`,`consignee`,`bill_persion`,`bill_address`,`state`,`order_time`,`consignee_phone`,`refund_time`,`amount_in_price`) values('19','11','1425908909','2015-03-09','1425910645','1','0','1','2','1','1','0','','0.00','0.00','168.00','0.00','0.00','','','北京市辖区海淀区复兴路甲14号华鹰大厦B座429室','0','熊占丽','','','1','2015-03-09','18600804716','','80');
insert into `t_order`(`order_id`,`mid`,`order_no`,`dateymd`,`dateline`,`order_type`,`order_status`,`pay_status`,`pay_type`,`num_total`,`num_delivered`,`num_refund`,`weight`,`amount_freight`,`amount_goods`,`amount_total`,`amount_payed`,`amount_refund`,`logistics_company`,`logistics_no`,`delivery_address`,`zipcode`,`consignee`,`bill_persion`,`bill_address`,`state`,`order_time`,`consignee_phone`,`refund_time`,`amount_in_price`) values('20','12','1425909979','2015-03-09','1425910545','1','0','1','2','1','1','0','','0.00','0.00','19.80','0.00','0.00','','','北京市辖区海淀区华鹰大厦附近卡玛服装店','0','小琴','','','1','1970-01-01','','','9');
CREATE TABLE `t_order_goods` (
  `order_id` int(10) NOT NULL,
  `goods_id` int(10) NOT NULL,
  `num` int(10) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `num_refund` int(10) DEFAULT '0',
  PRIMARY KEY (`order_id`,`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('16','16','1','248.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('16','18','1','158.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('17','16','1','298.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('17','19','1','0.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('17','22','1','268.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('17','23','1','278.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('19','20','1','168.00','0');
insert into `t_order_goods`(`order_id`,`goods_id`,`num`,`price`,`num_refund`) values('20','15','1','19.80','0');
CREATE TABLE `t_purchase` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) DEFAULT NULL,
  `goods_sn` varchar(32) DEFAULT NULL,
  `goods_name` varchar(100) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `in_num` float DEFAULT NULL COMMENT '进货数量',
  `out_num` float DEFAULT '0' COMMENT '销售数量【废弃】',
  `in_price` decimal(8,2) DEFAULT NULL COMMENT '进价',
  `dateymd` date DEFAULT NULL COMMENT '进货时间',
  `dateline` int(10) DEFAULT NULL,
  `isdel` tinyint(1) DEFAULT '0' COMMENT '是否可用1不可用 0可用',
  `supplier` varchar(40) DEFAULT NULL COMMENT '供应商',
  `express` decimal(8,0) DEFAULT NULL,
  `payment` decimal(8,0) DEFAULT NULL COMMENT '付款额',
  `purchase` date DEFAULT NULL COMMENT '采购时间',
  `order_status` int(3) DEFAULT '0' COMMENT '0已确认；1 已付款；2已发货；3已完成；4退货中；5退货完成',
  PRIMARY KEY (`id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `dateymd` (`dateymd`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='进货表';
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('25','13','002','纾雅卫生护垫（纯棉表层）','37','48','0','6.00','2015-03-08','1425807959','0','思埠（麦子）','16','304','2015-03-01','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('26','14','003','纾雅超薄夜用（纯棉表层）','36','48','0','9.00','2015-03-08','1425808093','0','思埠（麦子）','30','462','2015-03-01','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('27','15','004','纾雅超薄日用（纯棉表层）','35','48','0','9.00','2015-03-08','1425808157','0','思埠（麦子）','30','462','2015-03-01','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('28','18','007','黛莱美焕彩水润无瑕BB霜','40','1','0','60.00','2015-03-08','1425825344','0','思埠（麦子）','18','71','2015-02-27','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('29','19','008','黛莱美焕彩净润洁面乳','39','1','0','34.00','2015-03-08','1425825624','0','思埠（麦子）','0','34','2015-02-27','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('30','22','011','天使之魅蓝莓面膜','43','1','0','80.00','2015-03-08','1425826110','0','思埠（麦子）','0','80','2015-02-27','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('31','23','012','天使之魅冰膜','43','1','0','80.00','2015-03-08','1425826254','0','思埠（麦子）','11','91','2015-02-27','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('32','16','005','植美村致美焕颜保湿优惠礼盒','45','2','0','120.00','2015-03-08','1425826504','0','思埠（麦子）','0','240','2015-02-27','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('33','22','011','天使之魅蓝莓面膜','43','4','0','80.00','2015-03-09','1425907107','0','思埠（麦子）','33','353','2015-03-09','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('34','23','012','天使之魅冰膜','43','4','0','80.00','2015-03-09','1425907175','0','思埠（麦子）','0','320','2015-03-09','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('35','19','008','黛莱美焕彩净润洁面乳','39','4','0','34.00','2015-03-09','1425907215','0','思埠（麦子）','0','136','2015-03-09','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('36','20','009','黛莱美多重修护面膜','38','4','0','80.00','2015-03-09','1425907259','0','思埠（麦子）','0','320','2015-03-09','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('37','12','001','素佳纤柔倍润护手霜','34','6','0','12.00','2015-03-09','1425907286','0','思埠（麦子）','0','72','2015-03-09','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('38','16','005','植美村致美焕颜保湿优惠礼盒','45','2','0','120.00','2015-03-09','1425907316','0','思埠（麦子）','0','240','2015-03-09','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('39','16','005','植美村致美焕颜保湿优惠礼盒','45','12','0','120.00','2015-03-09','1425907358','0','思埠（麦子）','58','1498','2015-03-02','1');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('40','12','001','素佳纤柔倍润护手霜','34','5','0','12.00','2015-03-09','1425907938','0','思埠（麦子）','0','60','2015-03-09','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('41','17','006','黛莱美紧致提升眼唇精华液','41','10','0','80.00','2015-03-09','1425907984','0','思埠（麦子）','0','800','2015-03-09','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('42','21','010','天使之魅魅时美颜水','44','7','0','80.00','2015-03-09','1425908013','0','思埠（麦子）','0','560','2015-03-09','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('43','22','011','天使之魅蓝莓面膜','43','12','0','80.00','2015-03-09','1425908045','0','思埠（麦子）','0','960','2015-03-09','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('44','18','007','黛莱美焕彩水润无瑕BB霜','40','15','0','60.00','2015-03-09','1425908074','0','思埠（麦子）','0','900','2015-03-09','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('45','20','009','黛莱美多重修护面膜','38','11','0','80.00','2015-03-09','1425908106','0','思埠（麦子）','0','880','2015-03-09','3');
insert into `t_purchase`(`id`,`goods_id`,`goods_sn`,`goods_name`,`cat_id`,`in_num`,`out_num`,`in_price`,`dateymd`,`dateline`,`isdel`,`supplier`,`express`,`payment`,`purchase`,`order_status`) values('46','19','008','黛莱美焕彩净润洁面乳','39','13','0','34.00','2015-03-09','1425908159','0','思埠（麦子）','0','442','2015-03-09','3');
