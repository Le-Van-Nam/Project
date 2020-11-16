<?php
//CREATE DATABASE IF NOT EXISTS darklook CHARACTER SET utf8 COLLATE utf8_general_ci;
//#categories
//CREATE TABLE IF NOT EXISTS categories (
// id INT(11) AUTO_INCREMENT,
//name VARCHAR(255) NOT NULL,
//type TINYINT(3) DEFAULT 0 COMMENT "Loại danh mục: 0 - Product, 1 - News",
//avatar VARCHAR(255),
//description TEXT,
//status TINYINT(3) DEFAULT 0 COMMENT "Trạng thái danh mục: 0 - Inactive, 1 - Active",
//created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP,
//updated_at DATETIME,
//PRIMARY KEY (id)
//);
//#products
//CREATE TABLE IF NOT EXISTS products(
//    id INT(11) AUTO_INCREMENT,
//category_id INT(11) COMMENT "Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories",
//title VARCHAR(255),
//avatar VARCHAR(255),
//price INT(11),
//amount INT(11),
//summary VARCHAR(255),
//content TEXT,
//status TINYINT(3) DEFAULT 0 COMMENT "Trạng thái danh mục: 0 - Inactive, 1 - Active",
//seo_title VARCHAR(255),
//seo_description VARCHAR(255),
//seo_keywords VARCHAR(255),
//created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP,
//updated_at DATETIME ,
//PRIMARY KEY (id),
//FOREIGN KEY (category_id) REFERENCES categories(id)
//);
#users
//CREATE TABLE IF NOT EXISTS users (
//id INT(11) PRIMARY KEY AUTO_INCREMENT,
//username VARCHAR(255),
//password VARCHAR(255),
//first_name VARCHAR(255),
//last_name VARCHAR(255),
//phone  int(11),
//address  varchar(255),
//email  varchar(255),
//avatar VARCHAR(255),
//position VARCHAR(255),
//last_login DATETIME,
//status TINYINT(3) DEFAULT 0 COMMENT "Trạng thái danh mục: 0 - Inactive, 1 - Active",
//created_at TIMESTAMP DEFAULT  CURRENT_TIMESTAMP,
//updated_at DATETIME,
//);
class Database {
  const DB_DSN = 'mysql:host=localhost;dbname=darklook;port=3306,charset=utf8';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
}
?>
