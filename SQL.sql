CREATE TABLE Usuarios (
    ID VARCHAR(10) PRIMARY KEY NOT NULL,
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Edad INT NOT NULL,
    Cargo VARCHAR(100) NOT NULL,
    Email VARCHAR(100),
    Usuario VARCHAR(100) NOT NULL,
    Contraseña VARCHAR(50) NOT NULL
);

CREATE TABLE Propuestas (
    IDPropuesta INT PRIMARY KEY NOT NULL,
    Titulo VARCHAR(100) NOT NULL,
    Descripcion VARCHAR(255) NOT NULL,
    IDUsuario VARCHAR(10) NOT NULL,
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(ID)
);

CREATE TABLE Votaciones (
    IDPropuesta INT NOT NULL,
    IDUsuario VARCHAR(10) NOT NULL,
    Voto VARCHAR(50) NOT NULL,
    PRIMARY KEY (IDPropuesta, IDUsuario),
    FOREIGN KEY (IDPropuesta) REFERENCES Propuestas(IDPropuesta),
    FOREIGN KEY (IDUsuario) REFERENCES Usuarios(ID)
);

INSERT INTO usuarios (ID, Nombre, Apellido, Edad, Cargo, Email, Usuario, Contraseña) 
VALUES ('1234567890', 'Pedro', 'Perez', 30, 'Administrador', 'admin@asamblea.com', 'admon', 'admon');