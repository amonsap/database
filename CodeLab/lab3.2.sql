//select * from tab;
//select * from product;
//ROLLBACK;
//commit;
UPDATE product SET amount=12
WHERE pname LIKE 'ลูก%' OR price > 100;

UPDATE product SET amount=12
WHERE pname LIKE 'ลูก%' AND price > 100;

UPDATE tab_name SET col = vall
WHERE conditionl AND/OR conditionl2;


UPDATE product SET amount=12
WHERE pname LIKE 'ลูก%'; //มีคำว่าลูกอัปเดท

UPDATE product SET amount=100
WHERE pname = 'ปากกา';

UPDATE product SET amount=20
WHERE pid = 'P01';


UPDATE table_name SET col = vall
WHERE col_name op val/col;




UPDATE product SET amount = 12;
UPDATE table_name SET col = vall,col='val';



ALTER TABLE product
ADD( tid CHAR(3),
	CONSTRAINTS prod_fk_ptype FOREIGN KEY(tid)
		REFERENCES ptype(tid)
);



ALTER TABLE table_name
ADD(
	CONSTRAINTS con_name FOREIGN KEY(col_FK)
		REFERENCES table_name2(col_PK)
);


DESC user_constraints;


ALTER TABLE product
ADD(
	CONSTRAINTS pro_pk PRIMARY KEY(pid)
);

ALTER TABLE tab_name
ADD(CONSTANT col_name PRIMARY KEY (col_PK));


ALTER TABLE product
ADD(amount NUMBER(3));

ALTER TABLE tab_name
ADD col_name data_type;