CREATE TABLE usuarios (
    id VARCHAR(10) PRIMARY KEY NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    usuario VARCHAR(100) NOT NULL,
    contraseña VARCHAR(50) NOT NULL
);

CREATE TABLE asambleas (
    idasamblea INT PRIMARY KEY NOT NULL,
    tema VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    estado VARCHAR(100) NOT NULL
);

CREATE TABLE propuestas (
    idpropuesta INT(5)PRIMARY KEY NOT NULL,
    idasamblea INT(5) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    idusuario VARCHAR(10) NOT NULL,
    votos INT NOT NULL,
    FOREIGN KEY (idasamblea) REFERENCES asambleas(idasamblea),
    FOREIGN KEY (idusuario) REFERENCES usuarios(id)
);

CREATE TABLE votaciones (
    idpropuesta INT(5) NOT NULL,
    idvotante VARCHAR(10) NOT NULL,
    PRIMARY KEY (idpropuesta, idvotante),
    FOREIGN KEY (idpropuesta) REFERENCES propuestas(idpropuesta),
    FOREIGN KEY (idvotante) REFERENCES usuarios(id)
);

INSERT INTO usuarios (ID, Nombre, Apellido, Edad, Cargo, Email, Usuario, Contraseña) 
VALUES ('1234567890', 'Pedro', 'Perez', 30, 'Administrador', 'admin@asamblea.com', 'admon', 'admon');