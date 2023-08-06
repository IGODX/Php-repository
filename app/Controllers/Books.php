<?php


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthorModel;
use App\Models\BookModel;
use CodeIgniter\Model;


class Books extends BaseController
{
    public function getIndex()
    {
        $model = Model(BookModel::class);
        $books = $model->getBooks();
        $data["books"] = $books;
        $authorModel = Model(AuthorModel::class);
        $data["author"] = $authorModel->getAuthors($books[0]["id"]);
        $data["title"] = "Authors List";
        return view("templates/header", $data)
            . view("books/index")
            . view("templates/footer");
    }

    public function getCreate()
    {
        if (session("roleId") == null || session("roleId") == 2) {
            return redirect("/");
        }
        helper("form");
        $authorModel = Model(AuthorModel::class);
        $data["title"] = "Add new book";
        $data["authors"] = $authorModel->getAuthors();
        return view("templates/header", $data)
            . view("books/create")
            . view("templates/footer");
    }

    public function postCreate()
    {
        if (session("roleId") == null || session("roleId") == 2) {
            return redirect("/");
        }
        helper("form");
        $model = Model(BookModel::class);
        $post = $this->request->getPost(["title", "price", "authorId", "yearOfPublish"]);
        $rules = [
            "title" => "required|max_length[255]",
            "price" => "required|integer",
            "authorId" => "required|integer",
            "yearOfPublish" => "required|integer",
        ];
        if (!$this->validateData($post, $rules)) {
            $data["title"] = "Add new book";
            return view("templates/header", $data)
                . view("books/create")
                . view("templates/footer");
        }
        $data["title"] = "New Book added";
        $model->save($post);
        return view("templates/header", $data)
            . view("authors/success")
            . view("templates/footer");
    }
}
