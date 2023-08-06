<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthorModel;
use CodeIgniter\Model;


class Authors extends BaseController
{
    public function getIndex()
    {
        //
        $model = Model(AuthorModel::class);
        $data["authors"] = $model->getAuthors();
        $data["title"] = "Authors List";
        return view("templates/header", $data)
            . view("authors/index")
            . view("templates/footer");
    }


    public function getCreate()
    {
        if (session("roleId") == null || session("roleId") == 2) {
            return redirect("/");
        }
        helper("form");
        $data["title"] = "Add new author";
        return view("templates/header", $data)
            . view("authors/create")
            . view("templates/footer");
    }
    public function postCreate()
    {
        if (session("roleId") == null || session("roleId") == 2) {
            return redirect("/");
        }
        helper("form");
        $model = model(AuthorModel::class);
        $post = $this->request->getPost(["firstname", "surname", "yearOfBirth"]);
        $rules = [
            "firstname" => "required|max_length[128]",
            "surname" => "required|max_length[128]",
            "yearOfBirth" => "required|integer",
        ];
        if (!$this->validateData($post, $rules)) {
            $data["title"] = "Add new author";
            return view("templates/header", $data)
                . view("authors/create")
                . view("templates/footer");
        }
        $data["title"] = "New Author added";
        $model->save($post);
        return view("templates/header", $data)
            . view("authors/success")
            . view("templates/footer");
    }
}
