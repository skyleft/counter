<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 15/4/22
 * Time: 下午12:54
 */

    include("IniFile.php");
    $ini = new IniFile('config.ini');
    $cfg = $ini->getAll();
    $day = $cfg['m_day'];
    $hour = $cfg['m_hour'];
    $minute = $cfg['m_minute'];
    $second = $cfg['m_second'];
    $speed = $cfg['m_speed'];
    $interval = 1000/floatVal($speed);
    $time = (intVal($day)*24*60*60+intval($hour)*60*60+intval($minute)*60+intval($second));
?>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Counter
    </title>
    <link href="bower_components/flipclock/compiled/flipclock.css" rel="stylesheet"/>
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bower_components/flipclock/compiled/flipclock.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            FlipClock.Lang.Chinese = {

                'years'   : '年',
                'months'  : '月',
                'days'    : '日',
                'hours'   : '时',
                'minutes' : '分',
                'seconds' : '秒'

            };

            /* Create various aliases for convenience */

            FlipClock.Lang['zh']      = FlipClock.Lang.Chinese;
            FlipClock.Lang['zh-CN']   = FlipClock.Lang.Chinese;
            FlipClock.Lang['chinese']   = FlipClock.Lang.Chinese;


            var clock;

            clock = $('#counter').FlipClock(<?= $time?>,{
                clockFace: 'DailyCounter',
                autoStart: false,
                language: 'zh-CN',
                interval: <?= $interval?>
            });

            //clock.setTime(<?= $time?>);
            <?php
                if($cfg['m_status']==1){
                ?>
            clock.start();
            <?php
                }
            ?>


        });

    </script>
    <style type="text/css">
        body{
            margin: 0px;

        }
        #container{
            background: #263957;
            height:1200px;
        }
        div.logo{
            width: 250px;
            height: 80px;
            margin: auto;
            padding-top: 50px;
        }
        div.header{
            width:100%;
            margin: auto;
        }
        div.desc{
            width: 60%;
            padding-top:50px;
            padding-bottom:30px;
            margin: auto;
            font-size: 50px;
            color: #ffffff;
            height: 110px;
        }
        div#counter{
            width:80%;
            margin:auto;
            height:60px;
        }
        span.days ~ ul.flip div.inn{
            background:rgb(234,101,0);
        }
        span.hours ~ ul.flip div.inn{
            background:rgb(79,179,37);
        }
        span.minutes ~ ul.flip div.inn{
            background:rgb(168,49,56);
        }
        span.seconds ~ ul.flip div.inn{
            background:rgb(123,57,132);
        }


        #counter {
            zoom: 1.3;
            -moz-transform: scale(1.3);
        }

    </style>
</head>
<body>
    <div id="container">
        <div class="header">
            <div class="logo">
                <img src="images/logo.png" width="250" height="80" alt="门口学习网"/>
            </div>
        </div>
        <div class="desc">&nbsp;&nbsp;&nbsp;&nbsp;门口学习网已为中国教师节省了</div>
        <div id="counter"></div>
    </div>

</body>
</html>