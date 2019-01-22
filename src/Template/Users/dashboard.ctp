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

<?php $noise = rand(-5, 5);
      $userPerform = 30;
      $peerPerform = max(0, ($userPerform + 10 + $noise));
      if ($peerPerform > 100) {
         $peerPerform = 100;
      }
?>

<?php $screenerSmoke = 0;
      foreach($recordset as $recordset) if ($recordset->screener_id == 3) {
         foreach($record as $record) if (($record->recordset_id = $recordset->id) and ($record->question_id == 10)) {
            $screenerSmoke = $record->answer;
         }
      }
?>

<?php $smokingRecords = []; $smokeSum = 0;
      foreach($recordset2 as $recordset2) if ($recordset2->exercise_id == 5) {
         echo $recordset2->id . "\n";
         $i = 0;
         if ($i < 7) {
            foreach($record2 as $record2) if ($record2->recordset_id == $recordset2->id) {
               echo $record2->answer . "\n";
               $smokeSum += $record2->answer;
               echo $smokeSum . "\n";
            }
         } else {
            break;
         }
         array_push($smokingRecords, ($smokeSum/7));
         $smokeSum = $smokeSum;
      }
print_r($smokingRecords);
echo count($smokingRecords);
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
           <h2>Other users have achieved general behavioral improvement of <?= ($peerPerform) ?>% this week.</h2>
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
                   <div class="row">
                      <div class="col-md-2 value"><?=$screenerSmoke?></div>
                      <div class="col-md-10 align-middle">Number of Times Logged On</div>
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
                <p><?= $this->Html->link("Unenroll", ['controller' => 'module', 'action' => 'unenroll', $module->id], ['title' => __("Unenroll")]); ?></p>
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
        responsive: true
    };
    var dashboardChart = new Chart(
        selector,
        {
            type: 'line',
            data: {
<?php
            if(0 == count($engagement)) {
?>
                datasets: [{
                    data: [
                        0
                    ],
                    backgroundColor: [
                        '#DDD'
                    ],
                    label: 'No engagement'
                }],
                labels: [
                    'No engagement'
                ]
<?php
            } else {
?>
                datasets: [{
                    data: [
<?php
                        echo $screenerSmoke . ",\n";
                        for ($i=0; $i < count($smokingRecords); $i++) {
                           echo $smokingRecords[$i] . ",\n";
                        }
               
?>

                    ],
                    label: 'Cigarettes Smoked / Day'
                }],
                labels: [
<?php
               echo "'Start' ,\n";
               for ($i=1; $i < (count($smokingRecords)+1); $i++) {
                   echo "'Week " . $i . "' ,\n";
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
