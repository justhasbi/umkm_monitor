<?php

class Fungsi {
    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }

    function user_login() {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function pdfGenerator($html, $filename, $paper, $orientation) {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename, array('Atachment' =>0));
    }

    public function count_item() {
        $this->ci->load->model('items_m');
        return $this->ci->items_m->get()->num_rows();
    }
    
    public function count_user() {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

    public function count_outlet() {
        $this->ci->load->model('outlet_m');
        return $this->ci->outlet_m->get()->num_rows();
    }
}