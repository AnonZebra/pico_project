---
Title: Kmom 4
Description: Kursmoment 4
Intro: Color me surprised
Wrapclass: kmom
Template: kmom
Filterword: Kursmoment
---

# Kursmoment 4
**Kommentera kort om skrivuppgiften, något som är värt att nämna från arbetet med den?**

Det var överraskande hur begränsade designs det var för olika sidor. Det blir lätt när man gör en kurs inriktad på design att man behöver använda många olika verktyg för att sätta ihop en intressant och välfungerande sida. Men ofta så gäller förstås "less is more", i linje med vad vi fick läsa om minimalism. Själv så kan jag ha en stark dragning mot minimalism och därför har jag försökt att göra den här sidan lite mer levande med ett triadiskt färgschema och lite olika grepp för att inte bara gå i gamla spår.

**Vilket färgschema valde du till ditt tema och hur valde du att använda färgerna (mer eller mindre eller lika mycket av alla färger)?**

Jag tog ett triadiskt färgschema där jag utgick från den gula och gröna färg jag hade i tidigare versioner, men lät den gröna ändras lite granna. Jag tog användning av Adobes Color Wheel-verktyg som ni hade tipsat om. Eftersom jag ställt in så att variabler används för färgspecifikationer på sidan så blev det enkelt att pröva lite olika färger, och jag kommer att kunna skifta till andra ifall jag skulle vilja det framöver. Jag använder den blågröna färgen som huvudfärg, medan den lila används enbart som accentfärg och den gula används för sekundära element men också som "responsiv" färg då element aktiveras eller svävas över med muspekaren. Det kanske inte är helt kosher, jag tycker det fungerar bra som det är nu men tar gärna emot feedback om färgvalen.

**Hur valde du att lösa ditt dark theme? Gjorde du en kopia på ditt vanliga tema? Eller löste du det med imports?**

Jag använde Sass-funktionen `color-scale` väldigt flitigt. Ni kan se efter i 'themes/datalowe/scss/_dark-variables.scss'. Det här bidrar också till att ifall en skulle vilja byta färger så går det ganska enkelt. Något som är lite krångligare är att jag ändrade en detalj på sidan för mörk/ljust tema, nämligen den dinosaurie som syns på sidan som ger överblick över alla rapporterna. Dinosauriens färg är lila i mörkt tema, gul i ljust. Här måste specifika .svg-filer användas, så som jag gjort. Ifall det finns sätt att ändra .svg-bilders färger med ren CSS, utan att behöva gå in och ändra i själva filen, så ge gärna tips på var jag kan läsa om det.

**Övrigt**

Jag har använt många tekniker i det här kursmomentet. Jag delade upp .twig-filerna i några basfiler som ligger i 'themes/datalowe/base_twigs'. 'base.twig' används till att göra {% extends %} med, så att innehåll kan läggas in i de 'block' som mallen definierat medan resten sköts av basmallen. 'footer'/'header.twig' används till att göra {% include %} med på lämpliga ställen, det var lite olika beroende på sida hur de skulle läggas in. Det är inte så bra design egentligen, det har skett till följd av att jag gjort lösningar med metadata i .md-filerna för att kunna applicera styling. Skulle jag börja om så skulle jag se till att basmallen också kan inkludera header och footer på direkten, så att man inte behöver tänka på det i själva sidornas .twig-filer.

Jag har jobbat med gradients och är nöjd med dem, de gör sidan mer intressant utan att dra åt sig för mycket uppmärksamhet. Det är på de individuella analys/rapport-sidorna som jag använt det här. Kolla på sidebar:en till vänster på stor skärm, det går en gradient från topp till botten. Jag använde här `linear-gradient` tillsammans med `scale-color`. Pröva gärna också att visa de här sidorna i mobilläge i ljust respektive mörkt tema. Där har jag lagt in att det löper en gradient från toppen till botten bakom själva texten. Jag försökte se till att den inte skulle bli för intensiv så att kontrasten mot texten blev för låg, men ge gärna feedback också här.

Jag har prövat att använda Githubs issue tracker för ett par småsaker för att lära mig bättre hur den fungerar. Jag har också försökt att vara mer konsekvent och periodisk i att göra commits av uppdateringar så att det ska gå bättre att beskriva vad som faktiskt ändrats, istället för att ladda upp en hel drös med saker på en gång.

Det är svårare att redovisa, men jag skapade också ett enkelt bash-script för att kunna applicera styling respektive köra linter direkt från den mapp som jag kör `php -S localhost:8000` från när jag testar sidan lokalt. Det här snabbade upp rundturerna med att uppdatera kod i Atom, kontrollera och uppdatera sidans styling, och serva sidan lokalt.

Typsnitten lät jag vara de samma som tidigare. Jag är väldigt nöjd med Montserrat för headers och navigation, den är estetiskt tilltalande och tydlig samtidigt som den inte är tillkonstlad, vilket är bra när det redan händer så mycket med färger och olika designgrepp i övrigt. Men jag märkte i alla fall nu att jag missat att byta ut Helvetica mot Montserrat på flera ställen och fixade det.
