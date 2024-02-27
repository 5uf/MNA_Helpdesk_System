<?php

namespace App\Controllers;

use App\Models\StartModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Start extends Controller
{

    public function index()
    {

        $session = session();
        $model = new StartModel();
        $data['array'] = $model->getIndex();
        $session->set('index', count($data['array']));
        return view('startpage');
    }

    public function create()
    {

        $session = session();
        $model = new StartModel();

        if ($this->request->getMethod() === 'post' && $this->validate(['nama' => 'required'])) {

            $ruj = $this->request->getPost('no_rujukan');
            $timestamp = $this->request->getPost('tarikh');
            $nama = strtoupper($this->request->getPost('nama'));
            $tempat = "" . $this->request->getPost('bangunan') . " - " . $this->request->getPost('tingkat') . " ";
            $email = $this->request->getPost('email');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $tel = "" . $this->request->getPost('tel_ext') . " - (" . $ip . ")";

            $data = ['no_rujukan' => $ruj, 'tarikh' => $timestamp, 'nama' => $nama, 'tel_ext' => $tel, 'jawatan' => $this->request->getPost('jawatan'), 'bahagian' => $this->request->getPost('bahagian'), 'tingkat' => $tempat, 'kerosakan' => $this->request->getPost('masalah'), 'peralatan' => $this->request->getPost('peralatan'), 'perisian' => $this->request->getPost('perisian'), 'keterangan' => $this->request->getPost('keterangan')];
            $model->insert($data);
            $model->query(' INSERT INTO email( no_rujukan, rep_email) VALUES ("' . $ruj . '","' . $email . '") ');
            $this->email($data);
            $session->destroy();

            echo view('success');

        } else {
            return redirect()->route('/');
        }

    }

    public function email($data)
    {

        $message = "<!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset=\"utf-8\">
                    </head>
                    <body>
                    <table> <tr><td>No Rujukan : </td><td>" . $data['no_rujukan'] . "</td></tr>
                    <tr><td>Nama : </td><td>" . $data['nama'] . "</td></tr>
                    <tr><td>Jawatan : </td><td>" . $data['jawatan'] . "</td></tr>
                    <tr><td>Telefon/IP : </td><td>" . $data['tel_ext'] . "</td></tr>
                    <tr><td>Bahagian : </td><td>" . $data['bahagian'] . "</td></tr>
                    <tr><td>Bangunan : </td><td>" . $data['tingkat'] . "</td></tr>
                    </table><br><table>
                    <tr><td>Masalah : </td><td>" . $data['kerosakan'] . "</td></tr>
                    <tr><td>Peralatan : </td><td>" . $data['peralatan'] . "</td></tr>
                    <tr><td>Perisian : </td><td>" . $data['perisian'] . "</td></tr>
                    <tr><td>Keterangan : </td><td>" . $data['keterangan'] . "</td></tr></table>
                    <br><br><br>
                    <p>Sila login ke <a href=\"http://helpdeskctm.arkib.gov.my/login\">Sistem Helpdesk</a></p>
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
            $mail->addAddress('muhammadsufi314@gmail.com');     //Add a recipient
            //$mail->addAddress('teknikalstm@arkib.gov.my');               //Add a recipient //Name is optional
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
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('logout');
    }

    public function success()
    {
        echo view('success');
    }
}