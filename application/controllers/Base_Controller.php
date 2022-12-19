<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Base_Controller extends CI_Controller {

    protected $data = [];
    protected $context = null;

    public function __construct(){
        parent::__construct();
        $this->load->model("{$this->context}_model",$this->context);
    }

    public function index(){
        $data['records'] = $this->{$this->context}->find_all();
        $this->load->view("{$this->context}/index",$data);
    }

    public function pagination(){
        $data = array();
        $limit_per_page = 1 ;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->{$this->context}->get_total();
        if($total_records>0){
            //get current page records
            $data["records"] = $this->{$this->context}->pagination($limit_per_page,$start_index);
            $config['base_url'] = base_url() . "{$this->context}/pagination";//halaman tempat settingan url dari link pagination
            $config['total_rows'] = $total_records;//pengaturan jumlah dari seluruh record
            $config['per_page'] = $limit_per_page; //jumlah record yang ditampilkan perhalaman
            $config['uri_segment'] = 3;

            /*
            start 
            add boostrap class and styles
            */
            $config['full_tag_open'] = '<ul class="pagination">';        
            $config['full_tag_close'] = '</ul>';        
            $config['first_link'] = 'First';        
            $config['last_link'] = 'Last';        
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
            $config['first_tag_close'] = '</span></li>';        
            $config['prev_link'] = '&laquo';        
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
            $config['prev_tag_close'] = '</span></li>';        
            $config['next_link'] = '&raquo';        
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
            $config['next_tag_close'] = '</span></li>';        
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
            $config['last_tag_close'] = '</span></li>';        
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
            $config['cur_tag_close'] = '</a></li>';        
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
            $config['num_tag_close'] = '</span></li>';
            /*
            end 
            add boostrap class and styles
            */
            $this->pagination->initialize($config);
            //build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $this->load->view("{$this->context}/index",$data);
    }


    //must be implemented
    protected abstract function form();
    //must be implemented
    protected abstract function save();

    //menampilkan detail data
    function detail(){
        $id = $this->uri->segment(3);
        $data = $this->{$this->context}->find_by_id($id);
        if(!$data){
            show_404();
        }
        $this->load->view("{$this->context}/detail",$data);
    }

    //menghapus data
    function hapus(){
        $id = $this->uri->segment(3);
        $this->{$this->context}->delete($id);
        redirect(base_url($this->context));
    }

}