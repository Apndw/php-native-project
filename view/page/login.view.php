<main class="form-signin w-100 m-auto">
  <form class="form-signin" action="<?php echo get_base_url() . "login/process" ?>" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username" required>
      <label for="floatingUsername">Username</label>
    </div>

    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2 button-submit" type="submit">Sign in</button>
    <a class="btn btn-primary w-100 py-2" href="<?php echo get_base_url() . "register" ?>">Don't have account? Sign up</a>
    
    <?php 
      if (@$_SESSION['msg'] == 1) {
        echo '<div class="alert alert-info mt-4" role="alert">Maaf Username atau Password yang kamu masukkan salah.</div>';
        $_SESSION['msg'] = 0;
      }
    ?>
  </form>
</main>