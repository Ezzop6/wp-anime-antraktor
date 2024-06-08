CREATE TABLE |DB_PREFIX|series (
    tmdb_series_id VARCHAR(20) NOT NULL PRIMARY KEY,
    tmdb_data TEXT NOT NULL,
    watch_status VARCHAR(50) NOT NULL DEFAULT 'not_started',
    watch_progress TINYINT(2) NOT NULL DEFAULT 0,
    watch_count INT DEFAULT 0,
    watch_first_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    watch_last_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    completed BOOLEAN NOT NULL DEFAULT FALSE,
    name VARCHAR(255) NULL
)   |DB_COLLATE|;
