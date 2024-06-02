CREATE TABLE |DB_PREFIX|tmdb_episode (
    episode_id mediumint(9) NOT NULL AUTO_INCREMENT,
    record_key varchar(255) NOT NULL UNIQUE,
    record_hash varchar(255) NOT NULL,
    record_length int(11) NOT NULL,
    record_data TEXT NOT NULL,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (episode_id),
    FOREIGN KEY (record_key) REFERENCES |DB_PREFIX|kodi_watched(record_key) ON DELETE CASCADE
) ENGINE=InnoDB |DB_COLLATE|;
