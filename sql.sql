-- Creazione del database "Tennis":
CREATE DATABASE Tennis;

-- Utilizzo del database "Tennis" per le successive operazioni:
USE Tennis;

-- Creazione della tabella "Utenti" (utile per memorizzare le informazioni relative a tutti gli utenti del sito web):
CREATE TABLE Utenti (
	Email varchar(319) NOT NULL PRIMARY KEY,
	Password varchar(128) NOT NULL,
	Nome varchar(20) NOT NULL,
	Cognome varchar(20) NOT NULL,
	Telefono char(10) NOT NULL,
	Città varchar(30) NOT NULL,
	Via varchar(50) NOT NULL,
	Nascita DATE NOT NULL
);

-- Creazione della tabella "Prodotti" (utile per memorizzare tutti i vari prodotti visualizzabili e salvabili dall'utente nello shop):
CREATE TABLE Prodotti (
	Codice INT(10) ZEROFILL PRIMARY KEY,
	Nome varchar(100) NOT NULL,
	Marca varchar(100) NOT NULL,
	Descrizione varchar(500) NOT NULL,
	Peso float,
	Prezzo float,
	Immagine varchar(100)
);

-- Creazione della tabella "Salvataggi" (utile per tenere traccia dei prodotti dello shop salvati dall'utente):
CREATE TABLE Salvataggi (
	EmailUtente varchar(319),
	CodiceProdotto INT(10) ZEROFILL,
	PRIMARY KEY (EmailUtente, CodiceProdotto)
);

-- Popolamento della tabella "Utenti":
INSERT INTO Utenti
	VALUES
		("19636@studenti.marconiverona.edu.it", "Password123", "Nathan", "Zanini", "3888284489", "Verona", "Via Udino Bombieri 18/A", "2005-12-12"),
		("luca.rossi@gmail.com", "P@ssword123", "Luca", "Rossi", "3125673267", "Roma", "Via Roma 10", "1980-01-10"),
		("sofia.bianchi@gmail.com", "Passw0rd123", "Sofia", "Bianchi", "3432257854", "Milano", "Via Milano 20", "1985-02-20"),
		("marco.russo@gmail.com", "P@ssw0rd123", "Marco", "Russo", "3764218912", "Firenze", "Via Firenze 40", "1990-03-30"),
		("francesco.esposito@gmail.com", "P@6sw0rd123", "Francesco", "Esposito", "3987635521", "Palermo", "Via Palermo 50", "1995-05-20"),
		("valentina.conti@gmail.com", "P@66w0rd123", "Valentina", "Conti", "3987648392", "Torino", "Via Torino 60", "1993-06-30"),
		("alessandro.marini@gmail.com", "P@66w03d123", "Alessandro", "Marini", "3874859212", "Bologna", "Via Bologna 80", "1992-08-20"),
		("elena.gentile@gmail.com", "Password123!", "Elena", "Gentile", "3976543678", "Venezia", "Via Venezia 90", "1997-09-30"),
		("giovanni.caruso@gmail.com", "Password321", "Giovanni", "Caruso", "3566432674", "Cosenza", "Via Cosenza 10", "1997-09-09"),
		("giorgia.ferrari@gmail.com", "Password213", "Giorgia", "Ferrari", "3865930029", "Potenza", "Via Potenza 30", "1992-08-08");

-- Popolamento della tabella "Prodotti":
INSERT INTO Prodotti
	VALUES
		(1, "Racchetta tennis adulto Head CHALLENGE ELITE LITE", "Head", "Questa racchetta è stata ideata per il tennista di livello principiante che cerca una racchetta leggera e confortevole. Leggera, offre una buona maneggevolezza, e il piatto corde grande aiuta ad avere potenza. Un'ottima racchetta per i principianti e coloro che sono alle prime armi!", 260, 9.99, "Images/Products/headRacket.png"),
		(2, "Racchetta tennis adulto Wilson BLADE 101L V8.0 verde-nero", "Wilson", "Questa racchetta è stata ideata per il tennista di livello intermedio che cerca una racchetta polivalente. Venduta incordata, questa racchetta è una versione leggera e con il piatto corde più grande. Mantiene il controllo emblematico della serie Blade, permettendo così di avere più potenza e tolleranza.", 274, 109.99, "Images/Products/wilsonRacket.png"),
		(3, "Racchetta tennis adulto Babolat PURE AERO grigio-giallo", "Babolat", "Questa racchetta è stata ideata per il tennista di livello esperto che cerca presa d'effetto e stabilità. La nuova racchetta da tennis Babolat Pure Aero permette di avere presa d'effetto, potenza e stabilità. Una racchetta performante, l'ideale soprattutto per i praticanti che preferiscono i lift.", 300, 194.99, "Images/Products/babolatRacket.png"),
		(4, "Set 4 palline tennis", "Head PRO", "Il tubo contiene 4 palline. Queste palline sono l'ideale per i giocatori che cercano una pallina performante da competizione per giocare su terreni duri o in terra battuta. La pallina Head Pro è una pallina morbida e confortevole.", 255, 4.99, "Images/Products/headTennisBalls.png"),
		(5, "Set 10 palline tennis", "Wilson", "Il tubo contiene 10 palline. Queste palline sono l'ideale per i giocatori che cercano una pallina performante da competizione per giocare su terreni erbosi naturali o sintetici. La pallina da tennis Wilson è raccomandata per la sua vivacità.", 600, 9.99, "Images/Products/wilsonTennisBalls.png"),
		(6, "Set 20 palline tennis", "Artengo", "Il tubo contiene 20 palline. Queste palline sono l'ideale per i giocatori che cercano una pallina performante da competizione per giocare su terreni duri o in terra battuta. Ottima qualità del rimbalzo, stabilità e controllabilità.", 1225, 19.99, "Images/Products/artengoTennisBalls.png"),
		(7, "Polsini tennis bianchi", "Adidas", "Prodotto ideato per praticare sport con racchetta con tempo caldo. Questo polsino permette il massimo assorbimento del sudore. Evita che il sudore goccioli lungo la mano, migliorando così la presa sulla racchetta.", 50, 9.99, "Images/Products/adidasWhiteCuffs.png"),
		(8, "Polsini tennis adidas neri", "Adidas", "Prodotto ideato per praticare sport con racchetta con tempo caldo. Questo polsino permette il massimo assorbimento del sudore. Evita che il sudore goccioli lungo la mano, migliorando così la presa sulla racchetta.", 40, 7.49, "Images/Products/adidasBlackCuffs.png"),
		(9, "Polsino tennis TP 100 Blu", "Artengo", "Prodotto ideato per giocare a tennis con tempo caldo, adatto anche per altri sport con racchetta. Questo polsino assorbe il sudore sul viso. Pratico, impedisce al sudore di scorrere lungo il braccio, e permette una presa migliore sulla racchetta.", 45, 6.49, "Images/Products/artengoCuffs.png"),
		(10, "Fascia tennis TB 100 Nera", "Adidas", "Prodotto ideato per giocare a tennis con tempo caldo, adatto anche per altri sport. Questa fascia Adidas assorbe e blocca il sudore della fronte, per non avere nessun fastidio mentre si gioca a tennis. Materiale morbido e molto confortevole.", 25, 8.99, "Images/Products/adidasHeadband.png"),
		(11, "Fascia tennis per capelli", "Artengo", "Prodotto sviluppato per permetterti di giocare a tennis senza che i capelli ti diano alcun fastidio. Questa fascia elastica è leggermente assorbente, tiene bene a posto i capelli grazie ai 3 punti in silicone e non scivola mentre giochi.", 80, 3.99, "Images/Products/artengoHeadband.png"),
		(12, "Cappellino Bianco Adulto T58", "Adidas", "Questo prodotto è stato ideato per il tennista che cerca un cappellino che offra una buona protezione solare. Questo cappellino Adidas ti proteggerà dal sole e di darà un grande comfort grazie alla sua leggerezza.", 130, 12.49, "Images/Products/adidasCap.png"),
		(13, "Cappellino tennis T100 Nero", "Artengo", "Questo prodotto è stato ideato per fare sport quando fa caldo, adatto in particolare per il tennis e per gli altri sport con racchetta. Questo cappellino sportivo Artengo è morbido, particolaremente leggero e protegge il viso dal sole. Il tessuto tecnico è traspirante, per rimanere all'asciutto durante la partita.", 100, 5.99, "Images/Products/artengoBlackCap.png"),
		(14, "Cappellino tennis TC 900 bianco-blu T56", "Artengo", "Questo prodotto è stato ideato per il tennista che cerca un cappellino leggero, confortevole e molto tecnico per bloccare ed assorbire il sudore durante l'attività in modo che non goccioli negli occhi. Il cappellino Artengo TC 900, inoltre, protegge il viso dal sole durante il gioco senza dare fastidio.", 125, 10.99, "Images/Products/artengoWhiteBlueCap.png"),
		(15, "Scarpe tennis uomo GEL DEDICATE 8 bianco-azzurro", "Asics", "Scarpe ideali per il tennista di livello intermedio che gioca con spostamenti di intensità moderata. Stabili e confortevoli, offrono un buon sostegno e un ammortizzamento eccellente grazie al Gel Asics e alla suola in schiuma EVA.", 350, 64.99, "Images/Products/asicsShoes.png"),
		(16, "Scarpe tennis uomo SFX3 nere", "Babolat", "Queste scarpe sono state ideate per il tennista di livello intermedio che gioca su qualunque superficie, con spostamenti di intensità moderata. Il comfort e le performance sono la priorità di questo modello, per questo potrai trascorrere ore in campo grazie alla tomaia morbida e traspirante.", 320, 54.99, "Images/Products/babolatShoes.png"),
		(17, "Scarpe tennis uomo COURTJAM CONTROL blu", "Adidas", "Queste scarpe sono state ideate per il tennista di livello intermedio che gioca su qualunque superficie, con spostamenti di intensità moderata. Le scarpe da tennis Adidas CourtJam Control offrono comfort e stabilità grazie alla suola in Bounce e alla tomaia in mesh e TPU e al sistema Torsion.", 375, 69.99, "Images/Products/adidasShoes.png"),
		(18, "Borsa tennis L TEAM 9 racchette nero-azzurro", "Artengo", "I nostri ideatori hanno eco-ideato questa borsa per il giocatore che cerca una borsa di taglia media per trasportare le racchette e l'equipaggiamento da tennis. La borsa da tennis Artengo L TEAM è pratica e leggera. Permette di proteggere e trasportare facilmente le racchette e tutto l'equipaggiamento da tennis.", 1750, 39.99, "Images/Products/artengoBag.png"),
		(19, "Borsone New Tour Endurance 2023", "Tecnifibre", "Questo prodotto offre un ottimo spazio per i vostri spostamenti sul campo. Capienza: 12 racchette. Il materiale del telone è ultraresistente e sono presenti due scomparti ventilati per la biancheria e le scarpe. La struttura confortevole rende la borsa per racchette facile da trasportare.", 2030, 74.99, "Images/Products/tecnifibreBag.png"),
		(20, "Borsa PURE 9 racchette azzurra", "Babolat", "Prodotto ideato per il tennista esperto che cerca una borsa che lo segua nella pratica intensa. La borsa BABOLAT RH PURE azzurra ha diverse tasche, di cui una isotermica, per trasportare fino a 9 racchette. Sono presenti delle tasche ventilate per le scarpe e la biancheria.", 2575, 64.99, "Images/Products/babolatBag.png"),
		(21, "Overgrip tennis COMFORT giallo x3", "Artengo", "I nostri ideatori hanno sviluppato questo prodotto per il tennista che cerca un overgrip confortevole e aderente. Overgrip da tennis facile da aderire sul manico, permettendo un ottimo comfort di gioco. Migliora la presa sulla racchetta da tennis e la ventilazione.", 30, 4.99, "Images/Products/artengoOvergrip.png");

/* Popolamento della tabella "Salvataggi": */
INSERT INTO Salvataggi
	VALUES 
	("19636@studenti.marconiverona.edu.it", 2), ("19636@studenti.marconiverona.edu.it", 6), ("19636@studenti.marconiverona.edu.it", 7), ("19636@studenti.marconiverona.edu.it", 12), ("19636@studenti.marconiverona.edu.it", 15), ("19636@studenti.marconiverona.edu.it", 19),
	("luca.rossi@gmail.com", 1), ("luca.rossi@gmail.com", 5), ("luca.rossi@gmail.com", 8), ("luca.rossi@gmail.com", 11), ("luca.rossi@gmail.com", 14), ("luca.rossi@gmail.com", 18),
	("sofia.bianchi@gmail.com", 3), ("sofia.bianchi@gmail.com", 4), ("sofia.bianchi@gmail.com", 9), ("sofia.bianchi@gmail.com", 10), ("sofia.bianchi@gmail.com", 13), ("sofia.bianchi@gmail.com", 20),
	("marco.russo@gmail.com", 1), ("marco.russo@gmail.com", 5), ("marco.russo@gmail.com", 8), ("marco.russo@gmail.com", 12), ("marco.russo@gmail.com", 13), ("marco.russo@gmail.com", 19),
	("francesco.esposito@gmail.com", 3), ("francesco.esposito@gmail.com", 6), ("francesco.esposito@gmail.com", 7), ("francesco.esposito@gmail.com", 11), ("francesco.esposito@gmail.com", 15), ("francesco.esposito@gmail.com", 20),
	("valentina.conti@gmail.com", 2), ("valentina.conti@gmail.com", 4), ("valentina.conti@gmail.com", 9), ("valentina.conti@gmail.com", 10), ("valentina.conti@gmail.com", 14), ("valentina.conti@gmail.com", 19),
	("alessandro.marini@gmail.com", 2), ("alessandro.marini@gmail.com", 4), ("alessandro.marini@gmail.com", 9), ("alessandro.marini@gmail.com", 11), ("alessandro.marini@gmail.com", 13), ("alessandro.marini@gmail.com", 20),
	("elena.gentile@gmail.com", 1), ("elena.gentile@gmail.com", 5), ("elena.gentile@gmail.com", 8), ("elena.gentile@gmail.com", 11), ("elena.gentile@gmail.com", 14), ("elena.gentile@gmail.com", 18),
	("giovanni.caruso@gmail.com", 3), ("giovanni.caruso@gmail.com", 6), ("giovanni.caruso@gmail.com", 8), ("giovanni.caruso@gmail.com", 12), ("giovanni.caruso@gmail.com", 15), ("giovanni.caruso@gmail.com", 19),
	("giorgia.ferrari@gmail.com", 3), ("giorgia.ferrari@gmail.com", 5), ("giorgia.ferrari@gmail.com", 7), ("giorgia.ferrari@gmail.com", 10), ("giorgia.ferrari@gmail.com", 14), ("giorgia.ferrari@gmail.com", 20)

/*

---------- ESEMPI DI QUERY TESTATE: ----------

--- Tabella "Utenti": ---

SELECT * FROM Utenti;										-----> Restituisce tutte le righe e le colonne della tabella "Utenti".
SELECT Email FROM Utenti;									-----> Restituisce solo la colonna "Email" (chiave primaria) della tabella "Utenti".
SELECT Password FROM Utenti;								-----> Restituisce solo la colonna "Password" della tabella "Utenti".
SELECT Nome FROM Utenti;									-----> Restituisce solo la colonna "Nome" della tabella "Utenti".
SELECT Cognome FROM Utenti;									-----> Restituisce solo la colonna "Cognome" della tabella "Utenti".
SELECT Telefono FROM Utenti;								-----> Restituisce solo la colonna "Telefono" della tabella "Utenti".
SELECT Città FROM Utenti;									-----> Restituisce solo la colonna "Città" della tabella "Utenti".
SELECT Via FROM Utenti;										-----> Restituisce solo la colonna "Via" della tabella "Utenti".
SELECT Nascita FROM Utenti;									-----> Restituisce solo la colonna "Nascita" della tabella "Utenti".

SELECT * FROM Utenti WHERE Email = '19636@studenti.marconiverona.edu.it';		-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Email" si trova la stringa "19636@studenti.marconiverona.edu.it" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Email ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Email" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Email DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Email" di ciascuna riga.

SELECT * FROM Utenti WHERE Password = 'Password123';		-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Password" si trova la stringa "Password123" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Password ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Password" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Password DESC;				-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Password" di ciascuna riga.

SELECT * FROM Utenti WHERE Nome = 'Nathan';					-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Nome" si trova la stringa "Nathan" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Nome ASC;						-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Nome" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Nome DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Nome" di ciascuna riga.

SELECT * FROM Utenti WHERE Cognome = 'Zanini';				-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Cognome" si trova la stringa "Zanini" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Cognome ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Cognome" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Cognome DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Cognome" di ciascuna riga.

SELECT * FROM Utenti WHERE Telefono = '3888284489';			-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Telefono" si trova la stringa "3888284489" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Telefono ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico (in questo caso, poichè la stringa è costituita da numeri, in ordine crescente) in base alla stringa contenuta nel campo "Telefono" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Telefono DESC;				-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso (in questo caso, poichè la stringa è costituita da numeri, in ordine decrescente) in base alla stringa contenuta nel campo "Telefono" di ciascuna riga.

SELECT * FROM Utenti WHERE Città = 'Verona';				-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Città" si trova la stringa "Verona" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Città ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Città" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Città DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Città" di ciascuna riga.

SELECT * FROM Utenti WHERE Via = 'Via Udino Bombieri 18/A';	-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Via" si trova la stringa "Via Udino Bombieri 18/A" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Via ASC;						-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Via" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Via DESC;						-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Via" di ciascuna riga.

SELECT * FROM Utenti WHERE Nascita = '2005-12-12';			-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Nascita" si trova la data "2005-12-12" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Nascita ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine cronologico in base alla data contenuta nel campo "Nascita" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Nascita DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine cronologico inverso in base alla data contenuta nel campo "Nascita" di ciascuna riga.

--- Tabella "Prodotti": ---

SELECT * FROM Prodotti;										-----> Restituisce tutte le righe e le colonne della tabella "Prodotti".
SELECT Codice FROM Prodotti;								-----> Restituisce solo la colonna "Codice" (chiave primaria) della tabella "Prodotti".
SELECT Nome FROM Prodotti;									-----> Restituisce solo la colonna "Nome" della tabella "Prodotti".
SELECT Marca FROM Prodotti;									-----> Restituisce solo la colonna "Marca" della tabella "Prodotti".
SELECT Descrizione FROM Prodotti;							-----> Restituisce solo la colonna "Descrizione" della tabella "Prodotti".
SELECT Peso FROM Prodotti;									-----> Restituisce solo la colonna "Password" della tabella "Prodotti".
SELECT Prezzo FROM Prodotti;								-----> Restituisce solo la colonna "Prezzo" della tabella "Prodotti".

SELECT MAX(Codice) FROM Prodotti;							-----> Restituisce il numero intero più grande contenuto nella colonna "Codice" della tabella "Prodotti".
SELECT * FROM Prodotti WHERE Codice = 1;					-----> Restituisce tutte le colonne dell'unica riga della tabella in cui nel campo "Codice" si trova il numero intero 1 (in formato ZEROFILL con 5 cifre, come specificato al momento della creazione della tabella): questa riga è unica nella tabella in quanto l'attributo "Codice" è la chiave primaria dell'entità "Prodotti", ovvero ne identifica in modo univoco ciascuna istanza.
SELECT * FROM Prodotti ORDER BY Codice ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine crescente in base al numero intero contenuto nel campo "Codice" di ciascuna riga.
SELECT * FROM Prodotti ORDER BY Codice DESC;				-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine decrescente in base al numero intero contenuto nel campo "Codice" di ciascuna riga.

SELECT * FROM Utenti WHERE Nome = 'Racchetta tennis adulto Head CHALLENGE ELITE LITE';					-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Nome" si trova la stringa "Racchetta tennis adulto Head CHALLENGE ELITE LITE" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Nome ASC;						-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Nome" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Nome DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Nome" di ciascuna riga.

SELECT * FROM Utenti WHERE Marca = 'Artengo';				-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Marca" si trova la stringa "Artengo" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Marca ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Marca" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Marca DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Marca" di ciascuna riga.

SELECT * FROM Utenti WHERE Descrizione = 'Ideata per il tennista di livello principiante che cerca una racchetta leggera e con il comfort della grafite! La Head Challenge Elite Lite è leggera ed offre una buona maneggevolezza. Il piatto corde grande aiuta ad avere potenza. Un'ottima racchetta per i principianti!';		-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Descrizione" si trova la stringa "Ideata per il tennista di livello principiante che cerca una racchetta leggera e con il comfort della grafite! La Head Challenge Elite Lite è leggera ed offre una buona maneggevolezza. Il piatto corde grande aiuta ad avere potenza. Un'ottima racchetta per i principianti!" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Descrizione ASC;				-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Descrizione" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Descrizione DESC;				-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Descrizione" di ciascuna riga.

SELECT * FROM Utenti WHERE Peso = 260;						-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Peso" si trova il numero float 260 (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Peso ASC;						-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine crescente in base al numero float contenuto nel campo "Peso" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Peso DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Prodotti" ordinandole in ordine decrescente in base al numero float contenuto nel campo "Peso" di ciascuna riga.

SELECT * FROM Utenti WHERE Prezzo = 9.99;					-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Prezzo" si trova il numero float 9.99 (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Prezzo ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Prezzo" ordinandole in ordine crescente in base al numero float contenuto nel campo "Prezzo" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Prezzo DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Prezzo" ordinandole in ordine decrescente in base al numero float contenuto nel campo "Prezzo" di ciascuna riga.

--- Tabella "Salvataggi": ---

SELECT * FROM Salvataggi;									-----> Restituisce tutte le righe e le colonne della tabella "Salvataggi".
SELECT EmailUtente FROM Salvataggi;							-----> Restituisce solo la colonna "EmailUtente" (una delle due colonne che costituiscono la chiave primaria) della tabella "Salvataggi".
SELECT CodiceProdotto FROM Salvataggi;						-----> Restituisce solo la colonna "CodiceProdotto" (una delle due colonne che costituiscono la chiave primaria) della tabella "Salvataggi".

SELECT * FROM Salvataggi WHERE EmailUtente = '19636@studenti.marconiverona.edu.it';				-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "EmailUtente" si trova la stringa '19636@studenti.marconiverona.edu.it'.
SELECT * FROM Salvataggi ORDER BY EmailUtente ASC;				-----> Restituisce tutte le righe e le colonne della tabella "Salvataggi" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "EmailUtente" di ciascuna riga.
SELECT * FROM Salvataggi ORDER BY EmailUtente DESC;			-----> Restituisce tutte le righe e le colonne della tabella "Salvataggi" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "EmailUtente" di ciascuna riga.

SELECT MAX(CodiceProdotto) FROM Salvataggi;					-----> Restituisce il numero intero più grande contenuto nella colonna "CodiceProdotto" della tabella "Salvataggi".
SELECT * FROM Salvataggi WHERE CodiceProdotto = 1;			-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "CodiceProdotto" si trova il numero intero 1 (in formato ZEROFILL con 5 cifre, come specificato al momento della creazione della tabella).
SELECT * FROM Salvataggi ORDER BY CodiceProdotto ASC;		-----> Restituisce tutte le righe e le colonne della tabella "Salvataggi" ordinandole in ordine crescente in base al numero intero contenuto nel campo "CodiceProdotto" di ciascuna riga.
SELECT * FROM Salvataggi ORDER BY CodiceProdotto DESC;		-----> Restituisce tutte le righe e le colonne della tabella "Salvataggi" ordinandole in ordine decrescente in base al numero intero contenuto nel campo "CodiceProdotto" di ciascuna riga.

*/