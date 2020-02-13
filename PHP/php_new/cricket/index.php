<?php
require_once('./execution/ob_player.php');
require_once('./execution/ob_match.php');

class index
{
  //highest scorer in a match
  function max_scorer()
  {
    global $players;//using array of objects of player class
    $total=0;//for calculating total run scored by a player
    $max=0;//for keeping maximum run scored
    foreach ($players as $key=>$value)
    {
      foreach($value as $key1=>$value1)
      {
        $total = $total + $value1->run;
        if($total > $max)
        {
          $max=$total;
          $p_name=$key;
        }
      }
      $total=0;
    }
    echo "Highest Scorer: " . $p_name . "<br>" . "Score: " . $max . "<br><br>";
  }

  //maximum score in a match
  function max_run()
  {
    global $match_dt;//using array of objects of match class
    $max=0;//for storing max run scored by a team
    foreach($match_dt as $key=>$value)
    {
      foreach($value as $key1=>$value1)
      {
        if($value1->run > $max)
        {
          $max=$value1->run;
          $t_name=$value1->team;
          $match=$key;
        }
      }
    }
    echo "Max Scorer: " . $t_name . "<br>" . "Score: " . $max . "<br>" . "Match: " . $match . "<br><br>";
  }

  //tournament winner
  function tournament()
  {
    global $match_dt;//using array of objects of match class
    $win=[];//for storing winning teams in different matches
    $max=0;//for checking winning points of teams
    $winner_team;//tournament winner team
    //creating an array of winning teams
    foreach ($match_dt as $key=>$value)
    {
      if($value[0]->run > $value[1]->run)
      {
        $match_win = $value[0]->team;
      }
      else
      {
        $match_win = $value[1]->team;
      }
      $win[]=$match_win;
    }
    //creating points table
    $points=array_count_values($win);
    //calculating tournament winner team
    foreach($points as $key=>$value)
    {
      if($value > $max)
      {
        $max=$value;
        $winner_team=$key;
      }
    }
    echo "Tournament Winner: " . $winner_team . "<br><br>";
    echo "Points Table:";
    echo "<pre>";
    print_r($points);
    echo "</pre>";
  }
}

$max = new index;
$max->max_scorer();
$max->max_run();
$max->tournament();
?>