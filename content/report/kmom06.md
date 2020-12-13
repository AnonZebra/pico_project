---
Title: Kmom 6
Description: Kursmoment 6
Intro: Google Blighthouse
Wrapclass: kmom
Template: kmom
Filterword: Kursmoment
---

# Kursmoment 6
## Hur känns det att tänka i termer av designelement och designprinciper?
Det är behändigt att ha en summering av de olika principerna till hands, det blir enklare att komma på idéer då och inte missa någon viktig aspekt. Det har tagit lång tid att genomföra det här kursmomentet men när jag inte känt så mycket tidspress har det varit stimulerande att hitta olika sätt att applicera principerna och se hur man kan gå från skisser om hur saker ska se ut till att implementera med Sass mm.

## Finns det något speciellt du vill lyfta fram från uppgiften “Utvärdera designprinciper som webbplatser använder sig av”. Vad tar du med dig från den uppgiften?
Nja jag vet inte om jag har så mycket aha-upplevelser från den egentligen, det var bra att få övning i att tänka utifrån designprinciperna. Det blev tydligt att det finns väldigt olika sätt att ta sig an design och olika nivåer man kan lägga sig på. Det är lätt att gå vilse i alla olika smarta designtricks som man kan syssla med, men i slutändan är det viktigaste inte att imponera på någon - bra design är ofta sådant som inte märks. Som jag nämner i analysuppgiften så tyckte jag det hjälpte också att lyssna på [podcasten Syntax avsnitt om design](https://syntax.fm/show/196/design-foundations-for-developers). De upprepar nästan som ett mantra ordet "subtle", alltså att man för det mesta ska lägga till ganska dämpade effekter eller visuella inslag. Jag försökte tänka på det när jag valde ett mönster att lägga på headern och footern, och det var därför jag la på ganska låg opacity för det. Jag gillade också de länkar, till exempel [inspirationsfilmerna](https://www.youtube.com/watch?v=x1WVvczqfDo&list=PLKtP9l5q3ce-oz7aoBkk-oEn4xzGbtqxU), som ni hade länkat.

## Gjorde du några uppdateringar till din egen sida utifrån vad du kom fram till i analysen?
Ja det gjorde jag, jag har beskrivit det i analysrapporten. Jag har lagt in ett hexagonmönster i header/footer, fixat en mer responsiv navbar med visst djup/rörelse, och gjort galleriet mer responsivt och uniformt. Vad gäller responsiviteten så hade jag hjälp utav [den här codepen-demo:n](https://codepen.io/nxworld/pen/ZYNOBZ), jag använde `transition`-regler för att få mjukare övergångar.

## Har du en uppfattning om “the final touch” och vad det kan vara i sammanhanget webbdesign?
Det känns fortfarande ganska svårt att sätta fingret på. Det finns ju något ordspråk om att "ta handen från tavlan", och det känns ganska svårt att avgöra när det är dags för den biten också när det gäller webbdesign. Men generellt så brukar man väl prata om att se till att optimeringar som gör större skillnad utan alltför höga tidskrav ordnas, köra kontroller just som vi gjort för att säkerställa att man inte missat accessibility-aspekter, lägga på detaljer som får sidan att flöda bättre, mm.

## Vilken är din TIL för detta kmom?
Designprinciper är för alla, och att ha en "cheat sheet" slutar aldrig att vara användbart. I allmänhet så har det blivit mer tilltalande att syssla med design, det blir mer som ett pussel nu där man kan fokusera på olika delar, istället för att man måste få en massa kreativa inslag från ingenstans.

Vad gäller Google Lighthouse så ordnade jag inte 100% på accessibility. Anledningen är att Lighthouse verkar ha problem med att tolka hexagonerna, eller om det är något som förvirrar Lighthouse. Därför bedöms text kontra bakgrundsfärg på hexagonerna inte vara tillräcklig. Jag la väldigt mycket tid på att försöka fixa det här tills jag märkte att Lighthouse sa att kontrasten var OK i navbar:en, men inte i hexagonerna på till exempel den här sidan, trots att kontrasten i de senare är större.

Eftersom det tagit så mycket tid med kursmomentet har jag inte heller lagt mycket energi på att försöka förbättra performance. De främsta problemen är enligt Google att CSS-filerna är alldeles för stora då de inkluderar en massa onödiga saker från särskilt fontawesome, och att typsnittsfilerna inte cache:as. Vi har inte fått verktyg under kursen att lösa de problemen, så jag sparar att lösa de problemen till senare.
