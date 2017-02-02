<?php
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($profile); ?>
<div class="row">
  <div class="col-xs-12">
    <h1>Add your phone number and email address</h1>
    <p class="lead">We will only use these to send occasional reminders and helpful information to you.</p>
    <?= $this->Form->create($profile); ?>
    <fieldset>
        <?php
        echo $this->Form->input('email',['class'=>'form-control','type'=>'email','placeholder'=>'joebloggs@email.com']);
        echo $this->Form->input('phone_number',['class'=>'form-control','type'=>'tel','placeholder'=>'Telephone number']);
        ?>
        <label> Health board and hospital location:
        <select name="hospital" class="form-control">
          <option value="singleton">Singleton Hospital</option>
          <option value="moriston">Moriston Hospital</option>
          <option value="neath port talbot">Neath Port Talbot Hospital</option>
          <option value="princess of wales">Princess of Wales Hospital</option>
          <option value="garn goch">Garn Goch Hospital</option>
          <option value="fairwood">Fairwood Hospital</option>
          <option value="hill house">Hill House</option>
          <option value="bon-y-maen">Bon-y-maen</option>
          <option value="phillips parade">Phillips Parade</option>
          <option value="gellunudd">Gellunudd</option>
          <option value="other">Other, Please specify</option>
        </select>
      </label>

        <div class="form-group">
            <label class="control-label col-sm-3">Age Band</label>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="age" name="age" value="band1">18-25
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="age" name="age" value="band2">26-35
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="age" name="age" value="band3">36-45
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="age" name="age" value="band4">46-55
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="age" name="age" value="band5">56-65
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="age" name="age" value="band6">65+
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Gender</label>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female">Female
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male">Male
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="other">Other
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="Unknown">Prefer not to say
                        </label>
                    </div>
                </div>
            </div>
        </div>



    </fieldset>
  </div>
  <div class="col-sm-12 text-center">
    <br/>
    <?= $this->Form->button(__('Finish registration'), ['class' => 'btn btn-success btn-lg']); ?>
  </div>
</div>
<?= $this->Form->end() ?>
