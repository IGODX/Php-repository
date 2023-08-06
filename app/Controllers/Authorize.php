<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Authorize extends BaseController
{
    public function getLogin()
    {
        helper("form");
        $data["title"] = "Authorize";
        $data["route"] = "/authorize/login";
        return view("templates/mdbheader", $data)
            . view("authorize/index");
    }
    public function getRegister()
    {
        helper("form");
        $data["title"] = "Register";
        $data["route"] = "/authorize/register";
        return view("templates/mdbheader", $data)
            . view("authorize/index");
    }

    public function postLogin()
    {
        helper("form");
        $model = Model(UserModel::class);
        $post = $this->request->getPost(['email', 'password']);
        $roleId = $model->isExist($post["email"], $post["password"]);
        if ($roleId === false) {
            $data["title"] = "Authorize";
            $data["route"] = "/authorize/login";
            return view("templates/mdbheader", $data)
                . view("authorize/index");
        }
        session()->set('email', $post["email"]);
        session()->set('roleId', 2);
        $_SESSION["roleId"] = $roleId;

        return redirect("/");
    }
    public function postRegister()
    {
        helper("form");
        $model = Model(UserModel::class);
        $post = $this->request->getPost(['email', 'password']);
        $rules = [
            'email' => 'required|is_unique[Users.email]|max_length[150]',
            'password' => 'required|max_length[20]'
        ];
        if (!$this->validateData($post, $rules)) {
            $data["title"] = "Register";
            $data["route"] = "/authorize/register";
            return  view("templates/mdbheader", $data)
                . view("authorize/index");
        }
        $post["password"] = password_hash($post["password"], PASSWORD_DEFAULT);
        $model->save($post);
        session()->set('email', $post["email"]);
        session()->set('roleId', 2);
        $data["title"] = "Success";
        return view("templates/header", $data)
            . view("authors/success")
            . view("templates/footer");
    }
}
