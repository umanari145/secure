CREATE DATABASE sql_injection DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON sql_injection.* TO sql_user@localhost IDENTIFIED BY 'sql_injection_pass' WITH GRANT OPTION;

CREATE TABLE member (
  id int not null auto_increment primary key,
  name varchar(10) not null 
);

INSERT INTO member (name) VALUES ('ichiro'),('jirou'),('saburou') ;
