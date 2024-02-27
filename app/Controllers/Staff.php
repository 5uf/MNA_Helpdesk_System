<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Models\StartModel;
use App\Models\TaskModel;
use CodeIgniter\Controller;
use CodeIgniter\Encryption;

class Staff extends Controller
{
    public function index()
    { //Staff Login Page

        return view('loginpage');

    }
    public function index2()
    { //Admin Login Page

        return view('login2');

    }
    public function users()
    { //List all staff

        session();
        if (isset($_SESSION['username'])) {

            if ($_SESSION['admin'] === "Y") {

                echo view('templates/navbar');
                echo view('users');
                echo view('templates/footer');
            } else {
                return redirect()->route('menu');
            }

        } else {
            return redirect()->route('login');
        }
    }
    public function menu()
    {
        session();
        $year = date('Y'); // change value for testing chart
        $month = date('m');   // change value for testing chart
        if (isset($_SESSION['nama'])) {
            $model = new StaffModel();
            $model2 = new StartModel();
            $data['report'] = $model2->getReport2();
            $query = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND status = "" ');
            $query2 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND status != "Y" AND status != "" ');
            $query3 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND status = "Y"');
            $query4 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 AND peralatan = "Komputer"');
            $query5 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 AND peralatan = "Pencetak"');
            $query6 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 AND peralatan = "Lain-lain"');
            $query7 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Windows"');
            $query8 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Internet"');
            $query9 = $model->query('SELECT count(no_rujukan)  as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Email Arkib" ');
            $query10 = $model->query('SELECT count(no_rujukan)  as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "COMPASS"');
            $query11 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Kod Sumber"');
            $query12 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "DDMS 2.0"');
            $query13 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Lain-Lain" ');
            $total = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' ');

            $data['new'] = $query->getResult();
            $data['progress'] = $query2->getResult();
            $data['completed'] = $query3->getResult();
            $data['stats4'] = $query4->getResult();
            $data['stats5'] = $query5->getResult();
            $data['stats6'] = $query6->getResult();
            $data['stats7'] = $query7->getResult();
            $data['stats8'] = $query8->getResult();
            $data['stats9'] = $query9->getResult();
            $data['stats10'] = $query10->getResult();
            $data['stats11'] = $query11->getResult();
            $data['stats12'] = $query12->getResult();
            $data['stats13'] = $query13->getResult();
            $data['total'] = $total->getResult();
            echo view('helpdesk_menu', $data);

        } else {
            return redirect()->route('login');
        }

    }
    public function create()
    {
        session();
        if (isset($_SESSION['username'])) {
            if ($_SESSION['admin'] === "Y") {
                echo view('templates/navbar');
                echo view('createprofile');
                echo view('templates/footer');
            } else {
                return redirect()->route('menu');
            }
        } else {
            return redirect()->route('login');
        }

    }
    public function reset()
    {
        session();
        if (isset($_SESSION['nama'])) {
            if ($_SESSION['admin'] === "Y") {
                echo view('templates/navbar');
                echo view('resetpass');
                echo view('templates/footer');
            } else {
                return redirect()->route('menu');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function resetpassword()
    {

        session();
        if (isset($_SESSION['nama'])) {

            if ($_SESSION['admin'] === "Y") {

                $model = new StaffModel();
                $user = $this->request->getPost('username');
                $pass1 = $this->request->getPost('password1');
                $pass2 = $this->request->getPost('password2');
                if ($pass1 === $pass2) {
                    $query = $model->query('SELECT OLD_PASSWORD("' . $pass1 . '") as hash');
                    $hash = $query->getResult();
                    $data = ['username' => $user, 'katalaluan' => $hash[0]->hash];
                    $model->where('username', $user)->set($data)->update();
                    echo "<script>document.addEventListener(\"DOMContentLoaded\", function(){ 
                         prompt(\"Success, Password Has Changed!\");}); 
                       </script>";
                    return redirect()->route('menu');

                } else {
                    return redirect()->route('reset');
                    // Remove the unreachable code
                    // echo "<script>document.addEventListener(\"DOMContentLoaded\", function(){prompt(\"Password Not Matched!\");}); </script>";
                }
            } else {
                return redirect()->route('menu');
            }

        } else {
            return redirect()->route('login');
        }

    }
    public function login()
    {

        $model = new StaffModel();
        $user = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $query = $model->query('SELECT OLD_PASSWORD("' . $pass . '") as hash');
        $query2 = $model->query('SELECT katalaluan FROM staff WHERE username= "' . $user . '" ');
        $hash = $query->getResult();
        $pass2 = $query2->getResult();

        if (empty($pass2)) {
            echo view('loginpage', ['message' => '<div class=\"alert alert-danger\"><h5 align=\"center\">Wrong Username Or Password!</h5></div>']);

        } elseif ($hash[0]->hash === $pass2[0]->katalaluan) {

            $query3 = $model->query('SELECT * FROM staff WHERE
          username= "' . $user . '" ');
            $data = $query3->getResult();
            $session =
                session();
            $session->set('id', $data[0]->id_staff);
            $session->set
            ('username', $user);
            $session->set('nama', ucfirst($data
            [0]->nama));
            $session->set('jawatan', $data
            [0]->jawatan);
            $session->set('admin', $data[0]->ap_admin);
            return
                redirect()->route('menu');
        } else {
            echo view(
                'loginpage',
                ['message' => '<div class=\"alert alert-danger\"><h5 align=\"center\">Wrong Username Or Password!</h5></div>']
            );

        }
    }
    public function profile()
    {
        session();
        if (isset($_SESSION['nama'])) {

            $model = new StaffModel();
            $query = $model->query('SELECT * FROM staff WHERE id_staff = "' . $_SESSION['id'] . '" ');
            $data['profile'] = $query->getResult();
            echo view('templates/navbar');
            echo view('profilepage', $data);
            echo view('templates/footer');

        } else {
            return redirect()->route('login');
        }

    }
    public function updateprofile($id)
    {

        session();
        if (isset($_SESSION['nama'])) {

            $model = new StaffModel();

            if ($this->request->getMethod() === 'post') {

                $pass = $this->request->getPost('katalaluan');
                $query = $model->query('SELECT OLD_PASSWORD("' . $pass . '") as hash');
                $hash = $query->getResult();

                if (!empty($pass)) {
                    $data = ['katalaluan' => $hash[0]->hash];
                    $model->where('id_staff', $id)->set($data)->update();
                }

                $data = ['nama' => $this->request->getPost('nama'), 'kp12' => $this->request->getPost('kp12'), 'kp8' => $this->request->getPost('kp8'), 't_lahir' => $this->request->getPost('t_lahir'), 'jantina' => $this->request->getPost('jantina'), 'no_tel_pej' => $this->request->getPost('no_tel_pej'), 'no_hp' => $this->request->getPost('no_hp'), 'email' => $this->request->getPost('email'), 'gred' => $this->request->getPost('gred'), 'jawatan' => $this->request->getPost('jawatan'), 'bahagian' => $this->request->getPost('bahagian'), 'alamat_rumah' => $this->request->getPost('alamat_rumah')];

                $model->where('id_staff', $id)->set($data)->update();

                return redirect()->route('profile');
            }
            $this->profile($id);

        } else {
            return redirect()->route('login');
        }

    }
    public function task($status)
    {

        session();
        if (isset($_SESSION['nama'])) {
            $id_staff = $_SESSION['id'];
            $model = new StaffModel();
            $data['report'] = $model->getTask($status, $id_staff);
            if ($status === 'new') {
                echo view('templates/navbar');
                echo view('tasks/addtask');
                echo view('templates/footer');
            } elseif ($status === '1') {
                echo view('templates/navbar');
                echo view('tasks/task', $data);
                echo view('templates/footer');
            } elseif ($status === 'list') {
                echo view('templates/navbar');
                echo view('tasks/tasklist');
                echo view('templates/footer');
            } elseif ($status === 'success') {
                echo view('templates/navbar');
                echo view('tasks/completedtask', $data);
                echo view('templates/footer', ['message' => '<div><div class=\"alert alert-success\" style=\"text-align: center;\"><strong>Task has been updated</strong></div></div>']);
            } else {
                echo view('templates/navbar');
                echo view('tasks/completedtask', $data);
                echo view('templates/footer');
            }

        } else {
            return redirect()->route('login');
        }

    }
    public function addtask()
    {

        session();
        if (isset($_SESSION['nama'])) {
            $model = new TaskModel();
            $id = $_SESSION['id'];
            $date1 = explode('-', $this->request->getPost('date1'));
            $date2 = explode('-', $this->request->getPost('date2'));

            if ($this->request->getMethod() === 'post' && $this->validate(['tugasan' => 'required'])) {

                $data = [
                    'id_staff' => $id,
                    'tugas' => $this->request->getPost('tugasan'),
                    'hari1' => $date1[2],
                    'bulan1' => $date1[1],
                    'tahun1' => $date1[0],
                    'hari2' => $date2[2],
                    'bulan2' => $date2[1],
                    'tahun2' => $date2[0],
                    'tempat' => $this->request->getPost('tempat'),
                    'catatan' => $this->request->getPost('catatan'),
                    'kuantiti' => $this->request->getPost('kuantiti'),
                    'tugas_status' => 1
                ];

                $model->set($data)->insert();

                return redirect()->route('task', ['message' => '<div><div class=\"alert alert-success\" style=\"text-align: center;\"><strong>New Task Has Been Added</strong></div></div>']);

            } else {
                echo "<script>document.addEventListener(\"DOMContentLoaded\", function(){ 
          alert(\"Not Submitted\");}); 
          </script>";
            }

        } else {
            echo view('loginpage');
        }

    }
    public function updatetask($idstaff)
    {

        session();
        if (isset($_SESSION['nama'])) {

            if ($this->request->getMethod() === 'post') {
                $model = new TaskModel();
                $uid = $this->request->getPost('uid');
                $data = ['tugas_status' => 2];
                $model->where('bil', $uid)->set($data)->update();
                if ($_SESSION['id'] === $idstaff) {

                    $this->task(2);

                } else {
                    redirect(base_url() . 'staff/tasklist/' . $idstaff . '');
                }

            }

        } else {
            echo view('loginpage');
        }

    }
    public function tasklist($id)
    {

        session();
        if (isset($_SESSION['nama'])) {
            $model = new StaffModel();
            $data['report'] = $model->getTask($status = '3', $id);
            echo view('templates/navbar');
            echo view('tasks/tasklist', $data);
            echo view('templates/footer');
        } else {
            return redirect()->route('login');
        }

    }
    public function createprofile()
    {

        session();
        if (isset($_SESSION['nama'])) {

            if ($_SESSION['admin'] === "Y") {

                $model = new StaffModel();
                if ($this->request->getMethod() === 'post') {

                    $pass = $this->request->getPost('katalaluan');
                    $query = $model->query('SELECT OLD_PASSWORD("' . $pass . '") as hash');
                    $hash = $query->getResult();

                    $data = ['nama' => $this->request->getPost('nama'), 'username' => $this->request->getPost('username'), 'katalaluan' => $hash[0]->hash, 'kp12' => $this->request->getPost('kp12'), 'kp8' => $this->request->getPost('kp8'), 'jantina' => $this->request->getPost('jantina'), 't_lahir' => $this->request->getPost('t_lahir'), 'jawatan' => $this->request->getPost('jawatan'), 'gred' => $this->request->getPost('gred'), 'bahagian' => $this->request->getPost('bahagian'), 'no_tel_pej' => $this->request->getPost('no_tel_pej'), 'no_hp' => $this->request->getPost('no_hp'), 'email' => $this->request->getPost('email'), 'alamat_rumah' => $this->request->getPost('alamat_rumah'), 'ap_admin' => $this->request->getPost('ap_admin'), 'ap_helpdesk' => $this->request->getPost('ap_helpdesk'), 'ap_pegawai' => $this->request->getPost('ap_pegawai'), 'ap_cuti' => $this->request->getPost('ap_cuti'), 'ap_nota' => $this->request->getPost('ap_nota'), 'ap_tugasan' => $this->request->getPost('ap_tugasan'), 'ap_aktiviti' => $this->request->getPost('ap_aktiviti'), 'ap_kursus' => $this->request->getPost('ap_kursus'), 'status' => $this->request->getPost('status'), 'aturan' => $this->request->getPost('aturan')];

                    $model->set($data)->insert();

                    echo "<div class=\"alert alert-success\" style=\"text-align: center;\">
         <strong>Success!</strong> The User has been created!
        </div>";
                    $this->create();
                }

            } else {
                return redirect()->route('menu');
            }

        } else {
            return redirect()->route('login');
        }


    }

}