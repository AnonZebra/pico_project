---
Title: Kmom 1
Description: Kursmoment 1
Intro: Tagga till med Gittan
Template: kmom
Wrapclass: kmom
---

# Kursmoment 1
Notera att jag för [github-taggar](https://github.com/AnonZebra/pico_project/releases) använder namngivningssystem enligt '0.1.0' för kmom01, '0.2.0' för kmom02, osv upp till kmom06 då "1.0.0" används. Det känns naturligare för mig eftersom det inte riktigt är en färdig sida än och versionen vid kmom06 borde bättre motsvara den punkten.

## Har du jobbat med ramverk eller andra CMS:er tidigare?
Jag har använt ramverket Django, ett Pythonpaket. Bland annat så har jag byggt ihop sidan [datalowe.com](https://datalowe.com) med Django via en VPS på Linode som servar sidan med Apache (jag följde en guide som höll min hand ganska mycket). Annars har jag mest knåpat på egen hörna med Django för att lära mig, utan att det kommit ut i världen.
Vad gäller CMS så har jag mindre erfarenhet, även om jag likt många andra använt Wordpress, men då utan att ge mig in i kodningsbiten alls. Jag hjälpte till med att ta fram material och myntade bl a titeln för sidan [Homenauts](http://homenauts.com/). Det var kul först men sen övergav jag det, kort sagt pga tidsbrist och skillnader inom teamet vad gällde mål/avsikt med att engagera sig i projektet.

## Det blev en del nya verktyg och tekniker i labbmiljön och för att jobba med portfolio-sidan, är du bekant med någon av dem sedan tidigare?
Markdown har jag använt tidigare, bland annat så är det så jag skriver artiklar på min egen blogg, och jag har använt det flitigt på Discourse-forum och i Jupyter Lab/Notebook. Jag är också van vid template languages eftersom Django använder ett templatesystem som är väldigt likt twig, det bygger på Jinja2 som från början utvecklades av samma person som tog fram twig, om jag förstått rätt. Composer och Pico har jag inte alls använt tidigare och det är mycket av det som jag ännu inte förstår. Det var lite svårt att veta när jag läste er guide hur mycket jag skulle försöka sätta mig in i och förstå, respektive vad jag skulle lämna tills senare.

## Har du några förutfattade meningar, eller kanske etablerad övertygelse, inom design och användbarhet för webben?
Mest att jag inte är särskilt bra på det kanske. Annars försöker jag vara ganska pragmatisk, det är viktigt att det ser fint ut så att folk inte skräms bort, samtidigt som det inte ska komma i vägen för användbarheten (och helst ska ju det visuellt tilltalande och användbarheten stärka varandra). Min bloggsida (datalowe.com) är egentligen inte så bra sett till någotdera i nuläget, bland annat så har jag gjort så att navbaren i toppen inte är så uppenbar/inte funkar ifall man har slagit av javascript. Antagligen kommer jag att byta ut upplägget för sidan helt i sinom tid, för att använda Wagtail CMS, ett Django-CMS.

## Hur kändes det att göra din egna layout och styla den? Gick det bra?
Jag visste inte riktigt hur mycket ni ville att jag skulle ändra på. Jag hade redan lagt mycket tid på att gå igenom läromaterialet för kursmomentet, och det lilla som jag gjort med layout tog redan en hel del tid. Jag försökte att använda SMACSS-uppdelningen för CSS genom att dela upp en del av reglerna i moduler, men det är ovant. Jag använde en del av Niklas CSS för hans egna sida, för jag fick intrycket av att jag inte borde göra om allt själv. Det var förvirrande att Niklas guide verkade rekommendera att man skulle kopiera enbart vissa delar av 'index.twig' till sitt eget tema, men i övningen så gavs instruktioner som att man hade börjat med att kopiera hela twig-filen. Till exempel "Uppdatera länken i footern så den länkar till ditt egna Github-repo.", då verkar det som att ni förväntar er att man hade kopierat över HTML-en för elementet med klassen social/font-awesome-innehållet. Men det föreslogs inte i Niklas exempel. Visst att vi ska tänka själva, men när det är **så mycket** nytt på ett enda kursmoment så bidrar de här sakerna till att det tar mycket tid, det blir svårt att hålla reda på allt.

## Vilken är din TIL för detta kmom?
Det är många saker att hålla reda på och sätta sig in i oavsett om man bygger saker från grunden eller använder CMS. Men i många fall är det en stor tidsbesparing att använda CMS, även om det kan vara en brant inlärningskurva i början.
