CREATE TABLE |DB_PREFIX|series_seasons (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    series_id mediumint(9) NOT NULL,
    season_number mediumint(9),
    release_date date,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (series_id) REFERENCES |DB_PREFIX|series(id)
)   |DB_COLLATE|;
