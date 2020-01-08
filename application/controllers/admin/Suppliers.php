<?php
class Suppliers extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
    }
    function index(){
        $this->load->view('admin/supplier_view');
    }
 
    function supplier_data(){
        $data=$this->supplier_model->supplier_list();
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->supplier_model->save_supplier();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->supplier_model->update_supplier();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->supplier_model->delete_supplier();
        echo json_encode($data);
    }
 
}