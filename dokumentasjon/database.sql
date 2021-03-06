CREATE TABLE LAND (
 land VARCHAR(25) NOT NULL,
 PRIMARY KEY (land));

 CREATE TABLE PLASSERING (
 sted VARCHAR(25) NOT NULL,
 land VARCHAR(25) NOT NULL,
 PRIMARY KEY (sted),
 FOREIGN KEY (land) REFERENCES LAND(land));

  CREATE TABLE HOTELL (
  hotellnavn VARCHAR(40) NOT NULL,
  sted VARCHAR(25) NOT NULL,
  PRIMARY KEY (hotellnavn));

  CREATE TABLE ROMTYPE (
  romtype VARCHAR(20) NOT NULL,
  PRIMARY KEY (romtype));

  CREATE TABLE HOTELLROMTYPE (
    hotellnavn VARCHAr(40) NOT NULL,
    romtype VARCHAr(20) NOT NULL,
    antallrom INT(3) NOT NULL,
  PRIMARY KEY (hotellnavn, romtype),
  FOREIGN KEY (hotellnavn) REFERENCES HOTELL(hotellnavn),
  FOREIGN KEY (romtype) REFERENCES ROMTYPE(romtype));

  CREATE TABLE ROM (
  hotellnavn VARCHAR(25) NOT NULL,
  romtype VARCHAR(15) NOT NULL,
  romnr INT(3) NOT NULL,
  PRIMARY KEY (hotellnavn, romnr),
  FOREIGN KEY (hotellnavn, romtype) REFERENCES HOTELLROMTYPE(hotellnavn, romtype));

  CREATE TABLE ADMIN (
  brukernavn VARCHAR(25) NOT NULL,
  passord VARCHAR(30) NOT NULL,
  PRIMARY KEY (brukernavn));

  CREATE TABLE BESTILLING (
  brukernavn VARCHAR(25) NOT NULL,
  land VARCHAR (29) NOT NULL,
  sted VARCHAR(25) NOT NULL,
  hotellnavn VARCHAR(25) NOT NULL,
  romtype VARCHAR(20) NOT NULL,
  antallrom INT(2) NOT NULL,
  romnr INT(3) NOT NULL,
  datofra DATE NOT NULL,
  datotil DATE NOT NULL,
  PRIMARY KEY (brukernavn, passord));

  CREATE TABLE BRUKER (
  brukernavn VARCHAR(25) NOT NULL,
  passord VARCHAR (25) NOT NULL,
  PRIMARY KEY (brukernavn));

  CREATE TABLE DATO (
  dato DATE NOT NULL,
  PRIMARY KEY (dato));

  CREATE TABLE MILENABESTILLHOTELL (
      brukernavn VARCHAR(25) NOT NULL,
      romtype VARCHAR(15) NOT NULL,
      datoFra DATE,
      datoTil DATE,
      bestillingRegistrert TIMESTAMP,
    PRIMARY KEY (romtype, datoFra, datoTil));
