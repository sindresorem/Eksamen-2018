CREATE TABLE HOTELL (
  hotellnavn VARCHAR(40) NOT NULL,
  sted VARCHAR(25) NOT NULL,
  PRIMARY KEY (hotellnavn));


  CREATE TABLE ROMTYPE (
    romtype VARCHAR(20) NOT NULL,
  PRIMARY KEY (romtype),

  CREATE TABLE HOTELLROMTYPE (
    hotellnavn VARCHAr(40) NOT NULL,
    romtype VARCHAr(20) NOT NULL,
    antallrom INT(3) NOT NULL,
  PRIMARY KEY (hotellnavn, romtype),
  FOREIGN KEY (hotellnavn) REFERENCES HOTELL(hotellnavn),
  FOREIGN KEY (romtype) REFERENCES ROMTYPE(romtype));
