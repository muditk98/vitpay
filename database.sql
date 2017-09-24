CREATE TABLE User (
	FirstName varchar(100) NOT NULL,
	LastName varchar(100) NOT NULL,
	RegId varchar(9),
	DOB date NOT NULL,
	MobileNo varchar(10) NOT NULL,
	Sex varchar(6) NOT NULL,
	Balance int UNSIGNED NOT NULL DEFAULT 0,
	-- CHECK (MobileNo REGEXP '^[0-9]{10}$'),
	-- CHECK (RegId REGEXP '^[0-9]{2}[a-z]{3}[0-9]{4}$'),
	-- CHECK (Sex IN ('male', 'female', 'other')),
	PRIMARY KEY(RegId)
);
-- INSERT INTO User values('Asdf', 'Fsds', '13asd4116', '2017-01-01', '1234567f90', 'male', 30);

CREATE TABLE Merchant (
	Id int UNSIGNED AUTO_INCREMENT,
	Name varchar(100) NOT NULL,
	Balance int UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY(Id)
);

CREATE TABLE Purpose (
	Id int UNSIGNED AUTO_INCREMENT,
	Name varchar(100) NOT NULL,
	Category varchar(100) NOT NULL,
	PRIMARY KEY(Id)
);

CREATE TABLE Due (
	Id int UNSIGNED AUTO_INCREMENT,
	Debtor varchar(9),
	Amount int UNSIGNED NOT NULL,
	PurposeId int UNSIGNED,
	DueDate date NOT NULL,
	StartDate date NOT NULL,
	PRIMARY KEY(Id),
	FOREIGN KEY (Debtor) REFERENCES User(RegId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (PurposeId) REFERENCES Purpose(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Transaction (
	Id int UNSIGNED AUTO_INCREMENT,
	Payer varchar(9),
	Receiver int UNSIGNED,
	Amount int UNSIGNED NOT NULL,
	TransactionDate date NOT NULL,
	PurposeId int UNSIGNED,
	PRIMARY KEY(Id),
	FOREIGN KEY (Payer) REFERENCES User(RegId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (Receiver) REFERENCES Merchant(Id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (PurposeId) REFERENCES Purpose(Id) ON DELETE CASCADE ON UPDATE CASCADE	
);

CREATE TABLE UserLogin (
	UserId varchar(9),
	Password varchar(32),
	FOREIGN KEY (UserId) REFERENCES User(RegId) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE MerchantLogin (
	UserId int UNSIGNED,
	Password varchar(32),
	FOREIGN KEY (UserId) REFERENCES Merchant(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO User VALUES('Devashish', 'Bhojwani', '16BLC1090', '1998-11-29', '7550173217', 'male', 120000);

INSERT INTO UserLogin VALUES('16BLC1090', 'asdfasdf');