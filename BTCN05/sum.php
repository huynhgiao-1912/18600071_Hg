<?php
    require_once 'init.php';
    require_once 'function.php';
    $title='Cộng hai số';
    $currentUser = getCurentUser();
    if(isset($_POST['number1']) && isset($_POST['number2'])){
        $a = $_POST['number1'];
        $b = $_POST['number2'];
        $result = $a + $b;
    }
?>
<?php  include 'header.php' ;?>

<?php if(isset($result)) : ?>
  <?php if(!$currentUser){
        header('Location: login.php');
        exit();
  }?>
    <div class="alert alert-success">
   Kết quả: <?php echo $result; ?>
  </div>
<?php else: ?>
  <form action="sum.php" method="post">
    <div class="form-group">
      <label for="number1">Số thứ nhất:</label>
      <input type="number" class="form-control" id="number1" placeholder="Số thứ nhất" name="number1">
    </div>
    <div class="form-group">
      <label for="number2">Số thứ hai:</label>
      <input type="number" class="form-control" id="number2" placeholder="Số thứ hai" name="number2">
    </div>
    <button id="Goi" type="submit"  class="btn btn-default">Gởi dữ liệu</button>
  </form>
<?php endif; ?>
<?php  include 'footer.php' ;?>





