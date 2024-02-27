<?php 

namespace App\Models;

use CodeIgniter\Model;

class StartModel extends Model{

protected $table= 'helpdesk';
protected $primaryKey = 'tarikh';
protected $allowedFields = ['no_rujukan','no_rujukan_caw','tarikh','nama','jawatan', 'tel_ext','bahagian','tingkat', 'kerosakan','peralatan','perisian', 'keterangan','tindakan','tindakan_lain','tarikh_tindakan','status','status_lain'];

public function getReport(){
        return $this->orderBy('tarikh',"desc")
        ->join('bahagian', 'bahagian.kod = helpdesk.bahagian', 'inner')
        ->join('status', 'status.kod = helpdesk.status', 'left')
        ->join('response_time', 'response_time.no_rujukan2 = helpdesk.no_rujukan', 'left')
        ->distinct(true)
        ->findAll(25);
}
public function getReport2(){
        return $this->orderBy('tarikh',"desc")
        ->join('bahagian', 'bahagian.kod = helpdesk.bahagian', 'inner')
        ->join('status', 'status.kod = helpdesk.status', 'left')
        ->join('response_time', 'response_time.no_rujukan2 = helpdesk.no_rujukan', 'left')
        ->where('year(tarikh)', date('Y'))
        ->where('month(tarikh)', date('m'))
        ->distinct(true)
        ->findAll(10);
}
public function viewReport($slug,$num){
    return $this->asArray()
                ->join('bahagian', 'bahagian.kod = helpdesk.bahagian', 'inner')
                ->join('status', 'status.kod = helpdesk.status', 'left')
                ->join('tindakan', 'tindakan.kod = helpdesk.tindakan', 'left')
                ->join('response_time', 'response_time.no_rujukan2 = helpdesk.no_rujukan', 'left')
                ->like('no_rujukan', $num)
                ->distinct(true)
                ->findAll();
}
public function searchReport($array){

    $datetime= "".$array['tahun']."-".$array['bulan']."";

    return $this->orderBy('tarikh',"desc")
        ->join('bahagian', 'bahagian.kod = helpdesk.bahagian', 'inner')
        ->join('status', 'status.kod = helpdesk.status', 'left')
        ->join('response_time', 'response_time.no_rujukan2 = helpdesk.no_rujukan', 'left')
        ->like('year(tarikh)',$array['tahun'])
        ->like('tarikh', $datetime)
        ->like('status',$array['status'])
        ->like('bahagian',$array['bahagian'])
        ->like('nama', ucwords($array['nama']), 'both')
         ->distinct(true)
        ->findAll();

}
public function getReportList($year,$month,$status){

    if($status === 'D'){
        $sql = 'year(tarikh) = '.$year.' AND month(tarikh) = '.$month.' AND status <> "" AND status <> "Y" ';
    }elseif ($status === 'Y') {
        $sql = 'year(tarikh) = '.$year.' AND month(tarikh) = '.$month.' AND status = "Y"  ';
    }elseif ($status === 'N') {
        $sql = 'year(tarikh) = '.$year.' AND month(tarikh) = '.$month.' AND status = ""  ';
    } else {
        $sql = 'year(tarikh) = '.$year.' AND month(tarikh) = '.$month.' ';
    }

  
    return $this->join('helpdesk_masalah', 'helpdesk_masalah.kod = helpdesk.kerosakan', 'left')
                ->join('bahagian', 'bahagian.kod = helpdesk.bahagian', 'left')
                ->join('status', 'status.kod = helpdesk.status', 'left')
                ->join('tindakan', 'tindakan.kod = helpdesk.tindakan', 'left')
                 ->join('response_time', 'response_time.no_rujukan2 = helpdesk.no_rujukan', 'left')
                ->where($sql)
                ->distinct(true)
                ->asArray()
                ->findAll();
   
   }
public function getIndex(){
   
        return $this->orderBy('tarikh',"desc")
                    ->where('year(tarikh)',date('Y'))
                    ->where('month(tarikh)',date('m'))
                    ->where('day(tarikh)',date('d'))
                    ->findAll();
    
}
public function getStats($year){

      return $this->asArray()
                ->orderBy('tarikh',"asc")
                ->where('tarikh' , date($year))
                ->get();    
 }
 public function getTrim($status){

    $perisian = "DDMS 2.0";

    return $this->orderBy('tarikh',"desc")
                ->join('helpdesk_masalah', 'helpdesk_masalah.kod = helpdesk.kerosakan', 'inner')
                ->join('bahagian', 'bahagian.kod = helpdesk.bahagian', 'inner')
                ->join('status', 'status.kod = helpdesk.status', 'inner')
                ->join('tindakan', 'tindakan.kod = helpdesk.tindakan', 'left')
                ->like('perisian',$perisian)
                ->where('status',$status)
                ->distinct(true)
                ->asArray()
                ->findAll(50);
   
   }

}