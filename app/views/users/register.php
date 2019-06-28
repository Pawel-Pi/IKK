<?php require APPROOT.'/views/inc/header.php' ?>
  
  <div class="container">
    <div class="form-container">
      <h2>Utwórz nowe konto</h2>
      <p>Wypełnij wszystkie pola aby się zarejestrować.</p>
      <form action="<?php echo URLROOT.'/users/register'; ?>" class="my-form" method="POST">
        <div class="form-group">
          <label for="login">Login: </label>
          <input type="text" name="login" value="<?php echo $data['login']; ?>" class="<?php echo (!empty($data['login_err']) ? 'input-err' : ''); ?>">
          <span class="err-text"><?php echo $data['login_err']; ?></span>
        </div>
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
          <label for="confirm_password">Potwierdź hasło: </label>
          <input type="password" name="confirm_password" value="<?php echo $data['confirm_password']; ?>" class="<?php echo (!empty($data['confirm_password_err']) ? 'input-err' : ''); ?>">
          <span class="err-text"><?php echo $data['confirm_password_err']; ?></span>
        </div>
        <div class="form-group">
          <div class="column-2">
            <input type="submit" value="Utwórz konto" class="button">
          </div>   
          <div class="column-2">
            <a href="<?php echo URLROOT.'/users/login'; ?>" class="button button-light">Masz Konto? Zaloguj się.</a>
          </div>
        </div>
      </form>
    </div>
  </div>

<?php require APPROOT.'/views/inc/footer.php' ?>