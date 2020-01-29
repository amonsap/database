CREATE VIEW LAB5_Credit AS
SELECT Student.StdID,Student.StdFName,Student.StdLName,SUM(credit)totalcredit
FROM  Student,Subject,Register
WHERE Student.StdID = Register.StdID
	AND Subject.Subjcode = Register.Subjcode
GROUP BY Student.StdID,Student.StdFName,Student.StdLName
ORDER BY Student.StdID;

CREATE VIEW LAB5_RegFee AS
SELECT Student.StdID,Student.StdFName,Student.StdLName,Register.year,Register.semester,SUM(credit)totalcredit,SUM(credit*1000)regfee
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdID
	AND Subject.Subjcode = Register.Subjcode
GROUP BY Student.StdID,Student.StdFName,Student.StdLName,Register.year,Register.semester
ORDER BY Student.StdID;

CREATE VIEW LAB5_GPA AS
SELECT Student.StdID,Student.StdFName,Student.StdLName,SUM(grade*credit)/SUM(credit)gpa
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdID
	AND Subject.Subjcode = Register.Subjcode
GROUP BY Student.StdID,Student.StdFName,Student.StdLName
ORDER BY Student.StdID;

CREATE VIEW LAB5_GPA_Outer AS
SELECT Student.StdID,Student.StdFName,Student.StdLName,SUM(grade*credit)/SUM(credit)gpa
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdID(+)
	AND Subject.Subjcode = Register.Subjcode(+)
GROUP BY Student.StdID,Student.StdFName,Student.StdLName
ORDER BY Student.StdID;

CREATE VIEW LAB5_Teacher_Outer AS
SELECT Student.StdID,Student.StdFName,Student.StdLName,Teacher.TCode,Teacher.TFName,Teacher.TLName
FROM Student,Teacher
WHERE Student.TCode = Teacher.TCode(+)
ORDER BY Teacher.TCode;





INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode,TCode) VALUES('563020197-5','กฤษดา','โสมายัง','123 จ.ขอนแก่น','F01','D03','T01');
INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode,TCode) VALUES('563020200-2','ขวัญข้าว ','เสียงเลิศ','11 จ.ขอนแก่น','F01','D03',NULL);
INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode,TCode) VALUES('563020205-2','ชนนิกา ','ปัญจันทร์สิงห์	','15 จ.ขอนแก่น','F01','D03',NULL);
INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode,TCode) VALUES('563020206-0','ชนัญชิดา ','อินทะสร้อย','16 จ.ขอนแก่น','F01','D03',NULL);




set linesize 200;
desc product;