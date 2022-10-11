-- 1.	Kreirajte PB GlasbenaZbirka.fdb. 
CREATE DATABASE GlasbenaZbirka.fdb;

-- 2.	Kreirajte domeno Zvrst. Dovoljene vrednosti so: pop, rok, klasika in jazz.
CREATE DOMAIN Zvrst VARCHAR(7) NOT NULL CHECK (VALUE IN ('klasika', 'pop', 'rock', 'jazz'));

-- 3. Kreirajte naslednje tabele:
--      - Avtor(AvtorID:N, Ime:A20, Priimek:A20)
--      - Posnetek (PID:N, Naslov:A30, Genre:Zvrst, Trajanje:D, AvtorID:NàAvtor)
--      - CD (CDID:N, NaslovCD:A30, Cena:N,Opombeo:A150, lastnik:N->Lastnik)
--      - Vsebina (CDID:NàCD,PID:NàPosnetek)
--      - Lastnik (LID:N, Ime:A20, Priimek:A20, Tel:A20, eMail:A30)

CREATE TABLE Avtor (
    AvtorID INTEGER NOT NULL,
    Ime VARCHAR(20) NOT NULL,
    Priimek VARCHAR(20) NOT NULL,
    PRIMARY KEY (AvtorID)
);

CREATE TABLE Posnetek (
    PID INTEGER NOT NULL,
    Naslov VARCHAR(30) NOT NULL,
    Genre Zvrst NOT NULL,
    Trajanje DOUBLE PRECISION NOT NULL,
    AvtorID INTEGER NOT NULL,
    PRIMARY KEY (PID),
    FOREIGN KEY (AvtorID) REFERENCES Avtor(AvtorID)
);

CREATE TABLE CD (
    CDID INTEGER NOT NULL,
    NaslovCD VARCHAR(30) NOT NULL,
    Cena DOUBLE PRECISION NOT NULL,
    Opombe VARCHAR(150),
    lastnik INTEGER NOT NULL,
    PRIMARY KEY (CDID),
    FOREIGN KEY (lastnik) REFERENCES Lastnik(LID)
);

CREATE TABLE Vsebina (
    CDID INTEGER NOT NULL,
    PID INTEGER NOT NULL,
    PRIMARY KEY (CDID, PID),
    FOREIGN KEY (CDID) REFERENCES CD(CDID),
    FOREIGN KEY (PID) REFERENCES Posnetek(PID)
);

CREATE TABLE Lastnik (
    LID INTEGER NOT NULL,
    Ime VARCHAR(20) NOT NULL,
    Priimek VARCHAR(20) NOT NULL,
    Tel VARCHAR(20) NOT NULL,
    eMail VARCHAR(30) NOT NULL,
    PRIMARY KEY (LID)
);

-- 4. Izpišite seznam tabel.
