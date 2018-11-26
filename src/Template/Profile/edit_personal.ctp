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
            <td><div class="form-group">
                <label> Age Band:* </label>
                   <select name="age" class="form-control" required>
                      <option value="band1">18-25</option>
                      <option value="band2">26-35</option>
                      <option value="band3">36-45</option>
                      <option value="band4">46-55</option>
                      <option value="band5">56-65</option>
                      <option value="band6">65+</option>
                   </select>
             </div></td>
         </tr>
          <tr>
             <td><?= __('Gender') ?></td>
             <td><div class="form-group">
               <label> Gender:* </label>
                  <select name="gender" class="form-control" required>
                     <option value="Female">Female</option>
                     <option value="Male">Male</option>
                     <option value="Not Given">Prefer not to say</option>
                     <option value="Other">Other</option>
                  </select>
             </div></td>
          </tr>
          <tr>
             <td><?= __('Health Board') ?></td>
             <td><div class="form=group">
               <label> Health board and hospital location:* </label>
                <select name="hospital" class="form-control" required>
                   <option value="Singleton">Singleton Hospital</option>
                   <option value="Moriston">Moriston Hospital</option>
                   <option value="Neath Port Talbot">Neath Port Talbot Hospital</option>
                   <option value="Princess of Wales">Princess of Wales Hospital</option>
                   <option value="Garn Goch">Garn Goch Hospital</option>
                   <option value="Fairwood">Fairwood Hospital</option>
                   <option value="Hill House">Hill House</option>
                   <option value="Bon-Y-Maen">Bon-y-maen</option>
                   <option value="Phillips Parade">Phillips Parade</option>
                   <option value="Gellunudd">Gellunudd</option>
                </select>
               </div></td>
          </tr>
       </table>
       <?= $this->Form->button(__("Save"),['class'=>'btn btn-success pull-right']); ?>
      </div>
    </div>
  </div>
</div>
<?= $this->Form->end() ?>
