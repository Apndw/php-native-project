<main class="form-signin w-100 m-auto">
  <form class="form-signin" action="<?php echo get_base_url() . "register/process" ?>" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username" required>
      <label for="floatingUsername">Username</label>
    </div>

    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirmation" placeholder="Password Confirmation" required>
      <label for="floatingPasswordConfirmation">Password Confirmation</label>
    </div>

    <button class="btn btn-primary w-100 py-2 button-submit" type="submit">Sign up</button>
    <a class="btn btn-primary w-100 py-2" href="<?php echo get_base_url() . "login" ?>">Already have account? Sign in</a>

    <?php 
      if (@$_SESSION['msg'] == 1) {
        echo '<div class="alert alert-info mt-4" role="alert">Maaf Username atau Password yang kamu masukkan salah.</div>';
        $_SESSION['msg'] = 0;
      } else if (@$_SESSION['msg'] == 2) {
        echo '<div class="alert alert-info mt-4" role="alert">Maaf Password yang kamu masukkan tidak sama.</div>';
        $_SESSION['msg'] = 0;
      } else if (@$_SESSION['msg'] == 3) {
        echo '<div class="alert alert-info mt-4" role="alert">Maaf Username yang kamu masukkan sudah terdaftar.</div>';
        $_SESSION['msg'] = 0;
      }
    ?>
  </form>
</main>