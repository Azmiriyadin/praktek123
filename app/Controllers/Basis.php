<?php
namespace App\Controllers;
use App\Models\Mdata;
class Basis extends BaseControLLer{
    public function index(){
        $x["hal"] = "beranda";
        $dtx = new Mdata();
        $x["jmlnegara"] = $dtx->getCountry();
        $x["jmlkota"] = $dtx->getCity(); 
        $x["jmlbahasa"] = $dtx->getCountryLanguage();
        $x["dtcountry"] = $dtx->getDataCountry();
        return view("home", $x);
    }
    private function os(){
        $ux = $_SERVER["HTTP_USER_AGENT"];
        if(preg_match("/linux/i", $ux)){
            $platform = "linux";
        }elseif(preg_match("/macintonsh|mac os x/i", $ux)){
            $platform = "macOs";
        }elseif(preg_match("/windows|win32/i", $ux)){
            $platform = "windows";
        }else{
            $platform = "Tidak Diketahui";
        }
        return $platform;
    }
    private function mac(){
        ob_start();
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();
        $findme = "physical";
        $pmac = strpos($mycom, $findme);
        $mac = substr($mycom, ($pmac + 36), 17);
        return $mac;
    }
    private function serial(){
        $seri = shell_exec('wmic diskdrive get serialnumber');
        return $seri;
    }
    public function tentang(){
        $x["hal"] = "tentang";
        $x["os"] = $this->os();
        $x["mac"] = $this->mac();
        $getserial = $x["os"] == "windows" ? $this->serial() : "Tidak Terdeteksi";
        $x["serial"] = str_replace("SerialNumber ","", $getserial);
        return view("home", $x);
    }
    public function getData(){
        $dtx = new Mdata();
        $dtJSON = '{"data": [xxx]}';
        $dtisi = "";
        $dt = $dtx->getBuku();
        foreach ($dt as $k){
            $kode = $k->Kode_Buku;
            $judul = $k->Judul;
            $pengarang = $k->Pengarang;
            $penerbit = $k->Penerbit;
            $tahun = $k->Tahun_Terbit;
            $isbn = $k->ISBN;
            $tombolkelola = sprintf("<button type='button' class='btn btn-primary' data-kode='%s' onclick='filter(this)'>Kelola</button>", $kode);
            $dtisi .= sprintf('["%s","%s","%s","%s","%s","%s","%s"],', $kode, $judul, $pengarang, $penerbit, $tahun, $isbn, $tombolkelola);
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }
    public function RekapDashboard(){
        $dtx = new Mdata();
        $jenis = $this->request->uri->getSegment(2);
        $nilai = urldecode($this->request->uri->getSegment(3));
        if($jenis == "bytahun"){
            $sql = sprintf("SELECT Judul FROM buku WHERE Tahun_Terbit = '%s'", $nilai);
        }elseif($jenis == "bypenerbit"){
            $sql = sprintf("SELECT Judul FROM buku_view WHERE Penerbit= '%s'", $nilai);
        }else{
            $sql = "SELECT Judul FROM buku WHERE Rak LIKE '".$nilai."%'";
        }
        $hasil = $dtx->RekapDashboard($sql);
        echo json_encode($hasil);
    }
}
?>