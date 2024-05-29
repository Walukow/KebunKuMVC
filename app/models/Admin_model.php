<?php

class Admin_model {
    public function login($data) {
        $admin = 'admin';
        $password = '123';
        $adminI = $data['username'];
        $passwordI = $data['password'];
        if ($adminI !== $admin || $password !== $passwordI) {
            return 0;
        } else {
            return 1;
        }
    }
}