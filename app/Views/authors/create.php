<h2 class="alert alert-error">
    <?= session()->getFlashdata('error') ?></h2>
<p class="alert alert-warning">
    <?= validation_list_errors() ?>
</p>
<form method="post" action="/authors/create">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="firstname" class="form-label">Firstname</label>
        <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" value="<?= set_value('firstname') ?>">
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value="<?= set_value('surname') ?>">
    </div>
    <div class="mb-3">
        <label for="yearofbirth" class="form-label">Year of Birth</label>
        <input type="number" class="form-control" id="yearofbirth" placeholder="Enter year of birth" name="yearOfBirth" value="<?= set_value('yearOfBirth') ?>">
    </div>
    <input type="submit" value="Create author" class="btn btn-success">
</form>