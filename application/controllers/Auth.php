<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the PHPMailer files from third_party if not using Composer
        require_once(APPPATH . 'third_party/PHPMailer/src/Exception.php');
        require_once(APPPATH . 'third_party/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH . 'third_party/PHPMailer/src/SMTP.php');
    }

    public function index()
    {
        if ($this->session->userdata('user_logged_in') == True) {
            redirect('dashboard');
        }

        $data['content']  = 'webview/Auth/Login/login_view';
        $data['content_js'] = 'webview/Auth/Login/login_js';
        $this->load->view('_parts/Wrapper_auth', $data);
    }
    public function register()
    {
        if ($this->session->userdata('user_logged_in') == True) {
            redirect('dashboard');
        }

        $data['content']  = 'webview/Auth/Register/register_view';
        $data['content_js'] = 'webview/Auth/Register/register_js';
        $this->load->view('_parts/Wrapper_auth', $data);
    }

    public function login_process()
    {

        $this->load->model('Auth_m', 'login');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $active     = 1;


        $user = $this->login->user_login($username, $password, $active);

        if (!empty($user)) {

            if ($user->role_id == 1) {
                $role = 'Admin';
            } else if ($user->role_id == 2) {
                $role = 'User';
            }
            $this->session->set_userdata([
                'user_user_id'   => $user->uid,
                'kd_peserta'  => $user->kd_peserta,
                'username'  => $user->email,
                'name'  => $user->nama,
                'role_id'      => $user->role_id,
                'role'      => $role,
                // 'user_email'      => $user->email,
                // 'last_acces_time'      => $user->last_acces,
                'user_logged_in' => true
            ]);

            if ($user->role_id == 1) {
                echo json_encode(array("status" => 'admin'));
            } else if ($user->role_id == 2) {
                echo json_encode(array("status" => 'user'));
            }
        } else {
            echo json_encode(array("status" => 'Gagal Cari'));
        }
    }

    public function register_process()
    {
        $this->load->model('Auth_m', 'regis');

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('kd_peserta', $this->input->post('nip'));
        $this->db->where('tgl_lahir', $this->input->post('tgl_lahir'));
        $user = $this->db->get()->row();

        if (!empty($user)) {

            if (empty($user->email) && empty($user->password)) {

                // Email Cek
                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('email', $this->input->post('email'));
                $email_cek = $this->db->get()->result();

                if (!empty($email_cek)) {
                    $data = array("status" => 'Email Sudah Di Pakai');
                    echo json_encode($data);
                } else {

                    $enc_password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

                    $this->load->helper('string');
                    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                    $data = array(
                        'created'         => $date->format('Y-m-d H:i:s'),
                        'email'           => $this->input->post('email'),
                        'active'          => 1,
                        'password'        => $enc_password,
                    );
                    $this->regis->update_user($data, array('kd_peserta' => $this->input->post('nip')), array('tgl_lahir' => $this->input->post('tgl_lahir')));


                    $data = array("status" => 'berhasil');
                    echo json_encode($data);
                }
            } else {

                $data = array("status" => 'NIP Sudah Di Pakai');
                echo json_encode($data);
            }
        } else {

            $data = array("status" => 'NIP dan Tanggal Lahir Tidak Di temukan');
            echo json_encode($data);
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('user_user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_logged_in');
        // $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();

        $url = base_url();
        redirect('auth');
    }

    public function check_email()
    {
        if ($this->session->userdata('user_logged_in') == 'true') {
            redirect('dashboard');
        }

        $data['content']  = 'webview/Auth/check_email/check_email_view';
        $data['content_js'] = 'webview/Auth/check_email/check_email_js';
        $this->load->view('_parts/Wrapper_auth', $data);
    }

    public function resetpassword()
    {
        $this->load->model('Auth_m', 'user');

        $this->load->library('email');
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $this->input->post('email'));
        $user = $this->db->get()->result();

        if (!empty($user)) {
            $this->load->helper('string');
            $token_id = random_string('alnum', 32);

            $this->user->update(
                array(

                    'token_reset'       => $token_id,

                ),
                array('email' => $this->input->post('email'))
            );
            $subjek = 'Reset Password Confirmation';
            $pesan =
                '
                <!DOCTYPE html>
        <html>
        <head>
          <title>Reset Password Confirmation</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
        
          <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
            <tr>
              <td align="center" style="padding: 40px 0;">
                <table width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
                  <tr>
                    <td align="center" style="padding: 40px 20px;">
                    <img src="https://dapenkbbukopin.co.id//assets/user/img/logo/dapenbukopin_lg1.png" alt="Logo" style="max-width: 100%; height: auto;">
                      <h1 style="color: #333333;">Confirm Your Email Address</h1>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Tap the button below to confirm your email address. If you didnt create an account with us, you can safely ignore this email.</p>
                      <br>
                      <p style="color: #555555; font-size: 16px; line-height: 24px;">Or click this following link : ' . site_url('auth/confirm_reset/' . $token_id) . '</p>
                      <a href="' . site_url('auth/confirm_reset/' . $token_id) . '" style="display: inline-block; padding: 12px 24px; background-color: #1a82e2; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">Confirm Email</a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        
        </body>
        </html>
        
        
            ';

            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://heroic.jagoanhosting.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'admin@dapenkbbukopin.co.id'; // Your email address
            $config['smtp_pass'] = 'bukopin123!@#'; // Your email password
            $config['mailtype'] = 'html';
            $config['charset']  = 'utf-8';
            $config['newline']  = "\r\n";
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
            $this->email->from('admin@dapenkbbukopin.co.id', 'Dapen KB Bukopin'); // Set sender
            $this->email->to($this->input->post('email')); // Set recipient
            $this->email->subject($subjek); // Set email subject
            $this->email->message($pesan); // Set email body (HTML)

            if ($this->email->send()) {
                // echo 'Success! Email has been sent.';
                echo json_encode(array("status" => True));
                // return;
            } else {
                echo 'Error! Email could not be sent.<br>';
                echo $this->email->print_debugger(array('headers', 'subject', 'body')); // Print debug info
                echo json_encode(array("status" => False));
                return;
            }
        } else {
            echo json_encode(array("status" => "Email Tidak Ada"));
        }
    }


    // public function send_email()
    // {
    //     $this->load->model('Auth_m', 'auth');

    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('email', 'dimasuzumaki126@gmail.com');
    //     $user = $this->db->get()->result();

    //     if (!empty($user)) {

    //         $this->load->helper('string');
    //         $token_id = random_string('alnum', 32);

    //         $this->auth->update(
    //             array(

    //                 'token_reset'       => $token_id,

    //             ),
    //             array('email' => $this->input->post('email'))
    //         );



    //         $subjek = 'Reset Password Confirmation';
    //         $pesan =
    //             '
    //             <!DOCTYPE html>
    //     <html>
    //     <head>
    //       <title>Reset Password Confirmation</title>
    //     </head>
    //     <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    //       <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
    //         <tr>
    //           <td align="center" style="padding: 40px 0;">
    //             <table width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
    //               <tr>
    //                 <td align="center" style="padding: 40px 20px;">
    //                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl233SSiOjA8QokbqTtt7dCIV5OhDihFWCnw&s" alt="Logo" style="max-width: 100%; height: auto;">
    //                   <h1 style="color: #333333;">Confirm Your Email Address</h1>
    //                   <p style="color: #555555; font-size: 16px; line-height: 24px;">Tap the button below to confirm your email address. If you didnt create an account with us, you can safely ignore this email.</p>
    //                   <br>
    //                   <p style="color: #555555; font-size: 16px; line-height: 24px;">Or click this following link : ' . site_url('auth/confirm_reset/' . $token_id) . '</p>
    //                   <a href="' . site_url('auth/confirm_reset/' . $token_id) . '" style="display: inline-block; padding: 12px 24px; background-color: #1a82e2; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">Confirm Email</a>
    //                 </td>
    //               </tr>
    //             </table>
    //           </td>
    //         </tr>
    //       </table>

    //     </body>
    //     </html>


    //         ';
    //         require 'vendor/autoload.php'; // Assuming you installed PHPMailer via Composer

    //         $mail = new PHPMailer(true);
    //         try {
    //             // Server settings
    //             $mail->isSMTP();
    //             $mail->Host       = 'smtp.gmail.com';
    //             $mail->SMTPAuth   = true;
    //             $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //             $mail->Port       = 465; // TLS port: 587, SSL port: 465

    //             // Recipients
    //             $mail->setFrom('dimasuciha126@gmail.com', 'Yuuta Togashi');
    //             $mail->addAddress('dimasuzumaki126@gmail.com');

    //             // Content
    //             $mail->isHTML(true);
    //             $mail->Subject = $subjek;
    //             $mail->Body    = $pesan;

    //             // Send the email
    //             $mail->send();
    //             echo 'Email has been sent';
    //         } catch (Exception $e) {
    //             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         }
    //         echo 'ada Email';
    //     } else {
    //         echo 'Gak ada Email';
    //     }
    // }

    // public function resetpassword_tes()
    // {
    //     $this->load->model('Auth_m', 'auth');

    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('email', $this->input->post('email'));
    //     $user = $this->db->get()->result();

    //     if (!empty($user)) {

    //         $this->load->helper('string');
    //         $token_id = random_string('alnum', 32);

    //         $this->auth->update(
    //             array(

    //                 'token_reset'       => $token_id,

    //             ),
    //             array('email' => $this->input->post('email'))
    //         );



    //         $subjek = 'Reset Password Confirmation';
    //         $pesan =
    //             '
    //             <!DOCTYPE html>
    //     <html>
    //     <head>
    //       <title>Reset Password Confirmation</title>
    //     </head>
    //     <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    //       <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
    //         <tr>
    //           <td align="center" style="padding: 40px 0;">
    //             <table width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
    //               <tr>
    //                 <td align="center" style="padding: 40px 20px;">
    //                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl233SSiOjA8QokbqTtt7dCIV5OhDihFWCnw&s" alt="Logo" style="max-width: 100%; height: auto;">
    //                   <h1 style="color: #333333;">Confirm Your Email Address</h1>
    //                   <p style="color: #555555; font-size: 16px; line-height: 24px;">Tap the button below to confirm your email address. If you didnt create an account with us, you can safely ignore this email.</p>
    //                   <br>
    //                   <p style="color: #555555; font-size: 16px; line-height: 24px;">Or click this following link : ' . site_url('auth/confirm_reset/' . $token_id) . '</p>
    //                   <a href="' . site_url('auth/confirm_reset/' . $token_id) . '" style="display: inline-block; padding: 12px 24px; background-color: #1a82e2; color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">Confirm Email</a>
    //                 </td>
    //               </tr>
    //             </table>
    //           </td>
    //         </tr>
    //       </table>

    //     </body>
    //     </html>


    //         ';
    //         // $pesan = nl2br(htmlspecialchars($pesan_raw));

    //         // print_r($alumni);
    //         $config['protocol'] = 'smtp';
    //         $config['smtp_host'] = 'ssl://heroic.jagoanhosting.com';
    //         $config['smtp_port'] = 465;
    //         $config['smtp_user'] = 'admin@dapenkbbukopin.co.id'; // Your email address
    //         $config['smtp_pass'] = 'bukopin123!@#'; // Your email password
    //         $config['mailtype'] = 'html';
    //         $config['charset']  = 'utf-8';
    //         $config['newline']  = "\r\n";
    //         $config['wordwrap'] = TRUE;

    //         $this->load->library('email');
    //         $this->email->initialize($config);
    //         $this->email->from('dimasuciha126@gmail.com', 'Yuuta Togashi');
    //         $this->email->to($this->input->post('email'));
    //         $this->email->subject($subjek);

    //         $this->email->message($pesan);

    //         if ($this->email->send()) {
    //             // echo ' Sukses! email berhasil dikirim.';
    //             echo json_encode(array("status" => True));
    //             return;
    //         } else {
    //             echo  'Error! email gagal dikirim.';
    //             echo $this->email->print_debugger(array('headers', 'subject', 'body')); // Print debug info
    //             echo json_encode(array("status" => False));
    //             return;
    //         }
    //         // redirect('user/passwordnotif');
    //         echo  'Ada Email';
    //     } else {
    //         // redirect('home');
    //         echo json_encode(array("status" => "Email Tidak Ada"));
    //     }
    // }

    public function confirm_reset($token)
    {
        $this->load->model('Auth_m', 'auth');

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('token_reset', $token);
        $user = $this->db->get()->result();

        if (empty($token)) {
            redirect(base_url('error404'));
        } else if (empty($user)) {
            redirect(base_url('error404'));
        }

        $data['content']  = 'webview/Auth/Reset_Password/reset_password_view';
        $data['content_js'] = 'webview/Auth/Reset_Password/reset_password_js';
        $this->load->view('_parts/Wrapper_auth', $data);
    }

    public function process_reset()
    {
        $this->load->model('Auth_m', 'auth');

        $token = $this->input->post('token_reset');
        $enc_password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

        $this->auth->update(
            array(

                'password'       => $enc_password,
                'token_reset' => null,

            ),
            array('token_reset' => $this->input->post('token_reset'))
        );
        echo json_encode(array("status" => True));
    }
}
