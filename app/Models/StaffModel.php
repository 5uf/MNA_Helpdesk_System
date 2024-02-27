<?php

namespace App\Models;
use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $allowedFields = ['id_staff','nama', 'username', 'katalaluan','kp12','kp8','jantina','t_lahir','jawatan','gred','bahagian','no_tel_pej','no_hp','email','ap_admin','ap_helpdesk','ap_pegawai','ap_cuti','ap_nota','ap_tugasan','ap_aktiviti','ap_kursus','ap_nota','status','aturan'];

public function getLogin($user){

     return $this->where(['username' => $user])->find();

}
public function getStaff(){
    return $this->asArray()
                ->where(['id_staff' => $id])
                ->findAll();
  }
public function getTask($status,$id){

      if($status === '1' || $status === '2'){
        $sql = 'tugas_harian.id_staff = '.$id.' AND tugas_harian.tugas_status = '.$status.'';
    } else {
        $sql = 'tugas_harian.id_staff = '.$id.'';
    }

    return $this->orderBy('bil',"desc")
                ->join('tugas_harian', 'tugas_harian.id_staff = staff.id_staff', 'inner')
                ->where($sql)
                ->distinct(true)
                ->asArray()
                ->findAll();
   
   }
public function getTask2($id){

    return $this->orderBy('bil',"desc")
                ->join('tugas_harian', 'tugas_harian.id_staff = staff.id_staff', 'inner')
                ->where('tugas_harian.id_staff',$id)
                ->distinct(true)
                ->asArray()
                ->findAll();
   
   }
}