<?
class User
{
    public $Id;
    public $Login;
    public $Email;
    public $Passwrd;
    public $Photo;
    public $Discount;
    public $RoleId;

    public function __construct($login, $email, $passwrd, $photo, $discount, $roleId, $id = 0)
    {
        $this->Id = $id;
        $this->Login = $login;
        $this->Email = $email;
        $this->Passwrd = $passwrd;
        $this->Photo = $photo;
        $this->Discount = $discount;
        $this->RoleId = $roleId;
    }
    static function createFromObject($obj): User
    {
        return new User(
            $obj->Login,
            $obj->Email,
            $obj->Passwrd,
            $obj->Photo,
            $obj->Discount,
            $obj->RoleId,
            $obj->Id ?? 0
        );
    }

    static function fromDb($id): User
    {
        $pdo = connect_pdo();
        $ps1 = $pdo->prepare("SELECT * FROM Users WHERE Id=?");
        $ps1->bindParam(1, $id);
        $ps1->execute();
        $ps1->setFetchMode(PDO::FETCH_OBJ);
        $row = $ps1->fetch();
        $user = User::createFromObject($row);
        return $user;
    }
}

class Comment
{
    public $Id;
    public $CommentText;
    public $HotelId;
    public $UserId;

    public function __construct($commentText, $hotelId, $userId, $id = 0)
    {
        $this->Id = $id;
        $this->CommentText = $commentText;
        $this->HotelId = $hotelId;
        $this->UserId = $userId;
    }

    static function createFromObject($obj): Comment
    {
        return new Comment(
            $obj->CommentText,
            $obj->HotelId,
            $obj->UserId,
            $obj->Id,
        );
    }
    static function fromDb($id): array
    {
        $pdo = connect_pdo();
        $ps1 = $pdo->prepare("SELECT * FROM Comments WHERE HotelId=?");
        $ps1->bindParam(1, $id);
        $ps1->execute();
        $ps1->setFetchMode(PDO::FETCH_OBJ);
        $arrayRow = $ps1->fetchAll();
        $comments = [];
        foreach ($arrayRow as $row) {
            array_push($comments, Comment::createFromObject($row));
        }
        return $comments;
    }
    static function intoDb($comment): Comment|bool
    {
        $pdo = connect_pdo();
        $ps1 = $pdo->prepare("INSERT INTO Comments(CommentText, HotelId, UserId)
        VALUES(:CommentText, :HotelId, :UserId)");
        $arr = (array)$comment;
        array_shift($arr);
        try {
            $ps1->execute($arr);
            $comment->Id = $pdo->lastInsertId();
            return $comment;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
