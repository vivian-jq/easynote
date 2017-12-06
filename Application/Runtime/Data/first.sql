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
INSERT INTO user ( username, password, tel, exp, introduction, mailbox)
VALUES ('share','098f6bcd4621d373cade4e832627b4f6',15151515151,10,'hello world','18232381881@qq.com');

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
 tags VARCHAR(255) NOT NULL DEFAULT '',
 content TEXT,
 create_time datetime NOT NULL,
 modify_time datetime NOT NULL,
 note_stat tinyint(1) NOT NULL DEFAULT '0',
 votes INTEGER NOT NULL DEFAULT '0'
);
-- 有两种状态，public 1,private 0;笔记本默认为1号，默认笔记本
INSERT INTO note (uid, title,tags, content, create_time,modify_time, note_stat)
VALUES (1,'今天天气好','程序猿；代码；女装','<p>欢迎使用 <b>easynote</b>，赶紧开始吧~ </p>',datetime('now'),datetime('now'),'1');


-- ****************************************************************************************************
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share`
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 uid_from INTEGER NOT NULL,
 uid_to INTEGER NOT NULL,
 nid INTEGER NOT NULL,
 reason VARCHAR(25) NOT NULL DEFAULT '快来看看吧',
 share_time datetime NOT NULL,
 share_stat tinyint(1) NOT NULL DEFAULT '0'
);
-- 有四种状态，share_edit 4, share_read 3, edit_only 2, read_only 1
INSERT INTO share (uid_from, uid_to, nid,reason,share_time, share_stat) VALUES
 (1,4,3,'快来看看吧',datetime('now'),4);
INSERT INTO share (uid_from, uid_to, nid,reason,share_time, share_stat) VALUES
 (1,4,2,'快来看看吧',datetime('now'),3);

-- ****************************************************************************************************
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote`
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 uid INTEGER NOT NULL,
 nid INTEGER NOT NULL,
 vote_time datetime NOT NULL
);

INSERT INTO vote (uid, nid, vote_time) VALUES
 (4,5,datetime('now'));
INSERT INTO vote (uid, nid, vote_time) VALUES
 (4,2,datetime('now'));

-- ****************************************************************************************************
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 uid INTEGER NOT NULL,
 nid INTEGER NOT NULL,
 content VARCHAR(255) NOT NULL,
 cmt_time datetime NOT NULL
);

INSERT INTO comment (uname, nid, content,cmt_time) VALUES
 ('share',1,'好久没见过这么无聊的笔记了',datetime('now'));
INSERT INTO comment (uname, nid, content,cmt_time) VALUES
 ('share',1,'哎呀呀呀',datetime('now'));

-- ****************************************************************************************************
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow`
(
 id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
 uid_from INTEGER NOT NULL,
 uid_to INTEGER NOT NULL,
 follow_time datetime NOT NULL
);

INSERT INTO follow (uid_from, uid_to, follow_time) VALUES
 (1,2,datetime('now'));
INSERT INTO follow (uid_from, uid_to, follow_time) VALUES
 (1,4,datetime('now'));
INSERT INTO follow (uid_from, uid_to, follow_time) VALUES
 (4,2,datetime('now'));
INSERT INTO follow (uid_from, uid_to, follow_time) VALUES
 (4,1,datetime('now'));


