//Shakyla Smith

DROP TABLE IF EXISTS Updates, Cart, PlacedOrder, Fullfilment, Orders, Pro_Instock,  Pro_Outstock, allProducts,Employee, Customer;

CREATE TABLE IF NOT EXISTS Customer (
   CustID INT AUTO_INCREMENT PRIMARY KEY,
   CustName VARCHAR(255) NOT NULL,
   CustCardN INT NOT NULL,
   CustAddr VARCHAR(255) NOT NULL
 );

 CREATE TABLE IF NOT EXISTS Employee (
    EmpID INT AUTO_INCREMENT PRIMARY KEY,
    EmpName VARCHAR(255) NOT NULL
  );

  CREATE TABLE IF NOT EXISTS allProducts (
    ProdID VARCHAR(6) PRIMARY KEY,
    ProdName VARCHAR(255) NOT NULL,
    ProdPrice REAL NOT NULL,
    ProdQty INT NOT NULL
  );
 
--see all products that are in stock or available for sale
CREATE TABLE IF NOT EXISTS Pro_Instock (
    ProdID VARCHAR(6) NOT NULL,
    ProdName VARCHAR(255) NOT NULL,
    ProdPrice REAL NOT NULL,
    ProdQty INT NOT NULL,
    FOREIGN KEY(ProdID) REFERENCES allProducts(ProdID) 
);

CREATE TABLE IF NOT EXISTS Pro_Outstock (
    ProdID VARCHAR(6) NOT NULL,
    ProdName VARCHAR(255) NOT NULL,
    ProdPrice REAL NOT NULL,
    ProdQty INT NOT NULL,
    FOREIGN KEY(ProdID) REFERENCES allProducts(ProdID)
);

  CREATE TABLE IF NOT EXISTS Orders (
    OrdNum INT AUTO_INCREMENT PRIMARY KEY,
    OrdPayment VARCHAR(255) NOT NULL,
    OrdTotal DECIMAL(10,2) NOT NULL, 
    OrdStatus CHAR(255) NOT NULL,
    OrdNote VARCHAR(255) NOT NULL
);

  CREATE TABLE IF NOT EXISTS PlacedOrder (
      CustID INT NOT NULL,
      OrdNum INT NOT NULL,
      FOREIGN KEY (CustID) REFERENCES Customer(CustID),
      FOREIGN KEY (OrdNum) REFERENCES Orders(OrdNum)
);

CREATE TABLE IF NOT EXISTS Fullfilment (
    OrdNum INT,
    OrdStatus CHAR(255) NOT NULL,
    ProdQty INT NOT NULL,
    NOTE VARCHAR(255) NOT NULL,
    PRIMARY KEY (OrdNum)
);
  
CREATE TABLE IF NOT EXISTS Cart (
    ProdID VARCHAR(6) NOT NULL,
    ProdName VARCHAR(255) NOT NULL,
    ProdPrice REAL NOT NULL,
    QuantCOUNT INT NOT NULL,
    PRIMARY KEY (ProdID),
    FOREIGN KEY (ProdID) REFERENCES allProducts(ProdID)
);

CREATE TABLE IF NOT EXISTS Updates (
    EmpID INT NOT NULL,
    OrdNum INT NOT NULL, 
    ProdID VARCHAR(6) NOT NULL,
    FOREIGN KEY (EmpID) REFERENCES Employee(EmpID),
    FOREIGN KEY (OrdNum) REFERENCES Orders(OrdNum),
    FOREIGN KEY (ProdID) REFERENCES allProducts(ProdID)
); 
  
  --could potentially add this as well? 
  /*CREATE TABLE IF NOT EXISTS Outstock (
    'ProdID' CHAR(4) NOT NULL,
    'ProdQty' INT NOT NULL,
    'ProdNAME' VARCHAR(255) NOT NULL,
    'ProdPrice' DECIMAL(10,2) NOT NULL,
    'LOCATION' VARCHAR(255) NOT NULL,
    'ITEMTYPE' VARCHAR(255) NOT NULL,
    FOREIGN KEY ('ProdID') REFERENCES 'allProducts'('ProdID'),
   PRIMARY KEY ('ProdID')
  );*/
