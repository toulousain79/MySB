<?php

/*
 * Redirector - Wolf CMS URL redirection plugin
 *
 * Copyright (c) 2010 Design Spike
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://themes.designspike.ca/redirector/help/
 *
 */

/* Prevent direct access. */
if (!defined("FRAMEWORK_STARTING_MICROTIME")) {
    die("All your base are belong to us!");
}
$pdo   = Record::getConnection();
$table = TABLE_PREFIX . "redirector_redirects";

if (preg_match('/^mysql/', DB_DSN)) {
    /* Schema for MySQL */
    echo $pdo->exec("CREATE TABLE $table (
        id          INT(11) NOT NULL AUTO_INCREMENT,
        url     	VARCHAR(255),
    	destination VARCHAR(255),
    	hits        INT(11) DEFAULT 0 NOT NULL,
        created_on  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
        ) DEFAULT CHARSET=utf8");    
} else {
    /* Otherwise assume SQLite */
    echo $pdo->exec("CREATE TABLE $table (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
	    url     	VARCHAR(255),
		destination VARCHAR(255),
    	hits        INT(11) DEFAULT 0 NOT NULL,
        created_on  DATETIME DEFAULT NULL
        )");
}

$pdo   = Record::getConnection();
$table = TABLE_PREFIX . "redirector_404s";

if (preg_match('/^mysql/', DB_DSN)) {
    /* Schema for MySQL */
    echo $pdo->exec("CREATE TABLE $table (
        id          INT(11) NOT NULL AUTO_INCREMENT,
    	url         VARCHAR(255),
        hits        INT(11) DEFAULT 1 NOT NULL,
        created_on  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
        ) DEFAULT CHARSET=utf8");    
} else {
    /* Otherwise assume SQLite */
    echo $pdo->exec("CREATE TABLE $table (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
		url         VARCHAR(255),
	    hits        INT(11) DEFAULT 1 NOT NULL,
        created_on  DATETIME DEFAULT NULL
        )");
}

