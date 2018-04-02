# joelvardy.com

## Installing

```bash
yarn install
```

## Building

```
rm -r public static/css static/javascript
yarn run production
hugo
```

## Deploying

```
./node_modules/poosh-cli/bin/poosh.js sync
```
