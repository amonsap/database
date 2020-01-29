CREATE TABLE Book(
	BookID		CHAR(3),
	BookName	VARCHAR2(60),
	BookPrice	NUMBER(6,2),
	BookAmount	NUMBER(3),
	CONSTRAINTS book_pk PRIMARY KEY(BookID)
);

CREATE TABLE Borrow(
	BorrowID	NUMBER(4),
	STDID		CHAR(11),
	BookID		CHAR(3),
	BorrowDate	DATE,
	ReturnDate	DATE,
	CONSTRAINTS bor_pk PRIMARY KEY(BorrowID),
	CONSTRAINTS bor_fk_std FOREIGN KEY (STDID)
		REFERENCES Student(STDID),
	CONSTRAINTS bor_fk_book FOREIGN KEY (BookID)
		REFERENCES Book(BookID)
);

INSERT INTO Book(BookID,BookName,BookPrice,BookAmount) VALUES('B01','คู่มือเรียนการวิเคราะห์ระบบ','250','10');
INSERT INTO Book(BookID,BookName,BookPrice,BookAmount) VALUES('B02','คู่มือใช้งาน PowerPoint','200','5');
INSERT INTO Book(BookID,BookName,BookPrice,BookAmount) VALUES('B03','คู่มือใช้งาน Mac OS X','150','6');
INSERT INTO Book(BookID,BookName,BookPrice,BookAmount) VALUES('B04','Basic iOS App Development','233','5');
INSERT INTO Book(BookID,BookName,BookPrice,BookAmount) VALUES('B05','Professional ASP.NET Programming','200','4');
INSERT INTO Book(BookID,BookName,BookPrice,BookAmount) VALUES('B06','เรียน Database อย่างไรให้ไร้ F','99','5');

INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('1','603021712-4','B01',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('22/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('2','603021712-4','B02',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('22/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('3','603021712-4','B03',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('22/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('4','603021712-4','B04',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('22/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('5','603021712-4','B05',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('22/2/2015', 'DD/MM/YYYY'));

INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('6','603020315-9','B02',TO_DATE('23/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('7','603020315-9','B03',TO_DATE('23/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('8','603020315-9','B04',TO_DATE('23/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('9','603020315-9','B05',TO_DATE('23/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));

INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('10','603021032-6','B03',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('11','603021032-6','B04',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('12','603021032-6','B05',TO_DATE('22/2/2015', 'DD/MM/YYYY'),TO_DATE('25/2/2015', 'DD/MM/YYYY'));

INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('13','603020296-7','B04',TO_DATE('25/2/2015', 'DD/MM/YYYY'),TO_DATE('28/2/2015', 'DD/MM/YYYY'));
INSERT INTO Borrow(BorrowID,STDID,BookID,BorrowDate,ReturnDate) VALUES('14','603020296-7','B05',TO_DATE('25/2/2015', 'DD/MM/YYYY'),TO_DATE('28/2/2015', 'DD/MM/YYYY'));

CREATE VIEW LAB6_BookPrice AS
SELECT BookID,BookName,BookAmount,BookPrice,BookPrice*BookAmount TotalPrice
FROM Book
GROUP BY BookID,BookName,BookAmount,BookPrice
ORDER BY BookID;

CREATE VIEW LAB6_BorrowDetail AS
SELECT Student.STDID,StdFName,StdLName,BookName,BorrowDate,ReturnDate
FROM Book,Student,Borrow
WHERE Student.STDID = Borrow.STDID
AND Book.BookID = Borrow.BookID
ORDER BY STDID,BorrowDate;

CREATE VIEW LAB6_StudentBorrow AS
SELECT Student.STDID,StdFName,StdLName,COUNT(Student.STDID) Amount
FROM Student,Borrow
WHERE Student.STDID = Borrow.STDID
GROUP BY Student.STDID,StdFName,StdLName
ORDER BY StdFName;

CREATE VIEW LAB6_BOOKBORROW AS
SELECT Book.BookID,BookName,COUNT(Book.BookID) Amount
FROM Book,Borrow
WHERE Book.BookID = Borrow.BookID(+)
GROUP BY Book.BookID,BookName
ORDER BY Book.BookID;