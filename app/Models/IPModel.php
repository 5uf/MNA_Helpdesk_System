<?php

namespace App\Models;

use CodeIgniter\Model;

class IpModel extends Model
{
    protected $table = 'ip_table';
    protected $primaryKey = 'num';
    protected $allowedFields = ['num','ip','hostname','user', 'jawatan','cawangan','pc_spec','kosong'];

public function getIP($ip){

    return $this->asArray()
                ->orderBy('num', 'asc')   
                ->like('ip',$ip, 'after')
                ->findAll();
 }
public function searchIP($ip){

    return $this->asArray()
                ->orderBy('num', 'asc')   
                ->where('ip',$ip)
                ->findAll();
 }


}