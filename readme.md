# joelvardy.com

## Installing

```bash
yarn install
yarn global add poosh-cli poosh-plugin-s3
```

## Building

```
rm -r public static/css static/javascript
npm run production
hugo
```

## Deploying

```
poosh sync
```
