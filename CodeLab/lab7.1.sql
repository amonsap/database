SELECT * FROM product;
SELECT * FROM student;
SELECT * FROM Fact;
desc Fact;
desc Register;
desc Subject;
CREATE OR REPLACE PROCEDURE LAB7_Register 
IS
--DECLARE
	vstdid	student.stdid%type;
	vstdFname	student.stdfname%type;
	vstdLname	student.stdlname%type;
	vCredit	number(10);
	vRegister  number(10);
BEGIN
	SELECT student.stdid,stdFname,stdLname,SUM(credit),SUM(credit*1000)Reg
	INTO vstdid,vstdFname,vstdLname,vCredit,vRegister
	FROM student,Subject,Register
	WHERE student.stdid = '603021032-6'
	AND student.stdid = Register.stdid
	AND  Subject.subjcode = Register.subjcode
	GROUP BY student.stdid,stdFname,stdLname;
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vstdid);
	DBMS_OUTPUT.PUT_LINE('FirstName : '||vstdFname);
	DBMS_OUTPUT.PUT_LINE('LastName : '||vstdLname);
	DBMS_OUTPUT.PUT_LINE('Credit:'||vCredit);
	DBMS_OUTPUT.PUT_LINE('Register Fee : '||vRegister);
END;
/


CREATE OR REPLACE PROCEDURE LAB7_StudentDept
IS
--DECLARE
	vstdid	student.stdid%type;
	vstdFname	student.stdfname%type;
	vstdLname	student.stdlname%type;
	vstdAddress	student.stdaddress%type;
	vFacTha		Fact.Fname_Tha%type;
	vDepTha		Dept.Dname_Tha%type;

BEGIN
	SELECT stdid,stdFname,stdLname,stdAddress,Fname_Tha,Dname_Tha
	INTO vstdid,vstdFname,vstdLname,vstdAddress,vFacTha,vDepTha	
	FROM student,Fact,Dept
	WHERE stdid = '603021032-6'
	AND student.dcode = Dept.DCODE
	AND  student.fcode = Dept.fcode  
	AND Dept.fcode = Fact.fcode;
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vstdid);
	DBMS_OUTPUT.PUT_LINE('FirstName : '||vstdFname);
	DBMS_OUTPUT.PUT_LINE('LastName : '||vstdLname);
	DBMS_OUTPUT.PUT_LINE('Address : '||vstdAddress);
	DBMS_OUTPUT.PUT_LINE('Faculty Name :'||vFacTha);
	DBMS_OUTPUT.PUT_LINE('Department Name : '||vDepTha);
END;
/




CREATE OR REPLACE PROCEDURE LAB7_Student
IS
--DECLARE
	vstdid	student.stdid%type;
	vstdFname	student.stdfname%type;
	vstdLname	student.stdlname%type;
	vstdAddress	student.stdaddress%type;
	vfcode	CHAR(3);
	vdcode	CHAR(3);
	vtcode	CHAR(3);
BEGIN
	SELECT stdid,stdfname,stdlname,stdaddress,fcode,dcode,tcode
	INTO vstdid,vstdFname,vstdLname,vstdAddress,vfcode,vdcode,vtcode
	FROM student
	WHERE stdid = '603021032-6';
	DBMS_OUTPUT.PUT_LINE('Student ID : '||vstdid);
	DBMS_OUTPUT.PUT_LINE('FirstName : '||vstdFname);
	DBMS_OUTPUT.PUT_LINE('LastName : '||vstdLname);
	DBMS_OUTPUT.PUT_LINE('Address : '||vstdAddress);
	DBMS_OUTPUT.PUT_LINE('FCODE : '||vfcode);
	DBMS_OUTPUT.PUT_LINE('DCODE : '||vdcode);
	DBMS_OUTPUT.PUT_LINE('TCODE : '||vtcode);
END;
/



CREATE OR REPLACE PROCEDURE test_2
IS
--DECLARE
	vpid	product.pid%type;
	vpname	product.pname%type;
	vprice	product.price%type;
	vlname	location.lname%type;
BEGIN
	SELECT pid,pname,price,lname
	INTO vpid,vpname,vprice,vlname
	FROM product,location
	WHERE pid = 'P10'
	AND product.lid = location.lid;
	DBMS_OUTPUT.PUT_LINE('Product Id : '||vpid);
	DBMS_OUTPUT.PUT_LINE('Product Name : '||vpname);
	DBMS_OUTPUT.PUT_LINE('Product Price : '||vprice);
	DBMS_OUTPUT.PUT_LINE('Location Name : '||vlname);
END;
/

DECLARE
	vpid	CHAR(3);
	vpname	VARCHAR2(30);
	vprice	NUMBER(6,2);
	vlname	VARCHAR2(10);
BEGIN
	SELECT pid,pname,price,lname
	INTO vpid,vpname,vprice,vlname
	FROM product,location
	WHERE pid = 'P10'
	AND product.lid = location.lid;
	DBMS_OUTPUT.PUT_LINE('Product Id : '||vpid);
	DBMS_OUTPUT.PUT_LINE('Product Name : '||vpname);
	DBMS_OUTPUT.PUT_LINE('Product Price : '||vprice);
	DBMS_OUTPUT.PUT_LINE('Location Name : '||vlname);
END;
/


//'การประกาศตัวแปรแบบง่าย  := &A รับค่าทางแป้นพิมพ์  := 1252'  
Declare
	A number(5) := &A;
	B number(5) := &B;
	C number(6);
BEGIN
	C := A+B;
	DBMS_OUTPUT.PUT_LINE('A : '||A);  
	DBMS_OUTPUT.PUT_LINE('B : '||B);
	DBMS_OUTPUT.PUT_LINE('C : '||C);
END;
/


SET SERVEROUTPUT ON


BEGIN
	DBMS_OUTPUT.PUT_LINE('Amornsap Saenprasit');
END;
/

