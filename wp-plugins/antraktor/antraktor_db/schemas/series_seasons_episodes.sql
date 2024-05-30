CREATE TABLE |DB_PREFIX|series_seasons_episodes (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    series_id mediumint(9) NOT NULL,
    season_id mediumint(9) NOT NULL,
    episode_number mediumint(9),
    release_date date,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (series_id) REFERENCES |DB_PREFIX|series(id),
    FOREIGN KEY (season_id) REFERENCES |DB_PREFIX|series_seasons(id)
)   |DB_COLLATE|;
