CREATE DATABASE DB_F4ALL;

CREATE TABLE USERS (
US_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
US_NAME VARCHAR(255) NOT NULL,
US_EMAIL VARCHAR(255) NOT NULL UNIQUE,
US_PASSW VARCHAR(16) NOT NULL,
US_LINKEDIN VARCHAR(255),
US_GITHUB VARCHAR(255),
US_BIRTH DATE,
US_DESCRIPTION VARCHAR(10000)
);

CREATE TABLE PUBLICATIONS (
PUB_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
PUB_SUBJECT VARCHAR(100) NOT NULL,
PUB_TITLE VARCHAR(100) NOT NULL,
PUB_CONTENT VARCHAR(10000) NOT NULL,
PUB_DATE DATETIME NOT NULL,
PUB_US_ID INT NOT NULL,
CONSTRAINT FK_PUB FOREIGN KEY (PUB_US_ID) REFERENCES USERS (US_ID)
);

CREATE TABLE COMMENTS (
COM_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
COM_CONTENT VARCHAR(10000) NOT NULL,
COM_DATE DATETIME NOT NULL,
COM_PUB_ID INT NOT NULL,
CONSTRAINT FK_COM FOREIGN KEY (COM_PUB_ID) REFERENCES PUBLICATIONS (PUB_ID)
);
