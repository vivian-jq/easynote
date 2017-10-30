DROP TABLE IF EXISTS `user`;
CREATE TABLE user
(
 id INT(11) PRIMARY KEY NOT NULL,
 username VARCHAR(25) DEFAULT '',
 password TINYTEXT,
 tel INT(11) DEFAULT NULL,
 exp INT(11) NOT NULL,
 introduction TEXT DEFAULT NULL,
 mailbox TINYTEXT DEFAULT NULL
);

INSERT INTO user (id, username, password, tel, exp, introduction, mailbox)
VALUES (1,'test','lalala',15151515151,10,'hello world','1818181881@qq.com');