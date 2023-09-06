-- 1. naloga
-- Napišite poizvedbo, ki vrne vse podatke vozil,  ki so si jih v letih od 2010 do 2012
-- izposojale stranke, katerih priimek se začne na črko T in stranke, katerih priimek se
-- začne na črko A. Ali je to poizvedbo možno napisati tudi brez gnezdenja? 
-- Če da, napišite rešitev. Nato s pomočjo orodja gbak izdelajte polno arhivsko kopijo baze.
SELECT v.* FROM vozila v
INNER JOIN najem n ON v.serstev = n.serstev
INNER JOIN stranka s ON n.emso = s.emso
WHERE EXTRACT(YEAR FROM n.datum_najema) BETWEEN 2010 AND 2012
AND s.priimek LIKE 'A%' AND v.serstev IN (
  SELECT n.serstev FROM najem n
  INNER JOIN stranka s ON s.EMSO = n.EMSO
  WHERE EXTRACT(YEAR FROM n.Datum_najema) BETWEEN 2010 AND 2012
  AND s.priimek LIKE 'T%'
);

gbak -b -user sysdba -password masterkey C:\Users\dijak\Downloads\NAJEMVOZIL.FDB C:\Users\dijak\Downloads\backup.gbk

-- 2. naloga
-- S pomočjo pogleda napišite poizvedbo, ki izpiše tisto leto, ki je bilo za podjetje zelo
-- uspešno. To je leto, ko so si je vozila izposojala velika večina (vsaj 75%) strank. Pogled
-- naj vsebuje poizvedbo, ki vrne skupno število strank. Ustvarite inkrementalno diferencialno
-- kopijo baze, kamor shranite le zadnje spremembe podatkov (pogled). Ali je arhiviranje uspelo? 
CREATE VIEW ststrank AS
SELECT COUNT(*) as st FROM stranka;

SELECT EXTRACT(YEAR FROM n.datum_najema) as leto 
FROM najem n
GROUP BY EXTRACT(YEAR FROM n.datum_najema)
HAVING COUNT(DISTINCT n.emso) >= (
    SELECT st FROM ststrank
) * 0.75;

nbackup -u sysdba -p masterkey -b 1 C:\Users\dijak\Download\NAJEMVOZIL.FDB C:\Users\dijak\Downloads\backup1.nbk

-- 3. naloga
-- Napišite poizvedbo, ki izbriše vse podatke tistih strank, ki so si od 2011 do 2013 izposojali
-- izključno vozila, ki v modelu vsebujejo naziv »GTR«. Ali je to poizvedbo možno napisati tudi
-- brez gnezdenja stavkov SELECT? Če da, napišite rešitev. Nato s pomočjo orodja gbak izdelajte
-- polno arhivsko kopijo baze
DELETE FROM stranka
WHERE emso IN (
    SELECT n.emso FROM najem n
    INNER JOIN vozilo v ON n.serstev = v.serstev
    WHERE EXTRACT(YEAR FROM n.datum_najema) BETWEEN 2011 AND 2013
    AND v.model LIKE '%GTR%'
    AND n.emso NOT IN (
        SELECT n.emso
        FROM najem n
        INNER JOIN vozilo v ON n.serstev = v.serstev
        WHERE v.model NOT LIKE '%GTR%'
        AND EXTRACT(YEAR FROM n.datum_najema) BETWEEN 2011 AND 2013
    )
);

gbak -b -user sysdba -password masterkey ..source ..source_ampak_drug_ime_arhiva

-- 4. naloga
-- Napišite poizvedbo, ki izpiše imena in priimke avtorjev, ki ne ustvarjajo posnetke klasične
-- zvrsti. Ali je to poizvedbo možno napisati tudi brez gnezdenja? Če da, napišite rešitev. Nato
-- še izvedite backup baze, ki bo shranil samo zadnje spremembe (v tabeli avtorjev).
SELECT ime, priimek FROM avtor
WHERE avtorid NOT IN (
    SELECT avtorid
    FROM posnetek 
    WHERE genre = "klasika"
);

mysqldump -u root zbirkacd2 > C:\Users\dijak\Downloads\zbirkacd2_arhiv.sql

-- 5. naloga
-- Napišite SQL stavke, ki bodo brisali vse tiste zgoščenke, ki vsebujejo posnetke daljše
-- od pet minut, v naslovu pa vsebujejo niz »read«. 
DELETE FROM cd
AND cdid IN (
    SELECT v.cdid FROM vsebina v
    INNER JOIN posnetek p ON v.PID = p.PID
    WHERE p.trajanje > 5 * 100
    AND p.naslov LIKE '%read%'
)