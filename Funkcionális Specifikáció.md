## 1. Áttekintés

A fejlesztett rendszer célja nem más, mint az, hogy a kő-papír-olló játékot kedvelők hamarosan ne csak személyesen, hanem online formában is kipróbálhassák szerencséjüket. Ez nagyban meg fogja könnyíteni a játék emberekhez való eljutását, hiszen az otthon kényelméből egy ingyenes regisztrációt – néhány kattintást – követően már játszhatnak és nyerhetnek is. Fontos megemlíteni, hogy az online játékban – ellentétben a korábbi, személyes jelenlétet igénylő játékkal – néhány kattintással vissza is lehet nézni eddigi aktivitásunkat, statisztikáinkat. A játékot továbbá nem csak regisztrált felhasználók vehetik igénybe, hanem vendégek is, ha valaki mindenféle tét nélkül szeretné élvezni az alkalmazás nyújtotta lehetőségeket.

## 2. Jelenlegi helyzet

Olyan weboldalra merült fel igény, amin kő-papír-olló játékot lehet folytatni. Fontos regisztrációra ösztönözzük a felhasználókat, ezért regisztrációval elérhetők lesznek bizonyos funkciók is, mint például az adott játékos előző játszmáiról készült különböző statisztikák. Emellett viszont fontosnak tartja az ügyfél, hogy bárki számára könnyen elérhető legyen maga a játék, ezért külön regisztráció nélkül megközelíthető játékfelületet fogunk kialakítani a weboldalon.

## 3. Követelménylista

- K01 Könnyen átlátható felület
- K02 Eszközfüggetlen design
- K03 Weblap struktúrája
    - A homepage a bejelentkező oldal. Innen el tudunk jutni a további oldalakra (regisztrációs, játék oldal, statisztika oldal)
    - Regtisztrációs oldal
    - Játék oldal: Itt tud kő-papír-ollót játszani a felhasználó gépi játékos ellen.
    - Statisztika oldal (regisztrált felhasználóknak)
- K04 Jogosultsági rendszer, 3 szint:
    -1. Moderátor: ???
    -2. Regisztrált felhasználó: A saját játékainak statisztikáit vissza tudja nézni.
    -3. Vendég felhasználó: Regisztráció nélkül igénybe veheti a játékot.
    
## 4. Forgatókönyvek

  A homepage-en egy bejelentkezési felületen keresztül a regisztrált felhasználó át tud jutni a játékoldalra, ahol egyrészt tud játszani, márészt onnan el tud jutni a saját statisztikáit tároló oldalra.
  Ha egy vendégfelhasználó érkezik a homepage-re, akkor regisztrálhat. A regisztrációs gomb segítségével átirányítjuk a regisztrációs oldalra, ahol egy form kitöltése után már bejelentkezettnek tekinthető a felhasználó, így a játékoldalra jut.
  Ha a vendégfelhasználó nem szeretne regisztrálni, akkor egyből eljuthat a játékoldalra is, azonban az ő statisztikái nem lesznek elmentve.
  A játék oldalon a kő, papír, illetve olló kiválasztása gombok segítségével törtnéik, majd a kiválasztott gomb lenyomása után a gép is véletlenszerűen választ a kő, papír és olló közül. Így zajlik egy játék. Regisztrált felhasználó eseteén minden kör után az újabb játék adataival bővül a statisztikája.
  
  ## 5. Megfeleltetés
  
  A három jogosultsági szintet implementáljuk. A kezdőoldal a bejelentkező oldal lesz, ahol az admin, illetve a már regisztrált felhasználó be tud lépni a profiljába, a vendég innen át tud jutni a játék oldalra, illetve a regisztrációs oldalra is, ahol átléphet regisztrált felhastnálói státuszba. Az admin hozzáfér minden felhasználó minden adatához, a regisztrált felhasználó csak a saját adataihoz, a vendég csak a játékhoz.
Az egyes oldalak között gombok segítségével közlekedhetünk, figyelembe véve az aktuális felhasználó jogosultásgi szintjét.
  
  ## 6. Használati esetek 
-Admin: korlátlan hozzáférése van minden beosztott jogosultságához, adatok törlése/módosítása, jelszavak módosítása

-Felhasználó:  Rendeltetésszerűen használja az oldalt, regisztrál, játszik, statisztikáját megtekintheti, kijelentkezhet, törölheti  fiókját.

-Vendég: Adatrögzítés nélkül, bejelentkezés nélkül játszhat. Később tud regisztrálni is akár.
 
  ## 7.  Jelenlegi üzleti folyamatok
  
A megbízó bevétel jelenleg a személyes szerencsejátékokból nyerik bevételüket. A megrendelést megelőző vírus időszak okozta korlátozások és bizonytalanság jelentős bevétel kiesést okozott az ügyfélnek. Az internet biztosította lehetőségeket ki szeretnék használni a bevételforrásuk bővítésére.  Valamint a számukra külső tényezőktől is függetlenedni szeretnének, ezért azzal a feladattal bíznak meg minket, hogy egy egyszerű „szerencsejáték” online megvalósítását hajtsuk végre. Ezzel is elősegítve az online szerencsejátékokra való igény felmérését.

  ## 8. Igényelt üzleti folyamatok
  
Egyszerű, de később bővíthető „webes játék” lenne a céljuk, ami mintájára később bonyolultabb játékokat is készülhetnek. A kő-papír-olló játék nem feltétlenül lenne egyelőre egy nyereséges projekt. Egy összefoglaló pénzrendszer kialakítása még a későbbiekben lesz megvalósítva. A jövőben az is céljuk, hogy kialakuljon egy érmerendszer a játékoknak, de az első lépésekben a felhasználók számára még díj és nyereség nélkül zajlana a játékmenet. Későbbiekben a bevételt a játékosok által nyújtott nevezési díj, valamint az oldalon esetlegesen megjelenő reklámok képeznék.





  
## 9. Fogalomszótár

- Implementálás: Megvalósítás
