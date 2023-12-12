-- Creazione del database "TennisWebsite": --
CREATE DATABASE Tennis;

-- Utilizzo del database "TennisWebsite" per le successive operazioni: ---
USE Tennis;

-- Creazione della tabella "Utenti": --
CREATE TABLE Utenti (
	ID INT(10) ZEROFILL PRIMARY KEY,
	Nome varchar(20) NOT NULL,
	Cognome varchar(20) NOT NULL,
	Email varchar(319) NOT NULL,
	Password varchar(128) NOT NULL,
	Telefono char(10) NOT NULL,
	Provincia varchar(30) NOT NULL,
	Via varchar(50) NOT NULL,
	Nascita DATE NOT NULL
);

-- Popolamento della tabella "Utenti": --
INSERT INTO Utenti
	VALUES
		(1, "Nathan", "Zanini", "19636@studenti.marconiverona.edu.it", "Password123", "3888284489", "Verona", "Via Udino Bombieri 18/A", "2005-12-12");

/*

---------- ESEMPI DI QUERY TESTATE: ----------

--- Tabella "Utenti": ---

SELECT * FROM Utenti;										-----> Restituisce tutte le righe e le colonne della tabella "Utenti".
SELECT ID FROM Utenti;										-----> Restituisce solo la colonna "ID" (chiave primaria) della tabella "Utenti".
SELECT Nome FROM Utenti;									-----> Restituisce solo la colonna "Nome" della tabella "Utenti".
SELECT Cognome FROM Utenti;									-----> Restituisce solo la colonna "Cognome" della tabella "Utenti".
SELECT Email FROM Utenti;									-----> Restituisce solo la colonna "Email" della tabella "Utenti".
SELECT Password FROM Utenti;								-----> Restituisce solo la colonna "Password" della tabella "Utenti".
SELECT Telefono FROM Utenti;								-----> Restituisce solo la colonna "Telefono" della tabella "Utenti".
SELECT Città FROM Utenti;									-----> Restituisce solo la colonna "Città" della tabella "Utenti".
SELECT Via FROM Utenti;										-----> Restituisce solo la colonna "Via" della tabella "Utenti".
SELECT Nascita FROM Utenti;									-----> Restituisce solo la colonna "Nascita" della tabella "Utenti".

SELECT MAX(ID) FROM Utenti;									-----> Restituisce il numero intero più grande contenuto nella colonna "ID" della tabella "Utenti".
SELECT * FROM Utenti WHERE ID = 1;							-----> Restituisce tutte le colonne dell'unica riga della tabella in cui nel campo "ID" si trova il numero intero 1 (in formato ZEROFILL con 5 cifre, come specificato al momento della creazione della tabella): questa riga è unica nella tabella in quanto l'attributo "ID" è la chiave primaria dell'entità "Utenti", ovvero ne identifica in modo univoco ciascuna istanza.
SELECT * FROM Utenti ORDER BY ID ASC;						-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine crescente in base al numero intero contenuto nel campo "ID" di ciascuna riga.
SELECT * FROM Utenti ORDER BY ID DESC;						-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine decrescente in base al numero intero contenuto nel campo "ID" di ciascuna riga.

SELECT * FROM Utenti WHERE Nome = 'Nathan';					-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Nome" si trova la stringa "Nathan" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Nome ASC;						-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Nome" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Nome DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Nome" di ciascuna riga.

SELECT * FROM Utenti WHERE Cognome = 'Zanini';				-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Cognome" si trova la stringa "Zanini" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Cognome ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Cognome" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Cognome DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Cognome" di ciascuna riga.

SELECT * FROM Utenti WHERE Email = '19636@studenti.marconiverona.edu.it';		-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Email" si trova la stringa "19636@studenti.marconiverona.edu.it" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Email ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Email" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Email DESC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Email" di ciascuna riga.

SELECT * FROM Utenti WHERE Password = 'Password123';		-----> Restituisce tutte le colonne di tutte le righe della tabella in cui nel campo "Password" si trova la stringa "Password123" (nel caso di questo database solo 1 riga, ovvero l'unica).
SELECT * FROM Utenti ORDER BY Password ASC;					-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico in base alla stringa contenuta nel campo "Password" di ciascuna riga.
SELECT * FROM Utenti ORDER BY Password DESC;				-----> Restituisce tutte le righe e le colonne della tabella "Utenti" ordinandole in ordine alfabetico inverso in base alla stringa contenuta nel campo "Password" di ciascuna riga.

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

*/