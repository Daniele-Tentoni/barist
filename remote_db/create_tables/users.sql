create table if not exists users (
  Id int auto_increment not null unique,
  Name varchar(30) not null,
  Surname varchar(30) not null,
  Email varchar(30) not null unique,
  Password varchar(129) not null,
  Sale varchar(100) not null,
  EmailConfirmation boolean default false,
  constraint PK_Users primary key (Id)
);

insert into users values(1, "Daniele", "Tentoni", "daniele.tentoni.1996@gmail.com", "4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a", "", true);

create table if not exists logins (
	Id int auto_increment not null unique,
	UserId int not null,
	LoginDate varchar(30) not null,
	constraint PK_Logins primary key (UserId),
	constraint FK_To_Users foreign key (UserId) references Users(Id)
);

create table if not exists companies (
  Id int auto_increment not null unique,
  Name varchar(30) not null,
  Pass varchar(30) not null,
  constraint PK_Utente primary key (Id)
);

-- Automatically add Circolo Madonna del Fuoco into 
insert into companies values(1, "Circolo Madonna del Fuoco", "1");

create table if not exists companyusers (
	CompanyId int not null,
	UserId int not null,
	constraint PK_CompanyUsers primary key (CompanyId, UserId),
	constraint FK_Cu_To_Companies foreign key (CompanyId) references Companies(Id),
	constraint FK_Cu_To_Users foreign key (UserId) references Users(Id)
);

insert into companyusers values(1, 1);