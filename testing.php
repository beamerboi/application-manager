<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFirstPHPFile</title>
</head>
<body>
    <h1><?php echo "Hello World"; ?></h1>
    <?php
    include 'variables.php';
    define('NAME','Ghassen');
    $arr = ['yo', 'beo', 'nice'];

    // for($i = 0; $i<count($arr); $i++){
    //     echo $arr[$i].' ';
    // }


    $secArr = [
        ['name'=>'Sabrine', 'price' => '600'],
        ['name'=>'Fourat', 'price' => '650'],
        ['name'=>'Marwa', 'price' => '700'],
        ['name'=>'Janette', 'price' => '800'],
    ];
    // foreach($secArr as $arr){
    //    foreach($arr as $ar){
    //        echo $ar. ' ';}
    //     echo '<hr><br>';
    // }
    $name ="Ghassen";
    function sayHello(&$name){
      $name = "Owl";
      return "Good Morning $name";
    }
    // echo sayHello("Ghassen");
    function formatPorduct($product){
      return "{$product['name']} costs ${product['price']}";
    }
    foreach($owls as $owl){
    echo $owl.'<br>';
  }
  // echo '<br>';
  // echo sayHello($name);
  // echo "<br> $name";
  // TODO: Watch 3 more videos at least from the net ninja
  // TODO: study excel at 9 PM
    ?>

</body>
</html>
