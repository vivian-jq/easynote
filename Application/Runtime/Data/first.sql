DROP TABLE IF EXISTS `user`;
CREATE TABLE user
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 username VARCHAR(25) DEFAULT '',
 password TINYTEXT,
 tel INT(11) DEFAULT NULL,
 exp INT(11) NOT NULL,
 introduction TEXT DEFAULT NULL,
 mailbox TINYTEXT DEFAULT NULL
);

INSERT INTO user ( username, password, tel, exp, introduction, mailbox)
VALUES ('test','098f6bcd4621d373cade4e832627b4f6',15151515151,10,'hello world','1818181881@qq.com');
INSERT INTO user ( username, password, tel, exp, introduction, mailbox)
VALUES ('admin','21232f297a57a5a743894a0e4a801fc3',15151515151,10,'hello admin','admin81881@qq.com');


-- ****************************************************************************************************
DROP TABLE IF EXISTS `notebook`;
CREATE TABLE notebook
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 uid INTEGER NOT NULL,
 title VARCHAR(25) NOT NULL DEFAULT '默认笔记本',
 create_time datetime NOT NULL,
 modify_time datetime NOT NULL
);
INSERT INTO notebook (uid, create_time, modify_time)
VALUES (1,datetime('now'),datetime('now'));
-- ****************************************************************************************************
DROP TABLE IF EXISTS `note`;
CREATE TABLE note
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 uid INTEGER NOT NULL,
 bid INTEGER NOT NULL DEFAULT '1',
 title VARCHAR(25) NOT NULL,
 content TEXT,
 create_time datetime NOT NULL,
 modify_time datetime NOT NULL,
 note_stat tinyint(2) NOT NULL DEFAULT '0'
);
-- 有两种状态，public 1,private 0;笔记本默认为1号，默认笔记本
INSERT INTO note (uid, title, content, create_time,modify_time, note_stat)
VALUES (1,'今天天气好','<p>欢迎使用 <b>easynote</b>，赶紧开始吧~ </p>',datetime('now'),datetime('now'),'1');