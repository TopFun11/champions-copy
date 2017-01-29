<!-- File: src/Template/Users/login.ctp -->

    <div class="user-form">
        <div class="row">
            <div class="col-sm-12 login-form">
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create() ?>
                    <h2 class="form-signin-heading">Sign in</h2>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <?= $this->Form->input('username', ['label' => false, 'class' => 'form-control','placeholder'=>"Email Address", 'required'=>true,'autofocus'=>true]) ?>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control','placeholder'=>'Password','required'=>true]) ?>
                    <a href=""> Forgot Password </a>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 text-right">
            <?= $this->Form->button(__('Log in'), ['class' => 'btn btn-success btn-lg']); ?>
          </div>
        </div>
    </div>
<?= $this->Form->end() ?>
