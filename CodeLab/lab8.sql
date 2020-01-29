DECLARE 
	y NUMBER(3)	:= &y;
BEGIN
	FOR x IN REVERSE 1..12
	LOOP
		DBMS_OUTPUT.PUT_LINE(x||'x'||x||'='|| x*y);
	END LOOP;
END;
/

DECLARE 
	y NUMBER(3)	:= &y;
BEGIN
	FOR x IN 1..12
	LOOP
		DBMS_OUTPUT.PUT_LINE(x||'x'||x||'='|| x*y);
	END LOOP;
END;
/


DECLARE 
	x NUMBER(3) := 0;
	y NUMBER(3)	:= &y;
BEGIN
	WHILE (x <= 12)
	LOOP
		DBMS_OUTPUT.PUT_LINE(x||'x'||x||'='|| x*y);
		x := x +1;
	END LOOP;
END;
/


DECLARE 
	x NUMBER(3) := 0;
	y NUMBER(3)	:= &y;
BEGIN
	LOOP
		DBMS_OUTPUT.PUT_LINE(x||'x'||x||'='|| x*y);
		x := x +1;
	EXIT WHEN x > 12;
	END LOOP;
END;
/


DECLARE 
	x NUMBER(3) := 0;
	y CONSTANT NUMBER(3)	:= 13;
BEGIN
	LOOP
		DBMS_OUTPUT.PUT_LINE(x||'x'||x||'='|| x*y);
		x := x +1;
	EXIT WHEN x > 12;
	END LOOP;
END;
/




'BETWEEN  80 AND 85	THEN   ร่วม 80 ถึง 85'
DECLARE
	score NUMBER(3) := &score;
BEGIN
	IF score BETWEEN  80 AND 85	THEN
		DBMS_OUTPUT.PUT_LINE('Score : '||score||' Grade : A ');
	ELSE
		DBMS_OUTPUT.PUT_LINE('Score : '||score||' Grade : F ');
	END IF;
END;
/


DECLARE
	score NUMBER(3) := &score;
BEGIN
	IF score > 80 THEN
		DBMS_OUTPUT.PUT_LINE('Score : '||score||' Grade : A ');
	ELSE
		DBMS_OUTPUT.PUT_LINE('Score : '||score||' Grade : F ');
	END IF;
END;
/



DECLARE
	status CHAR(1) := '&status';
BEGIN
	IF status = 'A' THEN
	DBMS_OUTPUT.PUT_LINE('Astive status.');
	ELSE
	DBMS_OUTPUT.PUT_LINE('Not Astive status.');
	END IF;
END;
/



DECLARE
	vcharge NUMBER(2) := &charge;
BEGIN
	DBMS_OUTPUT.PUT_LINE('Service charge : '||vcharge||'%' );
END;
/