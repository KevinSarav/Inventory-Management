select * from master_products;

CREATE TABLE sales_order(
   so int not null auto_increment primary key,
   contactId int not null,
   productId int not null,
   qty int,
   salePrice double,
   foreign key fk_contactId(contactId)
   references master_contacts(contactId),
   foreign key fk_productId(productId)
   references master_products(productId)
   );
   
   select * from sales_order;
   select * from master_contacts;
   
   
   insert into sales_order ( contactId, productId, qty, salePrice)
   values
   (1,2,30,250);
   
   select master_contacts.contactId, master_contacts.contactName, master_products.productId,master_products.productName, so
   from master_contacts inner join sales_order on master_contacts.contactId = sales_order.contactId
   join master_products on sales_order.productId = master_products.productId;
   
   //stored procedure for contact name, product name and so
   
   CREATE PROCEDURE  selectSoInfo()
	select so, master_contacts.contactName,master_products.productName, sales_order.qty, sales_order.salePrice
   from master_contacts inner join sales_order on master_contacts.contactId = sales_order.contactId
   join master_products on sales_order.productId = master_products.productId;
   
   call selectSoInfo();