-- 1. naloga
-- Napišite poizvedbo, ki vse podatke tistih strank, ki so si od 2011 do 2013 izposojali
-- izključno vozila znamke Aston Martin. Ali je to poizvedbo možno napisati tudi brez gnezdenja?
-- Če da, napišite rešitev. Nato s pomočjo orodja gbak izdelajte polno arhivsko kopijo baze.
SELECT s.* FROM Stranka S
INNER JOIN Najem n ON n.EMSO = s.EMSO
INNER JOIN Proizvajalec p ON p.ProizvajalecID = n.ProizvajalecID
WHERE EXTRACT (YEAR FROM n.Datum_najema) BETWEEN 2011 AND 2013
AND p.znamka = 'Aston Martin' AND s.EMSO NOT IN (
  SELECT n.EMSO FROM Najem n
  INNER JOIN Proizvajalec p ON p.ProizvajalecID = n.ProizvajalecID
  AND p.Znamka != 'Aston Martin'
);

-- full backup
gbak -b -user root -password masterkey C:\Users\dijak\downloads\NAJEMVOIZIL.FDB  C:\Users\dijak\downloads\backup.gbk

-- 2. naloga
-- Napišite poizvedbo, ki vrne EMSO, ime in priimek strank, ki so za najeme vozil plačale
-- nadpovprečno veliko. Pri tem se cena najema izračuna po formuli:
-- (Cena_na_dan*Stev_dni)*(1-Popust)+Penali. Poizvedba naj bo implementirana z uporabo pogleda,
-- ki naj vsebuje stavek, ki vrne povprečno vrednost najema. Ustvarite inkrementalno
-- diferencialno kopijo baze, kamor shranite le zadnje spremembe podatkov (pogled).
-- Ali je arhiviranje uspelo? 
CREATE VIEW Povprecna AS
SELECT AVG((Cena_na_dan * Stev_dni) * (1 - Popust) + Penali) AS cena FROM Placilo;

SELECT s.EMSO, s.Ime, s.PRIIMEK
FROM Stranka s
INNER JOIN Placilo p ON s.EMSO = p.EMSO
GROUP BY s.EMSO, s.Ime, s.PRIIMEK
HAVING AVG((p.Cena_na_dan * p.Stev_dni) * (1 - p.Popust) + p.Penali) > (SELECT * FROM Povprecna);

nbackup -u root -password masterkey -b 1 C:\Users\dijak\downloads\NAJEMVOIZIL.FDB  C:\Users\dijak\downloads\backup.nbk

--3. naloga
-- Napišite SQL stavke, ki vse cene najemov vozil, katerih model vsebuje oznako »911«,
-- zmanjšajo za 7%. Zatem ustvarite kumulativno arhivsko kopijo baze in na podlagi vseh
-- arhivskih kopij izvedite restavracijo baze. Ali je operacija uspela?
UPDATE Placilo SET Cena_na_dan = Cena_na_dan * 0.93
WHERE SerStev IN (
  SELECT SerStev FROM Vozilo
  WHERE Model LIKE '%911%';
);

nbackup -u root -password masterkey -b 0 C:\Users\dijak\downloads\NAJEMVOIZIL.FDB  C:\Users\dijak\downloads\backup0.nbk
nbackup -u root -password masterkey -b 1 C:\Users\dijak\downloads\NAJEMVOIZIL.FDB  C:\Users\dijak\downloads\backup1.nbk

nbackup -u root -password masterkey -r C:\Users\dijak\downloads\NAJEMVOIZIL_restavrirano.FDB  C:\Users\dijak\downloads\backup0.nbk C:\Users\dijak\downloads\backup1.nbk

-- 5. naloga
-- Napišite poizvedbo, ki vsem avtorjem, ki pišejo posnetke vseh zvrsti, spremeni njihove
-- priimke v velike črke. Nato še izvedite backup baze, ki bo shranil samo zadnje spremembe
-- (v tabeli avtorjev).
UPDATE avtor SET priimek = UPPER(priimek)
WHERE AvtorID IN (
  SELECT p.AvtorID FROM posnetek p
  GROUP BY p.AvtorID
  HAVING COUNT(DISTINCT p.Genre) = (SELECT COUNT(DISTINCT Genre) FROM posnetek)
);

mysqldump -u root zbirkacd2 > C:\Users\dijak\Downloads\zbirkacd2_arhiv.sql

-- 6. naloga
-- Napišite poizvedbo, ki bo vrnila vse podatke tistih zgoščenk (tabela CD), ki
-- vsebujejo vsaj en posnetek zvrsti pop in vsaj en posnetek zvrsti rock. Ali je
-- to poizvedbo možno napisati tudi brez gnezdenja? Če da, napišite rešitev. 
SELECT DISTINCT c.* FROM cd c
INNER JOIN vsebina v ON c.CDID = v.CDID
INNER JOIN posnetek p ON v.PID = p.PID
WHERE p.Genre = 'pop' AND c.CDID IN (
  SELECT v.CDID FROM vsebina v
  INNER JOIN posnetek p ON p.PID = v.PID
  WHERE p.Genre = 'rock'
);
