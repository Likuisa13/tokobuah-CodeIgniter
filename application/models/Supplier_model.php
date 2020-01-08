<?php
class Supplier_model extends CI_Model{
 
    function supplier_list(){
        $hasil=$this->db->get('suppliers');
        return $hasil->result();
    }
 
    function save_supplier(){
        $data = array(
                'id'  => $this->input->post('id'), 
                'name'  => $this->input->post('name'), 
                'address' => $this->input->post('address'), 
            );
        $result=$this->db->insert('suppliers',$data);
        return $result;
    }
 
    function update_supplier(){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $address=$this->input->post('address');
 
        $this->db->set('name', $name);
        $this->db->set('address', $address);
        $this->db->where('id', $id);
        $result=$this->db->update('suppliers');
        return $result;
    }
 
    function delete_supplier(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('suppliers');
        return $result;
    }
     
}