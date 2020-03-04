<?php
include 'data.php';
class product {
  public $p_id;
  public $price;
  public $s_date;
  public $cat_id;

  function __construct($p_id,$price,$s_date,$cat_id) {
    $this->p_id=$p_id;
    $this->price=$price;
    $this->s_date=$s_date;
    $this->cat_id=$cat_id;
  }
}

$pro=[];
$category=[];
foreach ($p_details as $key=>$value) {
  $obj=new product($value['pd'],$value['sp'],$value['sd'],$value['ct']);
  $pro[]=$obj;
  $category[$value['ct']]=0;
  $product[$value['pd']]="";
}


usort($pro, 'cmp');
function cmp($a,$b) {
  return strcmp($a->p_id ,$b->p_id);
}

usort($pro, 'dat');
function dat($a,$b) {
  if($a->p_id==$b->p_id){
    if(strcmp($a->s_date ,$b->s_date)==-1){
    $b->price+=$a->price;
  }
  elseif(strcmp($a->s_date ,$b->s_date)==1) {
  $a->price+=$b->price;
  }
    return strcmp($a->s_date ,$b->s_date);
  }
}

foreach($pro as $key =>$value){
   $category[$value->cat_id]+=1;
}

foreach($category as $key=>$value){
  check($key);
}

function check($c){
  global $pro,$product;
  $count=1;
  foreach ($pro as $key => $value) {
    if($value->cat_id==$c){
      if($product[$value->p_id]!=""){
        $count=$product[$value->p_id];
        $value->cat_id=$c."-p".$count;
        $count+=1;
      }
    else {
      $value->cat_id=$c."-p".$count;
      $product[$value->p_id]=$count;
      $count+=1;
    }
    }
  }
}

echo "<pre>";
print_r($pro);
//print_r($category);
//print_r($product);
//print_r($p_details);
echo "</pre>";
