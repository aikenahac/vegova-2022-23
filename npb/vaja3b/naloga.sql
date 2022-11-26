-- Vozilo(VoziloID:N, Znamka:A20, Model:A10, OsnovnaCena:N, Letnik:N, Status:A20)
-- Kupec(DavSt:N, ImeKupca:A20, PriimekKupca:A30, NaslovKupca:A30, KrajKupca:A20)
-- Prodajalec (ProdajalecID:N, ImeProdajalca:A20, PriimekProdajalca:A30)
-- Prodaja (VoziloID:NàVozilo, DavST:NàKupec,DatumProdaje:D, ProdajalecID:NàProdajalec, ProcPopusta:N, ProdProvizija:N)
-- a
SELECT
  *
FROM
  Vozilo
WHERE
  znamka = 'BMW'
  AND OsnovnaCena < 50000;

-- b
SELECT
  p.ProdajalecID,
  p.ImeProdajalca AS "Ime",
  p.PriimekProdajalca AS "Priimek",
  COUNT(pr.DatumProdaje) AS "Prodaja leta 2010"
FROM
  Prodajalec p
  LEFT JOIN Prodaja pr ON p.ProdajalecID = pr.ProdajalecID
WHERE
  EXTRACT(
    YEAR
    FROM
      pr.DatumProdaje
  ) = 2010
GROUP BY
  p.ProdajalecID,
  p.ImeProdajalca,
  p.PriimekProdajalca;

-- c
SELECT
  p.ImeProdajalca AS "Ime",
  p.PriimekProdajalca AS "Priimek",
  v.VoziloID,
  v.Znamka,
  v.OsnovnaCena * (100 - prod.ProcPopusta) / 100 + prod.ProdProvizija AS "Koncna Cena"
FROM
  Prodajalec p
  LEFT JOIN Prodaja prod ON p.ProdajalecID = prod.ProdajalecID
  INNER JOIN Vozilo v ON prod.VoziloID = v.VoziloID;

-- d
SELECT
  k.ImeKupca as "Ime",
  k.PriimekKupca AS "Priimek"
FROM
  Kupec k
  LEFT JOIN Prodaja p ON k.DavSt = p.DavSt
  LEFT JOIN Vozilo v ON p.VoziloID = v.VoziloID
WHERE
  v.Znamka LIKE 'Fiat%'
GROUP BY
  k.ImeKupca,
  k.PriimekKupca;

-- e
SELECT
  k.ImeKupca AS "Ime",
  k.PriimekKupca as "Priimek"
FROM
  Kupec k
  INNER JOIN Prodaja p ON k.DavSt = p.DavSt
  INNER JOIN Prodajalec pr ON p.ProdajalecID = pr.ProdajalecID
WHERE
  pr.ImeProdajalca = 'Marjeta'
  AND pr.PriimekProdajalca = 'Pretnar'
GROUP BY
  k.ImeKupca,
  k.PriimekKupca;

-- f
SELECT
  v.VoziloID,
  v.Znamka,
  v.Model,
  k.ImeKupca AS "Ime",
  k.PriimekKupca AS "Priimek"
FROM
  Vozilo v
  INNER JOIN Prodaja p ON p.VoziloID = v.VoziloID
  INNER JOIN Kupec k ON p.DavSt = k.DavSt
WHERE
  v.Letnik = 2010
  AND EXTRACT(
    YEAR
    FROM
      p.DatumProdaje
  ) = 2010;

-- g
SELECT
  *
FROM
  Vozilo v
WHERE
  v.Letnik = 2012
  OR v.Letnik = 2007
  AND v.Status = 'Na zalogi';

-- h
SELECT
  k.KrajKupca,
  COUNT (p.DavSt) AS "Prodaja"
FROM
  Kupec k
  INNER JOIN Prodaja p ON p.DavSt = k.DavSt
GROUP BY
  k.KrajKupca;

-- i
SELECT
  k.ImeKupca AS "Ime",
  k.PriimekKupca AS "Priimek"
FROM
  Kupec k
  JOIN Prodaja p ON p.DavSt = k.DavSt
  INNER JOIN Vozilo v ON v.VoziloID = p.VoziloID
WHERE
  v.Znamka NOT LIKE 'Fiat%';