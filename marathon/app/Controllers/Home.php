<?php

namespace App\Controllers;

use App\Models\Member;

class Home extends BaseController
{
    public function index(): string
    {
        helper('form');
        return view('homepage');
    }


    public function login(): string
    {
        helper('form');


        $rules = [
            "username" => "required|valid_email",
            "password" => "required"
        ];

        if (!$this->validate($rules)){
            $data = [
                "load_error" => "True"
            ];
            return view('homepage',$data);
        };

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        echo "$username --- $password";
        $Member = new Member();
        if ($Member->user_login($username, $password))
        {
            //return view("admin_page");
            header('location: admin');
            exit();
        }
        else{
            $data = [
                "load_error" => "True",
                "error_message"=>"Invalid username or password"
            ];
            return view('homepage',$data);
        }

    }

    public function create(): string
    {
        helper('form');

        //start here
        $rules = [
            "username" => "required",
            "email" => "required|valid_email",
            "password" => "required",
            'password2' => "required|matches[password]"
        ];
        if (!$this->validate($rules)){
            $data = [
                "load_error" => "true"
            ];
            return view('homepage',$data);
        }

        $data = [
            "load_error" => "False",
            "error_message"=>"Member created"
        ];

        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $Member = new Member();
        $Member->create_user($username, $email, $password);

        return view('homepage',$data);
    }

    public function play($data): string
    {
        $data = $data * 12;
        echo "Hello World -> Boom " . $data;
        exit();
//        return view('welcome_message');
    }

}
