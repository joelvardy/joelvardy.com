/**
 * Add .startsWith() to strings
 */
if (typeof String.prototype.startsWith !== 'function') {
    String.prototype.startsWith = function (string) {
        return this.indexOf(string) === 0;
    };
}
