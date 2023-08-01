<?
include_once("functions.php");
include_once("classes.php");

if (isset($_POST["commenttext"]))
    if (!empty($_POST["commenttext"])) {
        $comment = $_POST["commenttext"];
        $userId = $_SESSION["userId"];
        $hotelId = $_GET["hotelId"];
        $intoDb = new Comment($comment, $hotelId, $userId);
        Comment::intoDb($intoDb);
    }
?>
<h2>Comments</h2>

<section style="background-color: #eee;">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <?
                    $hotelId = $_GET["hotelId"];
                    $comments = Comment::fromDb($hotelId);
                    foreach ($comments as $comment) {
                        $user = User::fromDb($comment->UserId);
                    ?>
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <img class="rounded-circle shadow-1-strong me-3" src="<?= $user->Photo ?>" alt="avatar" width="60" height="60" />
                                <div>
                                    <h6 class="fw-bold text-primary mb-1"><?= $user->Login ?></h6>
                                    <p class="text-muted small mb-0">
                                        Shared publicly - August 2023
                                    </p>
                                </div>
                            </div>

                            <p class="mt-3 mb-4 pb-2">
                                <?= $comment->CommentText ?>
                            </p>

                            <div class="small d-flex justify-content-start">
                                <a href="#!" class="d-flex align-items-center me-3">
                                    <i class="far fa-thumbs-up me-2"></i>
                                    <p class="mb-0">Like</p>
                                </a>
                                <a href="#!" class="d-flex align-items-center me-3">
                                    <i class="far fa-comment-dots me-2"></i>
                                    <p class="mb-0">Comment</p>
                                </a>
                                <a href="#!" class="d-flex align-items-center me-3">
                                    <i class="fas fa-share me-2"></i>
                                    <p class="mb-0">Share</p>
                                </a>
                            </div>
                        </div>
                    <?
                    }
                    ?>
                    <?
                    if (isset($_SESSION["login"])) {
                        $user = User::fromDb($_SESSION["userId"]);
                    ?>
                        <form method="post">
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3" src="<?= $user->Photo ?>" alt="avatar" width="40" height="40" />
                                    <div class="form-outline w-100">
                                        <textarea class="form-control" id="textAreaExample" name="commenttext" rows="4" style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample">Message</label>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <input type="submit" class="btn btn-primary btn-sm"></input>
                                </div>
                            </div>
                        </form>
                    <?
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>