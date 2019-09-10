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
		$this->load->view('pages/website/contact');
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

}
