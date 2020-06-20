#!/usr/bin/env node

/**
 * echo 'Hello someVariable: thisiswhatwewant something else' | node ./rejex.js someVariable # thisiswhatwewant
 */

const stdin = process.openStdin();

let data = '';

stdin.on('data', function (chunk) {
    data += chunk;
});

stdin.on('end', function () {
    if (typeof process.argv[2] !== 'undefined' && process.argv[2].length > 1) {
        const result = data.match(process.argv[2] + ': ([^ ]+)');
        if (result) {
            process.stdout.write(result[1]);
        }
    }
});
