-- khách hàng
CREATE TABLE Customer (
    cus_id int AUTO_INCREMENT PRIMARY KEY ,
    cus_name varchar(255) not null,
	cus_gender bit default 1,
    cus_email varchar(255)  null,
    cus_phone varchar(20) not null,
    cus_address varchar(255) not null
	
);

-- người dùng
CREATE TABLE User (
    user_id int AUTO_INCREMENT PRIMARY KEY ,
    cus_id int,
    cus_name varchar(255) not null,
    cus_pass varchar(255) not null,
    user_status bit default 1,
    FOREIGN KEY (cus_id) REFERENCES Customer (cus_id)
);

-- quản trị viên
CREATE TABLE Administrator (
    ad_id int AUTO_INCREMENT PRIMARY KEY ,
    ad_username varchar(255) not null,
	ad_pass varchar(255) not null,
    ad_fullname varchar(255) not null,
    ad_email varchar(255)  null,
    ad_phone varchar(20) not null,
    ad_address varchar(255) not null,
    ad_status bit not null default 1,
    ad_duty bit not null 
);
-- nhà cung cấp
CREATE TABLE Suppliers (
   sl_id int AUTO_INCREMENT PRIMARY KEY,
   sl_name varchar(255) not null,
   sl_address varchar(255) not null,
   sl_phone varchar(20) not null,
   sl_email varchar(255)  not null,
   sl_status bit default 1
);

-- sản phẩm
create table Products (
	pr_id int AUTO_INCREMENT PRIMARY KEY,
    pt_id int,
    pr_name varchar(255) not null,
	pr_image varchar (255) not null,
    pr_amount int not null,
    pr_view int null,
    pr_status varchar(255) ,
    pr_price float not null,
    pr_sales  float null,
	FOREIGN KEY (pt_id) REFERENCES Pr_Type (pt_id)
);
create table Pr_Type (
	pt_id int AUTO_INCREMENT PRIMARY KEY,
    pt_name varchar(255) not null
);
-- giá sp



-- chi tiết sản phẩm
create table Category (
	ct_id int AUTO_INCREMENT PRIMARY KEY,
    pr_id int,
    ct_describe1 varchar(255) null,
	ct_describe2 varchar(1000) null,
	
    FOREIGN KEY (pr_id) REFERENCES Products (pr_id)
);

-- đặt hàng
create table Orders (
	order_id int AUTO_INCREMENT PRIMARY KEY,
    cs_id int,
    order_date_start datetime DEFAULT CURRENT_TIMESTAMP,
    order_date_end datetime null,
    cus_name varchar(255), 
	cus_phone varchar(45) ,
	cus_address varchar(255),
    order_status varchar(255) ,
	FOREIGN KEY (cs_id) REFERENCES Customer (cus_id)
);

-- chi tiết đặt hàng
create table Orders_Detail (
	od_id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    pr_id int,
	od_quanlity int,
	od_price float not null,
	FOREIGN KEY (pr_id) REFERENCES Products (pr_id),
    FOREIGN KEY (order_id) REFERENCES Orders (order_id)
);



-- hóa đơn nhập
CREATE TABLE Product_Import (
    pp_id int AUTO_INCREMENT PRIMARY KEY,
    sl_id int ,
    pp_start date not null ,
    pp_amonut int,
    pp_price float not null,
	ad_id int ,
    FOREIGN KEY (sl_id) REFERENCES Suppliers(sl_id),
	FOREIGN KEY (ad_id) REFERENCES  Administrator(ad_id)
);

-- chi tiết hóa đơn nhập
CREATE TABLE Product_Import_Detail (
    ppd_id int AUTO_INCREMENT PRIMARY KEY,
    pp_id int,
    pr_id int ,
    ppd_amount int not null,
	ppd_price float not null ,
    FOREIGN KEY (pp_id) REFERENCES Product_Import(pp_id),
	FOREIGN KEY (pr_id) REFERENCES  Products(pr_id)
    
);

INSERT INTO Pr_Type (pt_name)
VALUES
  ('Hoa lụa để bàn'),
  ('Hoa lụa trang trí'),
  ('Hoa vải để bàn'),
  ('Hoa vải trang trí');
  INSERT INTO Administrator (ad_username, ad_pass, ad_fullname, ad_email, ad_phone, ad_address, ad_duty)
VALUES
  ('admin1', '123456', 'Nguyễn Văn Khoa', 'admin1@example.com', '9998887776', '1 Long Biên - Hà Nội', 1),
  ('admin2', '1234567', 'Nguyễn Minh Thuận Two', 'admin2@example.com', '8887776665', '2 Long Biên - Hà Nội', 0),
  ('admin3', '1234568', ' Đỗ Tiến Tài', 'admin2@example.com', '8887776665', '3 Long Biên - Hà Nội', 0);
  
  
  -- xóa khách hàng
DELIMITER //

CREATE PROCEDURE DeleteCustomer(IN p_cus_id INT)
BEGIN
    -- Tắt chế độ kiểm tra khóa ngoại
    SET foreign_key_checks = 0;

    -- Xóa khách hàng
    DELETE FROM customer WHERE cus_id = p_cus_id;

    -- Bật lại chế độ kiểm tra khóa ngoại
    SET foreign_key_checks = 1;
END //

DELIMITER ;

 
call  DeleteCustomer(19)

  -- xóa sản phẩm
 
  -- xóa hóa đơn nhập 
DELIMITER //

CREATE PROCEDURE DeleteProductImport(IN pp_id_param INT)
BEGIN
    -- Tắt chế độ kiểm tra khóa ngoại
    SET foreign_key_checks = 0;

    -- Xóa các chi tiết hóa đơn nhập liên quan đến hóa đơn nhập
    DELETE FROM product_import_detail WHERE pp_id = pp_id_param;

    -- Xóa hóa đơn nhập
    DELETE FROM product_import WHERE pp_id = pp_id_param;

    -- Bật lại chế độ kiểm tra khóa ngoại
    SET foreign_key_checks = 1;
END //

DELIMITER ;



-- xóa lại sản phẩm
DELIMITER //

CREATE PROCEDURE DeletePrType(IN p_pt_id INT)
BEGIN
    -- Tắt chế độ kiểm tra khóa ngoại
    SET foreign_key_checks = 0;

  

    -- Xóa loại sản phẩm
    DELETE FROM Pr_Type WHERE pt_id = p_pt_id;

    -- Bật lại chế độ kiểm tra khóa ngoại
    SET foreign_key_checks = 1;
END //

DELIMITER ;

  -- xóa khách hàng
  DELIMITER //

CREATE PROCEDURE DeleteCustomer(IN customer_id INT)
BEGIN
    -- Tắt kiểm tra khóa ngoại
    SET foreign_key_checks = 0;

  

    -- Xóa khách hàng từ bảng Customer
    DELETE FROM Customer WHERE cus_id = customer_id;

    -- Bật lại kiểm tra khóa ngoại
    SET foreign_key_checks = 1;
END //

DELIMITER ;

  -- doanh thu tổng 
  DROP PROCEDURE IF EXISTS DeletePrType



DELIMITER //

CREATE PROCEDURE CalculateRevenue()
BEGIN
    DECLARE total_revenue FLOAT;

    -- Tính tổng doanh thu từ các sản phẩm đã bán
    SELECT SUM((od_price - ppd_price) * od_quanlity) INTO total_revenue
    FROM Orders_Detail 
    JOIN Product_Import_Detail ON Orders_Detail.pr_id = Product_Import_Detail.pr_id;

    -- Trả về tổng doanh thu
    SELECT total_revenue AS total_revenue;
END //

DELIMITER ;
CALL CalculateRevenue();


-- sản phẩm bán chạy 
DELIMITER //

CREATE PROCEDURE GetTopSellingProducts()
BEGIN
    SELECT pr_id, SUM(od_quanlity) AS total_quantity
    FROM Orders_Detail
    GROUP BY pr_id
    ORDER BY total_quantity DESC
    LIMIT 4;
END //

DELIMITER ;
CALL GetTopSellingProducts();


-- doanh thu chi tiết
DROP PROCEDURE IF EXISTS CalculateWeeklyRevenue


DELIMITER //

CREATE PROCEDURE CalculateRevenueByTime()
BEGIN
    DECLARE current_date DATE;
    DECLARE start_of_week DATE;
    DECLARE end_of_week DATE;
    DECLARE start_of_month DATE;
    DECLARE end_of_month DATE;
    DECLARE start_of_year DATE;
    DECLARE end_of_year DATE;

    -- Lấy ngày hiện tại
    SELECT CURDATE() INTO current_date;

    -- Tính toán ngày đầu và cuối của tuần
    SELECT DATE_SUB(current_date, INTERVAL WEEKDAY(current_date) DAY) INTO start_of_week;
    SELECT DATE_ADD(start_of_week, INTERVAL 6 DAY) INTO end_of_week;

    -- Tính toán ngày đầu và cuối của tháng
    SELECT DATE_SUB(current_date, INTERVAL DAYOFMONTH(current_date) - 1 DAY) INTO start_of_month;
    SELECT LAST_DAY(current_date) INTO end_of_month;

    -- Tính toán ngày đầu và cuối của năm
    SELECT MAKEDATE(YEAR(current_date), 1) INTO start_of_year;
    SELECT MAKEDATE(YEAR(current_date) + 1, 1) - INTERVAL 1 DAY INTO end_of_year;

    -- Tính toán doanh thu trong tuần
    SELECT 
        SUM((od_price - ppd_price) * od_quanlity) AS weekly_revenue
    FROM 
        Orders_Detail
    JOIN 
        Product_Import_Detail ON Orders_Detail.pr_id = Product_Import_Detail.pr_id
    WHERE 
        order_date_start BETWEEN start_of_week AND end_of_week;

    -- Tính toán doanh thu trong tháng
    SELECT 
        SUM((od_price - ppd_price) * od_quanlity) AS monthly_revenue
    FROM 
        Orders_Detail
    JOIN 
        Product_Import_Detail ON Orders_Detail.pr_id = Product_Import_Detail.pr_id
    WHERE 
        order_date_start BETWEEN start_of_month AND end_of_month;

    -- Tính toán doanh thu trong năm
    SELECT 
        SUM((od_price - ppd_price) * od_quanlity) AS yearly_revenue
    FROM 
        Orders_Detail
    JOIN 
        Product_Import_Detail ON Orders_Detail.pr_id = Product_Import_Detail.pr_id
    WHERE 
        order_date_start BETWEEN start_of_year AND end_of_year;
END //

DELIMITER ;



DROP PROCEDURE IF EXISTS total
-- doanh thu ngày hiện tại 
DELIMITER //

CREATE PROCEDURE total()
BEGIN
    DECLARE total_revenue FLOAT;
    DECLARE total_products_sold INT;
    DECLARE total_orders_today INT;

    -- Tính tổng doanh thu từ các sản phẩm đã bán
    SELECT SUM((od_price - ppd_price) * od_quanlity) INTO total_revenue
    FROM Orders_Detail 
	JOIN Product_Import_Detail ON Orders_Detail.pr_id = Product_Import_Detail.pr_id
	JOIN Orders ON Orders_Detail.order_id = Orders.order_id
	where DATE(order_date_start) = CURDATE() and order_status='ht';
    -- Tính tổng số sản phẩm đã bán
    SELECT SUM(od_quanlity) INTO total_products_sold
    FROM Orders_Detail
    Join Orders on  Orders_Detail.order_id = Orders.order_id 
    where DATE(order_date_start) = CURDATE();

    -- Tính tổng số đơn hàng trong ngày hiện tại
    SELECT COUNT(*) INTO total_orders_today
    FROM Orders
    WHERE DATE(order_date_start) = CURDATE() ;

    -- Trả về tổng doanh thu, số sản phẩm đã bán và số đơn hàng trong ngày hiện tại
    SELECT total_revenue AS total_revenue, total_products_sold AS total_products_sold, total_orders_today AS total_orders_today;
END //

DELIMITER ;
call total

-- sản phẩm bán chạy
DELIMITER //

CREATE PROCEDURE getproduct()
BEGIN
    SELECT P.pr_id, P.pr_name, P.pr_image, SUM(OD.od_quanlity) AS total_quantity_sold
    FROM Products P
    JOIN Orders_Detail OD ON P.pr_id = OD.pr_id
    GROUP BY P.pr_id
    ORDER BY total_quantity_sold DESC
    LIMIT 4;
END //

DELIMITER ;

CALL getproduct();


-- thống kê theo thời gian
DELIMITER //

CREATE PROCEDURE totaldate(
    IN start_date DATE,
    IN end_date DATE
)
BEGIN
    DECLARE total_revenue FLOAT;
    DECLARE total_products_sold INT;
    DECLARE total_orders_today INT;
    DECLARE total_orders_huy INT; -- Thêm biến này vào khai báo biến

    -- Tính tổng doanh thu từ các sản phẩm đã bán
    SELECT SUM((od_price - ppd_price) * od_quanlity) INTO total_revenue
    FROM Orders_Detail
    JOIN Product_Import_Detail ON Orders_Detail.pr_id = Product_Import_Detail.pr_id
    JOIN Orders ON Orders_Detail.order_id = Orders.order_id
    WHERE DATE(order_date_start) BETWEEN start_date AND end_date AND order_status='ht';

    -- Tính tổng số sản phẩm đã bán
    SELECT SUM(od_quanlity) INTO total_products_sold
    FROM Orders_Detail
    JOIN Orders ON Orders_Detail.order_id = Orders.order_id
    WHERE DATE(order_date_start) BETWEEN start_date AND end_date AND order_status='ht';

    -- Tính tổng số đơn hàng hoàn thành
    SELECT COUNT(*) INTO total_orders_today
    FROM Orders
    WHERE DATE(order_date_start) BETWEEN start_date AND end_date AND order_status='ht';

    -- tính tổng số đơn hàng hủy
    SELECT COUNT(*) INTO total_orders_huy
    FROM Orders
    WHERE DATE(order_date_start) BETWEEN start_date AND end_date AND order_status='huy';

    -- Trả về tổng doanh thu, số sản phẩm đã bán và số đơn hàng trong khoảng thời gian nhập vào
    SELECT total_revenue AS total_revenue, total_products_sold AS total_products_sold, total_orders_today AS total_orders_today , total_orders_huy AS total_orders_huy;
END //

DELIMITER ;

CALL totaldate('2024-04-01', '2024-04-15');




