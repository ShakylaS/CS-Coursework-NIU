//Shakyla Smith

  --Print Customer table
  DESCRIBE Customer;

  INSERT INTO Employee (`EmpNAME`) VALUES
  ('Vincent Mendoza'),
  ('Juan Vremontez');

    --Print Employee table
  SELECT * FROM Employee;

  INSERT INTO allProducts (`ProdID`,`ProdName`,`ProdPrice`, `ProdQty`) VALUES
    ('Pr001','Dog Food',       16.99, 500),
    ('Pr002','Cat Food',       13.99, 400),
    ('Pr003','Dog Toy' ,       5.99 , 105),
    ('Pr004','Cat Toy' ,       4.99 , 302),
    ('Pr005','Potty Pads',     13.99, 112),
    ('Pr006','Large Cage',     100.99, 26),
    ('Pr007','Small Cage',     50.99, 0),
    ('Pr008','Treats'  ,       5.99, 75),
    ('Pr009','Food Bowl',      12.99, 22),
    ('Pr010','Bed'     ,       30.99, 100),           
    ('Pr011','Grooming brush', 10.99, 300),
    ('Pr012','Wet wipes',      6.99, 0),
    ('Pr013','Pet Shampoo ',   7.99, 50),
    ('Pr014','Organic Cat Nip',12.99, 100),
    ('Pr015','Jumbo Bone',     17.99, 300),
    ('Pr016','Flea / tick',    35.99, 50 ),
    ('Pr017','Dog Waste bags', 7.99, 500),
    ('Pr018','Fish food',      3.99, 200),
    ('Pr019','Dog snow booties',20.99, 0),
    ('Pr020','Leash ',         10.99, 75);

--Print allProducts in store
SELECT * FROM allProducts;

--These are the only Items in Stock. Everything else is out of stock.
INSERT INTO Pro_Instock (ProdID,ProdName,ProdPrice,ProdQty) SELECT ProdID, ProdName, ProdPrice, ProdQty FROM allProducts where ProdQty > '0';

  SELECT * FROM Pro_Instock;

INSERT INTO Pro_Outstock (ProdID,ProdName,ProdPrice,ProdQty) SELECT ProdID, ProdName, ProdPrice, ProdQty FROM allProducts where ProdQty = '0';
  SELECT * FROM Pro_Outstock;

SELECT * FROM Updates;  