<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('admin/auth/login', $data);
	}

	public function forgot_password()
	{
		$data['title'] = 'Forgot_Password';
		$this->load->view('admin/auth/forgot_password' , $data);
	}
	
	public function change_password()
	{
		$data['title'] = 'Change Password';
		$data['mainContent'] = 'admin/auth/change_password';
		$this->load->view('admin/layout/master' , $data);
	}

	
}
