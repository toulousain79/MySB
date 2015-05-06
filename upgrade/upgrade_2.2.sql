
-- Table: upgrade
CREATE TABLE upgrade ( 
    id_upgrade      INTEGER       PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                  NOT NULL ON CONFLICT ABORT
                                  UNIQUE ON CONFLICT ABORT,
    current_version VARCHAR( 5 )  NOT NULL ON CONFLICT ABORT,
    new_version     VARCHAR( 5 )  NOT NULL ON CONFLICT ABORT,
    git_version     VARCHAR( 5 )  NOT NULL ON CONFLICT ABORT,
    comments        VARCHAR 
);

