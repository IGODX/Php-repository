<h2 class="alert alert-error">
    <?= session()->getFlashdata('error') ?></h2>
<p class="alert alert-warning">
    <?= validation_list_errors() ?>
</p>
<form method="post" action="/books/create">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="bookTitle" class="form-label">Book title</label>
        <input type="text" class="form-control" id="bookTitle" placeholder="Book title..." name="title" value="<?= set_value('title') ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" placeholder="Enter price..." name="price" value="<?= set_value('price') ?>">
    </div>
    <div class="mb-3">
        <div><label for="authorId">Chose author:</label></div>
        <select class="form-control" name="authorId" id="authorId">
            <?php foreach ($authors as $author) : ?>
                <option value="<?= esc($author["id"]) ?>"><?= esc($author["firstname"]) . " " .  esc($author["surname"]) ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="yearOfPublish" class="form-label">Year of publish</label>
        <input type="number" class="form-control" id="yearOfPublish" placeholder="Enter year of publish..." name="yearOfPublish" value="<?= set_value('yearOfPublish') ?>">
    </div>
    <input type="submit" value="Create author" class="btn btn-success">
</form>