<?= $this->Form->create($profile); ?>
<div class="row">
  <div class="col-sm-3">
     <div class="row">
        <div class="col-sm-6">
           <img class="img-responsive" src="/webroot/img/trophy.jpg">
        </div>
        <div class="col-sm-6">
           <div class="row">
              <strong><?= $user->username ?></strong>
           </div>
           <div class="row">
              <?= $this->Number->format($profile->points) ?> points
           </div>
        </div>
     </div>
  </div>
  <div class="col-xs-9">
    <div class="panel panel-primary">
      <div class="panel-heading">
      Personal Details <span class="pull-right edit-button"><a href="/profile/view"> Cancel <i class="glyphicon glyphicon-trash"></i></a></span>
      </div>
      <div class="panel-body">
       <table class="table table-striped" cellpadding="0" cellspacing="0">
         <tr>
            <td><?= __('Age') ?> </td>
            <td><div class="checkbox"><?=$this->Form->input('unsubscribed',['label'=>'Yes, unsubscribe me. I know that I can resubscribe later.']) ?></div></td>
         </tr>
          <tr>
             <td><?= __('Email') ?></td>
             <td><?= $this->Form->input('email', ['class'=>'form-control','type'=>'email','label'=>false]) ?></td>
          </tr>
          <tr>
             <td><?= __('Phone Number') ?></td>
             <td><?= $this->Form->input('phone_number',['class'=>'form-control','type'=>'tel','label'=>false]) ?></td>
          </tr>
       </table>
       <?= $this->Form->button(__("Save"),['class'=>'btn btn-success pull-right']); ?>
      </div>
    </div>
  </div>
</div>
<?= $this->Form->end() ?>
