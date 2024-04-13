DROP DATABASE IF EXISTS nable;
CREATE DATABASE nable;

USE nable;

CREATE TABLE institutions (
    inst_id INT AUTO_INCREMENT PRIMARY KEY,
    institution_name VARCHAR(100) NOT NULL
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT,
    gender ENUM('Male', 'Female', 'Other'),
    occupation VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    number VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    inst_id INT,
    FOREIGN KEY (inst_id) REFERENCES institutions(inst_id) ON DELETE SET NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    event_name VARCHAR(255) NOT NULL,
    event_startdate DATE,
    event_enddate DATE,
    event_start_time TIME,
    event_end_time TIME,
    event_description TEXT,
    event_location VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE timetable (
    timetable_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    event_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE
);

CREATE TABLE event_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

CREATE TABLE event_reminders (
    reminder_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    reminder_datetime DATETIME,
    FOREIGN KEY (event_id) REFERENCES timetable(event_id) ON DELETE CASCADE
);

CREATE TABLE recurrence_options (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    option_name VARCHAR(50) NOT NULL
);

CREATE TABLE event_recurrence (
    recurrence_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    recurrence_option_id INT,
    recurrence_interval INT,
    recurrence_end_date DATE,
    FOREIGN KEY (event_id) REFERENCES timetable(event_id) ON DELETE CASCADE,
    FOREIGN KEY (recurrence_option_id) REFERENCES recurrence_options(option_id) ON DELETE CASCADE
);


CREATE TABLE recurrence_days (
    day_id INT AUTO_INCREMENT PRIMARY KEY,
    day_name VARCHAR(20) NOT NULL
);

INSERT INTO recurrence_options (option_name) VALUES
('Doesn''t repeat'),
('Daily'),
('Weekly'),
('Monthly'),
('Annually'),
('Custom');

INSERT INTO recurrence_days (day_name) VALUES
('Sunday'),
('Monday'),
('Tuesday'),
('Wednesday'),
('Thursday'),
('Friday'),
('Saturday');
