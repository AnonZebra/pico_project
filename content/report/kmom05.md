---
Title: Kmom 5
Description: Kursmoment 5
Intro: Hospital blues
Wrapclass: kmom
Template: kmom
Filterword: Kursmoment
---

# Kursmoment 5
<div class="gallery-video-container">
    <iframe src="https://www.youtube.com/embed/-kFOXP026eE" frameborder="0" allowfullscreen></iframe>
</div>

**Berätta kort om erfarenheterna med din undersökning av webbplatsers laddningstid och vad du kom fram till.**

Jag satte ihop ett skript för att samla data från Google Pagespeed Insights, kolla guiden i "Tutorials->Pagespeed" om ni vill. Jag fick ordna en sak med CSS Grid för att få kodblocket i guiden att fungera som jag ville, jag hade visst missat att sätta `display: grid` i ett av leden ner till kodblocket och då fungerade inte "flexing" riktigt som väntat. I alla fall, det var väntat men ändå nedslående att Karolinska Sjukhusets webbsida misskötts. Jag skickade faktiskt ett mail till info.karolinska@sll.se:

<blockquote>
    <p>Hej,</p>

    <p>Jag går en kurs i webbdesign på Blekinge Tekniska Högskola just nu. I en uppgift i kursen skulle jag analysera olika webbsajters laddningshastigheter. Jag valde då bland annat karolinska.se. Det visade sig att ni har stora problem när det gäller laddningshastigheter för mobila enheter, och att jag dessutom kunde hitta den mest troliga orsaken och vad som borde vara en relativt enkel lösning på problemet.</p>

    <p>Ni kan pröva själva att gå in på Google Pagespeed Insights och slå in en av era sidor, https://developers.google.com/speed/pagespeed/insights/ Om ni där anger någon av era sidor, så kommer ni se att ni för mobila enheter får ett generellt "performance scoore" på strax under 10 av 100. Använd bara inte www.karolinska.se, eftersom det skickar Google Pagespeed till en landningssida där man väljer mellan att gå till er eller KI:s webbsajt, och alltså inte är representativ för er hemsida. Genom att slå in t. ex. http://karolinska.se/for-vardgivare så får jag som svar från Google att sidan ges ett performance score på 6/100, "(very) Poor" för mobilversionen.</p>

    <p>Den främsta anledningen till era problem är navigeringsmenyn på höger sida i mobilversionen av hemsidan. Den är väldigt, väldigt "djup", alltså den innehåller undermenyer som i sin tur innehåller undermenyer, som innehåller undermenyer... Navigationsmenyn inkluderar dessutom jättemånga alternativ på flera olika språk, vilket förvärrar problematiken.</p>

    <p>Ni kan relativt enkelt förbättra sidan så att laddningstiderna blir mycket bättre, och den nog blir mer lättnavigerad på mobilen på köpet. Det enda som behövs är att navigationsmenyn på mobiler begränsas på liknande sätt som den meny som används på större (laptop osv) skärmar. På större skärmar så finns inga undermenyer, utan man får klicka på ett av alternativen, komma till en ny sida, och sen navigera vidare. Genom att göra om navigationsmenyn på mobilversionen så att den inte heller har undermenyer, alternativt att varje meny bara har en istället för flera undermenyer, så borde en stor del av era problem försvinna. Likadant så är det förstås bättre att inte ha alternativ på olika språk direkt i navigationsmenyn, utan om ni tänker det är hjälpsamt skulle ni kunna ha en tydlig möjlighet för att ändra språkpreferens på hemsidan och först då presenteras specifika språkalternativ, beroende på vilket språk som valts.</p>

    <p>Ni kan läsa mer om hur jag gjorde analysen av er webbsajt och se länkade data på sidan för min kursrapport: http://www.student.bth.se/~loal20/dbwebb-kurser/design/me/portfolio/analysis/02_load</p>

    <p>Skicka gärna vidare det här mailet till lämplig ansvarig.</p>
</blockquote>
Jag misstänker att mailet inte kommer att nå rätt personer, och kanske blir problemet ändå inte löst då det är mycket möjligt att dessa rätt personer skulle be om en ganska saftig betalning för att fixa problemen trots att det troligtvis är de som gjort en stor miss och orsakat problemen till att börja med. Men man kan ändå försöka göra sin del av samhällsnytta, och det var lärorikt att fundera över hur det går att presentera mina fynd.

**Har du några funderingar kring Cimage och dess nytta och features? Vilka bildverktyg använder du själv normalt sett?**
Jag valde kanske trots allt för stora bilder till galleriet, jag hade plockat dem direkt från unsplash.com. För när man nu laddar gallerisidan är det väldigt lång laddningstid första gången bilderna ska bearbetas. Det verkar också som att CImage tycker det är för mycket på en gång, eftersom den allra första gången laddas bara två av fem bilder in, resten lämnas som alt text. När bilderna väl har cache:ats i olika format så går det desto snabbare att ladda sidan, och alla bilderna kommer med. Annars vad gäller sättet att använda CImage så känns det intuitivt och smidigt, det är ett användarvänligt interface. På Google Pagespeed Insights har jag sett att de ofta rekommenderar att använda nyare format än JPEG/PNG, t. ex. JPEG 2000. Jag är inte insatt nog för att veta när det är lämpligt, men stöd för konvertering till de här formaten skulle vara en bonus. Själv använder jag GIMP, ImageMagick eller Pythons Image Library/pillow mest.

Jag tänker att ju mer man kan automatisera vad gäller att anpassa bilder, desto bättre. CImage och liknande verktyg är väldigt bra på det viset. Det är onödigt att vi ska sitta själva med GIMP eller annan mjukvara och dra i bilder för att få dem i rätt storlek om en dator kan göra det lika bra eller bättre och snabbare.

En sidonot om galleriet är att jag använde PHP i index.php för att ordna så att alla bilder i 'assets/img/gallery' alltid laddas in, utan att man behöver ändra i metadata. Det är en fullösning, men den funkar. Jag fick hjälp på traven av Niklas/Aurora i Discord. Sen med bilderna lade jag också in så att de mörkas något när man skiftar över till dark theme, med hjälp av variabler. Jag har den här sortens variabler i _variables.scss/_dark-variables.scss
<div class="code-block code-python">
    <pre><code>
        <span class="code-comment">// brightness/contrast values for images that are to shift</span>
        <span class="code-comment">// between light/dark mode</span>
        $img-brightness: 0.8;
        $img-contrast: 1.2;
        </code></pre>
</div>

och i scss-filen för gallerimodulen har jag:

<div class="code-block code-python">
    <pre><code>
        .gallery-list-item > picture > img {
            border-radius: $m-border-radius;
              filter: brightness($img-brightness) contrast($img-contrast);
        }
        </code></pre>
</div>


**Vilken är din TIL för detta kmom?**

Anta aldrig att något är väldesignat i bakgrunden oavsett hur stor organisation det handlar om. Det är alltid värt att köra analyser med objektiva mått även om det inte verkar behövas.
