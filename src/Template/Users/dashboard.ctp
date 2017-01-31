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
<div class="container">
   <div class="col-sm-3 leftContent">
      <div class="row">
         <div class="col-sm-6">
            <img class="img-responsive" src="/webroot/img/trophy.jpg">
         </div>
         <div class="col-sm-6">
            <?= $user->username ?>
            <br/>
            POINTS HERE
         </div>
      </div>
      <br/>
      <?php foreach($user->recordset as $record): ?>
      <div class="box">
         <div class="icon">
            <div class="info">
               <h3 class="title"><?= $record->exercise->section->getModule()->title?></h3>
               <p>
                  <?php if($record->exercise->type == 2){ ?>
                  Submitted a weekly record!
                  <?php }else{ ?>
                  Completed an activity!
                  <?php } ?>
               </p>
            </div>
         </div>
         <div class="space"></div>
      </div>
      <?php endforeach; ?>
   </div>
   <div class="col-sm-9 rightContent">
      <?php foreach($user->module as $module): ?>
      <div class="col-sm-3">
         <div class="panel panel-default my_panel">
            <div class="panel-heading">
               <h4><?= $this->Html->link($module->title, ['controller' => 'module', 'action' => 'dashboard', $module->id], ['title' => __($module->title)]); ?></h4>
            </div>
            <div class="panel-icon">
               <img src="<?= $module->icon ?>" alt="" class="img-responsive center-block" />
            </div>
            <div class="panel-footer">
               <?= $module->description_text ?>
               <div class="btn btn-success">
                  Add Weekly Record
               </div>
            </div>
         </div>
      </div>
      <?php endforeach; ?>
   </div>
</div>
