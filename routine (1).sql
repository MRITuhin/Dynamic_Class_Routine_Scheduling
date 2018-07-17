create table teacher (
	ID int auto_increment primary key,
	teacherID varchar(50) unique,
	name varchar(50)
);

create table RuningSemester (
	ID int auto_increment primary key,
	semester varchar(50) unique
);

create table courses (
	ID int auto_increment primary key,
	courseName varchar(100) unique,
	courseID varchar(50) unique,
	credit int,
	teacher1ID varchar(50),
	teacher2ID varchar(50),
	teacher3ID varchar(50),
	semester varchar(50),
	type varchar(20)
);

create table classroom (
	ID int auto_increment primary key,
	roomnumber int unique,
	type varchar(20)
);

create table final(
	ID int auto_increment primary key,
	day varchar(20),
	semester varchar(20),
	p1 varchar(50),
	p2 varchar(50),
	p3 varchar(50),
	p4 varchar(50),
	p5 varchar(50),
	p6 varchar(50),
	p7 varchar(50)
)