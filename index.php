<!doctype html>
<head>
    <title>php program</title>
    </head>
<body   >
    <h1>This is PHP programming</h1>


    <!--using string functions-->
 <pre>
    <?php
   
    $s = "hello world!";
    echo strlen($s),"<br>";
    ?>

// using str_word_count 

<?php
$d = "jai shree ram ";
echo str_word_count($d),"<br>";
?>

//str_contains
<?php
$p = "heloo bro!";
var_dump(str_contains($p,"bro"));


?>

//using str_end_with and starts_with
<?php
$nam = "This is a php";
var_dump(str_ends_with($nam,"php"))  ;

?>

<?php
$nam = "This is a php";
echo (str_starts_with($nam,"This")),"<br>";
?>

// using strtoupper()
<?php 
$s = "scrioting language";
echo strtoupper($s),"<br>";
?>

// using strtolower()
<?php 
$s = "ASHWIK JAIS";
echo strtolower($s),"<br>";
?>

<!--  using str_replace() -->
<?php 
$si = "scrioting php";
echo str_replace("scrioting","hiding ", $si),"<br>";
?>

<!-- strin concatenation isme dot(.)ka use 
krke combine kr skte saari variables -->
<?php
$a = "bangla";
$b = "bhoot";
$c = 2;
$f = 67.55;
echo ($b." ".$a." ".$c." ".$f),"<br>";
?>

// using slicing string (substr)

<?php
$ab = "index dot index";
echo substr($ab,5,6);
echo "<br>";
?>

//use of var_dump()
<?php
$a = 45;
$b = 67.77;
$c = "565"; // this is numberic string
var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";
var_dump($c);
?>

//check number is intger type or not 
<?php
$y = 89.9;
$t = 90;
var_dump(is_int($y));
echo "<br>";
var_dump(is_int($t));
?>

//php type casting converts varible into other vaiable types

<?php
$f=90;
$g = 50.55;
$r = "hlllooo";
$c = true;

$f=(string) $f;
$g =(array) $g;
$r = (object)$r;
$c =(int)$g;

var_dump($f);
echo "<br>";
var_dump($g);
echo "<br>";
var_dump($r);
echo "<br>";
var_dump($c);
echo "<br>";

?>


//php math 
<?php 
 echo ("the round value is".round(99.60)."<br>");
 echo ("the square root of".sqrt(64)."<br>");
 echo ("the value of pi ".pi()."<br>");
 echo ("the absolute value is".abs(8.-9)."<br>");
?>

// php constant - using define() function and const keyword
<?php
define("ASHWIK"," "."define() "."Who am  I !"); // constant name  is ASHWIK
echo ASHWIK;

echo __dir__; // ye batyega meri file exact kis location pr load hai
echo "<br>"; 
echo __file__; // output directory and file name show 
echo __line__; // output is line number of the code
echo "<br>"; 
echo __DIR__;
echo __file__;
echo __LINE__;
?>


//shorthened if else<br> 
<?php
$ag3  = 78;
$status = ($ag3 <= 29) ? "failed" : "passed";
echo $status;
?>
//using php match expression is just like a swich condition <br>

<?php

$text = "Always";

$mth = match ($text) {
    "your" =>"uhh are not right" ,
   "Always"  => "uh are right",
   default => "uhh will try after",
};
echo $mth;
?>

// using nested for loop<br>

<?php

for($a=1;$a<=10;$a++){
    for($b=1;$b<=10;$b++){
        echo $b." | ";
           
            }
            
            echo "<br>";
}
?>
//using for each loop <br>
<?php
 $color = array("red","green","blue","yellow","black");
 foreach($color as $full){
    echo "$full <br>";
 }
?>

//using for each loop in associative array <br>
<?php
 $members = array("peter"=>"2300","reter"=>"5650","teter"=>"9000","leter"=>"8900","beter"=>"6700");
 foreach($members as $key => $value){
    echo "$key : $value <br>";
 }
?>

//using foreach loop in object
<?php

class Phone {
    public $model;
    public $color;
    public $price;
    public function __construct($model,$color,$price){
        $this->model = $model;
        $this->color = $color;
        $this->price = $price;

    }
    
}
     $myPhone = new Phone("I phone","Black Shine","1,20,000rs.");
    foreach( $myPhone as $key => $value){
        echo " $key : $value <br>";

    }
?>
<br> 
// using function
<?php
function myMessage($message){
    echo "$message\n";
}
myMessage (strtoupper("1. ghimmble"));
myMessage(strtolower("2. timmble"));
myMessage(strtoupper("3. chimmble"));
myMessage(strtoupper("4. limmle"));

?>
<br>
//function using multiple parameters passes
<?php   
function myParty($member,$dance,$food,$drink)
{
    echo "$member  $dance  $food  $drink\n";
}
myParty("Twinkle","sad song","veg","brocode");
myParty("Rahul","chill song","non-veg","Wiskhy");
myParty("Mohit","pop song","non-veg","colddrink");
myParty("Jack","party song","veg","lemon");

$a = 34;
$b = 10;
echo ($a & $b);
?>

//php array  using foreach loop 
<?php
$car = array("maruti","xuv","fortuner","creata");
foreach ($car as $x){
    echo "$x \n";
}
?>

<br>
//using associative aaray $ using foreach loop
<?php
$mall = [ "Brand"=>"zara","Size"=>"xl","Price"=>299 ];
foreach($mall as $offer => $value){
    echo "$offer : $value \n";
}
?>

// array using with function <br>
<?php
function jaiswal(){
    echo "I am from Prayagraj";
    echo "<br>";

}
$arr = ["volvo","kolvo","jaiswal"];
$arr[2]();
echo "<br>";
foreach($arr as $s){
    echo "$s\n";
    
    
}echo "<br>";

var_dump($arr);
?>
<h3>using array_merge <h3> <br>
<?php
$fruit = ["banana","orainge","pineapple"];
$fruit2 = ["litchi","graves","lemon","anaar"];

$merge = array_merge($fruit,$fruit2);

var_dump($merge);
foreach($merge as $mer2){
    echo "$mer2\n";
    echo $_SERVER['SERVER_NAME'];
echo "<br>";
    

    
}
rsort($merge);
print_r($merge);
sort($merge);
    print_r($merge);
    
    
?>
<br>
<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];

echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];

?>

<!-- <?php
echo "<br>";
$name = htmlspecialchars($_REQUEST['fname']);
$dprt = htmlspecialchars($_REQUEST['department']);
echo "Name : ".$name;
echo "\nDepartment : ".$dprt;
?> -->
</pre>

<form method="post " action="index.php">
    <label for="fname">First Name</label>
    <input type="text" name="fname">
    <label for="department">Department</label>
    <input type="text" name="department">       
    <button type="submit">submit</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name =$_POST['fname'];
$dprt = $_POST['department'];
if(empty($name & $dprt)){
    echo "Please INput SOmetings";

}else{
    echo $name;
    echo "<br>";
    echo $dprt;
}
    
}
 ?>

programmingg  
<!doctype html>
<head>
    <title> Php programming </title>
</head>
    <body>
// variables & data types 
<?php
$name = "Ashwik Jaiswal";          
$age = 25;                         
$email = "ashwik@example.com";     
$phoneNumber = "9876543210";      
$salary = 45000.50;               
$isActive = true; 
echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Email: " . $email . "<br>";
echo "Phone Number: " . $phoneNumber . "<br>";
echo "Salary: ₹" . $salary . "<br>";
echo "Is Active: " . ($isActive ? "Yes" : "No");

?>
// operators
<?php 
// Declare two numbers 
 $num1 = 20;
$num2 = 6;
 // Perform operations
  $addition = $num1 + $num2;
   $subtraction = $num1 - $num2; 
   $multiplication = $num1 * $num2;
    $division = $num1 / $num2; 
    $modulus = $num1 % $num2; 
    // Display results 
echo "First Number: " . $num1 . "<br>";
     echo "Second Number: " . $num2 . "<br><br>";
      echo "Addition: " . $addition . "<br>";
       echo "Subtraction: " . $subtraction . "<br>"; 
       echo "Multiplication: " . $multiplication . "<br>";
        echo "Division: " . $division . "<br>"; 
        echo "Modulus: " . $modulus . "<br>";
         ?>

         <?php
          // 1. Check whether a number is even or odd
           $num = 25;
            if ($num % 2 == 0)
                 { 
                    echo "$num is Even<br>";
                     } 
                     else
                        
  { 
      echo "$num is Odd<br>"; 
         }
         // 2. Check whether a person is eligible to vote 
         $age = 20; 
         if ($age >= 18) 
            { 
                echo "Person is Eligible to Vote<br>"; 
                } 
                else
                     {
                         echo "Person is Not Eligible to Vote<br>"; 
                         }
     // 3. Find the largest of three numbers
      $num1 = 45;
       $num2 = 78; 
       $num3 = 32;
        if ($num1 >= $num2 && $num1 >= $num3)
             {
                 $largest = $num1; 
                 }
                  elseif ($num2 >= $num1 && $num2 >= $num3) 
                    {
         $largest = $num2; 
          }
     else
          {
    $largest = $num3; 
       }
  echo "Largest Number is: $largest";
          ?>

<?php 
// 1. Print numbers from 1 to 100
 echo "<h3>Numbers from 1 to 100:</h3>";
  for ($i = 1; $i <= 100; $i++)
   { 
    echo $i . " ";
     } 
      "<br><br>";
 // 2. Print even numbers from 1 to 100
  echo "<h3>Even Numbers from 1 to 100:</h3>";
   for ($i = 1; $i <= 100; $i++)
    {
         if ($i % 2 == 0) 
         {
             echo $i . " "; 
             }
              }
               echo "<br><br>"; 
// 3. Print multiplication table of a given number
 $number = 5;
  echo "<h3>Multiplication Table of $number:</h3>";
   for ($i = 1; $i <= 10; $i++)
    {
         echo "$number × $i = " . ($number * $i) . "<br>";
          }
           echo "<br>";
 // 4. Calculate the sum of numbers from 1 to 100
  $sum = 0;
   for ($i = 1; $i <= 100; $i++) 
   { $sum = $sum + $i;
    } 
    echo "<h3>Sum of Numbers from 1 to 100:</h3>";
     echo "Sum = " . $sum;
      ?>

<?php
 // 1. Function to add two numbers
  function addNumbers($a, $b)
   { 
    return $a + $b;
     } 
// 2. Function to calculate area of a rectangle
 function rectangleArea($length, $width)
 { 
    return $length * $width;
     } 
// 3. Function to check whether a number is prime function
 isPrime($number) 
 { 
    if ($number < 2)
     { 
        return false;
         }
          for ($i = 2; $i <= sqrt($number); $i++)
          
          { if ($number % $i == 0)
          { return false;
           }
            } return true;
            
            } 
// 4. Function to find factorial of a number function 
factorial($number)
 { 
    $fact = 1;
     for ($i = 1; $i <= $number; $i++)
      {
         $fact = $fact * $i;
       } return $fact;
       
       } 
       
// Calling functions with sample data
 echo "<h3>Add Two Numbers</h3>";
  echo "10 + 20 = " . addNumbers(10, 20);
   echo "<h3>Area of Rectangle</h3>";
    echo "Length = 10, Width = 5<br>";
     echo "Area = " . rectangleArea(10, 5);
      echo "<h3>Check Prime Number</h3>"; $number = 17;
       if (isPrime($number))
        { 
            echo "$number is a Prime Number";
             }
              else {
                 echo "$number is Not a Prime Number";
                  }
                   echo "<h3>Factorial</h3>"; $number = 5;
                    echo "Factorial of $number = " . factorial($number); 
    ?>

<?php 
// Create Student class 
class Student { 
     public $id;
      public $name; 
    public $email; 
    public $course;
     // Method to add student details
     public function addStudent($id, $name, $email, $course)
      { $this->id = $id; $this->name = $name; $this->email = $email; $this->course = $course;
       } 
// Method to display student details
 public function displayStudent() 
 { echo "ID: " . $this->id . "<br>"; 
 echo "Name: " . $this->name . "<br>";
  echo "Email: " . $this->email . "<br>";
   echo "Course: " . $this->course . "<br>";
    echo "-------------------------<br>";
     }
 // Method to update student details
 public function updateStudent($name, $email, $course)
  {
     $this->name = $name; 
     $this->email = $email;
      $this->course = $course;
       } } 
// Create 3 student objects
tudent1 = new Student();
 $student2 = new Student();
  $student3 = new Student();
  
// Add student details
 $student1->addStudent(101, "Rahul", "rahul@gmail.com", "BCA");
  $student2->addStudent(102, "Priya", "priya@gmail.com", "B.Tech"); 
  $student3->addStudent(103, "Amit", "amit@gmail.com", "MCA");
 // Update student 2 details
  $student2->updateStudent( "Priya Sharma", "priyasharma@gmail.com", "BCA" );
   // Display student information
    echo "<h2>Student Details</h2>";
     $student1->displayStudent();
      $student2->displayStudent(); 
      $student3->displayStudent(); 
      ?>
</body>
</html>