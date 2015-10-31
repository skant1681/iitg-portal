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
 
INSERT INTO students VALUES (11012322,'Naveen','Chaudhary','B.Tech','Mathematics',2015);
INSERT INTO students VALUES (11012327,'Prashant','Sankhla','B.Tech','Civil',2015);
INSERT INTO students VALUES (11012342,'Ravindra','Gahlot','B.Tech','Biotechnology',2015);
INSERT INTO students VALUES (11012319,'Lokesh','Meena','B.Tech','C.S.E',2015);
INSERT INTO students VALUES (11012312,'Parik','Gupta','B.Tech','Design',2015);
INSERT INTO students VALUES (11010146,'Naveen','Sahu','B.Tech','C.S.E',2015);
INSERT INTO students VALUES (11010163,'Shashi','Kant','B.Tech','C.S.E',2015);
INSERT INTO students VALUES (11010639,'Tishya','Pandey','B.Tech','Design',2015);
INSERT INTO students VALUES (11010630,'Priyanka','Tata','B.Tech','Design',2015);
INSERT INTO students VALUES (11010723,'Khushi','Kant','B.Tech','Chemical',2015);

 
CREATE TABLE std_registered (
            roll_num INT NOT NULL PRIMARY KEY ,    
            FOREIGN KEY (roll_num) REFERENCES students(roll_num) ON DELETE CASCADE ON UPDATE CASCADE,
            resume_1 MEDIUMBLOB,
            resume_2 MEDIUMBLOB,
            CPI decimal(3,2) NOT NULL,
            CHECK (CPI >= 5.00));
 
INSERT INTO std_registered(roll_num,CPI) VALUES (11012322,6.52);
INSERT INTO std_registered(roll_num,CPI) VALUES (11012327,9.72);
INSERT INTO std_registered(roll_num,CPI) VALUES (11012319,5.99);
INSERT INTO std_registered(roll_num,CPI) VALUES (11012312,8.26);
INSERT INTO std_registered(roll_num,CPI) VALUES (11010146,8.5);
INSERT INTO std_registered(roll_num,CPI) VALUES (11010163,6.9);
INSERT INTO std_registered(roll_num,CPI) VALUES (11010639,6.3);
INSERT INTO std_registered(roll_num,CPI) VALUES (11010723,7.5);
INSERT INTO std_registered(roll_num,CPI) VALUES (11010630,7.9);
    
CREATE TABLE student_login (
            roll_num INT NOT NULL PRIMARY KEY ,    
            FOREIGN KEY (roll_num) REFERENCES students (roll_num) ON DELETE CASCADE ON UPDATE CASCADE,
            std_username VARCHAR(50) NOT NULL ,
            std_password VARCHAR(50) NOT NULL);
 
INSERT INTO student_login VALUES (11012322,'n.chaudhary','123');
INSERT INTO student_login VALUES (11012327,'p.sankhla','123');
INSERT INTO student_login VALUES (11012342,'r.gahlot','123');
INSERT INTO student_login VALUES (11012319,'l.meena','123');
INSERT INTO student_login VALUES (11012312,'g.parik','123');
INSERT INTO student_login VALUES (11010146,'n.sahu','123');
INSERT INTO student_login VALUES (11010163,'s.kant','123');
INSERT INTO student_login VALUES (11010639,'t.pandey','123');
INSERT INTO student_login VALUES (11010723,'k.kant','123');
INSERT INTO student_login VALUES (11010630,'p.tata','123');
    
CREATE TABLE student_emails (
            roll_num INT NOT NULL ,
            std_email VARCHAR(50) NOT NULL ,
            PRIMARY KEY (std_email),
            FOREIGN KEY (roll_num ) REFERENCES students(roll_num) ON DELETE CASCADE ON UPDATE CASCADE);
 
INSERT INTO student_emails VALUES (11012322,'n.chaudhary@iitg.ernet.in');
INSERT INTO student_emails VALUES (11012327,'p.sankhla@iitg.ernet.in');
INSERT INTO student_emails VALUES (11012342,'r.gahlot@iitg.ernet.in');
INSERT INTO student_emails VALUES (11012319,'l.meena@iitg.ernet.in ' );
INSERT INTO student_emails VALUES (11012312,'g.parik@iitg.ernet.in');
INSERT INTO student_emails VALUES (11010146,'n.sahu@iitg.ernet.in');
INSERT INTO student_emails VALUES (11010163,'s.kant@iitg.ernet.in');
INSERT INTO student_emails VALUES (11010639,'t.pandey@iitg.ernet.in');
INSERT INTO student_emails VALUES (11010723,'k.kant@iitg.ernet.in');
INSERT INTO student_emails VALUES (11010630,'p.tata@iitg.ernet.in');
    
CREATE TABLE students_phone(
            roll_num INT NOT NULL,
            std_phone  BIGINT NOT NULL,
            PRIMARY KEY (std_phone),
            FOREIGN KEY (roll_num ) REFERENCES students(roll_num) ON DELETE CASCADE ON UPDATE CASCADE);
 
INSERT INTO students_phone VALUES (11012322,9706722725);
INSERT INTO students_phone VALUES (11012322,9706736436);
INSERT INTO students_phone VALUES (11012327,9801456214);
INSERT INTO students_phone VALUES (11012342,9706452196);
INSERT INTO students_phone VALUES (11012319,8011496174);
INSERT INTO students_phone VALUES (11012312,8011698225);
INSERT INTO students_phone VALUES (11010146,9957616829);
INSERT INTO students_phone VALUES (11010163,9957616845);
INSERT INTO students_phone VALUES (11010639,9957616365);
INSERT INTO students_phone VALUES (11010723,9957616785);
INSERT INTO students_phone VALUES (11010630,9957616963);
 
CREATE TABLE companies (
            company_id VARCHAR(50) NOT NULL PRIMARY KEY,
            company_name VARCHAR(50) NOT NULL,
            job_profile VARCHAR(50) NOT NULL,
            c_password VARCHAR(50) NOT NULL,
            c_email VARCHAR(50) NOT NULL );
 
 INSERT INTO companies VALUES ('goo_dev','Google','Developer','234','goo@hotmail.com');
 INSERT INTO companies VALUES ('goo_mar','Google','Marketing','234','goo@hotmail.com');
 INSERT INTO companies VALUES ('netapp','NetApp','Developer','234','netapp@hotmail.com');
 INSERT INTO companies VALUES ('amaz_des','Amazon','Design','234','amaz@hotmail.com');
 INSERT INTO companies VALUES ('capiq','Capital IQ','Developer','234','cpiq@hotmail.com');
 INSERT INTO companies VALUES ('samsu','Samsung','Developer','234','sam@hotmail.com');
 INSERT INTO companies VALUES ('fb_dev','Facebook','Developer','234','fb@hotmail.com');
 INSERT INTO companies VALUES ('ms_dev','Microsoft','Developer','234','ms@hotmail.com');
 
 
CREATE TABLE std_applied(
            roll_num INT,
            company_id VARCHAR(50),
            placed BIT NOT NULL,
            PRIMARY KEY (company_id,roll_num),
            FOREIGN KEY (company_id ) REFERENCES companies(company_id ) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (roll_num) REFERENCES std_registered(roll_num) ON DELETE CASCADE ON UPDATE CASCADE);
 



INSERT INTO std_applied VALUES (11012312,'goo_dev',0);
INSERT INTO std_applied VALUES (11010630,'goo_mar',1);
INSERT INTO std_applied VALUES (11012319,'goo_mar',0);
INSERT INTO std_applied VALUES (11010146,'ms_dev',0);
INSERT INTO std_applied VALUES (11012322,'capiq',0);
INSERT INTO std_applied VALUES (11012327,'netapp',1);
INSERT INTO std_applied VALUES (11010639,'ms_dev',0);
INSERT INTO std_applied VALUES (11010146,'capiq',1);
INSERT INTO std_applied VALUES (11010639,'netapp',0);
INSERT INTO std_applied VALUES (11012327,'goo_dev',0);
INSERT INTO std_applied VALUES (11012319,'ms_dev',0);
INSERT INTO std_applied VALUES (11010146,'goo_dev',0);
INSERT INTO std_applied VALUES (11010146,'netapp',0);
INSERT INTO std_applied VALUES (11010163,'amaz_des',0);
INSERT INTO std_applied VALUES (11010639,'goo_dev',0);
INSERT INTO std_applied VALUES (11010723,'capiq',0);
INSERT INTO std_applied VALUES (11010630,'samsu',0);

 
CREATE TABLE c_phone(
            company_id VARCHAR(50),
            phone BIGINT NOT NULL,
            PRIMARY KEY (company_id,phone),
            FOREIGN KEY (company_id ) REFERENCES companies(company_id ) ON DELETE CASCADE ON UPDATE CASCADE);
 
INSERT INTO c_phone VALUES ('goo_dev',9957686925);
INSERT INTO c_phone VALUES ('goo_mar',9957686925);
INSERT INTO c_phone VALUES ('goo_mar',9957453674);
INSERT INTO c_phone VALUES ('fb_dev',9085686978);
INSERT INTO c_phone VALUES ('ms_dev',9654943636);
INSERT INTO c_phone VALUES ('samsu',9865326574);
INSERT INTO c_phone VALUES ('netapp',9085686978);
INSERT INTO c_phone VALUES ('capiq',9654943636);
INSERT INTO c_phone VALUES ('amaz_des',9865326574);
 
 
 
CREATE VIEW stud_info AS SELECT students.roll_num, students.first_name, students.last_name, students.std_course, students.std_branch, students.std_year, student_login.std_username, student_login.std_password,std_registered.resume_1,std_registered.resume_2
FROM students INNER JOIN   student_login ON students.roll_num=student_login.roll_num INNER JOIN   std_registered ON students.roll_num=std_registered.roll_num;
 
 
CREATE VIEW company_info AS SELECT companies.company_id, companies.company_name, companies.job_profile, companies.c_password, companies.c_email
FROM companies ;
 
CREATE VIEW stud_basic_info AS SELECT std_registered.roll_num, students.first_name, students.last_name ,student_login.std_username
FROM std_registered INNER JOIN  students ON std_registered.roll_num=students.roll_num INNER JOIN  student_login ON std_registered.roll_num=student_login.roll_num;
 
DROP USER 'student_manager'@'localhost';
CREATE USER 'student_manager'@'localhost' IDENTIFIED BY 'pass1';
GRANT SELECT, INSERT,DELETE,UPDATE ON placement_portal.stud_info TO student_manager@localhost IDENTIFIED  BY 'pass1';
 
 
DROP USER 'company_manager'@'localhost';
CREATE USER 'company_manager'@'localhost' IDENTIFIED BY 'pass2';
GRANT SELECT, INSERT,DELETE,UPDATE ON placement_portal.company_info TO company_manager@localhost IDENTIFIED  BY 'pass2'; 