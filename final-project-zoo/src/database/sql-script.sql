# User Table

create table users
(
	id int auto_increment,
	full_name varchar(50) not null,
	username varchar(50) not null,
	email varchar(50) not null,
	password varchar(50) not null,
	role varchar(50) default 'USER' null,
	constraint users_pk
		primary key (id)
);

create unique index users_email_uindex
	on users (email);

create unique index users_username_uindex
	on users (username);


# News Table
create table news
(
	id int auto_increment,
	title varchar(255) not null,
	content varchar(510) not null,
	image varchar(255) null,
	created_on timestamp default CURRENT_TIMESTAMP not null,
	updated_on timestamp ON UPDATE CURRENT_TIMESTAMP not null,
	created_by int not null,
	updated_by int not null,
	primary key(id)
);

alter table news
	add constraint news_users_id_fk_1
		foreign key (updated_by) references users (id);

alter table news
	add constraint news_users_id_fk_2
		foreign key (created_by) references users (id);


# Species Table
create table species
(
	id int auto_increment,
	type varchar(50) not null,
	description varchar(510) not null,
	image varchar(255) null,
	primary key(id)
);

create unique index species_id_uindex
	on species (id);

create unique index species_type_uindex
	on species (type);



# Population Table
create table population
(
	id int auto_increment,
	name varchar(50) not null,
	image varchar(100) null,
	specie int not null,
	length varchar(50) not null,
	weight varchar(50) not null,
	distribution varchar(100) not null,
	living_place varchar(100) not null,
	diet varchar(100) not null,
	status varchar(100) not null,
	description varchar(510) null,
	created_on timestamp default CURRENT_TIMESTAMP not null,
	updated_on timestamp ON UPDATE CURRENT_TIMESTAMP not null,
	created_by int not null,
	updated_by int not null,
	primary key(id),
	constraint population_species_id_fk
		foreign key (specie) references species (id),
	constraint population_users_id_fk
		foreign key (created_by) references users (id),
	constraint population_users_id_fk_2
		foreign key (updated_by) references users (id)
);

create unique index population_id_uindex
	on population (id);

create unique index population_name_uindex
	on population (name);



