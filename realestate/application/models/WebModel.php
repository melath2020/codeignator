<?php
defined('BASEPATH')OR exit('no direct scripts access allowed');
/**
 * 
 */
class WebModel extends CI_model
{
	
	public function add_profile($data)
	{
		$this->db->insert('add_profile',$data);

	}
	public function addhead($data)
	{
		$this->db->insert('addhead',$data);

	}
	public function get_head()
{
	$query=$this->db->get('addhead');
	return $query->result();
}
public function add_facilities($data)
	{
		$this->db->insert('add_facilities',$data);

	}
	public function get_ourfacilities()
{
	$query=$this->db->get('add_facilities');
	return $query->result();
}
public function get_edithead($id)
{
	$this->db->where('id',$id);
	$query=$this->db->get('addhead');
	return $query->row();
}
public function change_head($data,$id)
{
	$this->db->where('id',$id);
	$query=$this->db->update('addhead',$data);
	return $query;
}
public function get_facilities($id)
{
	$this->db->where('id',$id);
	$query=$this->db->get('add_facilities');
	return $query->row();
}
public function change_facilities($data,$id)
{
	$this->db->where('id',$id);
	$query=$this->db->update('add_facilities',$data);
	return $query;
}
public function delete($id)
{
	$this->db->where('id',$id);
	$query=$this->db->delete('addhead');
	return $query;
}
}