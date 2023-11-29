CREATE TABLE empleados (
  empleado_id       int(255) auto_increment not null,
  nombre            VARCHAR(255) not null,
  apellidos         VARCHAR(255) not null,
  email             VARCHAR(255) not null,
  password          VARCHAR(255) not null,
  CONSTRAINT pk_empleados PRIMARY KEY (empleado_id),
  CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;
