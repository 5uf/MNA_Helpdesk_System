<?php

namespace App\Models;
use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tugas_harian';
    protected $primaryKey = 'bil';
    protected $allowedFields = ['bil','id_staff','hari1','bulan1','tahun1','hari2','bulan2','tahun2','tugas','tempat','kuantiti','catatan','tugas_status'];


    public function getTask($status,$id){

    return $this->orderBy('bil',"desc")
                ->where('status',$status)
                ->where('id_staff',$id)
                ->distinct(true)
                ->findAll();
   }
}