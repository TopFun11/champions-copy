<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user); ?>
<div class="row">
  <div class="col-xs-12">
<div id="consent">
<div class="panel panel-default">
<h1>Thank you for joining us!</h1>
<p>
Before you start your journey please read the following information carefully.
Champions for Health, is a web-based, health promotion campaign developed by
Public Health Wales (PHW) and staff at Swansea University Medical School.
This website contains information and resources which have been specifically developed
to help staff improve their own health and wellbeing. It is designed to be used as a self-
help resource. This website is not supported by a therapist.
Champions for health will be available free of charge for a period of 12 weeks.
If you decide to register to take part you will be able to choose two health challenges to
take part in:</p>
<ul>
  <li>Weight optimization</li>
  <li>Five a day</li>
  <li>Alcohol reduction</li>
  <li>Smoking cessation</li>
  <li>Physical activity</li>
</ul>
<p>Half of those who register will also be given access to a new emotional wellbeing module
which has been developed in collaboration with staff from ABMU.
This is a 12 week module which will be released weekly. It includes activities to try out,
video and audio resources and downloadable information. It is interactive.
You will not know if you have access to the wellbeing module until after you complete
the registration process. This is because staff are randomly allocated to receive it to
avoid any bias.</p>
<p>You will be asked to enter in your activity for all of the modules you select.</p>
<p>By registering as a user on this website for you are agreeing to participate in
this health and wellbeing programme and you are giving permission for your
data to be evaluated by the research team at Swansea University.</p>
<p>All data will be anonymous. We will not know who has entered the data.</p>
<p>You will be free to withdraw at any time without consequence. However your data will
remain in the study.</p>
</div>
<div class="text-center">
<label>I give my consent <input id="consent_check" type="checkbox" name="consent" />
</div>
</div></div></div>

<div style="display:none;" id="reg">
<div class="user-form">
    <div class="row">
        <div class="col-sm-12 login-form">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <h2 class="form-signin-heading">Begin your journey</h2>
                <label for="inputEmail" class="sr-only">Username</label>
                <?= $this->Form->input('username',['label' => false, 'class' => 'form-control','placeholder'=>"Username", 'required'=>true,'autofocus'=>true]) ?>
                <label for="inputPassword" class="sr-only">Password</label>
                <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control','placeholder'=>'Password','required'=>true]) ?>
                <?php     echo $this->Form->input('role', [
                      'options' => ['admin' => 'Admin', 'student' => 'Student'], 'class'=>'form-control'
                    ]);?>
                <br/>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-right">
        <?= $this->Form->button(__('Register'), ['class' => 'btn btn-success btn-lg']); ?>
      </div>
    </div>
</div>

</div>
<?= $this->Form->end() ?>

<script type="text/javascript">
$(document).ready(function(){
  console.log("Yo");
  $("#consent_check").click(function(){
    console.log("Yoyo");
    $("#consent").hide();
    $("#reg").show();
  });
});

</script>
