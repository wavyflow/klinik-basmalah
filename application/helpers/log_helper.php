<?php
function is_logged_in(){
    $log= get_instance();
    if (!$log->session->userdata('username')) {
        redirect('auth/block');
    }
}

?>