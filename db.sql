CREATE TABLE
    languages (
        id INT PRIMARY KEY AUTO_INCREMENT,
        lang VARCHAR(64) NOT NULL,
        hello_world TEXT NOT NULL,
        registered_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

-- Data insertion
INSERT INTO
    `languages` (`id`, `lang`, `hello_world`, `registered_at`)
VALUES
    (
        1,
        'Portuguese',
        'OlÃ¡ mundo!',
        '2025-12-01 15:28:36'
    ),
    (
        2,
        'Japanese',
        'ã“ã‚“ã«ã¡ã¯ã€ä¸–ç•Œ',
        '2025-12-01 15:28:46'
    );