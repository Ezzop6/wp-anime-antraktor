CREATE TABLE |DB_PREFIX|kodi_watched (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    record_key varchar(255) NOT NULL,
    record_hash varchar(255) NOT NULL,
    record_length int(11) NOT NULL,
    record_data TEXT NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id)
)   |DB_COLLATE|
