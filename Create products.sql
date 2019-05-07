use inventorymanagement;
create TABLE master_products (
  productId int NOT NULL AUTO_INCREMENT,
  productName varchar(200),
  salePrice double,
  qty int,
  PRIMARY KEY (productId)
) 

INSERT into master_products (productName, salePrice, qty) values 
("New Balance Minimus", 114.95, 5),
("ASICS GEL-Venture 7", 64.95, 10),
("Nike Zoom Rival Fly", 90.00, 25),
("Nike Quest", 755, 20);

select * from master_products