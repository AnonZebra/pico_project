---
Title: Analysis 2
Description: Analysis 2
Intro: Page speeds
Template: kmom
Wrapclass: kmom
Wrapclass_secondary: analysis-detail
Filterword: Analysis
---

Analysis 2: Page speeds
==================
This report presents and comments on results from evaluating website loading speeds with the tools Google Pagespeed Insight and Firefox Devtools.

Sample selection
-----------------------
Three web sites that were expected to have issues, based on age, the web site not being the primary focus of the company/individual or limited resources, with page speeds were included in order to gather as much data as possible about causes behind page speed issues and what might cause them. The following pages were picked:

![koharu biyori website screenshot](%base_url%/image/website_snaps/koharu-1.png&width=800)
* [こはる日和 - koharu biyori](http://daijyoyuukoharu.blog62.fc2.com/), a Japanese cat blog. Japanese web sites often have designs that visually would appear outdated within a European context, but that doesn't necessarily mean that the performance is bad or that there's anything objectively oudated about the sites. Being a cat blog however increases the risk of the site having little resources for optimized performance.

![La yaya costurera website screenshot](%base_url%/image/website_snaps/costurera-1.png&width=800)
* [La yaya costurera](http://www.layayacosturera.com/), the website of a Catalan/Spanish tailor shop chain operating in Barcelona and Madrid, which presents information on where their shops are located and the services they offer. The web site appears to have been worked on quite a lot design-wise, but it's possible that page speed has received less attention since potential customers are not expected to visit the site often.

![Karolinska Sjukhuset website front page screenshot](%base_url%/image/website_snaps/karolinska-1.png&width=800)
* [Karolinska Sjukhuset](https://www.karolinska.se/?splitoption=splitdecision), a website for part of the public health services in Stockholm, Sweden, which includes a multitude of hospitals and clinics. Karolinska Sjukhuset has been locally ridiculed following its decisions related to public spending and employing contractors. It is expected then that work related to web design and maintenance might also bring issues with it.

Method
-----------------------
Each website is initially visited and browsed around on for a few minutes to get a general feel for whether the site is experienced as slow or smooth. Following this, the front page and two additional pages are selected for deeper analysis. The three pages are run against Google Pagespeed Insights and with the help of Firefox Devtools, network traffic data are collected. Results are compiled in a Google Sheet.

Results and analysis for each site
-----------------------
There's a table with [all selected pages' pagespeed and network traffik metrics on Google Sheets](https://docs.google.com/spreadsheets/d/1uO4tQuCr4uB6PICBoS5QlOTF9YuoDg_lT6S2N76iXV8/edit?usp=sharing).

### こはる日和
The Pagespeed Insights and Devtools network metrics indicate serious issues with loading times, in particular when it comes to the desktop version of the web pages. There are a lot of images and other content being loaded on every page, all at once, producing a very long page for the user to scroll down. Pagespeed Insights suggests deferring/lazy-loading offscreen images. Another solution would be if the blog split blog entries up into separate pages.

### La yaya costurera
This site mainly has problems related to its mobile version, which are also present but less severe on desktop, where it takes a long time for all the content to be loaded and the pages to become reactive. The transfer sizes are also relatively high, adding to loading times and increasing cellular data consumption. This is especially the case for the front page. Pagespeed Insights recommends converting images from JPEG/PNG formats to formats like JPEG 2000 or WebP, for increased compression without losing a lot of quality. Alternatively of course the site could reduce its reliance on images, but this would hamper their presentation, meaning that focusing on minimizing rather than removing content makes sense as a first-hand choice.

### Karolinska Sjukhuset
Going directly to 'https://www.karolinska.se' doesn't present many issues. But the reason for this is that going to 'karolinska.se' for the first time simply sends you to a landing page where you can choose to go to the website of Karolinska Institutet (ki.se) or Karolinska Sjukhuset (karolinska.se) proper. The main pages that belong to Karolinska Sjukhuset themselves receive an overall Pagespeed performance score below ten when it comes to their mobile versions. Among other things, it takes more than ten seconds for the pages to become responsive. The server is slow to respond at all, indicating that the developers probably want to focus on backend optimization, such as removing any unnecessary database requests that are made for these pages, and/or caching results for oft-visited pages and updating them according to a regular schedule rather than on every request.

Since the /for-vardgivare/ page seems at first not to include very much or very dynamic content, it's not immediately clear what backend processing is taking all the time. The reason only becomes clear once you view the HTML [source](view-source:https://www.karolinska.se/for-vardgivare/) of the page, or in the mobile version, go to the navbar and then keep going into submenus. It turns out that the `<nav>` element is very deep, with many layers of lists nested within lists. The problem is made many times worse by the fact that the developers have included menu choices for all languages as submenus, which in turn include many submenus. This is likely to be the main culprit.

![Karolinska Sjukhuset website mobile navbar menu screenshot](%base_url%/image/website_snaps/karolinska-2.png&width=800)

The obvious solution to the issues is to reorganize the mobile version navbar. It should only include one or two levels of menu options, like the desktop version does. Users can then browse to deeper levels by options presented on the new page. Options in multiple languages should not be presented - instead, there should be an obvious language toggle for the whole site, that then changes navbar and other elements' contents.

Summary
-----------------------
The results are largely consistent with the predictions made before data collection. The cat blog and Karolinska Sjukhuset share the common issue of including too much content (hidden or unhidden) in a single page or screen, when really these contents could be delayed until there is some user activity that indicates they are relevant, ie lazy-loading. The site that performed the best overall was La yaya costurera, which also could defend its speed deficiencies somewhat by pointing at a lively and attractive design. こはる日和 didn't do as well as Karolinska Sjukhuset on desktop, but was more consistent than Karolinska Sjukhuset across devices, placing Karolinska Sjukhuset as the worst site out of the three when it comes to network metrics.

![A plot that shows, for each website, the proportion of pages that fall below different performance score levels](%base_url%/image/performance_plot.png&width=800)

Personally, as a user, I would consider a page loading speed of less than three seconds until all the content above the fold is presented and the site is responsive to be acceptable. La yaya costurera takes slightly longer than 3s for this, but in general browsing the site feels fairly smooth rendering-wise. Karolinska Sjukhuset is unreliable on mobile, with times varying quite a lot, but often going above the 3s threshold. This makes the experience fairly sluggish as you browse looking for information, unless you go into the thick of the weeds with the nested navbar menus. On mobile, こはる日和 makes it below the threshold, but on desktop loading the content before the fold takes considerably longer. On mobile, the site feels fairly smooth, while on desktop it's sluggish.

Author: Lowe Wilsson
