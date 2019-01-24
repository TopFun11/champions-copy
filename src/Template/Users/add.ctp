<?php $this->start('tb_actions'); ?>
<li>
    <?=$this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<?php $this->end(); $this->start('tb_sidebar'); ?>
<ul class="nav nav-sidebar">
    <li>
        <?=$this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
</ul>
<?php $this->end(); ?>
<?=$this->Form->create($user, ['class' => 'form-horizontal']) ?>
    <div class="row">
        <div class="col-xs-12">
            <div id="consent">
                <div class="panel panel-default">
                    <h1>Thank you for joining us!</h1>
		    <img src="../../../webroot/img/hospitalstaff.png" alt="Hospital staff" height="200">
		    <p>Before you start your journey please read the following information carefully. </p>
		    <h2>What is Champions for Health?</h2>
	 	    <p>Champions for Health, is a web-based, health promotion programme developed by Public Health Wales and researchers at Swansea University Medical School. This website contains information and resources which have been specifically developed to help staff improve their own health and wellbeing.</p>
			<h2>Choose from 5 Health Challenges:</h2>
			<ul>
                        <li>Get Active</li>
                        <li>Five-A-Day Fruit and Veg</li>
                        <li>Weight Optimisation</li>
                        <li>Alcohol Reduction</li>
                        <li>Quit Smoking</li>
                    </ul>
			<h2>What is NEW?</h2>
			<p><b>A 12 week emotional wellbeing plan</b> has been added to the website to help you BOOST your wellbeing alongside your physical health. This plan has been designed with experts in the field and in collaboration with ABMU staff to ensure it is reflective of staff need. It is designed to be used as a self- help resource. This website is not supported by a therapist.</p>
			<h2>If you take part:</h2>
			<p>When you register you will be automatically randomised to one of four conditions. One of the four groups will only have access to the 5 physical health challenges. The other three groups will have access to the 5 physical health challenges PLUS the new emotional wellbeing resources. You will not know what group you are randomised to until after you register. The researchers will not know what group you are registered to. The purpose of this is to allow evaluation of the new emotional wellbeing resource. You will be asked to enter in your activity for all of the modules you select this is how you can track your progress, earn points and health trophies!</p>
			<p>By registering as a user on this website for you are agreeing to participate in this health and wellbeing programme and you are giving permission for your data to be evaluated by the research team at Swansea University.</p>
			<p>All data will be anonymous. We will not know who has entered the data.</p>
			<p>You will be free to withdraw at any time without consequence. However your data will remain in the study.</p>
                </div>
                <div class="text-center">
                    <label>I give my consent
                        <input id="consent_check" type="checkbox" name="consent" />
                </div>
            </div>
        </div>
    </div>

    <div style="display:none;" id="reg">

        <div class="container">
            <div class="row">
                <div class="container">

                    <?=$this->Flash->render('auth') ?>

                        <h2>Registration Form</h2>
                        <p class="lead">Registration is currently only open to staff at ABMU health board.  To take part you must use a valid @wales.nhs.uk email address</p>
                        <div class="form-group">
                            <label for="userName" class="col-sm-3 control-label">User Name</label>
                            <div class="col-sm-9">
                                <?=$this->Form->input('username',['label' => false, 'class' => 'form-control','placeholder'=>"Username", 'required'=>true,'autofocus'=>true]) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Desired Password</label>
                            <div class="col-sm-9">
                                <?=$this->Form->input('password', ['label' => false, 'class' => 'form-control','placeholder'=>'Password','required'=>true]) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('role', [ 'options' => $options, 'class'=>'form-control' ]);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <?=$this->Form->button(__('Register'), ['class' => 'btn btn-success btn-lg']); ?>
                            </div>
                        </div>
                </div>
                <!-- ./container -->

            </div>
        </div>
      </div>




        <?=$this->Form->end() ?>

            <script type="text/javascript">
                $(document).ready(function() {
                    console.log("Yo");
                    $("#consent_check").click(function() {
                        console.log("Yoyo");
                        $("#consent").hide();
                        $("#reg").show();
                    });
                    if($("#password").length != 0) {
                      $("#password").pwstrength();
                    }
                });
            </script>
