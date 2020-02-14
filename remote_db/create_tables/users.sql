create table if not exists Users (
  Id int auto_increment not null unique,
  Name varchar(30) not null,
  Surname varchar(30) not null,
  Email varchar(30) not null unique,
  Password varchar(100) not null,
  EmailConfirmation boolean default false,
  constraint PK_Users primary key (Id)
);

create table if not exists Logins (
	Id int auto_increment not null unique,
	UserId int not null,
	LoginDate varchar(30) not null,
	constraint PK_Logins primary key (UserId),
	constraint FK_To_Users foreign key (UserId) references Users(Id)
);

create table if not exists Companies (
  Id int auto_increment not null unique,
  Name varchar(30) not null,
  Pass varchar(30) not null,
  constraint PK_Utente primary key (Id)
);

-- Automatically add Circolo Madonna del Fuoco into 
insert into Companies values(1, "Circolo Madonna del Fuoco", "1");

create table if not exists CompanyUsers (
	CompanyId int not null,
	UserId int not null,
	constraint PK_CompanyUsers primary key (CompanyId, UserId),
	constraint FK_Cu_To_Companies foreign key (CompanyId) references Companies(Id),
	constraint FK_Cu_To_Users foreign key (UserId) references Users(Id)
)