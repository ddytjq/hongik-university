
// 데이터베이스 생성
create database xss;
use xss;

// 테이블 생성
create table board(title varchar(30), content varchar(150), date varchar(20), id varchar(20));
create table login(id varchar(20), pw varchar(20), name varchar(20), tel varchar(20));

// 데이터베이스 접속
mysql -u root -p xss;

// 테이블 확인
desc board, login;
