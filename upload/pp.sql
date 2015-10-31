DROP DATABASE placement_portal;
CREATE DATABASE placement_portal;
USE placement_portal;
 
CREATE TABLE students(
	roll_num INT NOT NULL PRIMARY KEY,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50),
	std_course VARCHAR(50) NOT NULL,
	std_branch VARCHAR(50) NOT NULL,
	std_year INT NOT NULL );
	
	INSERT INTO students VALUES (11012322,'Naveen','Chaudhary','Btech','Mathematics',2015)
	INSERT INTO students VALUES (11012332,'Prashant','Sankhla','Btech','Civil',2015);
	INSERT INTO students VALUES (11012342,'Ravindra','Gahlot','Btech','Biotechnology',2015);
	INSERT INTO students VALUES (11012319,'Lokesh','Meena','Btech','CSE',2015);
	INSERT INTO students VALUES (11012312,'Parik','Gupta','Btech','Design',2015);
	
	CREATE TABLE std_registered (
	roll_num INT NOT NULL PRIMARY KEY ,	
    FOREIGN KEY (roll_num) REFERENCES students(roll_num) ON DELETE CASCADE ON UPDATE CASCADE,
	resume_1 MEDIUMBLOB,
	resume_2 MEDIUMBLOB,
	CPI decimal(3,2) NOT NULL,
	CHECK (CPI >= 5.00));
 
	
CREATE TABLE student_login (
	roll_num INT NOT NULL PRIMARY KEY ,	
    FOREIGN KEY (roll_num) REFERENCES students (roll_num) ON DELETE CASCADE ON UPDATE CASCADE,
	std_username VARCHAR(50) NOT NULL ,
	std_password VARCHAR(50) NOT NULL);
	
CREATE TABLE student_emails (
	roll_num INT NOT NULL ,
	std_email VARCHAR(50) NOT NULL ,
	PRIMARY KEY (std_email),
	FOREIGN KEY (roll_num ) REFERENCES students(roll_num) ON DELETE CASCADE ON UPDATE CASCADE);
	
CREATE TABLE students_phone(
	roll_num INT NOT NULL,
	std_phone INT NOT NULL,
	PRIMARY KEY (std_phone),
	FOREIGN KEY (roll_num ) REFERENCES students(roll_num) ON DELETE CASCADE ON UPDATE CASCADE);
 
 
CREATE TABLE companies (
	company_id VARCHAR(50) NOT NULL PRIMARY KEY,
	company_name VARCHAR(50) NOT NULL,
	job_profile VARCHAR(50) NOT NULL,
	c_password VARCHAR(50) NOT NULL,
	c_email VARCHAR(50) NOT NULL );
 
 

CREATE TABLE std_applied(
	roll_num INT,
	company_id VARCHAR(50),
	placed BIT NOT NULL,
	PRIMARY KEY (company_id,roll_num),
	FOREIGN KEY (company_id ) REFERENCES companies(company_id ) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (roll_num) REFERENCES std_registered(roll_num) ON DELETE CASCADE ON UPDATE CASCADE);
 
CREATE TABLE c_phone(
	company_id VARCHAR(50),
	phone INT NOT NULL,
	PRIMARY KEY (company_id,phone),
	FOREIGN KEY (company_id ) REFERENCES companies(company_id ) ON DELETE CASCADE ON UPDATE CASCADE);
        	
CREATE VIEW students_information AS
SELECT students.roll_num,students.first_name, students.last_name,student_login.std_username,student_login.std_password,students_phone.std_phone, students.std_course,students.std_branch,student_emails.std_email,students.std_year FROM students,student_login,student_emails,students_phone;
 
CREATE VIEW companies_information AS
SELECT companies.company_id,companies.job_profile,companies.company_name, companies.c_password,companies.c_email,c_phone.phone FROM companies, c_phone;
 
DROP USER 'student_manager'@'localhost';
CREATE USER 'student_manager'@'localhost' IDENTIFIED BY 'pass1';
GRANT SELECT, INSERT,DELETE,UPDATE ON placement_portal.students_information TO student_manager@localhost IDENTIFIED  BY 'pass1';
 
DROP USER 'company_manager'@'localhost';
CREATE USER 'company_manager'@'localhost' IDENTIFIED BY 'pass2';
GRANT SELECT, INSERT,DELETE,UPDATE ON placement_portal.companies_information TO company_manager@localhost IDENTIFIED  BY 'pass2';