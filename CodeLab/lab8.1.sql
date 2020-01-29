CREATE TABLE StudentScore(
		ID	Char(11),
		Name	Varchar2(80),
		Mid		Number(2),
		Final	Number(2),
		Work	Number(2),
		CONSTRAINTS stu_score PRIMARY KEY (ID)
);

INSERT INTO StudentScore(ID,Name,Mid,Final,Work)
VALUES ('553020621-7','สิทธิชัย สมทรัพย์',29,38,28);
INSERT INTO StudentScore(ID,Name,Mid,Final,Work)
VALUES ('555020270-4','พงษ์ศธร จันทร์ยอย',15,20,10);
INSERT INTO StudentScore(ID,Name,Mid,Final,Work)
VALUES ('603021032-6','อมรทรัพย์ แสนประสิทธิ์',30,40,20);

CREATE OR REPLACE PROCEDURE LAB8_DBGrade
IS
--DECLARE
	vID	StudentScore.ID%type;
	vName	StudentScore.Name%type;
	vWork	StudentScore.Work%type;
	vMid	StudentScore.Mid%type;
	vFinal	StudentScore.Final%type;
	vTotal	NUMBER(3);
BEGIN
	SELECT ID,Name,Work,Mid,Final,sum(Work+Mid+Final)
	INTO vID,vName,vWork,vMid,vFinal,vTotal
	FROM StudentScore
	WHERE ID = '603021032-6'
	GROUP BY ID,Name,Work,Mid,Final;
	
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vID);
	DBMS_OUTPUT.PUT_LINE('Name: '||vName);
	DBMS_OUTPUT.PUT_LINE('Work score : '||vWork);
	DBMS_OUTPUT.PUT_LINE('Midterm score : '||vMid);
	DBMS_OUTPUT.PUT_LINE('Final score : '||vFinal);
	DBMS_OUTPUT.PUT_LINE('Total score : '||vTotal);
	IF vTotal BETWEEN  80 AND 100 THEN
		DBMS_OUTPUT.PUT_LINE('Getting grade is A');
	ELSIF vTotal BETWEEN  70 AND 79 THEN
		DBMS_OUTPUT.PUT_LINE('Getting grade is B');
	ELSIF vTotal BETWEEN  60 AND 69 THEN
		DBMS_OUTPUT.PUT_LINE('Getting grade is C');
	ELSIF vTotal BETWEEN  50 AND 59 THEN
		DBMS_OUTPUT.PUT_LINE('Getting grade is D');
	ELSIF vTotal BETWEEN  0 AND 50 THEN
		DBMS_OUTPUT.PUT_LINE('Getting grade is F');
	END IF;
END;
/


CREATE OR REPLACE PROCEDURE LAB8_Power2
IS
--DECLARE
	num NUMBER(10) := 1;
	y CONSTANT NUMBER(3)	:= 2;
BEGIN
	FOR x IN 1..10
	LOOP
		num := y*num;
		DBMS_OUTPUT.PUT_LINE(y||'^'||x||'='||num);
	END LOOP;
END;
/