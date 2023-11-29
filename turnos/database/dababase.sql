CREATE DATABASE software_turnos;
USE software_turnos;

CREATE TABLE turnos (
  id                int(255) auto_increment not null,
  turnos            int(255) not null,
  modulo            VARCHAR(255) not null,
  hora              VARCHAR(200) not null,
  fecha             DATE not null,
  prioridad         int(10) not null,
  estado            VARCHAR(100) DEFAULT "En espera",
  tipo_documento    VARCHAR(255) not null,
  numero_documento  int(255) not null,
  CONSTRAINT pk_turnos PRIMARY KEY (id)
)ENGINE==InnoDb;
