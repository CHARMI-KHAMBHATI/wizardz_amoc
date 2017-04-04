CREATE TABLE commentsection(
	cid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    oauth_uid VARCHAR(255) NOT NULL,
    cdate datetime NOT NULL,
    message TEXT NOT NULL
);

CREATE TABLE replycomments(
	rid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	uidr VARCHAR(255) NOT NULL,
    rdate datetime NOT NULL,
    rmessage TEXT NOT NULL,
	cid INT(11) NOT NULL,	
	FOREIGN KEY (cid) REFERENCES comments(cid)
);
