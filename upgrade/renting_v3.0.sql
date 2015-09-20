ALTER TABLE renting RENAME TO renting_temp;

CREATE TABLE renting (
    id_renting      INTEGER (1, 1) PRIMARY KEY ON CONFLICT IGNORE
                                   NOT NULL ON CONFLICT ABORT,
    model           VARCHAR (64),
    tva             NUMERIC,
    global_cost     NUMERIC,
    nb_users        NUMERIC (2),
    price_per_users NUMERIC (2),
    method          BOOLEAN (1)    DEFAULT (0) 
);

INSERT INTO renting (
                        id_renting,
                        model,
                        tva,
                        global_cost,
                        nb_users,
                        price_per_users
                    )
                    SELECT id_renting,
                           model,
                           tva,
                           global_cost,
                           nb_users,
                           price_per_users
                      FROM renting_temp;

DROP TABLE renting_temp;
