DECLARE
	CURSOR cpeod IS SELECT pid,pname,price
	FROM product;
	vpid product.pid%type;
	vpname product.pname%type;
	vprice product.price%type;
	
BEGIN
	OPEN cpeod;
	LOOP
		FETCH cpeod INTO vpid,vpname,vprice;
	EXIT WHEN cpeod%notfound;
		DBMS_OUTPUT.PUT_LINE(vpid||' '||vpname||' '||vprice);
		calnewprice(vprice);
	END LOOP;
	CLOSE cpeod;
END;
/



EXECUTE calnewprice(150);
CREATE OR REPLACE PROCEDURE calnewprice(price NUMBER)
IS
	new_price NUMBER; 
BEGIN
	new_price := price*1.20;
	DBMS_OUTPUT.PUT_LINE('new_price '||new_price);
END;
/


EXECUTE say_swadee (5);
CREATE OR REPLACE PROCEDURE say_swadee(n NUMBER)
IS
BEGIN
	FOR i IN 1..n
	LOOP
		DBMS_OUTPUT.PUT_LINE('swadee teacher '||i);
	END LOOP;
END;
/



--CURSOR cpeod IS SELECT pid,pname,price ดึงหลายrow
--FETCH cpeod INTO vpid,vpname,vprice; อ่านข้อมูล

DECLARE
	CURSOR cpeod IS SELECT pid,pname,price
	FROM product;
	vpid product.pid%type;
	vpname product.pname%type;
	vprice product.price%type;
	
BEGIN
	OPEN cpeod;
	LOOP
		FETCH cpeod INTO vpid,vpname,vprice;
	EXIT WHEN cpeod%notfound;
		DBMS_OUTPUT.PUT_LINE(vpid||' '||vpname||' '||vprice);
	END LOOP;
	CLOSE cpeod;
END;
/

DECLARE
	TYPE numType is table of NUMBER(5)
	index by binary_integer;
	nums numType;
BEGIN
	FOR i IN 1..12 LOOP
		nums(i) := 12*i;
	END LOOP;
	FOR i IN 1..12 LOOP
		DBMS_OUTPUT.PUT_LINE('12 x '||i||' = '||nums(i));
	END LOOP;	
END;
/

DECLARE
	TYPE nameType is table of varchar2(10)
	index by binary_integer;
	friends nameType;
BEGIN
	friends(0) := 'Mee';
	friends(1) := 'Ni';
	friends(2) := 'Paw';
	friends(-1) := 'Max';
	DBMS_OUTPUT.PUT_LINE('friends 0 :'||friends(1));
	DBMS_OUTPUT.PUT_LINE('friends -1 :'||friends(-1));
END;
/

DECLARE
	pp product%rowtype;
BEGIN
	SELECT * INTO pp 
	FROM product
	WHERE pid = 'P01';
	DBMS_OUTPUT.PUT_LINE('ID : '||pp.pid);
	DBMS_OUTPUT.PUT_LINE('Name : '||pp.pname);
	DBMS_OUTPUT.PUT_LINE('Price : '||pp.price);
END;
/


DECLARE
	TYPE prodtype IS RECORD(
		vPID	product.pid%type,
		vpname	product.pname%type,
		vprice	product.price%type
	);
	pp prodtype;
BEGIN
	SELECT pid,pname,price INTO pp 
	FROM product
	WHERE pid = 'P01';
	DBMS_OUTPUT.PUT_LINE('ID : '||pp.vPID);
	DBMS_OUTPUT.PUT_LINE('Name : '||pp.vpname);
	DBMS_OUTPUT.PUT_LINE('Price : '||pp.vprice);
END;
/

DESC ;