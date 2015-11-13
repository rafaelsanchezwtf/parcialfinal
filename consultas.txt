CREATE TABLE parque
	(codigo INT(8) NOT NULL, 
	nombre VARCHAR(30) NOT NULL ,
	municipio VARCHAR(30) NOT NULL CHECK (municipio = "Medellín" OR municipio = "Rionegro" OR municipio = "La Estrella" OR municipio = "Copacabana" OR municipio = "Guatapé"),
	nivel VARCHAR(4) NOT NULL CHECK (nivel = "alto" OR nivel = "bajo"),
	PRIMARY KEY(codigo))
	ENGINE=InnoDB;

CREATE TABLE calificacion(
	id INT(8) NOT NULL AUTO_INCREMENT, 
	fecha DATE NOT NULL,
	calificacion INT(1) NOT NULL CHECK (calificacion = 1 OR calificacion = 2 OR calificacion = 3 OR calificacion = 4 OR calificacion = 5),
	parque INT(8) NOT NULL,
	PRIMARY KEY(id),
	CONSTRAINT c_p FOREIGN KEY (parque) REFERENCES parque (codigo))
	ENGINE=InnoDB;



