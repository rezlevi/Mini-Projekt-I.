
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

## Üzletifolyamatok modellje
Alapvető weboldalon lehet játszani kő-papír-olló játékot. Hirdetésekből fog elsősorban származni a bevétel ezen az oldalon. Nem maga a játék nyereségességén van a hangsúly, hanem azon hogy ezzel promótálják a későbbi többi internetes szerencsejátékukat, amiken lehet valós pénzzel benevezni tétként. A megrendelőnek az a célja, hogy az tokenekből származó bevétel képezze a nyereséget elsősorban

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

## Fizikai környezet
   - Olyan weboldal készítése a cél, amit később az ügyfél meg tud osztani az interneten különösebb gond nélkül.
      - A weboldalhoz sql alapú adatbázis is tartozik.
   -Fejlesztői eszközök:
      - Visual Studio Code
      - MySQL WorkBench
      - PhpMyAdmin
      - Google Chrome
      - XAMPP
   
## Architekturális terv
   - Alapvetően 4 különböző oldalból álló weblapot hozunk létre (játék oldal, regisztrációs oldal, bejelentkező oldal, statisztika oldal)
      - Regisztrációs oldal: Az oldal látogatója egyszerűen regisztrálhat az oldalra, a felhasználó adatai el lesznek mentve a felhasználók SQL adatbázisba. Később a felhasználó játszmái a játékok SQL táblába lesznek mentve
      - Bejelentkezés oldal: Regisztrált felhasználó, itt be tud jelentkezni, ha szerepelnek a felhasználóadatai a felhasználók SQL táblában
      - Játék oldal: Egyszerű kattintással játszható. Ha a játékos be van jelentkezve, akkor elmenti a játék adatait a játékstatisztika SQL adatbázisba.
      - Statisztika oldal: SQL adatbázishiz kötött oldal, itt az adott felhasználó a saját játszma adataihoz tud hozzáférni. Az admin felhasználó itt minden adathoz hozzáfér.
   - 	Két SQL tábla:
      - Felhasználók tábla: A játékosok belépési adatai lesznek ide elmentve egy id mezővel bővítve (ez a tábla elsődleges kulcsa)
      - Játszák tábla: A felhasználó id mezőjével lesz összekötve (külsős kulcs), meccsek adatai lesznek ide elmentve (meccs kimenetele, fajtája, valamint a játékos id-je)
   - Oldal navigáció:
      Itt reszletezzük, hogy az adott oldalakról megyekre lehet navigálni.
      - BEJELENTKEZÉS oldalról:
         - REGISZTRÁCIÓ oldal
         - JÁTÉK oldal
      - REGISZTRÁCIÓ oldalról:
         - JÁTÉK oldal
         - BEJELENTKEZÉS oldal
      - JÁTÉK oldalról:
         - PROFILOM oldal (regisztrációs oldalra navigál, ha a felhasználó nincs bejelentkezve)
      - PROFILOM oldalról:
         - JÁTÉK oldal
         - BEJELENTKEZÉS oldal (kijelentkezteti a felhasználót)
      


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


