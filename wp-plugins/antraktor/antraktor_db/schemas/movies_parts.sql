CREATE TABLE |DB_PREFIX|movies_parts (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    movie_id mediumint(9) NOT NULL,
    title varchar(255),
    part_number mediumint(9),
    release_date date,
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (movie_id) REFERENCES |DB_PREFIX|movies_parts(id)
)   |DB_COLLATE|;
