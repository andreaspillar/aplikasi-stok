<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/client-php-master/autoload.php');
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
		$this->load->helper('form');
    $this->load->library('user_agent');
		$this->load->library('form_validation');
		$this->load->library('session');
    $this->load->Model('User');
    $this->load->Model('Generatekey');
    $this->load->Model('Logsignup');
  }

  // test area

  // exit test

  public function index()
  {
    $this->load->view('login/login');
  }
  public function modalin()
  {
    $this->load->view('login/login-modal');
  }
  public function signupchallenge()
  {
    $emil = $this->input->post('email');
    $uname = $this->input->post('username');
    $pwd = $this->input->post('password');
    $hashpwd = hash('sha256','rt8y039tu45iohreoyrtt'.$pwd.'cvknal8wefpoke902');
    $loc = $this->input->post('lokasi');
    $phone = $this->input->post('phoneNumber');
    $llo = $this->User->readByEU($emil,$uname);
    $lsu = $this->Logsignup->readSignUp($emil,$uname);
    if (count($llo)===0) {
      if (count($lsu)===0) {
        $this->load->library('email');
        $rand = strtoupper(substr(md5(microtime()),rand(0,26),5));
        $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => '672015094@student.uksw.edu',
          'smtp_pass' => 'l10nairPKLQP',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'
        );
        $datc = array(
          'email' => $emil,
          'username' => $uname,
          'password' => $hashpwd,
          'location' => $loc,
          'ip_address' => $this->input->ip_address(),
          'user_agent' => $this->agent->agent_string(),
          'kodegen' => $rand,
        );
        $this->Logsignup->createLogUp($datc);
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $htmlContent = '<p>Terima Kasih, silahkan masukkan kode verifikasi di bawah ini.</p>';
        $htmlContent .= '<h1>'.$rand.'</h1>';
        $smsGen = 'Kode verifikasi anda: '.$rand;
        $htmlContent .= '<p>Selamat menjadi sales di aplikasi stockpip </p>';
        $this->email->to($emil);
        $this->email->from('672015094@student.uksw.edu','Email bot, tidak akan menjawab balasan anda (pillartestweb.me)');
        $this->email->subject('Stock PiP akun verifikasi');
        $this->email->message($htmlContent);
        $this->email->send();
        $config = Configuration::getDefaultConfiguration();
        $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0MjAwNTYyNiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYzOTUyLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.-D0EAKjLxS3fNQ1EG6_UCvq-HUetTthWsciy0ulp7-U');
        $apiClient = new ApiClient($config);
        $messageClient = new MessageApi($apiClient);

        // Sending a SMS Message
        // $sendMessageRequest1 = new SendMessageRequest([
        //     'phoneNumber' => $phone,
        //     'message' => $smsGen,
        //     'deviceId' => 105108
        // ]);
        // $sendMessages = $messageClient->sendMessages([
        //   $sendMessageRequest1
        // ]);
        $this->load->view('login/challenge');
      } else {
        $this->load->view('login/challenge');
      }
    }
    else {
      $msg = "username atau email sudah pernah diregistrasi, kontak admin bila mengalami gangguan";
      $this->session->set_flashdata('msg', $msg);
      $this->load->view('login/login');
    }
  }
  public function produksichallenge()
  {
    $emil = $this->input->post('email');
    $uname = $this->input->post('username');
    $pas = $this->input->post('retypepas');
    $hashpas = hash('sha256','rt8y039tu45iohreoyrtt'.$pas.'cvknal8wefpoke902');
    $pwd = $this->input->post('password');
    $llo = $this->User->readByEU($emil,$uname);
    if ($pas==$pwd) {
      if (count($llo)===0) {
          $datc = array(
            'namadepan' => $uname,
            'email_address' => $emil,
            'username' => $uname,
            'password' => $hashpas,
            'levels' => '2',
            'namepic' => 'facessma.png',
         );
         $this->User->createUser($datc);
         $this->load->view('login/login');
        }
      else {
        $msg = "username atau email sudah pernah diregistrasi, kontak admin bila mengalami gangguan";
        $this->session->set_flashdata('msg', $msg);
        $this->load->view('login/login');
      }
    }
    else {
      $msg = "password tidak sama";
      $this->session->set_flashdata('msg', $msg);
      redirect('guest/signuppro');
    }

  }
  public function verifyup()
  {
    $email = $this->input->post('email');
    $codeath = $this->input->post('verificate');
    $login = $this->User->readByE($email);
    $athSU = $this->Logsignup->reademilath($email,$codeath);
    if (count($login)===0) {
      if (count($athSU)===0) {
        $msg = "Kombinasi Email dan Kode Verifikasi Tidak Tepat. Silahkan Coba Lagi";
        $this->session->set_flashdata('msg', $msg);
        $this->load->view('login/challenge');
      }
      else {
        foreach ($athSU as $a) {
          $sendtousr = array(
            'email_address' => $a->email,
            'username' => $a->username,
            'password' => $a->password,
            'levels' => '3',
            'namadepan' => $a->username,
            'location' => $a->location,
          );
          $this->User->createUser($sendtousr);
          $this->Logsignup->deleteAth($email, $codeath);
          $this->load->view('login/login');
        }
      }
    }
    else {
      // echo "salah!";
      $msg = "Email sudah pernah diregistrasi. Kontak admin bila terjadi kendala";
      $this->session->set_flashdata('msg', $msg);
      $this->load->view('login/login');
    }
  }
  public function ath()
  {
    $username = $this->input->post('username',TRUE);
    $password = $this->input->post('password',TRUE);
    $hashpas = hash('sha256','rt8y039tu45iohreoyrtt'.$password.'cvknal8wefpoke902');
    $validate = $this->User->validate($username,$hashpas);
    // $validate = $this->Users->validate($username,$hash);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $uid   = $data['id_user'];
        $nd   = $data['namadepan'];
        $nb   = $data['namabelakang'];
        $name  = $data['username'];
        $level = $data['levels'];
        $np    = $data['namepic'];
        $locate = $data['location'];
        $sesdata = array(
            'id_user'       => $uid,
            'namadep'       => $nd,
            'namabel'       => $nb,
            'username'  => $name,
            'level'     => $level,
            'namepic'     => $np,
          );
        $sessalad = array(
            'id_user'       => $uid,
            'namadep'       => $nd,
            'namabel'       => $nb,
            'username'  => $name,
            'level'     => $level,
            'namepic'     => $np,
            'location'  => $locate,
          );
        if($level === '-9'){
					$this->session->set_userdata('logged',$sesdata);
					redirect('supermi');
        }elseif (($level === '2')) {
        	$this->session->set_userdata('logged',$sesdata);
					redirect('produksi/index');
        }elseif (($level === '3')) {
         	$this->session->set_userdata('logged',$sessalad);
				 	redirect('sales/index');
        }elseif ($level === '4') {
          $this->session->set_userdata('logged',$sessalad);
				 	redirect('adminarea/index');
        }
				else{
          echo "MEH KEMANA?";
        }
				return $level;
    }else{
				$msg = "Username atau Password yang diberikan mungkin salah";
				$this->session->set_flashdata('msg', $msg);
        redirect('login/index');
    }
  }
  public function signout()
  {
    $this->session->set_flashdata('msg', "");
    $this->session->unset_userdata('logged');
    $this->session->sess_destroy();
    $this->load->view('login/login');
  }

}
