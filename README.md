This is a project for learning purposes to which I have added following features step by step:
- Connection to the database by means of PDO
- CRUD methods
- Routing through Logger PHP library
- input filtering with JavaScript


############################

PHP-Übung 25
Aufgabenstellung

Es geht um die Entwicklung einer dynamischen Website. Aufgrund von Benutzerangaben in einem Formular, werden dessen Werte in einem aufgerufenen PHP-Skript ausgewertet und auf einer neuen Seite angezeigt.

Für einen Autofahrer sollen nach Angabe der Kraftstoffart (Diesel, Super E10, Super, Super+) die Tankvorgänge (1-4) eines Monats mit Tankmenge in Litern und Zahlbeträgen in Euro in einem Formular erfasst werden.

Variante: Zusätzlich Auswahl eines Tankmonats (Januar-Dezember) und indizierte Eingabefelder für Menge und Zahlbetrag.

Mit der Schaltfläche "absenden" sollen diese Angaben an ein vorbereitetes PHP-Programm gesendet und ausgewertet werden.

Variante: Zwei Absende-Schaltflächen: Berechnen ohne MwSt-Ausweis und Berechnen und MwSt-Ausweis (enthaltene MwSt)

Auswertung: Gesamttankmenge, Monatskosten des Tankens, Durchschnittspreis je Liter. Falls für einen Tankvorgang entweder Tankmenge oder Zahlbetrag nicht angegeben werden. soll eine erneute Wertangabe angefordert werden (Prüfung in php-Datei!)

Ausgabevarianten:

1. Anzeige von Aussagesätzen

Ihre Kraftstoffrechnung
Ihre Kraftstoffkosten im Monat betragen für 115 Liter Super+ 162.67 €
Durchschnittlich beträgt der Preis für Super+ 1.41 €/l

2. Darstellung in einer Tabelle mit grafischer Aufwertung durch Bilder (PKW, Zapfsäule)

Eingesetzte PHP-Elemente: Einlesen der Formulardaten mit for-Schleife in eine Feldvariable, Prüfung auf Eingabefehler mit empty, If-Else Abfragen, Maskierung von Tabellenfunktionen, format_number

3. Darstellung wie unter 2. mit Erweiterung auf Tankmonat und Auswertungsschleifen für indizierte Variable, bei Eingabefehlern, die im php-Skript geprüft werden, soll ein Link zum Rücksprung auf das Eingabeformualr gesetzt werden
