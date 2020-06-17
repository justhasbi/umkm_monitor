<?php
function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if($user_session) {
        redirect('dashboard');
    }
}


function check_not_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if(!$user_session) {
        redirect('auth/login');
    }
}


function check_admin() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->hak_akses != 1) {
        redirect('dashboard');
    }
}

function indo_currency($nominal) {
    $result = "Rp " . number_format($nominal, 2, '.', '.');
    return $result;
}