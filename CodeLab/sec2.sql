GRANT connect,resource TO test_cs2;
GRANT connect TO CS2_603021712_4;
GRANT connect,resource TO CS2_603021712_4;
GRANT priv/role TO username;

CREATE USER test_cs2
IDENTIFIED BY p123
DEFAULT TABLESPACE users
TEMPORARY TABLESPACE temp
QUOTA UNLIMITED ON users;

CREATE USER username
IDENTIFIED BY password
DEFAULT TABLESPACE tabname
TEMPORARY TABLESPACE tabname2
QUOTA UNLIMITED ON tabname;

SELECT * FROM tab;

CREATE TABLE student (
ID  	char(11), 
Name 	varchar2(30), 
Address  	varchar2(30)
);  

CREATE TABLE student (
ID  	char(11), 
Name 	varchar2(30),
Address  varchar2(30),
CONSTRAINT   student_PK   PRIMARY KEY(ID)
);

SELECT * FROM tab ;

DESC student ;