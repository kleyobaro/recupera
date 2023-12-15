create table if not exists puntosventa
(
    idpuntoventa        int auto_increment
        primary key,
    nombrefranquicia    varchar(100)                        not null,
    nombrepuntoventa    varchar(100)                        not null,
    pais                varchar(50)                         null,
    ciudad              varchar(50)                         null,
    codigopostal        varchar(15)                         null,
    direccion           varchar(255)                        null,
    telefono            varchar(15)                         null,
    email               varchar(100)                        null,
    responsablenombre   varchar(100)                        null,
    responsabletelefono varchar(15)                         null,
    fecharegistro       timestamp default CURRENT_TIMESTAMP null