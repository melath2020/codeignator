<?php
defined('BASEPATH')OR exit('no direct scripts access allowed');
/**
 * 
 */
class LoginModel extends CI_Model
{
	
public function log($username,$password)
{
	
	$this->db->where('username',$username);
	$this->db->where('password',$password);
	$query=$this->db->get('login');
	if($query->num_rows()>0)
		 {
       $login=array('login'=>true,'admin_name'=>"");
             $this->session->set_userdata($login);
   return true;
  }
 else
 {
 return false;
}
 }

}
