-- auto-generated definition
create table country
(
    id   int auto_increment
        primary key,
    name varchar(64) not null,
    code varchar(4)  not null,
    constraint id_UNIQUE
        unique (id)
)
    collate = utf8_unicode_ci;
