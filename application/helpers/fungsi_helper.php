<?php

function check_alreadyLogin()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('ID');
    if ($user_session) {
        redirect('Admin');
    }
    function check_notLogin()
    {
        $ci = &get_instance();
        $user_session = $ci->session->userdata('ID');
        if (!$user_session) {
            redirect('User');
        }
    }
}
