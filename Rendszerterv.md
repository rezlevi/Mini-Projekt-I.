
## A rendszer célja
A rendszer célja az, hogy a felhasználó képes legyen webes felületen kő-papír-olló játékot játszani.
Fontos szempont, hogy a felhasználó a rendszert egyszerűen, gördülékenyen tudja használni, így a felület minimalista és jól átlátható kell, hogy legyen.
A rendszerben három jogosultsági szintet kell megkülönböztetni, ezek az admin, a regisztrált felhasználó, illetve a vendég felhasználó szintek. 
Az admin képes törölni a regisztrált felhasználókat, illetve létrehozni profilokat. 
A regisztrált felhasználó a rendszer egészét használhatja, azaz képes játszani, illetve a profilján megtekintheti a korábbi játszmáinak eredményeit, statisztikáit.
A vendég felhasználó ezzel szemben csupán játszhat, azonban a főoldalon megtalálható regisztrációs gomb megnyomása után bármikor elkészítheti saját fiókját, amellyel regisztrált felhasználóvá válhat.
Ezáltal lehetőséget biztosítunk arra, hogy az oldal látogatói először kipróbálhassák a játékot, majd csak ezután döntsenek felhasználói fiókjuk létrehozásáról.


## Projektterv
Projektmunkások, felelősségek:
- Adatbázistervezés, annak létrehozása: Réz Levente János,
- Frontend: 
- Webdesign: 
- Backend: Réz Levente János,
- Tesztelés: 

## Követelmények
 - Funkcionális követelmények
    -  Felhasználók bejelentkezési adatainak tárolása
    -  Vendég felhasználó kezelése
    - Webes környezeten való stabil működés
 - Nem funkcionális működés
    - A vendég felhasználók ne tudjanak statisztikákat megnézni
    - Egy adott felhasználó adatait csak önmaga nézhesse meg
    - Csak az admin férhessen hozzá a felhasználók bejelentkezési adataihoz
 - Törvényi előírások, szabályok
    - A web felület szabványos eszközökkel készüljön, html/php/css
    - Intuitív, átlátható rendszer
    - Autentikáció

## Implementációs terv

A Webes felület főként HTML, CSS, és PHP nyelven fog készülni.
Ezeket a technológiákat amennyire csak lehet külön fájlokba írva készítjük, 
és úgy fogjuk egymáshoz csatolni a jobb átláthatóság,
könnyebb változtathatóság, és könnyebb bővítés érdekében.

## Funkcionális terv
   - Rendszerszereplők
      - Nem regisztrált játékosok
      - Regisztrált játékosok
      - Admin
   - Rendszerhasználati esetek és lefutásaik
      - Admin:
         - Teljesdatbázishoz való hozzáférés
            - Adatbázis módosítása
               - Meccs törlése
               - Felhasználók törlése
               - Felhasználók létrehozása
            - Adatbázis szűrése
               - Felhasználók keresése
               - Játékok keresése
         - Játék használata
      - Nem regisztrált felhasználó
         - Játék használata
         - Regisztrálás
      - Regisztrált felhasználó
         - Játék használata
         - Adatbázishoz való hozzáférés
            - Saját statisztikák megtekintése
         - Felhasználó kezelés
            - Saját felhasználófiókjába való belépés
            - Saját felhasználófiókjából való kilépés
            - Saját felhasználófiók törlése
   - Menü-architektúrák:
      - Bejelentkezés: Felhasználónév, Jelszó
      - Játék: Egérrel történik --- Admin, Regisztrált felhasználó, Nem regisztrált felhasználó
      - Felhasználói műveletek:
         - Statisztika lekérdezése --- Admin, Regisztrált felhasználó
         - Felhasználó regisztrálása --- Nem regisztrált felhasználó
         - Felhasználó törlése --- Admin, Regisztrált felhasználó
         - Adatok módosítása --- Admin


## Adatbázis terv leírása

Az adatbázis két táblát kell, hogy tartalmazzon.
A User tábla a felhasználókat tárolja.
Mezői: Id (egész), Name (szöveg), Password (szöveg), Admin (logikai).
A Statistics tábla a regisztrált felhasználók eredményeit tárolja.
Mezői: Id (egész), UserId (egész), Won (egész), Lost (egész), Draw (egész), Percentage (valós).
A Percentage mező azt tárolja, hogy az adott felhasználó milyen arányban nyeri a játékait.


## Telepítési terv
A weboldal használatához szüksége lesz a felhasználónak egy böngésző használatához
(Opera, Microsoft Edge, Google Chrome, Mozilla Firefox), 
más egyébre nincs szüksége a felhasználónak.

## Tesztterv

Az alkalmazás fejlesztését végigkíséri a folyamatos tesztelés, melyben mindenki részt vesz. 
Minden egyes funkciót tesztelünk közvetlen az implementációt követően, a hibákat azonnal javítjuk.
A fejlesztés végeztével a rendszer egészét teszteljük egyben,
Sikertelen teszt esetén a felmerülő hibákat javítjuk, majd újra teszteljük a rendszer egészét.
Sikeres teszt esetén a fejlesztés ezen szakasza véget ér.

## Karbantartási terv

Az alkalmazás sikeres tesztelését követően két módon folytatódhat a munka:
1) Új igények felmerülése esetén a programot megváltoztathatjuk, bővíthetjük.
2) Lehetőséget biztosítunk az esetlegesen felmerülő hibák bejelentésére.
   Bejelentett hiba esetén a hibát javítjuk, majd ismételten teszteljük a rendszert.


