---
Title: Pagespeed
Description: Using Python to request and compile
Intro: Google Pagespeed API
Template: kmom
Wrapclass: kmom
Wrapclass_secondary: analysis-detail
Filterword: Guide
---
# Quick Guide: Google Pagespeed Insights API with Python

## Aim
This short guide gives you a quick introduction to interacting with the [Google Pagespeed Insights API](https://developers.google.com/speed/docs/insights/v5/get-started). If you want a more in-depth guide, [this article by Daniel Heredia](https://www.danielherediamejias.com/pagespeed-insights-api-with-python/) seems (I've only skimmed it) like it might be what you need.

## Prerequisites
The following software is necessary. It's expected that you understand how to open up and make some basic edits in a Python script, and how to run it from a command-line interface or using an IDE. Download/information links are provided for each piece of software. Please read through the short version info below before making decisions about which software versions to install.
* Python 3 - https://python.org
* pandas (Python package) - https://pypi.org/project/pandas/
* requests (Python package) - https://pypi.org/project/requests/

## Version info
The following software versions were used when putting together this tutorial:
* Python 3.8.5
* pandas 1.1.3
* requests 2.22.0
It's likely that later versions of the packages will also work. An import caveat though is that at the time of this writing (2020-11-29), pandas is incompatible (at least out-of-the-box) with Python 3.9.

## Introduction
### A quick explanation of API's
API stands for Application Programming Interface. It's a very broad term that roughly describes an *interface*, a set of commands, that can be used to make some piece of technology and/or software do things. In the context of databases, an API means an interface that allows you to retrieve or manipulate the contents of a database. For a simple example, say you have a database about different ice creams, which holds each ice cream's name and price. You could then let outside users connect to your database and tell it to send them a list of all the ice creams in your database, or to delete all the ice creams in the database. You could call these two commands "GET ALL ICECREAM" and "DELETE ALL ICECREAM". The users don't know how exactly your database actually executes the commands, only how to give them. That's an API consisting of a set of two instructions. Obviously it has its drawbacks, and API's in the wild usually offer more comprehensive and refined sets of commands. They typically won't let just anyone destroy all data either. But it's an API nonetheless.

### A quick explanation of Google Pagespeed Insights
Google's [Pagespeed Insights tool](https://developers.google.com/speed/pagespeed/insights/) helps you understand how fast a webpage loads and what slows it down. There's no better way to understand the tool than to try it out yourself with a few pages, so go ahead and input a page. You'll get a bunch of results.
![Screenshot of Google Pagespeed Insights results in browser](%assets_url%/img/website_snaps/googlepi_results.png)

### Making the case for using the API
As you see, it's easy to manually input a single page into the browser to ask Pagespeed Insights to analyze a page and give you the results. But what if you want to look up a whole bunch of pages? And what if you want to save the results to a document, and you're not particularly fond of copy-pasting a bunch of numbers? This is where an API, specifically the Pagespeed Insights API, can really make things easier. By using an API you can fetch data not through your browser but directly in a script. This means that you can write a script that retrieves data, filters them as necessary, formats them however you want and saves them on your computer. Once you have the script set up, all you need to do is run it, and voilá!, the data are on your computer.

## Using the API
### Getting an API key
For Google to allow you to make requests to their API as necessary, you need to get a Pagespeed Insights API key. You can think of this as your personal password for accessing and using the API. Getting one is straightforward. Go to the ['Get started' page](https://developers.google.com/speed/docs/insights/v5/get-started#APIKey), scroll down to the "Get a key" button, press it and follow the instructions.

### Running a script
To get started making requests to the API you can use the Python script below, simply copy it into a '.py' file on your computer. The script will fetch and save pages' overall performance scores as well as the values listed under 'lab data' when using the Pagespeed Insights tool through the browser (see the image below). Values for mobile as well as desktop platform requests are fetched and stored in separate rows in the resulting CSV (comma separated values, use Excel for it if this is unfamiliar) file.
![Screenshot of Google Pagespeed Insights lab data metrics](%assets_url%/img/website_snaps/googlepi_labdata.png)

The parts that you need to change in the script are preceded by comments starting with "CHANGE THIS", the rest you can leave as is. Note that running the script might take a few minutes, because Pagespeed Insights needs some time to analyze each page.

<div class="code-block code-python">
    <pre><code>
        import requests
        import pandas as pd

        ### DEFINE CONSTANTS ###

        API_URL = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed'

        # CHANGE THIS to include all URL's of pages you want to test
        REQUEST_URLS = [
            'https://www.example.com',
            'https://www.example.com/sub-page-example/',
            'https://anotherexample.net/',
            '...',
        ]

        # CHANGE THIS to your own API key
        API_KEY = 'YOUR_API_KEY'

        # CHANGE THIS to the path/filename (relative to where you stored the script)
        # to where you want the data to be exported as a CSV file
        CSV_SAVE_PATH = 'pagespeed_data.csv'

        STRATEGY_TYPES = ('mobile', 'desktop')

        ### END DEFINE CONSTANTS ###

        # initialize dictionary that will be filled with page statistics
        page_dict = {'url': [], 'platform': [], 'performance_score': []}

        # define metric names and their corresponding keys in the returned JSON
        # object
        metric_names = {
            'first_contentful_paint': 'first-contentful-paint',
            'largest_contentful_paint': 'largest-contentful-paint',
            'time_to_interactive': 'interactive',
            'total_blocking_time': 'total-blocking-time',
            'cumulative_layout_shift': 'cumulative-layout-shift'
        }
        # add key in the dictionary for each type of metric
        for mn in metric_names.keys():
            page_dict[mn] = []

        for req_url in REQUEST_URLS:
            for strategy in STRATEGY_TYPES:
                page_dict['url'].append(req_url)
                page_dict['platform'].append(strategy)
                # form dictionary of request specifications
                request_arguments = {'url': req_url, 'key': API_KEY, 'strategy': strategy}
                # make request to API using API key
                response = requests.get(API_URL, request_arguments)
                # convert returned JSON to nested python dictionary
                resp_json = response.json()
                # grab and store the overall performance score in data frame
                # (scaling by 100 to get result in percentage, as presented in browser interface)
                perf_score = resp_json["lighthouseResult"]["categories"]["performance"]["score"] * 100
                page_dict['performance_score'].append(perf_score)
                # grab sub-sub-dictionary which holds 'lab data' metrics
                audits = resp_json['lighthouseResult']['audits']
                # store all the 'lab data' metrics in data frame
                for metric_name, audit_key in metric_names.items():
                    add_val = audits[audit_key]['numericValue']
                    page_dict[metric_name].append(add_val)

        # form a data frame based on the page data dictionary that
        # was filled with values above
        page_df = pd.DataFrame(page_dict)
        # round off cumulative layout shifts, to avoid very small (< 10^-7) deviations from 0
        page_df.cumulative_layout_shift = round(page_df.cumulative_layout_shift, 4)

        page_df.to_csv(CSV_SAVE_PATH, index=False)
        </code></pre>
</div>
Author: Lowe Wilsson
