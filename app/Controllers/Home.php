<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StartModel;
use CodeIgniter\I18n\Time;

class Home extends Controller{
    
    public function index(){  

      echo view('start');
     }
    public function fail()
    {
        return view('failure');
    }
}
