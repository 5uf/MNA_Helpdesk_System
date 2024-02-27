<?php

namespace App\Controllers;

use App\Models\StartModel;
use App\Models\ResponseModel;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;


class Report extends Controller
{

  public function index()
  {
    session();
    if (isset($_SESSION['nama'])) {
      $model = new StartModel();
      $data['report'] = $model->getReport();
      echo view('templates/navbar');
      echo view('helpdesk_menu');

    } else {
      echo view('loginpage');
    }
  }

  public function menu()
  {

    try {
      session();
      if (isset($_SESSION['nama'])) {
        $model = new StartModel();
        $data['report'] = $model->getReport();

        return view('report_menu', $data);

      } else {
        echo view('loginpage');
      }

    } catch (Exception $e) {
      log_message('error: ', $e->getMessage());
      return;
    }
  }

  public function view($menu)
  {
    session();
    if (isset($_SESSION['nama'])) {

      $year = $this->request->getPost('year');

      if ($menu === 'stats') {
        $this->stats($year);
      } else if ($menu === 'annual') {
        $this->annual($year);
      } else if ($menu === 'isoreport') {
        $this->isoreport($year);
      } else {
        $this->index();
      }

    } else {
      echo view('loginpage');
    }

  }
  public function search()
  {

    session();
    if (isset($_SESSION['nama'])) {

      $model = new StartModel();
      $status = $this->request->getPost('status');
      if (empty($status)) {
        $status = "%";
      }
      $nama = $this->request->getPost('nama');
      if (empty($nama)) {
        $nama = "%";
      }
      $bulan = $this->request->getPost('bulan');
      if (empty($bulan)) {
        $bulan = "%";
      }
      $tahun = $this->request->getPost('tahun');
      if (empty($tahun)) {
        $tahun = "%";
      }
      $bahagian = $this->request->getPost('kod_bahagian');
      if (empty($bahagian)) {
        $bahagian = "%";
      }
      //if ($bahagian == "%" && $status == "%" && $nama == "%" && $tahun == "%" && $bulan == "%") {
      //    $this->menu();
      // } else {
      $data['array'] = array(
        'nama' => $nama,
        'status' => $status,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'bahagian' => $bahagian
      );
      $data['report'] = $model->searchReport($data['array']);

      return view('report_menu', $data); // }

    } else {
      echo view('loginpage');
    }
  }

  public function viewreport($slug, $no_ruj)
  {

    session();
    if (isset($_SESSION['nama'])) {

      $model = new StartModel();
      $data['report'] = $model->viewReport($slug, $no_ruj);
      $data['title'] = "Kemaskini Maklumat laporan";

      if (empty($no_ruj)) {
        $this->menu();
      }

      echo view('templates/navbar');
      echo view('report_details', $data);
      echo view('templates/footer');

    } else {
      echo view('loginpage');
    }

  }

  public function listreport($year, $month, $status)
  {
    session();
    setlocale(LC_ALL, 'ms');
    if (isset($_SESSION['nama'])) {
      $model = new StartModel();
      $data['report'] = $model->getReportList($year, $month, $status);
      $textmonth = strftime("%B", mktime(0, 0, 0, $month, 10));
      if ($status === 'D') {
        $data['stitle'] = " Dalam Tindakan |  Bulan: " . $textmonth . " Tahun: " . $year;
      } elseif ($status === 'Y') {
        $data['stitle'] = " Selesai |  Bulan: " . $textmonth . " Tahun: " . $year;
      } elseif ($status === 'N') {
        $data['stitle'] = " Tiada Status |  Bulan: " . $textmonth . " Tahun: " . $year;
      } else {
        $data['stitle'] = " Keseluruhan |  Bulan: " . $textmonth . " Tahun: " . $year;
      }
      echo view('templates/navbar');
      echo view('report_list', $data);
      echo view('templates/footer');

    } else {
      echo view('loginpage');
    }

  }

  public function lapdir()
  {
    session();
    if (isset($_SESSION['nama'])) {
      $month = $this->request->getPost('month');
      $this->laporan($month);
    } else {
      echo view('loginpage');
    }
  }
  public function laporan()
  {
    session();
    if (isset($_SESSION['nama'])) {
      $year = date('Y');
      $model = new StartModel();
      $data['report'] = $model->getReport2();
      $query = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND status = "" ');
      $query2 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND status != "Y" AND status != "" ');
      $query3 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . ' AND status = "Y"');
      $query4 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 01 AND peralatan = "Komputer"');
      $query5 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 01 AND peralatan = "Pencetak"');
      $query6 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 01 AND peralatan = "Lain-lain"');
      $query7 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "Windows"');
      $query8 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "Internet"');
      $query9 = $model->query('SELECT count(no_rujukan)  as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "Email Arkib" ');
      $query10 = $model->query('SELECT count(no_rujukan)  as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "COMPASS"');
      $query11 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "Kod Sumber"');
      $query12 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "DDMS 2.0"');
      $query13 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  AND kerosakan = 02 AND perisian = "Lain-Lain" ');
      $total = $model->query('SELECT count(no_rujukan) as x FROM helpdesk 
        WHERE year(tarikh) = ' . $year . '  ');

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
      echo view('templates/navbar');
      echo view('laporan', $data);
      echo view('templates/footer');
    } else {
      return redirect()->route('login');
    }
  }
  public function updatereport($slug, $id)
  {

    session();
    if (isset($_SESSION['nama'])) {
      $model = new StartModel();
      $ruj = "STM/" . $id;
      $status = $this->request->getPost('status');
      $timestamp = $this->request->getPost('timestamp');

      if ($this->request->getMethod() === 'post') {
        if ($status === 'D') {
          $this->responsetime($ruj, $timestamp);
          $data = [
            'tindakan' => $this->request->getPost('tindakan'),
            'status' => $status,
            'status_lain' => $this->request->getPost('status_lain'),
            'tindakan_lain' => $this->request->getPost('tindakan_lain')
          ];
          $model->like('no_rujukan', $id)->set($data)->update();
          $model->query('UPDATE helpdesk SET pegawai_btm = "' . $_SESSION['nama'] . '" WHERE no_rujukan like "%' . $id . '" ');


          $query = $model->query('SELECT * FROM email WHERE no_rujukan like "%' . $id . '"');
          $result = $query->getResult();
          if (!empty($result)) {
            $query = $model->query('SELECT * FROM helpdesk WHERE no_rujukan like "%' . $id . '"');
            $data = $query->getResult();
            $message = "
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
</head>
<body>
<h3>Assalamualaikum wbt dan Salam Sejahtera</h3>
<p>kepada Encik atau Puan,</p><br>
<p>Pihak STM telah menerima laporan dan akan menghubungi pihak Tuan/Puan untuk tindakan selanjutnya</p>
<br><br><br>
<p>Terima Kasih</p>
</body>
</html> 
 ";

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
              //Server settings
              // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host = 'smtp.hostinger.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth = true;                                   //Enable SMTP authentication
              $mail->Username = 'admin@muhdsufi.tech';                     //SMTP username
              $mail->Password = 'c3VmaQ==21@!A1';                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

              //Recipients
              $mail->setFrom('admin@muhdsufi.tech', 'Sistem Helpdesk');  //Test Server for email testing
              $mail->addAddress($result[0]->rep_email);     //Add a recipient
              //$mail->addAddress('teknikalstm@arkib.gov.my');               //Name is optional
              //$mail->addAddress('helpdesk@arkib.gov.my'); 

              //Attachments
              //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Sistem Helpdesk - Laporan Kerosakan';
              $mail->Body = $message;
              $mail->AltBody = 'Sistem Helpdesk - Laporan Kerosakan';

              $mail->send();
            } catch (Exception $e) {
              echo "<script>document.addEventListener(\"DOMContentLoaded\", function(){ 
                         prompt(\"Failed, The mail could not sent to {$mail->ErrorInfo}\");}); 
                       </script>";
            }
          }

        } elseif ($status === 'Y') {
          $data = [
            'tarikh_tindakan' => $timestamp,
            'tindakan' => $this->request->getPost('tindakan'),
            'status' => $status,
            'status_lain' => $this->request->getPost('status_lain'),
            'tindakan_lain' => $this->request->getPost('tindakan_lain'),
            'pegawai_btm' => $this->request->getPost('pegawai')
          ];

          $model->like('no_rujukan', $id)->set($data)->update();
        } else {
          $data = [
            'tarikh_tindakan' => $timestamp,
            'tindakan' => $this->request->getPost('tindakan'),
            'status' => $status,
            'status_lain' => $this->request->getPost('status_lain'),
            'tindakan_lain' => $this->request->getPost('tindakan'),
            'pegawai_btm' => $this->request->getPost('pegawai')
          ];

          $model->like('no_rujukan', $id)->set($data)->update();
        }
        $this->viewreport($slug = false, $ruj);
      }
    } else {
      echo view('loginpage');
    }



  }

  public function annual($year)
  {

    session();
    if (isset($_SESSION['nama'])) {
      echo view('templates/navbar');
      $model = new StartModel();
      $data['year'] = $year;


      $query = $model->query('SELECT * FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "1" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount'] = count($progress);

      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "2" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount2'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "3" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount3'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "4" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount4'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "5" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount5'] = count($progress);

      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "6" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount6'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "&" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount7'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "9" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount8'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "10" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount9'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "11" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount10'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "12" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount11'] = count($progress);


      $query = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "6" AND  status = "D" ');
      $progress = $query->getResult();
      $data['pcount12'] = count($progress);


      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "1" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "2" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount2'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "3" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount3'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "4" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount4'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "5" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount5'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "6" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount6'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "7" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount7'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "8" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount8'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "9" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount9'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "10" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount10'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "11" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount11'] = count($done);

      $query2 = $model->query('SELECT no_rujukan FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = "12" AND  status = "Y" ');
      $done = $query2->getResult();
      $data['dcount12'] = count($done);

      $data['total'] = $data['pcount'] + $data['dcount'];
      $data['total2'] = $data['pcount2'] + $data['dcount2'];
      $data['total3'] = $data['pcount3'] + $data['dcount3'];
      $data['total4'] = $data['pcount4'] + $data['dcount4'];
      $data['total5'] = $data['pcount5'] + $data['dcount5'];
      $data['total6'] = $data['pcount6'] + $data['dcount6'];
      $data['total7'] = $data['pcount7'] + $data['dcount7'];
      $data['total8'] = $data['pcount8'] + $data['dcount8'];
      $data['total9'] = $data['pcount9'] + $data['dcount9'];
      $data['total10'] = $data['pcount10'] + $data['dcount10'];
      $data['total11'] = $data['pcount11'] + $data['dcount11'];
      $data['total12'] = $data['pcount12'] + $data['dcount12'];

      //Array Method for annual subdirectory 
      /* $pcount= array(); 
      $dcount= array();
      for($month=1; $month != 13 ; $month++) { 
      $data['month'] = $month;
      $query = $model->query('SELECT * FROM helpdesk WHERE year(tarikh) = '.$year.' AND month(tarikh) = '.$month.' AND  status = "D" ');
      $query2= $model->query('SELECT * FROM helpdesk WHERE year(tarikh) = '.$year.' AND  month(tarikh) = '.$month.' AND  status = "Y" ');
      $progress = $query->getResult();
      $done = $query2->getResult();
      echo "<br>The in-progress reports in the month ".$month." is: ",count($progress);
      echo "<br>The completed reports in the month ".$month." is: ",count($done);
      array_push($pcount, array('pcount' => count($progress)));
      array_push($dcount, array('dcount' => count($done)));      }*/
      echo view('templates/statnav');
      echo "<h6 align=\"center\"><font color=\"red\">*Klik Nombor Untuk Senarai Laporan*</font></h6>";
      echo view('reportbymonth', $data);
      echo view('templates/footer');

    } else {
      echo view('loginpage');
    }
  }

  public function stats($year)
  {

    session();
    setlocale(LC_ALL, 'ms');
    if (isset($_SESSION['nama'])) {

      $model = new StartModel();
      $data['year'] = $year;
      $data2['title'] = "Statistik Laporan Helpdesk";
      echo view('templates/navbar');
      echo view('templates/statnav');
      echo "<h6 align=\"center\"><font color=\"red\">*Klik Tajuk Laporan Untuk Carta Visual*</font></h6>";
      for ($month = 1; $month != 13; $month++) {
        $data['month'] = strftime("%B", mktime(0, 0, 0, $month, 10));
        $total = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' ');
        $query = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 03 ');
        $query2 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 ');
        $query3 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02');
        $query4 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 AND peralatan = "Komputer"');
        $query5 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 AND peralatan = "Pencetak"');
        $query6 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01 AND peralatan = "Lain-lain"');
        $query7 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Windows"');
        $query8 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Internet"');
        $query9 = $model->query('SELECT count(no_rujukan)  as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Email Arkib" ');
        $query10 = $model->query('SELECT count(no_rujukan)  as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "COMPASS"');
        $query11 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Kod Sumber"');
        $query12 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "DDMS 2.0"');
        $query13 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02 AND perisian = "Lain-Lain" ');
        $data['stats'] = $query->getResult();
        $data['stats2'] = $query2->getResult();
        $data['stats3'] = $query3->getResult();
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
        echo view('stats', $data);
      }
      echo view('templates/footer');

    } else {
      echo view('loginpage');
    }
  }
  public function chart($year, $m)
  {

    session();
    if (isset($_SESSION['nama'])) {

      try {
        $model = new StartModel();
        $data['year'] = $year;
        setlocale(LC_TIME, 'ms');
        $data['month'] = strftime('%B', mktime(0, 0, 0, date('m', strtotime($m)), 10));
        $month = date('m', strtotime($m));
        $query = $model->query('SELECT count(no_rujukan) as count FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 01');
        $query2 = $model->query('SELECT count(no_rujukan) as count2 FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 02');
        $query3 = $model->query('SELECT count(no_rujukan) as count3 FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND kerosakan = 03');
        $query4 = $model->query('SELECT count(no_rujukan) as count4 FROM helpdesk 
            WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND peralatan = "Komputer"');
        $query5 = $model->query('SELECT count(no_rujukan) as count5 FROM helpdesk 
            WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND peralatan = "Pencetak"');
        $query6 = $model->query('SELECT count(no_rujukan) as count6 FROM helpdesk 
            WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND peralatan = "Lain-lain"');
        $query7 = $model->query('SELECT count(no_rujukan) as count7 FROM helpdesk 
            WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "Windows"');
        $query8 = $model->query('SELECT count(no_rujukan) as count8 FROM helpdesk 
            WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "Internet"');
        $query9 = $model->query('SELECT count(no_rujukan) as count9 FROM helpdesk
           WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "Email Arkib" ');
        $query10 = $model->query('SELECT count(no_rujukan) as count10 FROM helpdesk 
            WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "COMPASS"');
        $query11 = $model->query('SELECT count(no_rujukan) as count11 FROM helpdesk
           WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "Kod Sumber"');
        $query12 = $model->query('SELECT count(no_rujukan) as count12 FROM helpdesk
           WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "DDMS 2.0"');
        $query13 = $model->query('SELECT count(no_rujukan) as count13 FROM helpdesk
           WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND perisian = "Lain-Lain" ');
        $data['pie4'] = $query4->getResult();
        $data['pie5'] = $query5->getResult();
        $data['pie6'] = $query6->getResult();
        $data['pie7'] = $query7->getResult();
        $data['pie8'] = $query8->getResult();
        $data['pie9'] = $query9->getResult();
        $data['pie10'] = $query10->getResult();
        $data['pie11'] = $query11->getResult();
        $data['pie12'] = $query12->getResult();
        $data['pie13'] = $query13->getResult();
        $data['total'] = $query->getResult();
        $data['total2'] = $query2->getResult();
        $data['total'] = $query->getResult();
        $data['total2'] = $query2->getResult();
        $data['total3'] = $query3->getResult();
        echo view('templates/navbar');
        echo view('piechart2', $data);
        echo view('templates/footer');
      } catch (mysqli_sql_exception $e) {
        $this->error();
      }

    } else {
      echo view('loginpage');
    }
  }

  public function isoreport($year)
  {

    session();
    setlocale(LC_ALL, 'ms');
    if (isset($_SESSION['nama'])) {
      try {
        $model = new StartModel();
        $data['year'] = $year;
        $data2['title'] = "Statistik Laporan ISO";
        echo view('templates/navbar');
        echo view('templates/statnav');
        echo "<h6 align=\"center\"><font color=\"red\">*Klik Tajuk Laporan Untuk Cetak*</font></h6>";
        for ($month = 1; $month != 13; $month++) {
          $data['month'] = strftime("%B", mktime(0, 0, 0, $month, 10));
          $data['fmonth'] = $month;
          $query = $model->query('SELECT count(no_rujukan) as x FROM helpdesk inner join response_time ON helpdesk.no_rujukan = response_time.no_rujukan2 WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND TIMESTAMPDIFF(MINUTE,tarikh,responsetime2) < "1440" ');
          $query2 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk inner join response_time ON helpdesk.no_rujukan = response_time.no_rujukan2 WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND TIMESTAMPDIFF(MINUTE,tarikh,responsetime2) > "1440" ');
          $query3 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk inner join response_time ON helpdesk.no_rujukan = response_time.no_rujukan2 WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND TIMESTAMPDIFF(MINUTE,tarikh,responsetime2) < "14400" ');
          $query4 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk inner join response_time ON helpdesk.no_rujukan = response_time.no_rujukan2 WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' AND TIMESTAMPDIFF(MINUTE,tarikh,responsetime2) > "14400" ');
          $query5 = $model->query('SELECT count(no_rujukan) as x FROM helpdesk WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' ');

          $data['less24'] = $query->getResult();
          $data['more24'] = $query2->getResult();
          $data['less10'] = $query3->getResult();
          $data['more10'] = $query4->getResult();
          $data['total'] = $query5->getResult();
          echo view('laporan_iso', $data);
        }
        echo view('templates/footer');

      } catch (mysqli_sql_exception $e) {
        $this->error();
      }

    } else {
      echo view('loginpage');
    }


  }
  public function print($year, $month)
  {

    $model = new StartModel();
    setlocale(LC_ALL, 'ms');
    $data['month'] = strftime("%B", mktime(0, 0, 0, $month, 10));
    $data['year'] = $year;
    $query = $model->query('SELECT DISTINCT * FROM helpdesk 
     left join response_time ON helpdesk.no_rujukan = response_time.no_rujukan2 
     left join bahagian ON helpdesk.bahagian = bahagian.kod 
     left join status ON helpdesk.status = status.kod
     WHERE year(tarikh) = ' . $year . ' AND month(tarikh) = ' . $month . ' ');

    $data['report'] = $query->getResult();

    //return view('pdf_report',$data);
    try {

      $dompdf = new Dompdf();
      $dompdf->loadHtml(view('pdf_report', $data));
      $dompdf->setPaper('A4', 'landscape');
      $dompdf->render();
      ob_end_clean();
      $dompdf->stream("Report ISO " . $data['month'] . "_" . $year . ".pdf");

    } catch (Exception $e) {

      echo view('pdf_report', $data);
      echo "<script>document.addEventListener(\"DOMContentLoaded\", function(){ window.print(); }); </script>";

    }


  }
  public function trimddms($status)
  {

    session();
    if (isset($_SESSION['nama'])) {

      $model = new StartModel();
      $data['report'] = $model->getTrim($status);

      echo view('templates/navbar');
      echo view('trimddms/trimddms_navbar');
      echo view('trimddms/new_trimddms', $data);
      echo view('templates/footer');

    } else {
      echo view('loginpage');
    }


  }
  public function responsetime($ruj, $time)
  {

    $model = new ResponseModel();
    $date = strtotime($time);
    $timestamp = date('d/m/Y (H:i A)', $date);
    $data = [
      'no_rujukan2' => esc($ruj),
      'response_time' => $timestamp,
      'responsetime2' => $time
    ];

    $model->set($data)->insert();
  }
}
