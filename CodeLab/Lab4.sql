CREATE VIEW LAB4_Student AS
SELECT StdID,StdFName,StdLName,StdAddress
FROM Student
ORDER BY StdID DESC;

CREATE VIEW LAB4_Subject AS
SELECT SubjCode,Name_Tha,Credit
FROM Subject
ORDER BY Name_Tha DESC;

CREATE VIEW LAB4_Fact AS
SELECT StdID,StdFName,StdLName,FName_Tha,FName_Eng
FROM Student,Fact
WHERE Student.Fcode = Fact.Fcode
ORDER BY Fact.Fcode;

CREATE VIEW LAB4_Adviser AS
SELECT StdID,StdFName,StdLName,TFName,TLName
FROM Student,Teacher
WHERE Student.Tcode = Teacher.Tcode
ORDER BY TFName;

CREATE VIEW LAB4_REG_322212 AS
SELECT Subject.SubjCode,Name_Tha,Student.StdID,StdFName,StdLName,Grade
FROM Student,Subject,Register
WHERE Student.StdID = Register.StdID
AND Subject.SubjCode = Register.SubjCode
AND Subject.SubjCode = '322212'
ORDER BY StdFName;

