ALTER TABLE dnscrypt_resolvers RENAME TO dnscrypt_resolvers_temp;

CREATE TABLE dnscrypt_resolvers (
    id_dnscrypt_resolvers          INTEGER       PRIMARY KEY ON CONFLICT IGNORE AUTOINCREMENT
                                                 NOT NULL ON CONFLICT ABORT
                                                 UNIQUE ON CONFLICT ABORT,
    name                           VARCHAR (32)  NOT NULL ON CONFLICT ABORT
                                                 UNIQUE ON CONFLICT ABORT,
    full_name                      VARCHAR (64)  NOT NULL ON CONFLICT ABORT
                                                 UNIQUE ON CONFLICT ABORT,
    description                    VARCHAR (128),
    location                       VARCHAR (32),
    coordinates                    VARCHAR (32),
    url                            VARCHAR (128) NOT NULL ON CONFLICT ABORT,
    version                        VARCHAR (2),
    dnssec                         BOOLEAN (1)   NOT NULL ON CONFLICT ABORT
                                                 DEFAULT (0),
    no_logs                        BOOLEAN (1)   NOT NULL ON CONFLICT ABORT
                                                 DEFAULT (0),
    namecoin                       BOOLEAN (1)   NOT NULL ON CONFLICT ABORT
                                                 DEFAULT (0),
    resolver_address               VARCHAR (64)  NOT NULL ON CONFLICT ABORT
                                                 UNIQUE ON CONFLICT ABORT,
    provider_name                  VARCHAR (64),
    provider_public_key            VARCHAR (128),
    provider_public_key_txt_record VARCHAR (64),
    is_activated                   BOOLEAN (1)   DEFAULT (0),
    is_wished                      BOOLEAN (1)   DEFAULT (0),
    forwarder                      VARCHAR (16) 
);

INSERT INTO dnscrypt_resolvers (
                                   id_dnscrypt_resolvers,
                                   name,
                                   full_name,
                                   description,
                                   location,
                                   coordinates,
                                   url,
                                   version,
                                   dnssec,
                                   no_logs,
                                   namecoin,
                                   resolver_address,
                                   provider_name,
                                   provider_public_key,
                                   provider_public_key_txt_record,
                                   is_activated,
                                   is_wished
                               )
                               SELECT id_dnscrypt_resolvers,
                                      name,
                                      full_name,
                                      description,
                                      location,
                                      coordinates,
                                      url,
                                      version,
                                      dnssec,
                                      no_logs,
                                      namecoin,
                                      resolver_address,
                                      provider_name,
                                      provider_public_key,
                                      provider_public_key_txt_record,
                                      is_activated,
                                      is_wished
                                 FROM dnscrypt_resolvers_temp;

DROP TABLE dnscrypt_resolvers_temp;
