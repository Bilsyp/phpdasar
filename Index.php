<?php 
$arrayName = array('A','B','C');
##### Hello World #####
class Car {
  public $color;
  public $model;
  public function __construct($model,$color){
   $this->color = $color;
   $this->model = $model;
  }
  public function message(){
    $arr = [
      ["Joe"=> "12"],
      []
      ]
   return "My car is a ".$this->color. " ". $this->model }
}
$myCar = new Car('black','toyota');
sqlite_err
echo $myCar -> message();
var_dump($myCar);
?>
<html>
  <body>
   <h1>Login</h1>
   <form action="" method="post">
     <label for="name"></label>
     <input type="text" name="name" id="name"/>
    <button type="submit"name="submit">Send</button>
   </form>
  </body>
</html>
<?php 
 if (isset($_POST["submit"])) {
   $name = $_POST["name"];
   echo("<h1>". $name."</h1>");
 }

?>