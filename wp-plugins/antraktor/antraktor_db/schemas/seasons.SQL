
CREATE TABLE |DB_PREFIX|seasons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tmdb_season_id INT NOT NULL,
    tmdb_series_id VARCHAR(20) NOT NULL,
    tmdb_data TEXT NOT NULL,
    watch_status VARCHAR(50) NOT NULL DEFAULT 'not_started',
    watch_progress TINYINT(2) NOT NULL DEFAULT 0,
    watch_count INT NOT NULL DEFAULT 0,
    watch_first_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    watch_last_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    completed BOOLEAN NOT NULL DEFAULT FALSE,
    name VARCHAR(255) NULL,
    air_date DATE NULL,
    episode_count INT NULL,
    season_number INT NULL,
    UNIQUE (tmdb_season_id, tmdb_series_id),
    INDEX (tmdb_series_id),
    FOREIGN KEY (tmdb_series_id) REFERENCES |DB_PREFIX|series(tmdb_series_id)
)   |DB_COLLATE|;
