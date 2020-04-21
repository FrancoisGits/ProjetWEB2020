# Connect Life schema MPD
# 4 tables : Clients_GUID, Clients, Localisations, Societes

CREATE DATABASE IF NOT EXISTS connect_life;
USE connect_life;

CREATE TABLE IF NOT EXISTS Localisations
(
    idVille         int(10)         auto_increment primary key,
    codePostal      int(5)          not null,
    nomVille        varchar(50)     not null
);

CREATE TABLE IF NOT EXISTS Societes
(
    idSociete  int(10)      auto_increment primary key,
    nomSociete varchar(75)  not null
);

CREATE TABLE IF NOT EXISTS Clients
(
    idClient        int             auto_increment primary key,
    civilite        tinyint(1)      not null,
    nom             varchar(100)    not null,
    prenom          varchar(100)    not null,
    idSocieteCli    int(10)         null,
    fonctionSociete varchar(25)     null,
    adresse1        varchar(200)    not null,
    adresse2        varchar(200)    null,
    idVille         int(10)         not null,
    telephone1      varchar(12)     null,
    telephone2      varchar(12)     null,
    email           varchar(100)    not null,
    constraint FK_ID_SOCIETE
        foreign key (idSocieteCli) references societes (idSociete)
            on update cascade,
    constraint FK_ID_VILLE
        foreign key (idVille) references localisations (idVille)
            on update cascade
);

CREATE TABLE IF NOT EXISTS Clients_Guid
(
    id        int           auto_increment primary key,
    guid      varchar(36)   not null,
    nom       varchar(100)  null,
    email      varchar(100) null,
    isSociete tinyint(1)    null
);