
#DROP TABLE IF EXISTS `Director`;
#DROP TABLE IF EXISTS `Actor`;
DROP TABLE IF EXISTS `Review`;
#DROP TABLE IF EXISTS `Director`;
#DROP TABLE IF EXISTS `Movie`;
DROP TABLE IF EXISTS `MovieGenre`;
DROP TABLE IF EXISTS `MovieDirector`;
DROP TABLE IF EXISTS `MovieActor`;
#DROP TABLE IF EXISTS `Review`;
DROP TABLE IF EXISTS `MaxPersonID`;
DROP TABLE IF EXISTS `MaxMovieID`;
DROP TABLE IF EXISTS `Actor`;
DROP TABLE IF EXISTS `Director`;
DROP TABLE IF EXISTS `Movie`;
#Director id as primary key
#check the year is greater than 1800, no movies before that
create table Director(id int, last varchar(20), first varchar(20), dob DATE, dod DATE, primary key(id),
check(year>1800))ENGINE=INNODB;

#Movie id as primary key
create table Movie(id int,title varchar(100), year int, rating varchar(10), company varchar(50), primary key(id)  )ENGINE=INNODB;

#Actor id as primary key
#check sex will be only male or female
create table Actor(id int, last varchar(20), first varchar(20), sex varchar(6), dob DATE, dod DATE, primary key(id),
check(sex='Female' or sex='Male'))ENGINE=INNODB;

# foreign key mid to Table Movie
create table MovieGenre(mid int, genre varchar(20), foreign key(mid) references Movie(id) )ENGINE=INNODB;

# foreign key mid, did to Table Movie and Director
create table MovieDirector(mid int, did int, foreign key(mid) references Movie(id)
,foreign key(did) references Director(id) )ENGINE=INNODB;

# foreign key mid, aid to Table Movie and Actor
create table MovieActor(mid int, aid int, role varchar(50),foreign key (mid) references Movie(id),
foreign key (aid) references Actor(id) )ENGINE=INNODB;

#foreign key mid to Table Movie
#check rating is greater than 0
create table Review(name varchar(20), time TIMESTAMP, mid int, rating int, comment varchar(500),
foreign key (mid) references Movie(id),
check(rating>0)
)ENGINE=INNODB;

create table MaxPersonID( id int)ENGINE=INNODB;
create table MaxMovieID(id int)ENGINE=INNODB;
insert into MaxPersonID values(69000);
insert into MaxMovieID values(4750);

