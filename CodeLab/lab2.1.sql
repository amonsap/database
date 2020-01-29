CREATE TABLE Fact(
	FCode CHAR(3),
	FName_Tha VARCHAR2(80),
	FName_Eng VARCHAR2(80),
	CONSTRAINTS fact_pk PRIMARY KEY (FCode)
);

CREATE TABLE Dept(
	FCode	CHAR(3),
	DCode	CHAR(3),
	DName_Tha	VARCHAR2(80),
	DName_Eng	VARCHAR2(80),
	CONSTRAINTS Dept_dk PRIMARY KEY (FCode,DCode),
	CONSTRAINTS Dept_fk_fact FOREIGN KEY (FCode)
		REFERENCES Fact(FCode)
);


CREATE TABLE Student(
	StdID CHAR(11),
	StdFName	VARCHAR2(40),
	StdLname	VARCHAR2(40),
	StdAddress	VARCHAR2(80),
	FCode	CHAR(3),
	DCode	CHAR(3),
	CONSTRAINTS Student_dk PRIMARY KEY (StdID),
	CONSTRAINTS student_fk_fact FOREIGN KEY (FCode)
		REFERENCES Fact(FCode),
	CONSTRAINTS std_fk_dept FOREIGN KEY (FCode,DCode)
		REFERENCES Dept(FCode,DCode)
);

INSERT INTO Fact(FCode,FName_Tha,FName_Eng) VALUES ('F01','คณะวิทยาศาสตร์','Science');
INSERT INTO Fact(FCode,FName_Tha,FName_Eng) VALUES ('F02','คณะวิศวกรรมศาสตร์','Engineer');
INSERT INTO Fact (FCode,FName_Tha,FName_Eng) VALUES ('F03','คณะเทคโนโลยี','Technology');
INSERT INTO Fact (FCode,FName_Tha,FName_Eng) VALUES ('F04','คณะมนุษยศาสตร์และสังคมศาสตร์','Humanities and Social Sciences');
INSERT INTO Fact (FCode,FName_Tha,FName_Eng) VALUES ('F05','คณะศึกษาศาสตร์','Education');



INSERT INTO Dept (FCode,DCode,DName_Tha,DName_Eng) VALUES ('F01','D01','คณิตศาสตร์','Mathematics');
INSERT INTO Dept (FCode,DCode,DName_Tha,DName_Eng) VALUES ('F01','D02','สถิติ','Statistics');
INSERT INTO Dept (FCode,DCode,DName_Tha,DName_Eng) VALUES ('F01','D03','วิทยาการคอมพิวเตอร์','Computer Science');
INSERT INTO Dept (FCode,DCode,DName_Tha,DName_Eng) VALUES ('F02','D01','วิศวกรรมคอมพิวเตอร์','Computer Engineer');
INSERT INTO Dept (FCode,DCode,DName_Tha,DName_Eng) VALUES ('F03','D01','เทคโนโลยีการอาหาร','Food Technology');



INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode) VALUES('603021032-6','นางสาวอมรทรัพย์ ','แสนประสิทธิ์','นครราชสีมา','F01','D03');
INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode)VALUES('603021712-4','นางสาวอรอนงค์ ','ทะวงษ์ศรี','หนองคาย','F01','D03');
INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode)VALUES('603020290-9','นางสาวณิชกานต์,','พลหาญ','ศรีษเกษ','F02','D01');
INSERT INTO Student (StdID,StdFName,StdLname,StdAddress,FCode,DCode)VALUES('603020315-9','นางสาววาสนา ','ถาปราบมาตร์','ขอนแก่น','F03','D01');
