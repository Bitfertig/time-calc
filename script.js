document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#start').addEventListener('change', calc);
    document.querySelector('#end').addEventListener('change', calc);
    document.querySelector('#break').addEventListener('change', calc);
    calc(); // onload

    document.querySelector('#out_decimal_netto').addEventListener('click', copy);
    document.querySelector('#out_hours_netto').addEventListener('click', copy);
});


function copy(e) {
    let val = e.target.closest('.out').querySelector('.val').innerText;
    //console.log(val);
    copyToClipboard(val);
}



function calc(e) {
    //console.log(e);

    let str_start = document.querySelector('#start').value;
    let str_end = document.querySelector('#end').value;
    let str_break = document.querySelector('#break').value;
    //console.log(str_start, str_end, str_break);

    let start_split = str_start.split(':');
    let start_h = Number(start_split[0] || 0);
    let start_m = Number(start_split[1] || 0);

    let end_split = str_end.split(':');
    let end_h = Number(end_split[0] || 0);
    let end_m = Number(end_split[1] || 0);

    let break_split = str_break.split(':');
    let break_h = Number(break_split[0] || 0);
    let break_m = Number(break_split[1] || 0);

    let dt_start = new Date();
    dt_start.setHours(start_h, start_m, 0, 0);
    let dt_end = new Date();
    dt_end.setHours(end_h, end_m, 0, 0);
    
    if ( dt_end < dt_start ) {
        dt_end.setDate(dt_end.getDate() + 1); // => +1 day
    }

    let time_start = dt_start / 1000;
    let time_end = dt_end / 1000;
    let time_break = (break_h * 60) + break_m;

    let time_s = time_end - time_start - (time_break * 60); // => seconds
    let time_m = time_s / 60;
    //console.log(time_m);

    let decimal = time_m / 60;
    let hours = (decimal < 0 ? '-' : '') 
        + Math.abs(Number(time_m/60)>>>0)
        + ':' 
        + ((Math.abs(Number(time_m%60))+'').padStart(2, '0'));
    //console.log('Decimals:', decimal);
    //console.log('24-hours:', hours);

    document.querySelector('#decimal_netto').innerText = decimal.toFixed(2);
    document.querySelector('#hours_netto').innerText = hours;
}





// Copies a string to the clipboard. Must be called from within an
// event handler such as click. May return false if it failed, but
// this is not always possible. Browser support for Chrome 43+,
// Firefox 42+, Safari 10+, Edge and Internet Explorer 10+.
// Internet Explorer: The clipboard feature may be disabled by
// an administrator. By default a prompt is shown the first
// time the clipboard is used (per session).
function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}