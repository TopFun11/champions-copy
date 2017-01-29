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
          take part in:
        </p>
        <ul>
          <li>Weight optimization</li>
          <li>Five a day</li>
          <li>Alcohol reduction</li>
          <li>Smoking cessation</li>
          <li>Physical activity</li>
        </ul>
        <p>
          Half of those who register will also be given access to a new emotional wellbeing module
          which has been developed in collaboration with staff from ABMU.
          This is a 12 week module which will be released weekly. It includes activities to try out,
          video and audio resources and downloadable information. It is interactive.
          You will not know if you have access to the wellbeing module until after you complete
          the registration process. This is because staff are randomly allocated to receive it to
          avoid any bias.
        </p>
        <p>You will be asked to enter in your activity for all of the modules you select.</p>
        <p>By registering as a user on this website for you are agreeing to participate in
        this health and wellbeing programme and you are giving permission for your
        data to be evaluated by the research team at Swansea University.</p>
        <p>All data will be anonymous. We will not know who has entered the data.</p>
        <p>
          You will be free to withdraw at any time without consequence. However your data will
          remain in the study.
        </p>
      </div>
      <div class="text-center">
        <label>I give my consent <input id="consent_check" type="checkbox" name="consent" />
      </div>
    </div>
  </div>
</div>

<div style="display:none;" id="reg">

  <form class="form-horizontal" role="form">
  </form> <!-- /form -->




      <div class="container">
        <div class="row">
          <div class="container">
              <form class="form-horizontal" role="form">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                  <h2>Registration Form</h2>
                  <div class="form-group">
                      <label for="userName" class="col-sm-3 control-label">User Name</label>
                      <div class="col-sm-9">
                          <?= $this->Form->input('username',['label' => false, 'class' => 'form-control','placeholder'=>"Username", 'required'=>true,'autofocus'=>true]) ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                          <input type="email" id="email" placeholder="Email" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-9">
                          <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control','placeholder'=>'Password','required'=>true]) ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password2" class="col-sm-3 control-label">Confirm Password</label>
                      <div class="col-sm-9">
                          <input type="password" id="password2" placeholder="Password" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-9">
                      <?php     echo $this->Form->input('role', [
                              'options' => ['admin' => 'Admin', 'student' => 'Student'], 'class'=>'form-control'
                            ]);?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mobileNumber" class="col-sm-3 control-label">Mobile Number</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Mobile Number" class="form-control" autofocus>
                    </div>
                  </div>


                  <div class="form-group">
                      <label for="health-board" class="col-sm-3 control-label">Health Board and hospital location: </label>
                      <div class="col-sm-9">
                          <select id="health-board" class="form-control">
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
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-3">Age Band</label>
                      <div class="col-sm-6">
                          <div class="row">
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="femaleRadio" value="band1">18-25
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="maleRadio" value="band2">26-35
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="uncknownRadio" value="band3">36-45
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="uncknownRadio" value="band4">46-55
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="uncknownRadio" value="band5">56-65
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="uncknownRadio" value="band6">65+
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Gender</label>
                      <div class="col-sm-6">
                          <div class="row">
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="femaleRadio" value="Female">Female
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="maleRadio" value="Male">Male
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="uncknownRadio" value="Unknown">Other
                                  </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="radio-inline">
                                      <input type="radio" id="uncknownRadio" value="Unknown">Prefer not to say
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-9 col-sm-offset-3">
                          <?= $this->Form->button(__('Register'), ['class' => 'btn btn-success btn-lg']); ?>
                      </div>
                  </div>
              </form> <!-- /form -->
          </div> <!-- ./container -->

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
