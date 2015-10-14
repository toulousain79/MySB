ALTER TABLE users RENAME TO users_temp;

CREATE TABLE users (
    id_users         INTEGER       PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                   NOT NULL ON CONFLICT ABORT
                                   UNIQUE ON CONFLICT ABORT,
    users_ident      VARCHAR (32)  NOT NULL ON CONFLICT ABORT
                                   UNIQUE ON CONFLICT IGNORE,
    users_email      VARCHAR (260) NOT NULL ON CONFLICT ABORT,
    users_passwd     VARCHAR (32),
    rpc              VARCHAR (64),
    sftp             BOOLEAN (1)   DEFAULT (1),
    sudo             BOOLEAN (1)   DEFAULT (0),
    admin            BOOLEAN (1)   DEFAULT (0),
    scgi_port        INTEGER (5),
    rtorrent_port    INTEGER (5),
    home_dir         VARCHAR (128),
    is_active        BOOLEAN (1)   DEFAULT (1),
    rtorrent_version VARCHAR (10)  DEFAULT ('v0.9.2'),
    rtorrent_restart BOOLEAN (1)   DEFAULT ('0'),
    language         VARCHAR (2)   DEFAULT ('en'),
	init_password	 BOOLEAN (1)   DEFAULT ('0')
);

INSERT INTO users (
                      id_users,
                      users_ident,
                      users_email,
                      users_passwd,
                      rpc,
                      sftp,
                      sudo,
                      admin,
                      scgi_port,
                      rtorrent_port,
                      home_dir,
                      is_active,
                      rtorrent_version,
                      rtorrent_restart
                  )
                  SELECT id_users,
                         users_ident,
                         users_email,
                         users_passwd,
                         rpc,
                         sftp,
                         sudo,
                         admin,
                         scgi_port,
                         rtorrent_port,
                         home_dir,
                         is_active,
                         rtorrent_version,
                         rtorrent_restart
                    FROM users_temp;

DROP TABLE users_temp;