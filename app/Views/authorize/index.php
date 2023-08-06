<h2 class="alert alert-error">
    <?= session()->getFlashdata('error') ?></h2>
<p class="alert alert-warning">
    <?= validation_list_errors() ?>
</p>
<section class="w-100 d-flex align-items-center justify-content-center mb-4" style="height: 100vh;">
    <section class="w-100 p-4 d-flex justify-content-center pb-4">
        <form style="width: 22rem;" action="<?= esc($route) ?>" method="post">
            <?= csrf_field() ?>
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"><?= esc($title) ?></h3>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control">
                <label class="form-label" for="email" style="margin-left: 0px;">Email address</label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 88.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" class="form-control">
                <label class="form-label" for="form2Example2" style="margin-left: 0px;">Password</label>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 64.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked="">
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" value="Sign in">

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </section>
</section>