set serveroutput on
CREATE OR REPLACE PROCEDURE LAB9_StudentData_Grade
IS
--DECLARE 
	CURSOR stu IS SELECT ID,Name,Work,Mid,Final,FName_Tha
	FROM StudentScore,Fact 
	where StudentScore.FCode = Fact.FCode;
	
	vID	StudentScore.ID%type;
	vName	StudentScore.Name%type;
	vWork	StudentScore.Work%type;
	vMid	StudentScore.Mid%type;
	vFinal	StudentScore.Final%type;
	vTotal NUMBER(3);
	vGrade VARCHAR2(2);
	vFac  Fact.FName_Tha%type; 
BEGIN
	OPEN stu;
	LOOP
		FETCH stu INTO vID,vName,vWork,vMid,vFinal,vFac;
	EXIT WHEN stu%notfound;
	vTotal := vWork+vMid+vFinal;
	DBMS_OUTPUT.PUT_LINE('*************** Row '||stu%rowcount||'****************');
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vID);
	DBMS_OUTPUT.PUT_LINE('Name: '||vName);
	DBMS_OUTPUT.PUT_LINE('Faculty Name : '||vFac);
	LAB9_CALGRADE(vID,vTotal);
	END LOOP;
	CLOSE stu;
END;
/


ALTER TABLE StudentScore
ADD( FCode CHAR(3), 
	CONSTRAINTS StuScor_Fact_FK FOREIGN KEY(FCode)
		REFERENCES Fact(FCode)
);

UPDATE StudentScore SET FCode = 'F01';



CREATE OR REPLACE PROCEDURE LAB9_ExecuteGrade
IS
--DECLARE 
	CURSOR stu IS SELECT ID,Name,Work,Mid,Final
	FROM StudentScore;
	vID	StudentScore.ID%type;
	vName	StudentScore.Name%type;
	vWork	StudentScore.Work%type;
	vMid	StudentScore.Mid%type;
	vFinal	StudentScore.Final%type;
	vTotal NUMBER(3);
	vGrade VARCHAR2(2);
BEGIN
	OPEN stu;
	LOOP
		FETCH stu INTO vID,vName,vWork,vMid,vFinal;
	EXIT WHEN stu%notfound;
	vTotal := vWork+vMid+vFinal;
	DBMS_OUTPUT.PUT_LINE('*************** Row '||stu%rowcount||'****************');
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vID);
	DBMS_OUTPUT.PUT_LINE('Name: '||vName);
	DBMS_OUTPUT.PUT_LINE('Work score : '||vWork);
	DBMS_OUTPUT.PUT_LINE('Midterm score : '||vMid);
	DBMS_OUTPUT.PUT_LINE('Final score : '||vFinal);
	DBMS_OUTPUT.PUT_LINE('Total score : '||vTotal);
	LAB9_CALGRADE(vID,vTotal);
	END LOOP;
	CLOSE stu;
END;
/

CREATE OR REPLACE PROCEDURE LAB9_CALGRADE(StudentID Varchar2,TotalScore NUMBER)
IS
--DECLARE 
	Grade VARCHAR2(2);
BEGIN
	IF TotalScore BETWEEN  80 AND 100 THEN
		Grade := 'A';
	ELSIF TotalScore BETWEEN  75 AND 79 THEN
		Grade := 'B+';
	ELSIF TotalScore BETWEEN  70 AND 74 THEN
		Grade := 'B';
	ELSIF TotalScore BETWEEN  65 AND 69 THEN
		Grade := 'C+';
	ELSIF TotalScore BETWEEN  60 AND 64 THEN
		Grade := 'C';
	ELSIF TotalScore BETWEEN  55 AND 59 THEN
		Grade := 'D+';
	ELSIF TotalScore BETWEEN  50 AND 54 THEN
		Grade := 'D';
	ELSIF TotalScore BETWEEN  0 AND 49 THEN
		Grade := 'F';
	END IF;
	DBMS_OUTPUT.PUT_LINE('Input Student ID  : '||StudentID);
	DBMS_OUTPUT.PUT_LINE('Output grade : '||Grade);
END;
/


CREATE OR REPLACE PROCEDURE LAB9_StudentGrade
IS
--DECLARE 
	CURSOR stu IS SELECT ID,Name,Work,Mid,Final
	FROM StudentScore;
	vID	StudentScore.ID%type;
	vName	StudentScore.Name%type;
	vWork	StudentScore.Work%type;
	vMid	StudentScore.Mid%type;
	vFinal	StudentScore.Final%type;
	vTotal NUMBER(3);
	vGrade VARCHAR2(2);
BEGIN
	OPEN stu;
	LOOP
		FETCH stu INTO vID,vName,vWork,vMid,vFinal;
	EXIT WHEN stu%notfound;
	vTotal := vWork+vMid+vFinal;
	IF vTotal BETWEEN  80 AND 100 THEN
		vGrade := 'A';
	ELSIF vTotal BETWEEN  75 AND 79 THEN
		vGrade := 'B+';
	ELSIF vTotal BETWEEN  70 AND 74 THEN
		vGrade := 'B';
	ELSIF vTotal BETWEEN  65 AND 69 THEN
		vGrade := 'C+';
	ELSIF vTotal BETWEEN  60 AND 64 THEN
		vGrade := 'C';
	ELSIF vTotal BETWEEN  55 AND 59 THEN
		vGrade := 'D+';
	ELSIF vTotal BETWEEN  50 AND 54 THEN
		vGrade := 'D';
	ELSIF vTotal BETWEEN  0 AND 49 THEN
		vGrade := 'F';
	END IF;
	
	DBMS_OUTPUT.PUT_LINE('*************** Row '||stu%rowcount||'****************');
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vID);
	DBMS_OUTPUT.PUT_LINE('Name: '||vName);
	DBMS_OUTPUT.PUT_LINE('Work score : '||vWork);
	DBMS_OUTPUT.PUT_LINE('Midterm score : '||vMid);
	DBMS_OUTPUT.PUT_LINE('Final score : '||vFinal);
	DBMS_OUTPUT.PUT_LINE('Total score : '||vTotal);
	DBMS_OUTPUT.PUT_LINE('Getting grade is '||vGrade);
	
	END LOOP;
	CLOSE stu;
END;
/



