<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    //
    public function show($id)
    {
        // return view("author.info", $data = ["id" => $id, "name" => "Clifford Simak", "books" => [
        //     "The way station",
        //     "Goblin Reservation"
        // ]]);
        $author = DB::selectOne("SELECT * from Authors WHERE Authors.id = ?", [$id]);
        $books = DB::select("SELECT * from Books WHERE Books.authorId = ?", [$id]);
        // $books = DB::select('SELECT A.firstname, A.surname, B.title from Authors A JOIN Books B on A.id = B.authorId where A.id = ?', [$id]);
        // $author = ["firstname" => $books[0]->firstname, "surname" => $books[0]->surname];
        // return view("author.info")->with("id", $id)->with("name", "Clifford Simak")->with("books", ["The way station", "Goblin Reservation"]);
        return view("author.info")->with("books", $books)->with("author", $author)->with("id", $id);
        // return view("author.info")->with("books", $books)->with("author", $author)->with("id", $id);
    }
    public function list()
    {
        $authors = DB::select('select * from Authors');
        return view("author.authors")->with("title", "list of authros")->with("authors", $authors);
    }
}
