
<<<<<<< HEAD
CREATE TABLE STED (
sted VARCHAR(25) NOT NULL,
PRIMARY KEY (sted));

CREATE TABLE HOTELL (
=======
  CREATE TABLE HOTELL (
>>>>>>> 6b21848d33aac32163f1018f9c8e510312738a41
  hotellnavn VARCHAR(40) NOT NULL,
  sted VARCHAR(25) NOT NULL,
  PRIMARY KEY (hotellnavn),
  FOREIGN KEY (sted) REFERENCES STED(sted));

  CREATE TABLE ROMTYPE (
  romtype VARCHAR(20) NOT NULL,
  PRIMARY KEY (romtype));

  CREATE TABLE HOTELLROMTYPE (
  hotellnavn VARCHAR(40) NOT NULL,
  romtype VARCHAR(20) NOT NULL,
  antallrom INT(3) NOT NULL,
  PRIMARY KEY (hotellnavn, romtype),
  FOREIGN KEY (hotellnavn) REFERENCES hotell(hotellnavn),
  FOREIGN KEY (romtype) REFERENCES romtype(romtype));

  CREATE TABLE ROM (
  hotellnavn VARCHAR(25) NOT NULL,
  romtype VARCHAR(15) NOT NULL,
  romnr INT(3) NOT NULL,
  PRIMARY KEY (hotellnavn, romnr),
  FOREIGN KEY (hotellnavn, romtype) REFERENCES hotellromtype(hotellnavn, romtype));

  CREATE TABLE ADMIN (
  brukernavn VARCHAR(25) NOT NULL,
<<<<<<< HEAD
  passord VARCHAR(30) NOT NULL));
=======
  passord VARCHAR(30) NOT NULL,
  PRIMARY KEY (brukernavn))

  CREATE TABLE STED (
  sted VARCHAR(25) NOT NULL,
  PRIMARY KEY (sted));

  CREATE TABLE KUNDE (
  brukernavn VARCHAR(25) NOT NULL,
  passord VARCHAR(25) NOT NULL,
  sted VARCHAR(25) NOT NULL,
  hotellnavn VARCHAR(25) NOT NULL,
  romtype VARCHAR(20) NOT NULL,
  antallrom INT(2) NOT NULL,
  dato DATE,
  PRIMARY KEY (brukernavn, passord));

  CREATE TABLE bruker (
  brukernavn VARCHAR(25) NOT NULL,
  passord VARCHAR (25) NOT NULL,
  PRIMARY KEY (brukernavn));
>>>>>>> 6b21848d33aac32163f1018f9c8e510312738a41
