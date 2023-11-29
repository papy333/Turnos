CREATE DATABASE curn_turnos;
USE curn_turnos;

CREATE TABLE user (
  id        int(255) auto_increment not null,
  turno     int(255) not null,
  modulo    VARCHAR(100) not null,
  hora      VARCHAR(250) null,
  fecha     date null,
  prioridad int(100),
  estado    VARCHAR(20) DEFAULT "En espera",
  tipo_documento  VARCHAR(100) not null,
  numero_documento int(255) not null
  CONSTRAINT pk_usuarios PRIMARY KEY (id),
  CONSTRAINT uq_turno UNIQUE(turno)
)ENGINE=InnoDb;

CREATE TABLE usuarios (
id                 int(255) auto_increment not null,
tipo_documento     VARCHAR(100) not null,
identificacion     int(255) not null,
tipo_cliente       VARCHAR(255) not null,
modulo             int(100) not null,
turno              VARCHAR(255) not null,
fecha              VARCHAR(255) not null,
estado             VARCHAR(255) DEFAULT "EN ESPERA",
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT uq_turno UNIQUE(turno)
)ENGINE=InnoDb;

INSERT INTO usuarios(id, tipo_documento, identificacion, tipo_cliente, modulo, turno, fecha) VALUES(null, NOW(),123, 'general', 1, 'A04', now());


CREATE TABLE empleados (
empleado_id     int(255) auto_increment not null,
nombre          VARCHAR(255) not null,
apellidos       VARCHAR(255) not null,
email           VARCHAR(255) not null,
password        VARCHAR(255) not null,
modulo_id       int(255),
CONSTRAINT pk_empleado PRIMARY KEY (empleado_id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;
