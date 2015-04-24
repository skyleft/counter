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


    if(isset($_POST['oprtype'])){
        $oprtype = $_POST['oprtype'];
        if($oprtype==1){
            $m_day = isset($_POST['m_day'])?$_POST['m_day']:0;
            $m_hour = isset($_POST['m_hour'])?$_POST['m_hour']:0;
            $m_minute = isset($_POST['m_minute'])?$_POST['m_minute']:0;
            $m_second = isset($_POST['m_second'])?$_POST['m_second']:0;
            $m_speed = isset($_POST['m_speed'])?$_POST['m_speed']:1;
            $data = array(
                'm_day'=>$m_day,
                'm_hour'=>$m_hour,
                'm_minute'=>$m_minute,
                'm_second'=>$m_second,
                'm_speed'=>$m_speed,
                'm_status'=>1
            );
            $ini->writeAll($data);
        }else if($oprtype==2){
            $data = array(
                'm_day'=>$cfg['m_day'],
                'm_hour'=>$cfg['m_hour'],
                'm_minute'=>$cfg['m_minute'],
                'm_second'=>$cfg['m_second'],
                'm_speed'=>$cfg['m_speed'],
                'm_status'=>0
            );
            $ini->writeAll($data);

        }else if($oprtype==3){
            $data = array(
                'm_day'=>0,
                'm_hour'=>0,
                'm_minute'=>0,
                'm_second'=>0,
                'm_speed'=>0,
                'm_status'=>0
            );
            $ini->writeAll($data);
        }else if($oprtype==4){
            $data = array(
                'm_day'=>$cfg['m_day'],
                'm_hour'=>$cfg['m_hour'],
                'm_minute'=>$cfg['m_minute'],
                'm_second'=>$cfg['m_second'],
                'm_speed'=>$cfg['m_speed'],
                'm_status'=>1
            );
            $ini->writeAll($data);
        }
        echo "<script type='text/javascript'>alert('Operation Done!');window.location.href=window.location.href;</script>";
    }

?>
<html>
<head>
    <meta charset="utf-8">
    <title>
        configure your counter
    </title>
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){

            $("#save").click(function(){
                $("#oprtype").val(1);
                $("#dataform").submit();
            });

            $("#stop").click(function(){
                $("#oprtype").val(2);
                $("#dataform").submit();
            });

            $("#start").click(function(){
                $("#oprtype").val(4);
                $("#dataform").submit();
            });

            $("#reset").click(function(){
                $("#oprtype").val(3);
                $("#dataform").submit();
            });
        });
    </script>
    <style type="text/css">
        #container{
            width:  60%;
            margin: auto;
        }
        fieldset{
            padding: 5px;
            margin-top: 20px;
        }
        table tr{
            height: 32px;
        }
    </style>
</head>
<body>
    <div id="container">
        <form method="post" id="dataform">
            <fieldset>
                <legend>Counter Start</legend>
                <table>
                    <tr><td>Day:</td><td><input type="number" name="m_day" value="<?= $cfg['m_day']?>"/> </td></tr>
                    <tr><td>Hour:</td><td><input type="number" name="m_hour" value="<?= $cfg['m_hour']?>"/> </td></tr>
                    <tr><td>Minute:</td><td><input type="number" name="m_minute" value="<?= $cfg['m_minute']?>"/> </td></tr>
                    <tr><td>Second:</td><td><input type="number" name="m_second" value="<?= $cfg['m_second']?>"/> </td></tr>
                </table>
            </fieldset>

            <fieldset>
                <legend>Counter Speed</legend>
                <table>
                    <tr><td>Flips Per Second:</td><td><input type="number" name="m_speed" value="<?= $cfg['m_speed']?>"/> </td></tr>
                </table>
            </fieldset>

            <fieldset>
                <legend>Counter Operation</legend>
                <table>
                    <tr><td colspan="2"><button type="button" id="save" style="background: #ccc;">Save</button>&nbsp;&nbsp;<?php if(intVal($cfg['m_status'])===0){?><button type="button" id="start" style="background: #0f0;">Start Counter</button><?php }else{?><button type="button" id="stop" style="background: orange">Stop Counter</button><?php }?>&nbsp;&nbsp;<button type="button" id="reset" style="background: #ccc;">Reset Counter</button></td></tr>
                </table>
            </fieldset>
            <input type="hidden" name="oprtype" id="oprtype"/>
        </form>
    </div>

</body>
</html>
<?php

?>