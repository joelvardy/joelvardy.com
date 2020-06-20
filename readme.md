# joelvardy.com

Having not updated this for project for over two years I decided to remove any build tools and simply serve static HTML and CSS. I also removed any analytics since I never used it for anything.

## Running this locally

```
php -S 0.0.0.0:8080 -t public
```

## Deployment

I have confirgured CircleCI to deploy infrastructure using CloudFormation and then upload the static assets from the `public` directory to S3 which is then served by CloudFront.
