<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\StartModel;
use Dompdf\Dompdf;

class PDFgen extends Controller
{

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

   public function print2()
   {

      return view('pdf_report');


   }
}