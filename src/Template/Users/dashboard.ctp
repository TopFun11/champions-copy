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
<div class="container user-dashboard">
    <div class="row greeting">
        <div class="col-md-12">
            <h1>Good <?=(date('H')<12?'Morning':date('H')<18?'Afternoon':'Evening')?>, <?=ucwords($user->username)?>.</h1>
        </div>
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
    <div class="row trophies">
        <div class="col-md-12">
            <h2>Trophies</h2>
            <div class="row">
                <div class="col-md-12">
                    <img class="trophy-icon" src="/img/trophy.jpg">
                    <p>You may earn trophies through continued engagement with your modules, and they will appear in the trophy cabinet on your public profile.</p>
                    <p>You haven't earned any trophies yet, why not engage with <a href="/pages/home" title="Home Page">a module</a>?</p>
                </div>
           </div>
        </div>
    </div>
   <div class="row">
                  <div class="progress">
                     <?php $bronzeValue = 200; $currentProgress = ($profile->points/$bronzeValue) * 100; ?>
                     <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="200" style="width: <?= $currentProgress ?>%">
                           <?php $profile->points . "/" . $bronzeValue ?>
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
