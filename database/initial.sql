CREATE DATABASE IF NOT EXISTS desafio_revvo;
USE desafio_revvo;

CREATE TABLE IF NOT EXISTS `courses` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,  
    `name` VARCHAR(255) NOT NULL,         
    `description` TEXT NOT NULL,          
    `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'active',  
    `image` LONGTEXT,                         
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE INDEX idx_courses_name ON `courses`(`name`);

INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
INSERT INTO `courses` (`name`, `description`, `status`, `image`) VALUES
('Curso de PHP', 'Curso completo de PHP, com todos os tópicos importantes.', 'active', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII');
