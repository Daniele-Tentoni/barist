create table if not exists Users (
  Id int auto_increment not null unique,
  Name varchar(30) not null,
  Surname varchar(30) not null,
  Email varchar(30) not null unique,
  /*Amico boolean not null unique,*/
  Telephone varchar(10) not null,
  Password varchar(100) not null,
  EmailConfirmation boolean default false,
  constraint PK_Utente primary key (Id)
);

create table if not exists Login (
  UserId int not null,
  LoginDate varchar(30) not null,
  constraint PK_Login primary key (UserId)
);
