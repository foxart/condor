-- auto-generated definition
create table users
(
    id         int auto_increment
        primary key,
    email      varchar(64)  not null,
    username   varchar(32)  not null,
    password   varchar(256) not null,
    firstname  varchar(32)  not null,
    lastname   varchar(32)  not null,
    dob        date         not null,
    city       varchar(32)  not null,
    zipcode    varchar(16)  not null,
    address    varchar(64)  not null,
    created_at datetime     not null,
    status     int          not null,
    country    int          not null,
    constraint email_UNIQUE
        unique (email),
    constraint id_UNIQUE
        unique (id),
    constraint username_UNIQUE
        unique (username),
    constraint fk_country
        foreign key (country) references country (id)
            on update cascade,
    constraint fk_status
        foreign key (status) references status (id)
            on update cascade
)
    collate = utf8_unicode_ci;

create index fk_country_idx
    on users (country);

create index fk_status_idx
    on users (status);
