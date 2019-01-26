<?php
   $this->start('tb_actions');
   ?>
<li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
   $this->end();
   $this->start('tb_sidebar');
   ?>
<li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
   $this->end();


   ?>
<?php
function nrand($mean, $sd){
    $x = mt_rand()/mt_getrandmax();
    $y = mt_rand()/mt_getrandmax();
    return sqrt(-2*log($x))*cos(2*pi()*$y)*$sd + $mean;
}
?>

<?php
function stdev($arr) 
    { 
        $num_of_elements = count($arr); 
          
        $variance = 0.0; 
          
                // calculating mean using array_sum() method 
        $average = array_sum($arr)/$num_of_elements; 
          
        foreach($arr as $i) 
        { 
            // sum of squares of differences between  
                        // all numbers and means. 
            $variance += pow(($i - $average), 2); 
        } 
          
        return (float)sqrt($variance/$num_of_elements); 
    } 
?> 

<?php $noise = rand(-5, 5);
      $userPerform = 30;
      $peerPerform = max(0, ($userPerform + 10 + $noise));
      if ($peerPerform > 100) {
         $peerPerform = 100;
      }
?>

<?php $screenerSmoke = 0;
      foreach($recordset as $smokeScreen) if (($smokeScreen->user_id == $user->id) and ($smokeScreen->screener_id == 3)) {
         foreach($record as $smokeScreenrecord) if (($smokeScreenrecord->recordset_id == $smokeScreen->id) and ($smokeScreenrecord->question_id == 10)) {
            $screenerSmoke = $smokeScreenrecord->answer;
         }
      }
?>

<?php $smokingRecords = []; $smokeSum = 0;
      foreach($recordset2 as $smokingSets) if ($smokingSets->exercise_id == 5) {
         $i = 0;
         if ($i < 7) {
            foreach($record2 as $smokeRecord) if ($smokeRecord->recordset_id == $smokingSets->id) {
               $smokeSum += $smokeRecord->answer;
               $i++;
            }
         } else {
            break;
         }
         array_push($smokingRecords, ($smokeSum/7));
         $smokeSum = 0;
      }
?>

<?php $screenerWeight = 0;
      foreach($recordset as $weightScreen) if ($weightScreen->screener_id == 4) {
         foreach($record2 as $weightScreenrecord) if (($weightScreenrecord->recordset_id == $weightScreen->id) and ($weightScreenrecord->question_id == 11)) {
            $screenerWeight = $weightScreenrecord->answer;
         }
      }
?>

<?php $weightRecords = []; $weightSum = 0;
      foreach($recordset2 as $weightSets) if ($weightSets->exercise_id == 6) {
         $i = 0;
         if ($i < 1) {
            foreach($record2 as $weightRecord) if (($weightRecord->recordset_id == $weightSets->id) and ($weightRecord->question_id == 178)) {
               $weightSum += $weightRecord->answer;
            }
         } else {
            break;
         }
         array_push($weightRecords, ($weightSum));
         $weightSum = 0;
      }
?>

<?php $screenerExe = 0;
      foreach($recordset as $exeScreen) if ($exeScreen->screener_id == 6) {
         foreach($record as $exeScreenrecord) if (($exeScreenrecord->recordset_id == $exeScreen->id) and ($exeScreenrecord->question_id == 107)) {
            $screenerExe = $exeScreenrecord->answer;
         }
      }
?>

<?php $exeRecords = []; $exeSum = 0;
      foreach($recordset2 as $exeSets) if ($exeSets->exercise_id == 7) {
         $i = 0;
         if ($i < 7) {
            foreach($record2 as $exeRecord) if (($exeRecord->recordset_id == $exeSets->id) and ($exeRecord->question_id != 122) and ($exeRecord->question_id != 123)) {
               $exeSum += $exeRecord->answer;
               $i++;
            }
         } else {
            break;
         }
         array_push($exeRecords, ($exeSum/7));
         $exeSum = 0;
      }
?>

<?php $screenerEat = 0;
      foreach($recordset as $eatScreen) if ($eatScreen->screener_id == 5) {
         foreach($record as $eatScreenrecord) if (($eatScreenrecord->recordset_id = $eatScreen->id) and ($eatScreenrecord->question_id == 13)) {
            $screenerEat = $eatScreenrecord->answer;
         }
      }
?>

<?php $eatRecords = []; $eatSum = 0;
      foreach($recordset2 as $eatSets) if ($eatSets->exercise_id == 9) {
         $i = 0;
         if ($i < 1) {
            foreach($record2 as $eatRecord) if (($eatRecord->recordset_id == $eatSets->id) and ($eatRecord->question_id == 50)) {
               $eatSum += $eatRecord->answer;
               $i++;
            }
         } else {
            break;
         }
         array_push($eatRecords, $eatSum);
         $eatSum = 0;
      }
?>

<?php $screenerDrink = 0;
      foreach($recordset as $drinkScreen) if ($drinkScreen->screener_id == 2) {
         foreach($record as $drinkScreenrecord) if (($drinkScreenrecord->recordset_id = $drinkScreen->id) and ($drinkScreenrecord->question_id == 6)) {
            $screenerDrink = $drinkScreenrecord->answer;
         }
      }
?>

<?php $drinkRecords = []; $drinkSum = 0;
      foreach($recordset2 as $drinkSets) if ($drinkSets->exercise_id == 8) {
         $i = 0;
         if ($i < 1) {
            foreach($record2 as $drinkRecord) if (($drinkRecord->recordset_id == $drinkSets->id) and ($drinkRecord->question_id == 42)) {
               $drinkSum += $drinkRecord->answer;
               $i++;
            }
         } else {
            break;
         }
         array_push($drinkRecords, $drinkSum);
         $drinkSum = 0;
      }
?>

<?php $peersmokingRecords = []; $peerVal = 0;
      array_push($peersmokingRecords, $screenerSmoke);
      for ($i=0; $i < count($smokingRecords); $i++) {
         $smokingstdev = [];
         $userVal = $smokingRecords[$i];
         if ($i == 0) {
            array_push($smokingstdev, $screenerSmoke);
            array_push($smokingstdev, $smokingRecords[$i]);
         } else {
            array_push($smokingstdev, $screenerSmoke);
            for($j=0; $j < $i; $j++) {
               array_push($smokingstdev, $smokingRecords[$j]);
            }
         }
         $userScale = stdev($smokingstdev);
         $smokeNoise = nrand(0.0, ($userScale/4));
         if ($i == 0) {
            $smokeChange = $screenerSmoke - $smokingRecords[$i];
            if ($smokeChange <= 0) {
               $peerVal = round($peersmokingRecords[$i] + $smokeNoise);
            } else {
               $changeVal = round($smokeChange * 2);
               if ($changeVal > 0) {
                  $peerValI = round($userVal - $changeVal + $smokeNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peersmokingRecords[$i]));
               } else {
                  $peerValI = round($userVal + $changeVal + $smokeNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peersmokingRecords[$i]));
               }
            }
         } else {
            $smokeChange = $smokingRecords[$i-1] - $smokingRecords[$i];
            if ($smokeChange <= 0) {
               $peerVal = round($peersmokingRecords[$i] + $smokeNoise);
            } else {
               $changeVal = round($smokeChange * 2);
               if ($changeVal > 0) {
                  $peerValI = round($userVal - $changeVal + $smokeNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peersmokingRecords[$i]) + (0.25 * $peersmokingRecords[$i-1]));
               } else {
                  $peerValI = round($userVal + $changeVal + $smokeNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peersmokingRecords[$i]) + (0.25 * $peersmokingRecords[$i-1]));
               }
            }
         }
         if ($peerVal <= 0) {
            $peerVal = 0;
         }
         array_push($peersmokingRecords, $peerVal);
      }
?>

<?php $peerweightRecords = []; $peerVal = 0;
      array_push($peerweightRecords, $screenerWeight);
      for ($i=0; $i < count($weightRecords); $i++) {
         $weightstdev = [];
         $userVal = $weightRecords[$i];
         if ($i == 0) {
            array_push($weightstdev, $screenerWeight);
            array_push($weightstdev, $weightRecords[$i]);
         } else {
            array_push($weightstdev, $screenerWeight);
            for($j=0; $j < $i; $j++) {
               array_push($weightstdev, $weightRecords[$j]);
            }
         }
         $userScale = stdev($weightstdev);
         $weightNoise = nrand(0.0, ($userScale/4));
         if ($i == 0) {
            $weightChange = $screenerWeight - $weightRecords[$i];
            if ($weightChange <= 0) {
               $peerVal = round($peerweightRecords[$i] + $weightNoise);
            } else {
               $changeVal = round($weightChange * 1.5);
               if ($changeVal > 0) {
                  $peerValI = round($userVal - $changeVal + $weightNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peerweightRecords[$i]));
               } else {
                  $peerValI = round($userVal + $changeVal + $weightNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peerweightRecords[$i]));
               }
            }
         } else {
            $weightChange = $weightRecords[$i-1] - $weightRecords[$i];
            if ($weightChange <= 0) {
               $peerVal = round($peerweightRecords[$i] + $weightNoise);
            } else {
               $changeVal = round($weightChange * 1.5);
               if ($changeVal > 0) {
                  $peerValI = round($userVal - $changeVal + $weightNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peerweightRecords[$i]) + (0.25 * $peerweightRecords[$i-1]));
               } else {
                  $peerValI = round($userVal + $changeVal + $weightNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peerweightRecords[$i]) + (0.25 * $peerweightRecords[$i-1]));
               }
            }
         }
         if ($peerVal <= 0) {
            $peerVal = 0;
         }
         array_push($peerweightRecords, $peerVal);
      }
?>

<?php $peerexeRecords = []; $peerVal = 0;
      array_push($peerexeRecords, $screenerExe);
      for ($i=0; $i < count($exeRecords); $i++) {
         $exestdev = [];
         $userVal = $exeRecords[$i];
         if ($i == 0) {
            array_push($exestdev, $screenerExe);
            array_push($exestdev, $exeRecords[$i]);
         } else {
            array_push($exestdev, $screenerExe);
            for($j=0; $j < $i; $j++) {
               array_push($exestdev, $exeRecords[$j]);
            }
         }
         $userScale = stdev($exestdev);
         $exeNoise = nrand(0.0, ($userScale/4));
         if ($i == 0) {
            $exeChange = $exeRecords[$i] - $screenerExe;
            if ($exeChange <= 0) {
               $peerVal = round($peerexeRecords[$i] + $exeNoise);
            } else {
               $changeVal = round($exeChange * 2);
               if ($changeVal > 0) {
                  $peerValI = round($userVal + $changeVal + $exeNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peerexeRecords[$i]));
               } else {
                  $peerValI = round($userVal - $changeVal + $exeNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peerexeRecords[$i]));
               }
            }
         } else {
            $exeChange = $exeRecords[$i] - $exeRecords[$i-1];
            if ($exeChange <= 0) {
               $peerVal = round($peerexeRecords[$i] + $exeNoise);
            } else {
               $changeVal = round($exeChange * 2);
               if ($changeVal > 0) {
                  $peerValI = round($userVal + $changeVal + $exeNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peerexeRecords[$i]) + (0.25 * $peerexeRecords[$i-1]));
               } else {
                  $peerValI = round($userVal - $changeVal + $exeNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peerexeRecords[$i]) + (0.25 * $peerexeRecords[$i-1]));
               }
            }
         }
         if ($peerVal <= 0) {
            $peerVal = 0;
         }
         array_push($peerexeRecords, $peerVal);
      }
?>

<?php $peereatRecords = []; $peerVal = 0;
      array_push($peereatRecords, $screenerEat);
      for ($i=0; $i < count($eatRecords); $i++) {
         $eatstdev = [];
         $userVal = $eatRecords[$i];
         if ($i == 0) {
            array_push($eatstdev, $screenerEat);
            array_push($eatstdev, $eatRecords[$i]);
         } else {
            array_push($eatstdev, $screenerEat);
            for($j=0; $j < $i; $j++) {
               array_push($eatstdev, $eatRecords[$j]);
            }
         }
         $userScale = stdev($eatstdev);
         $eatNoise = nrand(0.0, ($userScale/4));
         if ($i == 0) {
            $eatChange = $eatRecords[$i] - $screenerEat;
            if ($eatChange <= 0) {
               $peerVal = round($peereatRecords[$i] + $eatNoise);
            } else {
               $changeVal = round($eatChange * 0.5);
               if ($changeVal > 0) {
                  $peerValI = round($userVal + $changeVal + $eatNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peereatRecords[$i]));
               } else {
                  $peerValI = round($userVal - $changeVal + $eatNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peereatRecords[$i]));
               }
            }
         } else {
            $eatChange = $eatRecords[$i] - $eatRecords[$i-1];
            if ($eatChange <= 0) {
               $peerVal = round($peereatRecords[$i] + $eatNoise);
            } else {
               $changeVal = round($eatChange * 0.5);
               if ($changeVal > 0) {
                  $peerValI = round($userVal + $changeVal + $eatNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peereatRecords[$i]) + (0.25 * $peereatRecords[$i-1]));
               } else {
                  $peerValI = round($userVal - $changeVal + $eatNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peereatRecords[$i]) + (0.25 * $peereatRecords[$i-1]));
               }
            }
         }
         if ($peerVal <= 0) {
            $peerVal = 0;
         }
         if ($peerVal >= 7) {
            $peerVal = 7;
         }
         array_push($peereatRecords, $peerVal);
      }
?>

<?php $peerdrinkRecords = []; $peerVal = 0;
      array_push($peerdrinkRecords, $screenerDrink);
      for ($i=0; $i < count($drinkRecords); $i++) {
         $drinkstdev = [];
         $userVal = $drinkRecords[$i];
         if ($i == 0) {
            array_push($drinkstdev, $screenerDrink);
            array_push($drinkstdev, $drinkRecords[$i]);
         } else {
            array_push($drinkstdev, $screenerDrink);
            for($j=0; $j < $i; $j++) {
               array_push($drinkstdev, $drinkRecords[$j]);
            }
         }
         $userScale = stdev($drinkstdev);
         $drinkNoise = nrand(0.0, ($userScale/4));
         if ($i == 0) {
            $drinkChange = $screenerDrink - $drinkRecords[$i];
            if ($drinkChange <= 0) {
               $peerVal = round($peerdrinkRecords[$i] + $drinkNoise);
            } else {
               $changeVal = round($drinkChange * 2);
               if ($changeVal > 0) {
                  $peerValI = round($userVal - $changeVal + $drinkNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peerdrinkRecords[$i]));
               } else {
                  $peerValI = round($userVal + $changeVal + $drinkNoise);
                  $peerVal = round((0.66 * $peerValI) + (0.33 * $peerdrinkRecords[$i]));
               }
            }
         } else {
            $drinkChange = $drinkRecords[$i-1] - $drinkRecords[$i];
            if ($drinkChange <= 0) {
               $peerVal = round($peerdrinkRecords[$i] + $drinkNoise);
            } else {
               $changeVal = round($drinkChange * 2);
               if ($changeVal > 0) {
                  $peerValI = round($userVal - $changeVal + $drinkNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peerdrinkRecords[$i]) + (0.25 * $peerdrinkRecords[$i-1]));
               } else {
                  $peerValI = round($userVal + $changeVal + $drinkNoise);
                  $peerVal = round((0.5 * $peerValI) + (0.25 * $peerdrinkRecords[$i]) + (0.25 * $peerdrinkRecords[$i-1]));
               }
            }
         }
         if ($peerVal <= 0) {
            $peerVal = 0;
         }
         array_push($peerdrinkRecords, $peerVal);
      }
?>

  
<?php $bronzeValue = 50; $silverValue = 100; $goldValue = 200; $platValue = 400; $bronzeComp = false; $silverComp = false; $goldComp = false; $platComp = false;
                     $goalValue = $bronzeValue;
                     if (($bronzeValue <= $profile->points) and ($profile->points < $silverValue)) {
                        $goalValue = $silverValue; $bronzeComp = true;
                     } else if (($silverValue <= $profile->points) and ($profile->points < $goldValue)) {
                        $goalValue = $goldValue; $silverComp = true; $bronzeComp = true;
                     } else if (($goldValue <= $profile->points) and  ($profile->points < $platValue)) {
                        $goalValue = $platValue; $goldComp = true; $silverComp = true; $bronzeComp = true;
                     } else if ($platValue <= $profile->points) {
                        $goalValue = $profile->points; $platComp = true; $goldComp = true; $silverComp = true; $bronzeComp = true;
                     } ?>
<div class="container user-dashboard">
    <div class="row greeting">
        <div class="col-md-12">
            <h1>Good <?=(date('H')<12?'Morning':date('H')<18?'Afternoon':'Evening')?>, <?=ucwords($user->username)?>.</h1>
        </div>
        <?php if($profile->hospital=="Morriston") { ?>
        <br>
        <div class="col-md-12" style="background-color:#aed6f1">
           <?php foreach($user->module as $module) { ?>
            <?php if($module->title == "Quit Smoking") { ?>
               <h3>Other users like you have reduced their smoking, on average, to <?= end($peersmokingRecords) ?> cigarettes per day.</h3>
            <?php } ?>
           <?php if($module->title == "Weight Optimisation") { ?>
               <h3>Other users like you have reduced their weight, on average, to <?= end($peerweightRecords) ?> Kgs.</h3>
            <?php } ?>
           <?php if($module->title == "Regular Exercise") { ?>
               <h3>Other users like you have achieved, on average, <?= end($peerexeRecords) ?> minutes of exercise a day.</h3>
            <?php } ?>
           <?php if($module->title == "Eat Healthily") { ?>
               <h3>Other users like you, on average, ate their 5-A-Day Fruit and Veg <?= end($peereatRecords) ?> days last week.</h3>
            <?php } ?>
           <?php if($module->title == "Drink Responsibly") { ?>
               <h3>Other users reduced their drinking, on average, to <?= end($peerdrinkRecords) ?> alcoholic drinks per week.</h3>
            <?php } ?>
           <?php } ?>
       </div>
       <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-8 activity-summary">
            <h2>Your Activity Summary<span><a href="">This Week</a> | <a href="">Last 30 Days</a> | <a href="">All Time</a></span></h2>
            <div class="row">
                <div class="col-md-6" id="pie-chart-container">
                    <canvas id="pie-chart" height="260" width="350"><em>Please wait for the chart to load&hellip;</em></canvas>
                </div>
                <div class="col-md-6 activity-statistics">
                    <div class="row">
                        <div class="col-md-2 value"><?=count($engagement)?></div>
                        <div class="col-md-10 align-middle">Modules engaged with recently</div>
                    </div>
                   <div class="row">
                        <div class="col-md-2 value"><?=$profile->points?></div>
                        <div class="col-md-10 align-middle">User Points</div>
                    </div>
                </div>
            </div>
        </div>
       <div class="col-md-4 module-enrolments">
            <h2>Your Modules</h2>
            <div>
                <p>You are enrolled onto <?=count($user->module)?> module<?=(count($user->module)==1?'':'s')?></p>
                <?php
                if(0 == count($user->module)) {
                ?>
                <p>You are not enrolled onto any modules. <a href="/pages/home" title="Return Home">Visit the homepage</a> to view the modules on offer.</p>
                <?php
                } else {
                foreach($user->module as $module):
                ?>
                <hr style="text-align:left">
                <img src="<?= $module->icon ?>" alt="Icon for the <?=addslashes($module->title)?> module"> <?= $this->Html->link($module->title, ['controller' => 'module', 'action' => 'dashboard', $module->id], ['title' => __($module->title)]); ?>
                <?php endforeach;
                }
                ?>
                <hr>
                <a class="catalogue-link" href="/pages/home">Return Home</a>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-md-12">
            <h2>Progress Graphs</h2>
            <div class="row">
               <p><center>Here you can see the progress you have made through interactions with the various modules.</center></p>
               <p><center>Be sure to regularly visit the website and complete the weekly exercises to view your progress!</center></p>
            </div>
         </div>
       <div class="row">
                <div class="col-md-6" id="pie-chart-container">
                    <canvas id="smoke-chart" height="500" width="1500"><em>Please wait for the chart to load&hellip;</em></canvas>
                </div>
                <div class="col-md-6" id="pie-chart-container">
                    <canvas id="weight-chart" height="500" width="1500"><em>Please wait for the chart to load&hellip;</em></canvas>
                </div>
       </div>
       <div class="row">
                <div class="col-md-6" id="pie-chart-container">
                    <canvas id="exe-chart" height="500" width="1500"><em>Please wait for the chart to load&hellip;</em></canvas>
                </div>
                <div class="col-md-6" id="pie-chart-container">
                    <canvas id="eat-chart" height="500" width="1500"><em>Please wait for the chart to load&hellip;</em></canvas>
                </div>
       </div>
       <div class="row">
                <div class="col-md-6" id="pie-chart-container">
                    <canvas id="drink-chart" height="500" width="1500"><em>Please wait for the chart to load&hellip;</em></canvas>
                </div>
       </div>
    </div>
    <div class="row trophies">
        <div class="col-md-12">
            <h2>Trophies</h2>
            <div class="row">
                <p><center>You can earn points and trophies by taking part in the activities found in each module and recording your progress. They will appear here in your user dashboard.</center></p>
                <p><center>You will receive 1 point for each visit and 5 points for each activity you complete. Collect points to unlock new trophies.</center><p>    
           </div>   
            <div class="row">
                    <?php if ($bronzeComp == true) { ?>
                        <img class="trophy-icon" src="/img/trophyBronze.jpg">
                        <?php
                        echo "<span style='color: #B87333;' />You have earned the Bronze Trophy for achieving 50 points. Congratulations!</span>";
                        echo "<br>";
                     } ?>
            </div>
            <div class="row">
                     <?php if ($silverComp == true) { ?>
                        <img class="trophy-icon" src="/img/trophySilver.jpg">
                        <?php
                        echo "<span style='color: #E6E8FA;' />You have earned the Silver Trophy by achieving 100 points. Congratulations!</span>";
                        echo "<br>";
                     } ?>
           </div>
           <div class="row">
                     <?php if ($goldComp == true) { ?>
                        <img class="trophy-icon" src="/img/trophyGold.jpg">
                        <?php
                        echo "<span style='color: #FFCA18;' />You have earned the Gold Trophy by achieving 200 points. Congratulations!</span>";
                        echo "<br>";
                     } ?>
           </div>
           <div class="row">
                     <?php if ($platComp == true) { ?>
                        <img class="trophy-icon" src="/img/trophyPlat.jpg">
                        <?php
                        echo "<span style='color: #D9D9F3;' />You have earned the Platinum Trophy by achieving 400 points. Congratulations!</span>";
                        echo "<br>";
                     } ?>
           </div>
        </div>
    </div>
   <div class="row">
      <h3><center> Progress to Next Trophy </center></h3>
                  <div class="progress">
                     <?php $currentProgress = ($profile->points/$goalValue) * 100; ?>
                     <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="200" style="width: <?= $currentProgress ?>%">
                           <?php echo $profile->points . "/" . $goalValue ?>
                     </div>
                  </div>
               </div>
            </div>
</div>
<script type="text/javascript" src="/js/chartjs.min.js"></script>
<script>
$(function() {
    var selector = document.getElementById('pie-chart');
    var chartOptions = {
        responsive: true
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'pie',
            data: {
<?php
            if(0 == count($engagement)) {
?>
                datasets: [{
                    data: [
                        1
                    ],
                    backgroundColor: [
                        '#DDD'
                    ],
                    label: 'No recent engagement'
                }],
                labels: [
                    'No recent engagement'
                ]
<?php
            } else {
?>
                datasets: [{
                    data: [
<?php
                        foreach($engagement as $e) {
                            echo $e['count'] . ",\n";
                        }
?>
                    ],
                    backgroundColor: [
<?php
                        foreach($engagement as $e) {
                            echo "'rgb({$e['colour'][0]}, {$e['colour'][1]}, {$e['colour'][2]})',\n";
                        }
?>
                    ],
                    label: 'My Label'
                }],
                labels: [
<?php
                        foreach($engagement as $e) {
                            echo "'" . $e['title'] . "',\n";
                        }
?>
                ]
<?php
            }
?>
            },
            options: chartOptions
        }
    );
});
</script>
<script type="text/javascript" src="/js/chartjs.min.js"></script>
<script>
$(function() {
    var selector = document.getElementById('smoke-chart');
    var chartOptions = {
        responsive: true,
        title: {
           text: 'Quit Smoking',
           display: true,
        },
       scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                              min: 0,
                              max: 20,
                              stepSize: 5
                           }
                        }]
                },
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'line',
            data: {
                datasets: [{
                    data: [
<?php
                        echo $screenerSmoke . ",\n";
                        for ($i=0; $i < count($smokingRecords); $i++) {
                           echo $smokingRecords[$i] . ",\n";
                        }
?>
                    ],
                label: 'Cigarettes Smoked / Day',   
                borderColor: 'rgb(234, 232, 166)'
                }, 
                <?php
                           if ($profile->hospital == "Morriston") {
                              ?>
                           {
                data: [
<?php                           
                           for ($i=0; $i < count($peersmokingRecords); $i++) {
                              echo $peersmokingRecords[$i] . ",\n";
                           }
?>   
               ],
               label: 'Peer Average',
               borderColor: 'rgb(255,69,0)'
               }
           <?php
                   }
                   ?>
           
           ],
               
                labels: [
<?php
               echo "'Start' ,\n";
               for ($i=1; $i < (count($smokingRecords)+1); $i++) {
                   echo "'Week " . $i . "' ,\n";
               }
               
?>
                ]
            },
            options: chartOptions
        }
    );
});   
</script>
<script type="text/javascript" src="/js/chartjs.min.js"></script>
<script>
$(function() {
    var selector = document.getElementById('weight-chart');
    var chartOptions = {
        responsive: true,
        title: {
           text: 'Weight Optimisation',
           display: true,
        },
       scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                              min: 0,
                              max: 100,
                              stepSize: 10
                           }
                        }]
                },
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'line',
            data: {
                datasets: [{
                    data: [
<?php
                        echo $screenerWeight . ",\n";
                        for ($i=0; $i < count($weightRecords); $i++) {
                           echo $weightRecords[$i] . ",\n";
                        }
               
?>

                    ],
                    label: 'Weight (Kgs)',
                borderColor: 'rgb(48, 54, 93)',
                },
                                          <?php
                           if ($profile->hospital == "Morriston") {
                              ?>
                           {
                data: [
<?php                           
                           for ($i=0; $i < count($peerweightRecords); $i++) {
                              echo $peerweightRecords[$i] . ",\n";
                           }
?>   
               ],
               label: 'Peer Average',
               borderColor: 'rgb(255,69,0)',
               }
           <?php
                   }
                   ?>
                          ],
                labels: [
<?php
               echo "'Start' ,\n";
               for ($i=1; $i < (count($weightRecords)+1); $i++) {
                   echo "'Weigh In " . $i . "' ,\n";
               }
               
?>
                ]
<?php
            
?>
            },
            options: chartOptions
        }
    );
});   
</script>
<script type="text/javascript" src="/js/chartjs.min.js"></script>
<script>
$(function() {
    var selector = document.getElementById('exe-chart');
    var chartOptions = {
        responsive: true,
        title: {
           text: 'Regular Exercise',
           display: true,
        },
       scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                              min: 0,
                              max: 180,
                              stepSize: 15
                           }
                        }]
                },
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'line',
            data: {
                datasets: [{
                    data: [
<?php
                        echo $screenerExe . ",\n";
                        for ($i=0; $i < count($exeRecords); $i++) {
                           echo $exeRecords[$i] . ",\n";
                        }
               
?>

                    ],
                    label: 'Minutes Exercising / Day',
                   borderColor: 'rgb(149, 213, 133)',
                },
                                <?php
                           if ($profile->hospital == "Morriston") {
                              ?>
                           {
                data: [
<?php                           
                           for ($i=0; $i < count($peerexeRecords); $i++) {
                              echo $peerexeRecords[$i] . ",\n";
                           }
?>   
               ],
               label: 'Peer Average',
               borderColor: 'rgb(255,69,0)',
               }
           <?php
                   }
                   ?>
                          ],
                labels: [
<?php
               echo "'Start' ,\n";
               for ($i=1; $i < (count($exeRecords)+1); $i++) {
                   echo "'Week " . $i . "' ,\n";
               }
               
?>
                ]
<?php
            
?>
            },
            options: chartOptions
        }
    );
});   
</script>
<script type="text/javascript" src="/js/chartjs.min.js"></script>
<script>
$(function() {
    var selector = document.getElementById('eat-chart');
    var chartOptions = {
        responsive: true,
        title: {
           text: 'Eat Healthily',
           display: true,
        },
       scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                              min: 0,
                              max: 7,
                              stepSize: 1
                           }
                        }]
                },
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'line',
            data: {
                datasets: [{
                    data: [
<?php
                        echo $screenerEat . ",\n";
                        for ($i=0; $i < count($eatRecords); $i++) {
                           echo $eatRecords[$i] . ",\n";
                        }
               
?>

                    ],
                    label: 'Days Reaching 5-A-Day',
                borderColor: 'rgb(230, 160, 250)',
                },
                                                <?php
                           if ($profile->hospital == "Morriston") {
                              ?>
                           {
                data: [
<?php                           
                           for ($i=0; $i < count($peereatRecords); $i++) {
                              echo $peereatRecords[$i] . ",\n";
                           }
?>   
               ],
               label: 'Peer Average',
               borderColor: 'rgb(255,69,0)',
               }
           <?php
                   }
                   ?> 
                          ],
                labels: [
<?php
               echo "'Start' ,\n";
               for ($i=1; $i < (count($eatRecords)+1); $i++) {
                   echo "'Week " . $i . "' ,\n";
               }
               
?>
                ]
<?php
            
?>
            },
            options: chartOptions
        }
    );
});   
</script>
<script type="text/javascript" src="/js/chartjs.min.js"></script>
<script>
$(function() {
    var selector = document.getElementById('drink-chart');
    var chartOptions = {
        responsive: true,
        title: {
           text: 'Drink Responsibily ',
           display: true,
        },
       scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Week'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                              min: 0,
                              max: 25,
                              stepSize: 5
                           }
                        }]
                },
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'line',
            data: {
                datasets: [{
                    data: [
<?php
                        echo $screenerDrink . ",\n";
                        for ($i=0; $i < count($drinkRecords); $i++) {
                           echo $drinkRecords[$i] . ",\n";
                        }
               
?>

                    ],
                    label: 'Alcoholic Drinks per Week',
                   borderColor: 'rgb(174, 150, 192)',
                },
                                                <?php
                           if ($profile->hospital == "Morriston") {
                              ?>
                           {
                data: [
<?php                           
                           for ($i=0; $i < count($peerdrinkRecords); $i++) {
                              echo $peerdrinkRecords[$i] . ",\n";
                           }
?>   
               ],
               label: 'Peer Average',
               borderColor: 'rgb(255,69,0)',
               }
           <?php
                   }
                   ?>
                          ],
                labels: [
<?php
               echo "'Start' ,\n";
               for ($i=1; $i < (count($drinkRecords)+1); $i++) {
                   echo "'Week " . $i . "' ,\n";
               }
               
?>
                ]
<?php
            
?>
            },
            options: chartOptions
        }
    );
});   
</script>
