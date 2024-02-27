<?php 

namespace App\Models;

use CodeIgniter\Model;

class ResponseModel extends Model{

protected $table = 'response_time';
protected $primaryKey = 'no_rujukan2';
protected $allowedFields = ['no_rujukan2','response_time','responsetime2'];

   }