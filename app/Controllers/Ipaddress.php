<?php 

namespace App\Controllers;

use App\Models\IPModel;
use App\Models\IPModel2;
use CodeIgniter\Controller;

class Ipaddress extends Controller{

    public function index(){
    
    session();
    if(isset($_SESSION['nama'])){
        echo view('templates/navbar');
        echo view('ip_list');
        echo view('templates/footer');
    }else{
      echo view('loginpage');
    }
  }
    public function oldip($tempat){

    session();
    if(isset($_SESSION['nama'])){
    
        $model= new IPModel();
        $data ['type'] = 'old';
        $subnet = explode('|', $tempat);        
        $data['branch'] = $subnet[1];
        $data['report'] = $model->getIP($subnet[0]);

        echo view('templates/navbar');
        echo "<style> @media (min-width: 992px) {
            #menu-sidebar { margin-left: -300px;}
            #menu-sidebar.active { margin-left: 0;
            position: fixed;}
            #sidebar { margin-left: -300px; }
            #sidebar.active { margin-left: 0;}
            #sidebarCollapse span {display: none;}</style>";
        echo view('ip_list',$data);
        echo view('templates/footer');

    }else{
      echo view('loginpage');
    }
       
} 
    public function newip($tempat){

        session();
    if(isset($_SESSION['nama'])){
    
        $model= new IPModel2();
        $data ['type'] = 'new';
        $subnet = explode('|', $tempat);        
        $data['branch'] = $subnet[1];
        $data['report'] = $model->getIP2($subnet[0]);
         
        echo view('templates/navbar');
        echo view('ip_list',$data);
        echo view('templates/footer');

    }else{
      echo view('loginpage');
    }
       

   }
    public function update($type,$ip){

        session();
      if(isset($_SESSION['nama'])){
    
         $model= new IPModel();
         $model2= new IPModel2();
         $data['type']=$type;
         $data['ip']=$ip;

        if ($type === 'old') {
              $data ['address'] = $model->searchIP($ip);
               echo view('templates/navbar');
               echo view('update_ip',$data);
               echo view('templates/footer');
        } elseif(($type === 'new')) {
              $data ['address'] = $model2->searchIP2($ip);
               echo view('templates/navbar');
               echo view('update_ip',$data);
               echo view('templates/footer');
        } else{
            echo view('templates/navbar');
            echo view('update_ip');
            echo view('templates/footer');
        }

    }else{
      echo view('loginpage');
    }
        
   }     
     public function updateip(){

        session();
       if(isset($_SESSION['nama'])){
    
         $model= new IPModel();
         $model2= new IPModel2();
         $type = $this->request->getPost('type');
         $ip = $this->request->getPost('ip');
         $route = $this->request->getPost('route');
        if ($type === 'old') {

        $model->query('UPDATE ip_table SET hostname = "'.$this->request->getPost('hostname').'" WHERE ip = "'.$ip.'" ');
        $model->query('UPDATE ip_table SET user = "'.$this->request->getPost('user').'" WHERE ip = "'.$ip.'" ');
        $model->query('UPDATE ip_table SET jawatan = "'.$this->request->getPost('jawatan').'" WHERE ip = "'.$ip.'" ');
        $model->query('UPDATE ip_table SET cawangan = "'.$this->request->getPost('cawangan').'" WHERE ip = "'.$ip.'" ');
        echo "<script>document.addEventListener(\"DOMContentLoaded\", function(){ prompt(\"Success, Password Has Changed!\");});</script>";
        return redirect()->to($route);

        }else {
              
            $model2->query('UPDATE ip_table SET hostname = "'.$this->request->getPost('hostname').'" WHERE ip = "'.$ip.'" ');
            $model2->query('UPDATE ip_table SET user = "'.$this->request->getPost('user').'" WHERE ip = "'.$ip.'" ');
            $model2->query('UPDATE ip_table SET jawatan = "'.$this->request->getPost('jawatan').'" WHERE ip = "'.$ip.'" ');
            $model2->query('UPDATE ip_table SET cawangan = "'.$this->request->getPost('cawangan').'" WHERE ip = "'.$ip.'" ');
            return redirect()->to($route);}


          }else{  echo view('loginpage'); }
       
     }
   /*public function createip(){

        session();
       if(isset($_SESSION['nama'])){
    
         $model= new IPModel2();
         $ip = $this->request->getPost('ip');
         $num = explode('.', $ip);

         $data = ['ip' => $ip,'hostname' => $this->request->getPost('hostname'),'user' => $this->request->getPost('user'),'jawatan' => $this->request->getPost('jawatan'),'pc_spec' => 0,'cawangan' => $this->request->getPost('cawangan'),'kosong' => 1];

         $model->set($data)->insert();

      }else{
      echo view('loginpage');
    }
       

   }*/
}