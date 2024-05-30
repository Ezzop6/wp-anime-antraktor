CREATE TABLE |DB_PREFIX|series (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    release_date date,
    genre varchar(255),
    created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY  (id)
)   |DB_COLLATE|;
