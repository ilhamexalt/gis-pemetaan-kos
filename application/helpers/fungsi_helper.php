<?php

function check_alreadyLogin()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if ($user_session) {
        redirect('Auth');
    }
    function check_notLogin()
    {
        $ci = &get_instance();
        $user_session = $ci->session->userdata('id_user');
        if (!$user_session) {
            redirect('Auth');
        }
    }
}
