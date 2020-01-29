CREATE VIEW LAB5_Credit AS
SELECT Student.StdID,StdFName,StdLName,SUM(Credit) TotalCredit
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdId
GROUP BY Student.StdID,StdFName,StdLName
ORDER BY StdID;

CREATE VIEW LAB5_RegFee AS
SELECT Student.StdID,StdFName,StdLName,Year,Semester,SUM(Credit) TotalCredit,SUM(Credit)*1000 RegFee
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdId
GROUP BY Student.StdID,StdFName,StdLName,Year,Semester
ORDER BY StdID;

CREATE VIEW LAB5_GPA AS
SELECT Student.StdID,StdFName,StdLName,AVG(Grade) GPA
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdId
GROUP BY Student.StdID,StdFName,StdLName
ORDER BY GPA;

INSERT INTO Student(StdID,StdFName,StdLName,StdAddress,FCode,Dcode,TCode) VALUES('563020197-5','กฤษดา ','โสมายัง','123 จ.ขอนแก่น','F01','D03','T01');
INSERT INTO Student(StdID,StdFName,StdLName,StdAddress,FCode,Dcode,TCode) VALUES('563020200-2','ขวัญข้าว  ','เสียงเลิศ','11 จ.ขอนแก่น','F01','D03',NULL);
INSERT INTO Student(StdID,StdFName,StdLName,StdAddress,FCode,Dcode,TCode) VALUES('563020205-2','ชนนิกา  ','ปัญจันทร์สิงห์','15 จ.ขอนแก่น','F01','D03',NULL);
INSERT INTO Student(StdID,StdFName,StdLName,StdAddress,FCode,Dcode,TCode) VALUES('563020206-0','ชนัญชิดา  ','อินทะสร้อย','16 จ.ขอนแก่น','F01','D03',NULL);

CREATE VIEW LAB5_GPA_Outer AS
SELECT Student.StdID,StdFName,StdLName,AVG(Grade) GPA
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdId(+)
GROUP BY Student.StdID,StdFName,StdLName
ORDER BY GPA;

CREATE VIEW LAB5_Teacher_Outer AS
SELECT Student.StdID,StdFName,StdLName,Teacher.TCode,TFName,TLName
FROM Student,Teacher
WHERE Student.TCode = Teacher.TCode(+)
ORDER BY Teacher.TCode;