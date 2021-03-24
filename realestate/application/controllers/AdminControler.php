<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminControler extends CI_Controller {
public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}
	public function profile()
	{
		$this->load->view('admin/profile');
	}
	public function chat()
	{
		$this->load->view('admin/chat');
	}
	public function addhead()
	{
		$this->load->view('admin/addhead');
	}
	public function viewaddhead()
	{
		$this->load->model('WebModel');
		$data['display']=$this->WebModel->get_head();
		$this->load->view('admin/viewaddhead',$data);
	}
	public function ourfacilities()
	{
		$this->load->view('admin/ourfacilities');
	}
	public function viewourfacilities()
	{
		$this->load->model('WebModel');
		$data['new']=$this->WebModel->get_ourfacilities();
		$this->load->view('admin/viewourfacilities',$data);
	}

	public function addprofile()
 {
 	$this->load->library('form_validation');
 	$this->load->model('WebModel');
 	$this->form_validation->set_rules('name','name','required');
	$this->form_validation->set_rules('email','email','required');
	$this->form_validation->set_rules('address','address','required');
 	$this->form_validation->set_rules('phone','phone','required');

		if($this->form_validation->run()==true)
		{

        $data['name']=$this->input->post('name');
        $data['email']=$this->input->post('email');
        $data['address']=$this->input->post('address');
        $data['phone']=$this->input->post('phone');

            $config['upload_path']='./pics';
			$config['allowed_types']='jpg|pdf|jpeg|png|gif|JPG|JPEG|PNG|GIF';
			$config['file_name']=md5(date('d-m-y H:i:sa'));
			
			$this->load->library('upload',$config);

			$this->upload->do_upload('Image');
			
				
				$file=$this->upload->data();
				$data['file']=$file['file_name'];
				  // var_dump($data);exit;
		$this->WebModel->add_profile($data);
        redirect(base_url().'profile');
           
       }

        
       
		else
		{
			echo validation_errors();
		}
	
}
public function insert()
 {
 	$this->load->library('form_validation');
 	$this->load->model('WebModel');
 	$this->form_validation->set_rules('head','head','required');
	$this->form_validation->set_rules('subhead','subhead','required');
	$this->form_validation->set_rules('firstpoint','firstpoint','required');
 	$this->form_validation->set_rules('secondpoint','secondpoint','required');
 	$this->form_validation->set_rules('thirdpoint','thirdpoint','required');
 	$this->form_validation->set_rules('fourthpoint','fourthpoint','required');

		if($this->form_validation->run()==true)
		{

        $data['head']=$this->input->post('head');
        $data['subhead']=$this->input->post('subhead');
        $data['firstpoint']=$this->input->post('firstpoint');
        $data['secondpoint']=$this->input->post('secondpoint');
          $data['thirdpoint']=$this->input->post('thirdpoint');
          $data['fourthpoint']=$this->input->post('fourthpoint');

           
		$this->WebModel->addhead($data);
        redirect(base_url().'addhead');
           
       }

        
       
		else
		{
			echo validation_errors();
		}
	
}
public function insertfacilities()
 {
 	$this->load->library('form_validation');
 	$this->load->model('WebModel');
 	$this->form_validation->set_rules('head','head','required');
	$this->form_validation->set_rules('subhead','subhead','required');
	

		if($this->form_validation->run()==true)
		{

        $data['head']=$this->input->post('head');
        $data['subhead']=$this->input->post('subhead');
        

        
		$this->WebModel->add_facilities($data);
        redirect(base_url().'ourfacilities');
           
       }

        
       
		else
		{
			echo validation_errors();
		}
	
}
public function edit($id)
{
	$this->load->model('WebModel');
	$data['data']=$this->WebModel->get_edithead($id);
	$this->load->view('admin/edit_head',$data);
}
public function update($id)
{
	$this->load->library('form_validation');
 	$this->load->model('WebModel');
 	$this->form_validation->set_rules('head','head','required');
	$this->form_validation->set_rules('subhead','subhead','required');
	$this->form_validation->set_rules('firstpoint','firstpoint','required');
 	$this->form_validation->set_rules('secondpoint','secondpoint','required');
 	$this->form_validation->set_rules('thirdpoint','thirdpoint','required');
 	$this->form_validation->set_rules('fourthpoint','fourthpoint','required');

		if($this->form_validation->run()==true)
		{

        $data['head']=$this->input->post('head');
        $data['subhead']=$this->input->post('subhead');
        $data['firstpoint']=$this->input->post('firstpoint');
        $data['secondpoint']=$this->input->post('secondpoint');
          $data['thirdpoint']=$this->input->post('thirdpoint');
          $data['fourthpoint']=$this->input->post('fourthpoint');

           
		$this->WebModel->change_head($data,$id);
        redirect(base_url().'viewaddhead');
           
       }

        
       
		else
		{
			echo validation_errors();
		}
	
}
public function editfacilities($id)
{
	$this->load->model('WebModel');
	$data['data']=$this->WebModel->get_facilities($id);
	$this->load->view('admin/editfacilities',$data);
}
public function updatefacilities($id)
{
	$this->load->library('form_validation');
 	$this->load->model('WebModel');
 	$this->form_validation->set_rules('head','head','required');
	$this->form_validation->set_rules('subhead','subhead','required');
	
		if($this->form_validation->run()==true)
		{

        $data['head']=$this->input->post('head');
        $data['subhead']=$this->input->post('subhead');
    

           
		$this->WebModel->change_facilities($data,$id);
        redirect(base_url().'viewourfacilities');
           
       }

        
       
		else
		{
			echo validation_errors();
		}
	
}
public function delete($id)
{
	$this->load->model('WebModel');
	if($this->WebModel->delete($id))
	{
redirect(base_url().'viewaddhead');
	}
}
}