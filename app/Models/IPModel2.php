<?php

namespace App\Models;

use CodeIgniter\Model;

class IpModel2 extends Model
{
    protected $table = 'ip_table2';
    protected $primaryKey = 'num';
    protected $allowedFields = ['num','ip','hostname','user', 'jawatan','cawangan','pc_spec','kosong'];

public function getIP2($ip){

    return $this->asArray()
                ->orderBy('num', 'asc')   
                ->like('ip',$ip,'after')
                ->findAll();
 }
public function searchIP2($ip){

    return $this->asArray()
                ->orderBy('num', 'asc')   
                ->where('ip',$ip)
                ->findAll();
 }

}