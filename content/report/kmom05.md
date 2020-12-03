---
Title: Kmom 5
Description: Kursmoment 5
Intro: Placeholder
Wrapclass: kmom
Template: kmom
Filterword: Kursmoment
---

# Kursmoment 5
<div class="gallery-video-container">
    <iframe src="https://www.youtube.com/embed/-kFOXP026eE" frameborder="0" allowfullscreen></iframe>
</div>

## Berätta kort om erfarenheterna med din undersökning av webbplatsers laddningstid och vad du kom fram till.
Jag satte ihop ett skript för att samla data från Google Pagespeed Insights, kolla guiden i "Tutorials->Pagespeed" om ni vill. Jag fick ordna en sak med CSS Grid för att få kodblocket i guiden att fungera som jag ville, jag hade visst missat att sätta `display: grid` i ett av leden ner till kodblocket och då fungerade inte "flexing" riktigt som väntat. I alla fall, det var väntat men ändå nedslående att Karolinska Sjukhusets webbsida misskötts. Jag skickade faktiskt ett mail till info.karolinska@sll.se:

> Hej,
>
> Jag går en kurs i webbdesign på Blekinge Tekniska Högskola just nu. I en uppgift i kursen skulle jag analysera olika webbsajters laddningshastigheter. Jag valde då bland annat karolinska.se. Det visade sig att ni har stora problem när det gäller laddningshastigheter för mobila enheter, och att jag dessutom kunde hitta den mest troliga orsaken och vad som borde vara en relativt enkel lösning på problemet.
>
> Ni kan pröva själva att gå in på Google Pagespeed Insights och slå in en av era sidor, https://developers.google.com/speed/pagespeed/insights/ Om ni där anger någon av era sidor, så kommer ni se att ni för mobila enheter får ett generellt "performance scoore" på strax under 10 av 100. Använd bara inte www.karolinska.se, eftersom det skickar Google Pagespeed till en landningssida där man väljer mellan att gå till er eller KI:s webbsajt, och alltså inte är representativ för er hemsida. Genom att slå in t. ex. http://karolinska.se/for-vardgivare så får jag som svar från Google att sidan ges ett performance score på 6/100, "(very) Poor" för mobilversionen.
>
> Den främsta anledningen till era problem är navigeringsmenyn på höger sida i mobilversionen av hemsidan. Den är väldigt, väldigt "djup", alltså den innehåller undermenyer som i sin tur innehåller undermenyer, som innehåller undermenyer... Navigationsmenyn inkluderar dessutom jättemånga alternativ på flera olika språk, vilket förvärrar problematiken.
>
> Ni kan relativt enkelt förbättra sidan så att laddningstiderna blir mycket bättre, och den nog blir mer lättnavigerad på mobilen på köpet. Det enda som behövs är att navigationsmenyn på mobiler begränsas på liknande sätt som den meny som används på större (laptop osv) skärmar. På större skärmar så finns inga undermenyer, utan man får klicka på ett av alternativen, komma till en ny sida, och sen navigera vidare. Genom att göra om navigationsmenyn på mobilversionen så att den inte heller har undermenyer, alternativt att varje meny bara har en istället för flera undermenyer, så borde en stor del av era problem försvinna. Likadant så är det förstås bättre att inte ha alternativ på olika språk direkt i navigationsmenyn, utan om ni tänker det är hjälpsamt skulle ni kunna ha en tydlig möjlighet för att ändra språkpreferens på hemsidan och först då presenteras specifika språkalternativ, beroende på vilket språk som valts.
>
> Ni kan läsa mer om hur jag gjorde analysen av er webbsajt och se länkade data på sidan för min kursrapport: http://www.student.bth.se/~loal20/dbwebb-kurser/design/me/portfolio/analysis/02_load
>
> Skicka gärna vidare det här mailet till lämplig ansvarig.
>
> Med vänliga hälsningar,
> Lowe Wilsson

Jag misstänker att mailet inte kommer att nå rätt personer, och kanske blir problemet ändå inte löst då det är mycket möjligt att dessa rätt personer skulle be om en ganska saftig betalning för att fixa problemen trots att det troligtvis är de som gjort en stor miss och orsakat problemen till att börja med. Men man kan ändå försöka göra sin del av samhällsnytta, och det var lärorikt att fundera över hur det går att presentera mina fynd.

## Har du några funderingar kring Cimage och dess nytta och features? Vilka bildverktyg använder du själv normalt sett?
Jag valde kanske trots allt för stora bilder till galleriet, jag hade plockat dem direkt från unsplash.com. För när man nu laddar gallerisidan är det väldigt lång laddningstid första gången bilderna ska bearbetas. När de väl har cache:ats i olika format så går det desto snabbare att ladda sidan. 
