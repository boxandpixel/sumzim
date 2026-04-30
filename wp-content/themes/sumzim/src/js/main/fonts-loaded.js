// utilities.js - load this in <head> or top of <body>

// Immediately add fonts-loaded when ready
if (document.fonts) {
    document.fonts.ready.then(() => {
        document.body.classList.add('fonts-loaded');
    });
} else {
    window.addEventListener('load', () => {
        document.body.classList.add('fonts-loaded');
    });
}