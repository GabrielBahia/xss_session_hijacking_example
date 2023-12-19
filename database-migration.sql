CREATE DATABASE xss_teste;

USE xss_teste;

CREATE TABLE usuarios (
  id int NOT NULL AUTO_INCREMENT,
	nome varchar(255),
  email varchar(255),
  senha varchar(255),
  imagem_url varchar(255),
  access_token varchar(255),
  is_admin bool,
  PRIMARY KEY (id)
);

INSERT INTO usuarios (nome, email, senha, imagem_url, access_token, is_admin)
VALUES (
  "Admin",
  "admin@admin.com",
  "admin",
  "https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=0.752xw:1.00xh;0.175xw,0&resize=1200:*",
	NULL,
  true
);

