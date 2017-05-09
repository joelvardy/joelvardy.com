+++
date = "2015-10-02T00:00:00+00:00"
draft = false
title = "Scraping Job Listings"
+++

How I scraped the list of jobs on the the <a href="https://www.manchesterdigital.com/recruitment" target="_blank" rel="noopener">Manchester Digital vacancies page</a> so I could filter and sort them as I wanted.

I'm currently looking for a contract / freelance web development role in Manchester, I was looking at the vacancies listed on manchesterdigital.com but most of the jobs were permanent, and there was no way to filter / sort the list. So naturally, I decided to write some code which would allow me to do that.

The first step was to get the data from their website so I could work with it, I used <a href="http://phantomjs.org/" target="_blank" rel="noopener">PhantomJS</a> to load the pages, and <a href="https://github.com/cheeriojs/cheerio">cheerio</a> to make accessing the DOM easier. The code is shown below:

```javascript
var fs = require('fs'),
url = require('url'),
phantom = require('phantom'),
cheerio = require('cheerio');

var jobs = [];

var loadPage = function (ph, page, initialUrl) {
    page.open(initialUrl, function (status) {

        console.log('Loaded: ' + initialUrl); // It can take a long time to run (there are a lot of pages) so keep the user informed
        if (!status) throw new Error('Unable to load URL: ' + initialUrl);

        page.evaluate(function () {
            return document.all[0].outerHTML;
        }, function (html) {
            // Now we've loaded the page, scrape it
            scrapePage(ph, page, initialUrl, html);
        });

    });
};

var scrapePage = function (ph, page, requestUrl, html) {

    var $ = cheerio.load(html); // Use cheerio to load the DOM and allow us to use jQuery-esk selectors

    // Iterate through jobs
    $('.view-recuritment-page-view ul li.views-row').each(function () {

        var job = {};

        job.title = $('div.job-01 h4 a', this).text();
        job.id = $('div.job-01 h4 a', this).attr('href').replace('/vacancy/', '');
        job.link = url.resolve(requestUrl, $('div.job-01 h4 a', this).attr('href'));
        job.posted = $('div.job-01 strong span', this).text();
        job.client = $('div.job-02 a', this).text();
        job.location = $('div.job-03 div', this).text();
        job.type = $('div.job04 div', this).text();

        jobs.push(job);

    });

    // Load next page
    var nextPageElement = $('ul.pager li.pager-next a');
    if (nextPageElement.length) {

        // Wait 1.5 seconds first
        setTimeout(function () {
            loadPage(ph, page, url.resolve(requestUrl, nextPageElement.attr('href')));
        }, 1500);

    // Last page
    } else {
        fs.writeFile('./jobs.json', JSON.stringify(jobs), function (error) {
            if (error) throw new Error('Unable to save jobs');
            console.log('Jobs saved to ./jobs.json');
            ph.exit();
        });
    }

};

// Load PhantomJS
phantom.create(function (ph) {
    ph.createPage(function (page) {
        loadPage(ph, page, 'https://www.manchesterdigital.com/recruitment'); // Starting page
    });
});
```

The code above scrapes each page of the job listing section, saving the details of each job in a local JSON file.

**Note**: There are a lot of jobs (more than 3,000) - to minimise load on the server I am waiting 1.5 seconds between each request, my local machine also <a href="https://gist.github.com/joelvardy/fddf02f3aa232298065b" target="_blank" rel="noopener">blocks all outgoing traffic to Google Analytics</a> so I shouldn't affect their reporting.

### Using the Data

Now I have more than 3,000 jobs (dating back to 2006) I want to filter by job type and order them by date posted. This was quite simple, since this is just for my personal use and doesn't need to be super efficient (or look pretty) I used <a href="https://www.datatables.net/" target="_blank" rel="noopener">DataTables</a> a jQuery plugin which will allow sorting and filtering.

```markup
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>
    </head>
    <body>

        <table class="data">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Posted</th>
                    <th>Client</th>
                    <th>Location</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <script>
        $(document).ready(function () {
            $.getJSON('./jobs.json', function(data) {
                $('table.data').DataTable({
                    data: data,
                    columns: [
                        { data: 'title' },
                        { data: 'posted' },
                        { data: 'client' },
                        { data: 'location' },
                        { data: 'type' }
                    ]
                });
            });
        });
        </script>

    </body>
</html>
```

Looking in the browser I can now easily filter / sort jobs which were listed on the Manchester Digital website. The only problem.. There are no current suitable jobs:

<img alt="Sorting / filtering data from Manchester Digital vacancies" src="/images/writing/scraping-job-listings/filter-sort-manchester-digital-vacancies.jpg">

If you (or someone you know) are in need of a web developer please <a href="/#contact" title="Contact Joel Vardy">get in touch</a>.
