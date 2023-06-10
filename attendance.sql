CREATE DATABASE attendance;
USE attendance;

/*Attendance  Table*/
CREATE TABLE attendance_tbl(
	PersonID VARCHAR(50) NOT NULL PRIMARY KEY,
    PersonName VARCHAR(150) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    TicketNo VARCHAR(255) NOT NULL
);
/*Inserting values into the registration table*/
/*INSERT INTO attendance_tbl VALUES('EV-2361752','Brian Brown','bbrown@gmail.com','EV2023681752'),('EV-2361753','Margaret Natalie','magnatalie@gmail.com','EV2023681753');*/

SELECT * FROM attendance_tbl;
/*DROP TABLE attendance_tbl;*/