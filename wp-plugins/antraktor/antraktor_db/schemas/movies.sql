CREATE TABLE |DB_PREFIX|movies (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    movie_name varchar(255) NOT NULL,
    movie_genre_id varchar(255) NOT NULL,
    movie_country varchar(255) NOT NULL,
    movie_director varchar(255) NOT NULL,
    movie_first_played datetime DEFAULT CURRENT_TIMESTAMP,
    movie_last_played datetime DEFAULT CURRENT_TIMESTAMP,
    movie_play_count mediumint(9) DEFAULT 0,
    movie_plot text,
    movie_rating float DEFAULT 0,
    PRIMARY KEY  (id)
) |DB_COLLATE|;
