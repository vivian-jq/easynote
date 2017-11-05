DROP TABLE IF EXISTS `user`;
CREATE TABLE user
(
 id INT(11) PRIMARY KEY AUTOINCREMENT NOT NULL,
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