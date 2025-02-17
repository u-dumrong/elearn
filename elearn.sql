CREATE DATABASE elearn;

USE elearn;

-- ตารางสำหรับผู้ใช้ทั่วไป:
CREATE TABLE
    users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        profile_picture VARCHAR(255) DEFAULT NULL,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM ('student', 'teacher') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

-- ตารางสำหรับนักศึกษา:
CREATE TABLE
    students (
        user_id INT PRIMARY KEY, -- ใช้เป็น Foreign Key เชื่อมกับ users.id
        pre1 INT DEFAULT 0,
        pos1 INT DEFAULT 0,
        pre2 INT DEFAULT 0,
        pos2 INT DEFAULT 0,
        pre3 INT DEFAULT 0,
        pos3 INT DEFAULT 0,
        pre4 INT DEFAULT 0,
        pos4 INT DEFAULT 0,
        pre5 INT DEFAULT 0,
        pos5 INT DEFAULT 0,
        pre6 INT DEFAULT 0,
        pos6 INT DEFAULT 0,
        pre7 INT DEFAULT 0,
        pos7 INT DEFAULT 0,
        FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
    );

-- ตารางสำหรับครู:
CREATE TABLE
    teachers (
        user_id INT PRIMARY KEY, -- ใช้เป็น Foreign Key เชื่อมกับ users.id
        department VARCHAR(100),
        FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
    );

ALTER TABLE students
ADD COLUMN total_score INT GENERATED ALWAYS AS (
    pre1 + pre2 + pre3 + pre4 + pre5 + pre6 + pre7
) STORED;

ALTER TABLE students
ADD COLUMN total_score2 INT GENERATED ALWAYS AS (
    pos1 + pos2 + pos3 + pos4 + pos5 + pos6 + pos7
) STORED;

ALTER TABLE students
ADD COLUMN student_group INT NOT NULL DEFAULT 1;
