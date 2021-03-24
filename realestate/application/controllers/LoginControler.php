<?php
defined('BASEPATH')OR exit('no direct scripts access allowed');
/**
 * 
 */
class LoginControler extends CI_Controller
{
	
public function login()

	{
$this->load->view('admin/login');		
	}
	
public function sign()
	{
		$this->load->model('LoginModel');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run()==true)
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			if($this->LoginModel->log($username,$password))
			{
				$this->session->set_flashdata('success','login success');
				redirect(base_url().'dashboard');
			}
			else
			{
				$this->session->set_flashdata('failed','login failed');
				redirect(base_url().'login');
			}
			

		}
		else
		{
			echo validation_errors();
		}
	}

}
