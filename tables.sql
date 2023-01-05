CREATE TABLE department (
    XML_ID VARCHAR(5) PRIMARY KEY,
    PARENT_XML_ID VARCHAR(5),
    NAME_DEPARTMENT VARCHAR(100) NOT NULL,
    UNIQUE (NAME_DEPARTMENT)
);

CREATE TABLE employee (
    XML_ID VARCHAR(5) PRIMARY KEY,
    LAST_NAME VARCHAR(30) NOT NULL,
    NAME VARCHAR(30) NOT NULL,
    SECOND_NAME VARCHAR(30) NOT NULL,
    DEPARTMENT VARCHAR(5) NOT NULL,
    WORK_POSITION VARCHAR(100) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL,
    MOBILE_PHONE VARCHAR(20),
    PHONE VARCHAR(20),
    LOGIN VARCHAR(30) NOT NULL,
    PASSWORD VARCHAR(30) NOT NULL,
    UNIQUE(EMAIL, LOGIN),
    FOREIGN KEY (DEPARTMENT) REFERENCES department (XML_ID)
);

CREATE TABLE files (
    NAME VARCHAR(50),
    DATE DATETIME DEFAULT CURRENT_TIMESTAMP,
);


INSERT INTO department (XML_ID, PARENT_XML_ID, NAME_DEPARTMENT) VALUES
 ('OU002', '', 'Коммерческий '),
 ('OU003', 'OU003', 'департамент')
 ;

INSERT INTO department VALUES (XML_ID = 'OU001', PARENT_XML_ID = '', NAME_DEPARTMENT = 'Коммерческий департамент')

CREATE DATABASE dev
      CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;