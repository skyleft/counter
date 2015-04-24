<?php

class IniFile{

    private $filename;

    function __construct($filename)
    {
        $this->filename = $filename;
    }


    public function writeAll($arr){
        $str = "";
        foreach($arr as $k=>$v){
            $str .= "$k = $v\n";
        }
        file_put_contents($this->filename,$str);
    }
    public function getAll(){
        return parse_ini_file($this->filename);
    }
    public function get($key){
        $cfg = parse_ini_file($this->filename);
        return $cfg[$key];
    }
}
?>