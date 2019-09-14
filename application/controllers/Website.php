<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
		$this->load->model('Will_Model');
  }

	public function index(){
		$this->load->view('pages/website/index');
	}
	public function about(){
		$this->load->view('pages/website/about');
	}
	public function pricing(){
		$this->load->view('pages/website/pricing');
	}
	public function faqs(){
		$this->load->view('pages/website/faqs');
	}
	public function contact(){
		$this->form_validation->set_rules('first_name', 'First Name', 'required',
			array(
        'required' => '*%s Required.'
      ));
		$this->form_validation->set_rules('last_name', 'Last Name', 'required',
			array(
        'required' => '*%s Required.'
      ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
			array(
        'required' => '*%s Required.',
				'valid_email' => '*Invalide Email Format.',
      ));
		$this->form_validation->set_rules('message', 'Message', 'required',
			array(
        'required' => '*%s Required.'
      ));

		if ($this->form_validation->run() == FALSE){
			$this->load->view('pages/website/contact');
    }
    else{

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$message = $this->input->post('message');

			$from_email = $email;
			$formcontent='
			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Georgia, serif; ">
			 New Email from Easy Will India Website.
			 </p>
			 <hr>
			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
			 Sender Name: '.$first_name.' '.$last_name.'
			 </p>
			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
			 Mobile No: '.$phone.'
			 </p>
			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
			 Email: '.$email.'
			 </p>
			 <hr>
			 <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Times, serif; ">
			 Message: '.$message.'
			 </p>
		 ';
			$recipient = "info@easywillindia.com";
			$subject = "Email from Easy Will Website.";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.$from_email."\r\n".
									'Reply-To: '.$from_email."\r\n" .
									'X-Mailer: PHP/' . phpversion();

			$send = mail($recipient, $subject, $formcontent, $headers);
			if($send){
				$this->session->set_flashdata('send_email','success');
			}
			else{
				$this->session->set_flashdata('send_email','error');
			}
			header('Location:'.base_url().'Contact-Us');
    }

		// $this->load->view('pages/website/contact');
	}
	public function disclaimer(){
		$this->load->view('pages/website/disclaimer');
	}
	public function terms_and_conditions(){
		$this->load->view('pages/website/terms_and_conditions');
	}
	public function refund_cancellation(){
		$this->load->view('pages/website/refund_cancellation');
	}
	public function login(){
		$this->session->unset_userdata('user_is_login');
		$this->session->unset_userdata('user_id');
		$this->load->view('pages/website/login');
	}
	public function sign_up(){
		$this->load->view('pages/website/sign_up');
	}

	public function owner_login(){
		$this->load->view('pages/website/owner_login');
	}
}
