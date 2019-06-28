<?php require APPROOT.'/views/inc/header.php' ?>
  
  <div class="container">
    <div class="form-container">
      <h2>Zaloguj się</h2>
      <p>Podaj swoje dane aby się zalogować.</p>
      <form action="<?php echo URLROOT.'/users/login'; ?>" class="my-form" method="POST">
        <div class="form-group">
          <label for="email">Email: </label>
          <input type="email" name="email" value="<?php echo $data['email']; ?>" class="<?php echo (!empty($data['email_err']) ? 'input-err' : ''); ?>">
          <span class="err-text"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Hasło: </label>
          <input type="password" name="password" value="<?php echo $data['password']; ?>" class="<?php echo (!empty($data['password_err']) ? 'input-err' : ''); ?>">
          <span class="err-text"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group">
          <div class="column-2">
            <input type="submit" value="Zaloguj" class="button">
          </div>   
          <div class="column-2">
            <a href="<?php echo URLROOT.'/users/login'; ?>" class="button button-light">Nie masz konta? Zarajestruj się.</a>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php require APPROOT.'/views/inc/footer.php' ?>