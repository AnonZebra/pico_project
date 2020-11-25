---
Title: Kmom 2
Description: Kursmoment 2
Intro: Don't give me no Sass, CSS
Wrapclass: kmom
Template: kmom
Filterword: Kursmoment
---

# Kursmoment 2

## Vad tycker du om SASS än så länge?
Det är väldigt nice, framför allt för att jag kan göra saker mer DRY och att jag kan dela upp regler i moduler för att få en bättre överblick. Det blir enklare att navigera och mer tankeutrymme när jag slipper att hålla reda så mycket på vilka regler som finns var.

## Är du bekant med Node, npm eller npm scripts (t.ex. npm run lint) sedan tidigare? Vad anser du om det?
Jag har använt Node ett par gånger tidigare men inte för att göra några egentliga projekt. Arbetssättet med att spara dependencies/requirements samt att köra skript är dock väldigt likt arbetssättet i Python/Django, där man får köra 'pip freeze' för att lagra requirements och 'python manage.py ...' för att utföra olika skript. Jag har svårt att anse något om arbetssättet för det är svårt att ens tänka mig att inte ha det, det känns ganska oumbärligt för större projekt.

## Hur kändes det att kompilera SASS till CSS, var det något du reflekterade över?
Jag fick växla emellan för att se till så att kompileringen fungerade som den skulle, det var några saker jag missförstod/missade först men med 'run style'-kommandot och att söka i den resulterande filen så gick det snabbt med "learning by doing". Det är lite ovant att ha variabler mm som inte egentligen är en string eller liknande, men jag försöker inte tänka för mycket på det utan bara göra och då funkar det rätt bra. För typsnitt laddade jag ner .zip-filer från Google Fonts för Montserrat/Open Sans och la dem i themes/shared/fonts. Sen ordnade jag i mina .scss-filer så att typsnitten laddas direkt från filerna snarare än från Googles API, jag använde CSS:en från Font Awesome som mall. Jag använde mixins för att förenkla den här biten, i övrigt har jag använt variabler, enkel multiplikation och 'extend'-funktionaliteten i Sass.

## Kommentera ditt tema, hur kan man beskriva dess design och hade du några planer på “design” när du byggde ditt tema?
Jag har inte gjort så jättemycket med det eftersom ni skrev att man inte skulle lägga för mycket tid på styling. Jag hade mest fokus på att göra "refactoring" CSS:en jag hade så att det bara var .scss och den var så enkel att jobba med som möjligt. Jag har också sett att planen är att vi ska gå över till att jobba med CSS grid i nästa kmom, så då verkar det dumt att lägga för mycket tid på något som jag sen kommer behöva byta ut/göra om mycket på. Det är lite svårt att tänka på design tycker jag eftersom det inte finns så mycket innehåll på sidan än, och jag har ingen bra inblick i vad som ska tillkomma. Därför är det svårt att avgöra om det till exempel är lämpligt eller inte att ha en sidebar såväl som en navbar i headern. I nuläget så är temat mycket enkelt med grönt som primär färg, gul som sekundär.

## Valde du att dela upp din kod? Vilka uppdelningar valde du att göra?
Jag delade upp .scss-filerna på temanivå och försökte då följa SMACSS rekommendationer någorlunda, mest för att jag annars inte vet riktigt hur jag skulle göra. Det är en svår avvägning att dela upp Sass i fler eller färre moduler, till exempel '_social' är en egen modul trots att det är väldigt lite kod.

## Vilken är din TIL för detta kmom?
Sass är ju ganska lätt att komma in i ändå, jag hade bara hört om det och då fick jag intrycket av att det skulle vara mycket krångligare än det faktiskt är.
