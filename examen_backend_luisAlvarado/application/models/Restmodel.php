<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Restmodel extends CI_Model {
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    /** Implement function get_all for get all rows  our user table and personal information */
    public function get_all()
    {
        $this->db->select('users.*, personal_information.*');
        $this->db->from('users');
        $this->db->join('personal_information', 'personal_information.id_user = users.id_user');
        $alldata = $this->db->get();
        return $alldata;        
    }

    /** Implement function get_client for get row with id our user table and personal information */
    public function get_client($id_user)
    {        
        $this->db->select('users.*, personal_information.*');
        $this->db->from('users');
        $this->db->join('personal_information', 'personal_information.id_user = users.id_user');
        $this->db->where('users.id_user', $id_user);
        $allclient = $this->db->get();
        return $allclient;        
    }

    public function insert($data){
        unset($data['id_user']);
        unset($data['data_action']);
        //core to update Principal
        $Name = $this->input->post('name');
        $Email = $this->input->post('email');
        //core to update Information
        $Direccion = $this->input->post('Direccion');
        $telefono = $this->input->post('telefono');
        $fecha_naci = $this->input->post('birth');

        $principal = array('Name' => $Name, 'Email' => $Email );
        $this->insert_principal($principal);
        $id_user = $this->traer_idCliente($principal);
        
        $information = array('Direccion' => $Direccion, 'telefono' => $telefono, 'fecha_naci' => $fecha_naci,'id_user' => $id_user[0]->id_user);
        return $this->insert_information($information);

    }

    public function insert_principal ($principal){
        $this->db->insert('users',$principal);
    }

    public function insert_information($information){
        return $this->db->insert('personal_information',$information);
    }

    public function traer_idCliente($principal){
        $this->db->select('id_user');
        $this->db->from('users');
        $this->db->where('Name', $principal['Name']);
        $this->db->where('Email', $principal['Email']);
        return  $this->db->get()->result();;
    }

    public function update($data)
    {   
        //core to update Principal
        $id_user = $this->input->post('id_user');
        $Name = $this->input->post('name');
        $Email = $this->input->post('email');
        //core to update Information
        $Direccion = $this->input->post('Direccion');
        $telefono = $this->input->post('telefono');
        $fecha_naci = $this->input->post('birth');
        
        $principal = array('Name' => $Name, 'Email' => $Email );
        $information = array('Direccion' => $Direccion, 'telefono' => $telefono, 'fecha_naci' => $fecha_naci);
        $this->update_information($id_user, $information);
        return $this->update_principal($id_user, $principal);
    }

    public function update_principal($id_user, $principal){
        $this->db->where('id_user', $id_user);
        return $this->db->update('users', $principal);        
    }

    public function update_information($id_user, $information){
        $this->db->where('id_user', $id_user);
        return $this->db->update('personal_information', $information);        
    }

    public function delete($id_user)
    {        
        $this->delete_info($id_user);
        $this->db->where('id_user', $id_user);        
       return $this->db->delete('users');        
    }

    public function delete_info($id_user){
        $this->db->where('id_user', $id_user);
        return $this->db->delete('personal_information');
    }
}