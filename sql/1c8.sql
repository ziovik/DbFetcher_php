drop database if exists Db_1C8;
CREATE DATABASE Db_1C8 CHARACTER SET utf8 COLLATE utf8_general_ci;

use Db_1C8;

drop table if exists _Reference85; # contragent
create table _Reference85 (
      id                              bigint not null unique auto_increment,
      _IDRRef                        text,    #table_id
     _Code                           text,    #1c_code_number
     _Fld1531RRef                    text,    #foreign key reference to 14 _idderf
     _Description                    text,    #name
     _Fld1529                        text,    #full name
     _Fld1524                        text ,   #inn
     _Fld1528                        text,    #kpp
     _Fld1527                        text,    #commentary
     _Fld1526                        text,    #okpo
     _Fld1535                        text,    #pokupatel
     _Fld1536                        text,    #postavshik
     _Fld1540                        text,    #nerezident




     primary key (id)
);


insert into _Reference85 values

(1,1, 8000, 1, 'Смазочные материалы ООО', 'ООО "Смазочные материалы"',3663048027,123344, '', 1123214,0,1,0),
(2,2, 80001,2,'Электром ООО Чебоксары','Электром ООО Чебоксары',2127009463,212701001, '', 1564645,0,0,1),
(3,3, 80002,3, 'Гарантия ООО','ООО "Гарантия"',4632090863,463201001,'' ,16557567,0, 0,1),
(4,4, 80003, 4, 'Книжный сад ЧПТУП','ЧПТУП "Книжный сад"',445534535, 63445645645, 'УНН 490317711',  4535435,0, 1,0),
(5,5, 80004, 5, 'СПЕЦКОММУНТРАНС Коммунальное унитарное предприятие','Коммунальное унитарное предприятие "СПЕЦКОММУНТРАНС"',6546456456,546546747,'УНН 400051849',43535634,1,1,0);


drop table if exists _Reference14;   # bank account
create table _Reference14 (
     id              bigint not null unique auto_increment,
     _Code           text,    #1c_code_number
     _IDRRef         text,    #table_id
     _Description    text,    #name
     _Fld1151        text,    #bank account
     _Fld1152RRef    text ,   #foreign key to _reference13 idrref
     _Fld1154        text,    #correspondent

     primary key (id)
);


insert into _Reference14 values

(1, 1001, 1 ,'Смазочные материалы ООО', 4543534534535,1,'fhfhfghfh'),
(2, 1002, 2, 'Электром ООО Чебоксары',2127009463, 2, 'hjghjgj'),
(3, 1003, 3, 'ООО "Гарантия"',4632090863, 3,'yhgjhgjgj' ),
(4, 1004, 4, 'Книжный сад ЧПТУП',445534535,4, 'ghfhfhf'),
(5, 1005, 5, 'СПЕЦКОММУНТРАНС Коммунальное унитарное предприятие',6546456456,5,'УНН 400051849');


drop table if exists _Reference13;   #name of bank
create table _Reference13 (
      id              bigint not null unique auto_increment,
      _IDRRef         text,    #table_id
      _Code           text,    #bik
      _Description    text,    #name
      _Fld1146        text,    #correspondent bank account
      _Fld1147        text ,   #city
      _Fld1148        text,    #bank address
      _Fld1149        text,    #telephone


      primary key (id)
);


insert into _Reference13 values

(1, 1 , 5645646754, 'Смазочные материалы ООО', 4543534534535,'kursk','fhfhfghfh','fhfhfghfh'),
(2, 2, 456433236,  'Электром ООО Чебоксары',2127009463, 'voronezh', 'hjghjgj','fhfhfghfh'),
(3, 3, 45646456,  'ООО "Гарантия"',4632090863, 'moscow','yhgjhgjgj','fhfhfghfh' ),
(4, 4, 7576576, 'Книжный сад ЧПТУП',445534535,'orel', 'ghfhfhf','fhfhfghfh'),
(5, 5, 2423424,  'СПЕЦКОММУНТРАНС Коммунальное унитарное предприятие',6546456456,'fhfhfghfh','УНН 400051849','fhfhfghfh');

drop table if exists address_types;
create table address_types (
  id              bigint not null unique auto_increment,
  type         text,

  primary key (id)
);


insert into address_types values

(1, 'По паспорту (адрес регистрации)'),
(2,  'Фактический (адрес проживания)'),
(3,   'Иностранный адрес');

drop table if exists countries;
create table countries (
   country_id              bigint not null unique auto_increment,
   country_name         text,


   primary key (country_id)
);


insert into countries values

(1, 'РОССИЯ'),
(2,  'США'),
(3,   'БЕЛАРУС'),
(4,   'УКРАЙНА');

drop table if exists states; #region
create table states (
   state_id              bigint not null unique auto_increment,
   state_name         text,
   country_id          int,
   status              int,


   primary key (state_id)
);


 insert into states values   #region

 (1, 'Курская Область', 1, 1),
 (2,  'Южно- атлант штаты',2, 1),
 (3,   'Чернобуль', 3, 1),
 (4,   'Шахтер', 4, 1),
 (5, 'Воронежская Область', 1, 1);


drop table if exists cities;
create table cities (
 city_id              bigint not null unique auto_increment,
 city_name         text,
 state_id          int,
 status              int,


 primary key (city_id)
);


insert into cities values

(1, 'Курск', 1, 1),
(2,  'Льгов',1, 1),
(3,   'Липеск', 5, 1),
(4,   'Железногорск', 1, 1);

drop table if exists areas;
create table areas (
    area_id              bigint not null unique auto_increment,
    area_name         text,
    state_id          int,
    status              int,


    primary key (area_id)
);


insert into areas values

(1, 'region1', 1, 1),
(2, 'region2', 1, 1),
(3, 'region3', 1, 1),
(4, 'region4', 1, 1),
(5, 'region5', 5, 1),
(6, 'region6', 5, 1),
(7, 'region7', 5, 1),
(8, 'region8', 5, 1);