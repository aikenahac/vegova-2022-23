-- 2.
CONNECT GLASBENAZBIRKA.FDB

-- 3.
SHOW TABLE;

AVTOR                                  CD                             
POSNETEK                               VSEBINA

--
SHOW TABLE AVTOR;

AVTORID                         INTEGER Not Null 
IME                             CHAR(20) Not Null 
PRIIMEK                         CHAR(20) Not Null 
CONSTRAINT INTEG_2:
  Primary key (AVTORID)

--
SHOW TABLE POSNETEK;

PID                             INTEGER Not Null 
NASLOV                          CHAR(30) Not Null 
GENRE                           (ZVRST) CHAR(10) Not Null 
                                check (value in ('pop','rok','klasika','jazz'))
TRAJANJE                        TIME Not Null 
AVTORID                         INTEGER Not Null 
CONSTRAINT INTEG_15:
  Foreign key (AVTORID)    References AVTOR (AVTORID) On Delete No Action
CONSTRAINT INTEG_10:
  Primary key (PID)

--
SHOW TABLE CD;

CDID                            INTEGER Not Null 
NASLOVCD                        CHAR(30) Not Null 
CENA                            NUMERIC(8, 2) Not Null 
OPOMBE                          CHAR(150) Nullable 
LETO                            INTEGER Nullable 
CONSTRAINT INTEG_6:
  Primary key (CDID)

--
SHOW TABLE VSEBINA;

CDID                            INTEGER Not Null 
PID                             INTEGER Not Null 
CONSTRAINT INTEG_17:
  Foreign key (CDID)    References CD (CDID) On Update Cascade On Delete Cascade
CONSTRAINT INTEG_19:
  Foreign key (PID)    References POSNETEK (PID)
CONSTRAINT INTEG_20:
  Primary key (CDID, PID)


-- 4.
ALTER TABLE CD
ADD leto INT;