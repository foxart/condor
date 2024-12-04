-- auto-generated definition
create table status
(
    id   int auto_increment
        primary key,
    name varchar(16) not null,
    constraint id_UNIQUE
        unique (id)
)
    collate = utf8_unicode_ci;
