<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Calc</title>
    <meta name="keywords" content="time calc, time calculator, hours, minutes, calculator, calculate">
    <meta name="description" content="Time Calc helps calculating hours and minutes.">
    <link rel="shortcut icon" href="timecalc-logo.svg">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

    <header style="text-align:center;">
        <h1>
            <a href="<?= $_SERVER['PHP_SELF']?>">
                <img src="timecalc-logo.svg" alt="" width="150"><br>
                Time Calc
            </a>
        </h1>
        <p>Calculate a time by hours and minutes in decimal or 24-hour time.</p>
    </header>


    <main>

        <div id="gears">
            <span style="display: inline-block;">
                Start<br>
                <input type="time" id="start" value="08:00">
            </span>
            <span class="to">&mdash;</span>
            <span style="display: inline-block;">
                End<br>
                <input type="time" id="end" value="16:00">
            </span>
            <span>&nbsp; | &nbsp;</span>
            <span style="display: inline-block;">
                Break<br><input type="time" name="break" id="break" value="00:30">
            </span>
        </div>
        <br>

        <div id="out">
            <div class="out" id="out_decimal_netto" title="Copy to clipboard!">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
                <span class="val" id="decimal_netto">0.00</span>
                <span>hours</span>
            </div>
            <div class="out" id="out_hours_netto" title="Copy to clipboard!">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
                <span class="val" id="hours_netto">00:00</span>
                <span><abbr title="Hour">H</abbr>:<abbr title="Minute">M</abbr></span>
            </div>
        </div>
        
    </main>


    <div id="footer-extra">
        <div>Icons erstellt von <a href="https://www.flaticon.com/de/autoren/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/de/" title="Flaticon">www.flaticon.com</a></div>
    </div>
    <footer>
        <a href="//www.bitfertig.de" title="www.bitfertig.de">
            <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 1000 1000" width="20" height="20" style="isolation:isolate">
                <path fill="currentColor" d="M57.803 360.359L360.359 57.803c77.07-77.071 202.212-77.071 279.282 0l302.556 302.556c77.071 77.07 77.071 202.212 0 279.282L639.641 942.197c-77.07 77.071-202.212 77.071-279.282 0L57.803 639.641c-77.071-77.07-77.071-202.212 0-279.282z"/>
                <path fill="#EFEFEF" d="M808.004 547.735l-23.07 23.07-9.448-9.447q12.049-14.65 14.274-22.967 2.225-8.318-6.538-22.284l9.721-9.721 97.621 97.622-13.144 13.144-69.416-69.417zm49.933-107.164q19.032-19.031 43.197-11.843 18.689 5.545 39.774 26.63 19.99 19.99 27.11 39.021 10.132 27.383-9.447 46.962-17.663 17.662-41.623 10.953-19.99-5.613-41.554-27.177-16.704-16.704-24.371-32.997-14.239-30.396 6.914-51.549zm89.338 89.611q9.584-9.584 6.777-23.754-2.806-14.171-25.945-37.31-16.704-16.704-31.594-23.379-14.889-6.674-26.732 5.169-10.885 10.885-5.682 26.151 5.202 15.266 25.124 35.187 14.992 14.993 27.314 20.88 18.826 8.968 30.738-2.944z"/>
            </svg>
        </a>
        &nbsp;
        &nbsp;
        <a href="//tools.bitfertig.de">Tools</a>
        &nbsp;
        &nbsp;
        <a href="//blog.bitfertig.de">Blog</a>
    </footer>

</body>
</html>