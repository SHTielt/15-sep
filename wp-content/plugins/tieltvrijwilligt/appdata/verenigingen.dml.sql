insert into sh_verenigingen(verNaam, verLocatie, verOmschrijving, verWerkingsGebied, verWebsite, verFacebook, verCustomField, verActief, verWPUserID, rvID) values('de Pionnioers', 'reuzenhuis', 'schaakclub', 'Tielt en omstreken', 'www.de-pionniers.be', NULL, NULL, 1, 101, 6);

USE sociaalhuis;
DROP PROCEDURE IF EXISTS VerenigingInsert;
DELIMITER //
CREATE PROCEDURE VerenigingInsert
(
	OUT pverID INT ,
	IN pverNaam VARCHAR (255) CHARACTER SET UTF8 ,
	IN pverLocatie VARCHAR (255) CHARACTER SET UTF8 ,
	IN pverOmschrijving TEXT (255) CHARACTER SET UTF8 ,
    IN pverWerkingsGebied VARCHAR (255) CHARACTER SET UTF8 ,
	IN pverWebsite VARCHAR (255) CHARACTER SET UTF8 ,
    IN pverFacebook VARCHAR (255) CHARACTER SET UTF8 ,
    IN pverBeschrijving VARCHAR (50) CHARACTER SET UTF8 ,
    IN pverActief TINYINT(1),
    IN pverWPUserID INT ,
    IN prvID INT  
)
BEGIN
	INSERT INTO sh_verenigingen
	(
		verNaam,
        verLocatie,
        verOmschrijving,
        verWerkingsGebied,
        verWebsite,
        verFacebook,
        verBeschrijving,
        verActief,
        verWPUserID,
        rvID
    )
	VALUES
	(
		pverNaam ,
	    pverLocatie ,
	    pverOmschrijving ,
        pverWerkingsGebied,
        pverWebsite,
        pverFacebook,
        pverBeschrijving,
        pverActief,
        pverWPUserID,
        prvID
	);
	SELECT LAST_INSERT_ID() INTO pverID;
END //
DELIMITER ;

call VerenigingInsert(@pverID, 'Blanco', 'Zaal batavia', 'scrabble club', 'Tielt', NULL, NULL, NULL, 1, 105, 6);


USE sociaalhuis;
DROP PROCEDURE IF EXISTS VerenigingUpdate;
DELIMITER //
CREATE PROCEDURE VerenigingUpdate
(
	IN pverID INT ,
	IN pverNaam VARCHAR (255) CHARACTER SET UTF8 ,
	IN pverLocatie VARCHAR (255) CHARACTER SET UTF8 ,
	IN pverOmschrijving TEXT (255) CHARACTER SET UTF8 ,
    IN pverWerkingsGebied VARCHAR (255) CHARACTER SET UTF8 ,
	IN pverWebsite VARCHAR (255) CHARACTER SET UTF8 ,
    IN pverFacebook VARCHAR (255) CHARACTER SET UTF8 ,
    IN pverBeschrijving VARCHAR (50) CHARACTER SET UTF8 ,
    IN pverActief TINYINT(1),
    IN pverWPUserID INT,
    IN prvID INT  
)
BEGIN
UPDATE sh_verenigingen
SET
	verNaam = pverNaam,
	verLocatie = pverLocatie,
    verOmschrijving = pverOmschrijving,
    verWerkingsGebied = pverWerkingsGebied, 
    verWebsite = pverWebsite,
    verFacebook = pverFacebook,
    verBeschrijving = pverBeschrijving,
    verActief = pverActief,
    verWPUserID = pverWPUserID,
    rvID = prvID
WHERE verId = pverId;
END //
DELIMITER ;

call VerenigingUpdate(2, 'Blanco', 'Zaal batavia', 'scrabble club', 'Tielt en omtgeving', NULL, NULL, NULL, 1, 101, 6);
call VerenigingUpdate(1, "De Pionniers", "Reuzenhuis", "Schaakclub, opgericht", "Tielt en omstreken", "www.de-pionniers.be", "w", "Schaakclub", 1, 1, 6);
call VerenigingUpdate(22, 'Petankers', NULL, 'Petanque club opgericht',NULL,NULL, NULL,'Petanque club',1,1,6); 

USE sociaalhuis;
DROP PROCEDURE IF EXISTS `VerenigingDelete`;
DELIMITER //
CREATE PROCEDURE `VerenigingDelete`
(
	IN pId INT
)
BEGIN
DELETE FROM sh_verenigingen WHERE verID = pId;
END //
DELIMITER ;

call verenigingdelete(2);

USE sociaalhuis;
DROP PROCEDURE IF EXISTS VerenigingSelectAll;
DELIMITER //
CREATE PROCEDURE VerenigingSelectAll
(
)
BEGIN
	SELECT * FROM sh_verenigingen order by verNaam;
END //
DELIMITER ;

call Verenigingselectall();




USE sociaalhuis;
DROP PROCEDURE IF EXISTS `VerenigingSelectById`;
DELIMITER //
CREATE PROCEDURE `VerenigingSelectById`
(
	IN pverID INT 
)
BEGIN
	SELECT distinct sh_verenigingen.verID as verID, verNaam, verLocatie, verOmschrijving, verWerkingsGebied, verWebsite, verFacebook, verBeschrijving, verWPUserID, verSlug, verActief, rvID, versecID, secID FROM sh_verenigingen, sh_verenigingsectoren WHERE sh_verenigingen.verID = sh_verenigingsectoren.verID and sh_verenigingen.verID = pverID;
END //
DELIMITER ;

call VerenigingSelectById(86);



USE sociaalhuis;
DROP PROCEDURE IF EXISTS `VerenigingSelectByUserId`;
DELIMITER //
CREATE PROCEDURE `VerenigingSelectByUserId`
(
	IN pverWPUserID INT 
)
BEGIN
	SELECT * FROM sh_verenigingen WHERE pverWPUserID = verWPUserID;
END //
DELIMITER ;

call VerenigingSelectByUserId(52);


USE sociaalhuis;
DROP PROCEDURE IF EXISTS `VerenigingSelectBySlug`;
DELIMITER //
CREATE PROCEDURE `VerenigingSelectBySlug`
(
	IN pverSlug VARCHAR (255) CHARACTER SET UTF8 
)
BEGIN
	SELECT * FROM sh_verenigingen WHERE pverSlug = verSlug;
END //
DELIMITER ;

call VerenigingSelectBySlug('manillers');

USE sociaalhuis;
DROP PROCEDURE IF EXISTS `VerenigingFilter`;
DELIMITER //
CREATE PROCEDURE `VerenigingFilter`
(
	IN pTrefwoord VARCHAR (255) CHARACTER SET UTF8 
)
BEGIN
	SELECT * FROM sh_verenigingen WHERE verNaam LIKE CONCAT('%', pTrefwoord,'%') OR verBeschrijving LIKE CONCAT('%', pTrefwoord,'%') OR verOmschrijving LIKE CONCAT('%', pTrefwoord,'%') order by sh_verenigingen.verNaam;
END //
DELIMITER ;

call VerenigingFilter('ziekenfonds');

