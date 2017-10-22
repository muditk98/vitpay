CREATE TABLE UserMap (
	Id varchar(9),
	type varchar(10),
	PRIMARY KEY(Id)
);

CREATE TABLE User (
	Id varchar(9),
	FirstName varchar(100) NOT NULL,
	LastName varchar(100) NOT NULL,
	DOB date NOT NULL,
	MobileNo varchar(10) NOT NULL,
	email varchar(100) NOT NULL,
	Sex varchar(6) NOT NULL,
	Balance int UNSIGNED NOT NULL DEFAULT 0,
	FOREIGN KEY (Id) REFERENCES UserMap(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	-- CHECK (MobileNo REGEXP '^[0-9]{10}$'),
	-- CHECK (RegId REGEXP '^[0-9]{2}[a-z]{3}[0-9]{4}$'),
	-- CHECK (Sex IN ('male', 'female', 'other')),
	PRIMARY KEY(Id)
);
-- INSERT INTO User values('Asdf', 'Fsds', '13asd4116', '2017-01-01', '1234567f90', 'male', 30);

CREATE TABLE Merchant (
	Id varchar(9),
	Name varchar(100) NOT NULL,
	Balance int UNSIGNED NOT NULL DEFAULT 0,
	FOREIGN KEY (Id) REFERENCES UserMap(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(Id)
);


CREATE TABLE Purpose (
	Id int UNSIGNED AUTO_INCREMENT,
	Name varchar(100) NOT NULL,
	Category varchar(100) NOT NULL,
	PRIMARY KEY(Id)
);

CREATE TABLE Fees(
		Id int UNSIGNED,
		Amount int UNSIGNED NOT NULL,
		FOREIGN KEY (Id) REFERENCES Purpose(Id) ON DELETE CASCADE ON UPDATE CASCADE,
		PRIMARY KEY(Id)
);

CREATE TABLE Due (
	Id int UNSIGNED AUTO_INCREMENT,
	Debtor varchar(9),	
	PurposeId int UNSIGNED,
	Amount int UNSIGNED NOT NULL,
	StartDate date NOT NULL,
	DueDate date NOT NULL,
	PRIMARY KEY(Id),
	FOREIGN KEY (Debtor) REFERENCES User(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (PurposeId) REFERENCES Purpose(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Transaction (
	Id int UNSIGNED AUTO_INCREMENT,
	Payer varchar(9),
	Receiver varchar(9),
	Amount int UNSIGNED NOT NULL,
	TransactionTime timestamp NOT NULL,
	PurposeId int UNSIGNED DEFAULT 1,
	PRIMARY KEY(Id),
	FOREIGN KEY (Payer) REFERENCES UserMap(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (Receiver) REFERENCES UserMap(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (PurposeId) REFERENCES Purpose(Id) ON DELETE CASCADE ON UPDATE CASCADE	
);

CREATE TABLE UserLogin (
	Id varchar(9),
	hash varchar(255),
	FOREIGN KEY (Id) REFERENCES UserMap(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY (Id)
);

-- INSERT INTO UserMap VALUES('16BLC1090', 'Vitian');
-- INSERT INTO UserLogin VALUES('16BLC1090', '$2y$10$wb5wn38NTSd5cKMwHXmxqOo.mRyxRgoXjm5Zdb9A1cqn4LiJVGYMO');
-- INSERT INTO User VALUES('Devashish', 'Bhojwani', '16BLC1090', '1998-11-29', '7550173217', 'male', 120000);

-- INSERT INTO User VALUES('Mudit', 'Kapoor', '16BLC1100', '1998-09-04', '7550170480', 'male', 120000);
-- INSERT INTO UserLogin VALUES('16BLC1100', 'asdfasdf');

-- INSERT INTO User VALUES('Avinash', 'Singh', '16BLC1089', '1997-09-28', '7550170480', 'male', 120000);
-- INSERT INTO UserLogin VALUES('16BLC1089', 'asdfasdf');


-- INSERT INTO Merchant VALUES(1, 'VIT', 20000);
-- INSERT INTO Merchant VALUES(2, 'Vmart', 20000);
-- INSERT INTO Merchant VALUES(3, 'Gazebo', 20000);
-- INSERT INTO Merchant VALUES(4, 'NightMess', 20000);

