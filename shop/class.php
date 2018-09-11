<?php
   class test{
       var $a;
       var $n;
       public function setAge($age){
           $this->a=$age;
       }
       public function setName($name){
           $this->n=$name;
       }
       public function getAge(){
           return $this->a;
       }
       public function getName(){
           return $this->n;
       }
   }
class test1 extends test{
    var $t1="from class test 1";
}
$t = new test1;
$t->setAge(19);
$t->setName("Muhammad Sajjad");
$age = $t->getAge();
$name = $t->getName();
echo "Name : ".$name."  <br>age: ".$age.$t->t1;
        
?>