CREATE DATABASE IF NOT EXISTS DB_F4ALL;

USE DB_F4ALL;

CREATE TABLE USERS (
    US_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    US_NAME VARCHAR(255) NOT NULL UNIQUE,
    US_EMAIL VARCHAR(255) NOT NULL UNIQUE,
    US_PASSW VARCHAR(40) NOT NULL,
    US_LINKEDIN VARCHAR(255),
    US_GITHUB VARCHAR(255),
    US_BIRTH DATE NOT NULL,
    US_DESCRIPTION VARCHAR(10000),
    US_IMAGE VARCHAR(255)
);

CREATE TABLE TOPICS (
    TOP_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TOP_SUBJECT VARCHAR(100) NOT NULL,
    TOP_TITLE VARCHAR(100) NOT NULL,
    TOP_DATE DATETIME NOT NULL,
    TOP_US_ID INT NOT NULL,
    CONSTRAINT FK_TOP_US_ID FOREIGN KEY (TOP_US_ID) REFERENCES USERS (US_ID)
);

CREATE TABLE COMMENTS (
    COM_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    COM_CONTENT VARCHAR(10000) NOT NULL,
    COM_DATE DATETIME NOT NULL,    
    COM_IMAGE VARCHAR(255),
    COM_US_ID INT NOT NULL,
    COM_TOP_ID INT NOT NULL,
    CONSTRAINT FK_COM_US_ID FOREIGN KEY (COM_US_ID) REFERENCES USERS (US_ID),
    CONSTRAINT FK_COM_TOP_ID FOREIGN KEY (COM_TOP_ID) REFERENCES TOPICS (TOP_ID)
);

CREATE TABLE VOTE (
    VOTE_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    VOTE_VALUE BOOLEAN,
    VOTE_US_ID INT NOT NULL,
    VOTE_TOP_ID INT,
    VOTE_COM_ID INT,
    CONSTRAINT FK_VOTE_US_ID FOREIGN KEY (VOTE_US_ID) REFERENCES USERS (US_ID),
    CONSTRAINT FK_VOTE_TOP_ID FOREIGN KEY (VOTE_TOP_ID) REFERENCES TOPICS (TOP_ID),
    CONSTRAINT FK_VOTE_COM_ID FOREIGN KEY (VOTE_COM_ID) REFERENCES COMMENTS (COM_ID)
);
