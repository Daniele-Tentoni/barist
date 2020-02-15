create table if not exists timesheets (
	Id int auto_increment not null unique,
	UserId int,
	Hour time not null,
	DateTimesheet date not null,
	Mansion varchar(100),
	constraint PK_Timesheets primary key (Id),
	constraint FK_ts_to_users foreign key (UserId) references users(Id)
);