CREATE TABLE repotenciacion(

    id SERIAL PRIMARY KEY,
    titulo VARCHAR(200),
    descripcion TEXT,
    estado INTEGER, 
    fecha_creacion TIMESTAMP ,
    fecha_fin TIMESTAMP ,
    id_prioridad INTEGER,
    proyecto INTEGER,   

    FOREIGN KEY (id_prioridad)      REFERENCES prioridad (id)   ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (estado)            REFERENCES estado (id)   ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE TABLE asignatario_repotenciacion(
    id_repotenciacion INTEGER,
    usuario VARCHAR(50),
    estatus INTEGER,

    FOREIGN KEY (id_repotenciacion) REFERENCES repotenciacion (id)   ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (usuario)        REFERENCES usuario (usuario)          ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE sub_repotenciacion (

    id SERIAL PRIMARY KEY,
    avances VARCHAR(200),
    fecha_avance TIMESTAMP,
    id_repotenciacion INTEGER,
    estado INTEGER,
    estatus INTEGER,
    usuario VARCHAR(50),

    FOREIGN KEY (usuario)        REFERENCES usuario (usuario)          ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_repotenciacion) REFERENCES repotenciacion (id)   ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE TABLE comentario_subRepotenciacion (

    id SERIAL PRIMARY KEY,
    id_Subrepotenciacion INTEGER,
    id_repotenciacion INTEGER,
    avances TEXT,
    fecha_avance TIMESTAMP,
    estatus INTEGER,

    FOREIGN KEY (id_repotenciacion) REFERENCES repotenciacion (id)   ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_repotenciacion) REFERENCES repotenciacion (id)   ON UPDATE CASCADE ON DELETE CASCADE
);



