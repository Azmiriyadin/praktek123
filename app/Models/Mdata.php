<?php
namespace App\Models;
use CodeIgniter\ModeL;
class Mdata extends ModeL{
    public function getPengarang(){
        $sql = "SELECT * FROM pengarang ORDER BY Nama_pengarang";
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getResult();
        }else{
            return 0;
        }
    }
    public function getPenerbit(){
        $sql = "SELECT * FROM penerbit ORDER BY Nama_Penerbit";
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getResult();
        }else{
            return 0;
        }
    }
    public function getCountry(){
        $sql = "SELECT COUNT(*) AS Jumlah FROM country";
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getRow();
        }else{
            return 0;
        }
    }
    public function getCity(){
        $sql = "SELECT COUNT(*) AS Jumlah FROM city";
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getRow();
        }else{
            return 0;
        }
    }
    public function getCountryLanguage(){
        $sql = "SELECT COUNT(*) AS Jumlah FROM countrylanguage";
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getRow();
        }else{
            return 0;
        }
    }
    public function getDataCountry(){
        $sql = "SELECT c.Name, l.Language
        from country as c
        left join countrylanguage as l
        on c.Code = l.CountryCode
        group by l.Language";
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getResult();
        }else{
            return 0;
        }
    }
   
    public function RekapDashboard($sql){
        $dt = db_connect()->query($sql);
        if($dt){
            return $dt->getResult();
        }else{
            return 0;
        }
    }
}
?>