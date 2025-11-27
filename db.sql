CREATE TABLE
    languages (
        id int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        lang varchar(64) NOT NULL,
        hello_world text NOT NULL,
        registered_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
    );