<?php
    require_once 'init.php';
    $title='Đăng kí';

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $email = $_POST['email'];
        $user = findUserByUsername($username);
        if ($username == "" || $password == "" || $email == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        }else{
            if($user){
                $error = 'Tài khoản đã tồn tại';
            } else {
              if($password == $confirmpassword)
              {
                    //gán user vào session      
                     $_SESSION['username'] = $user['username'];
                     $dangki = array(
                        'username' => $username,
                        'password' => $password
                    );
                    $content = file_get_contents('./data');
                    $users1 = unserialize($content);
                    $users[sizeof($users1)+1] = array($dangki);
                    file_put_contents('./data',serialize($users[sizeof($users1)+1]), LOCK_EX); //,FILE_APPEND |
                    header('Location: login.php');
                    exit();}
                    else{
                      $error="Mật khẩu không khớp";
                    }
            }
        }
        
    }
?>
<?php  include 'header.php' ;?>
<?php if(isset($error)) : ?>
    <div class="alert alert-info">
    <?php echo $error; ?>
  </div>
<?php else: ?>    
  <form action="registrer.php" method="post">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="username" id="username">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email" id="email">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password" id="password">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword">
  </div>

  <button type="submit" class="btn">Đăng kí</button>
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
  </form>
  <?php endif;?>
<?php  include 'footer.php' ; ?>