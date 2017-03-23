CREATE TABLE comments(
	cid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(128) NOT NULL,
    date datetime NOT NULL,
    message TEXT NOT NULL
);