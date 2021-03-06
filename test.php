<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="canonical" href="https://www.zeitverschiebung.net/fr/timezone/africa--casablanca"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css"> html {
            font-family: 'Open Sans', Arial, sans-serif;
        }

        a {
            text-decoration: none;
            color: #000;
        }

       </style>
    <script type="text/javascript"> var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-378139-21']);
        _gaq.push(['_gat._anonymizeIp']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })(); </script>
</head>
<body><a href="https://www.zeitverschiebung.net/fr/timezone/africa--casablanca" target="_parent">
    <div class="clock large" id="clock">
        <div class="date"></div>
        <div class="time"></div>
    </div>
</a>
<script type="text/javascript"> $(document).ready(function () {
        $("div#clock").simpleClock(1);
    });
    (function ($) {
        $.fn.simpleClock = function (utc_offset) {
            var language = "fr";
            switch (language) {
                case "de":
                    var weekdays = ["So.", "Mo.", "Di.", "Mi.", "Do.", "Fr.", "Sa."];
                    var months = ["Jan.", "Feb.", "Mär.", "Apr.", "Mai", "Juni", "Juli", "Aug.", "Sep.", "Okt.", "Nov.", "Dez."];
                    break;
                case "es":
                    var weekdays = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"];
                    var months = ["Ene", "Feb", "Mar", "Abr", "Mayo", "Jun", "Jul", "Ago", "Sept", "Oct", "Nov", "Dic"];
                    break;
                case "fr":
                    var weekdays = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
                    var months = ["Jan", "Fév", "Mars", "Avr", "Mai", "Juin", "Juil", "Août", "Sept", "Oct", "Nov", "Déc"];
                    break;
                default:
                    var weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
                    var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
                    break;
            }
            var clock = this;

            function getTime() {
                var date = new Date();
                var nowUTC = date.getTime() + date.getTimezoneOffset() * 60 * 1000;
                date.setTime(nowUTC + (utc_offset * 60 * 60 * 1000));
                var hour = date.getHours();
                if (language == "en") {
                    suffix = (hour >= 12) ? 'p.m.' : 'a.m.';
                    hour = (hour > 12) ? hour - 12 : hour;
                    hour = (hour == '00') ? 12 : hour;
                }
                return {
                    day: weekdays[date.getDay()],
                    date: date.getDate(),
                    month: months[date.getMonth()],
                    year: date.getFullYear(),
                    hour: appendZero(hour),
                    minute: appendZero(date.getMinutes()),
                    second: appendZero(date.getSeconds())
                };
            }

            function appendZero(num) {
                if (num < 10) {
                    return "0" + num;
                }
                return num;
            }

            function refreshTime(clock_id) {
                var now = getTime();
                clock = $.find('#' + clock_id);
                $(clock).find('.date').html(now.day + ', ' + now.date + '. ' + now.month + ' ' + now.year);
                $(clock).find('.time').html("<span class='hour'>" + now.hour + "</span>:<span class='minute'>" + now.minute + "</span>:<span class='second'>" + now.second + "</span>");
                if (typeof (suffix) != "undefined") {
                    $(clock).find('.time').append('<strong>' + suffix + '</strong>');
                }
            }

            var clock_id = $(this).attr('id');
            refreshTime(clock_id);
            setInterval(function () {
                refreshTime(clock_id)
            }, 1000);
        };
    })(jQuery); </script>
</body>
</html>