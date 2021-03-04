create table `videogame`(
`user_id` int(10) not null,
`first_name` varchar(100) not null,
`last_name` varchar(100) not null,
`gender` varchar(100) not null,
`age` int(10) not null,
`platform` varchar(100) not null,
`game_type` varchar(100) not null,
`game_name` varchar(100) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


alter table videogame 
add primary key(`user_id`);

alter table videogame
modify user_id int(10) not null auto_increment, auto_increment=8;

