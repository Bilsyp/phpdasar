<?php 
$servername = "localhost";
$username   = "STIGER-R1";
$password   = "5678";
$database   = "phpdasar";

// Connection //
$conn =mysqli_connect($servername
,$username
,$password
,$database);


##### Hello World #####
// Start Test Object Oriented Programing Php //
class Car {
  public $color;
  public $model;
  public function __construct($model,$color){
   $this->color = $color;
   $this->model = $model;
  }
  public function message(){
   return "My car is a ".$this->color. " ". $this->model }
}
$myCar = new Car('black','toyota');
// End Test Object Oriented Programing Php //
?>
<html>
  <body>
    <h1><?php if(!$conn){
      die("Connection Error".mysqli_error( $conn));
    }else {
      echo "Connection Success";
    }
      mysqli_close($conn);
    ?></h1>
  
   <h1>Login</h1>
   <form action="" method="post">
     <label for="name">Username:</label>
     <input type="text" name="name" id="name"/>
    <button type="submit"name="submit">Send</button>
   </form>
   <!-- Cara2 !-->
   <br><br>
    <form action="index2.php"method="post">
      <label for="name2">Username:</label>
      <input type="text" name="name2"id="name2"/>
      <button type="submit" name="submit2">Send</button>
    </form>
   
  </body>
</html>
<?php 
 if (isset($_POST["submit"])) {
   $name = $_POST["name"];
   echo("<h1>". $name."</h1>");
 }
?>
