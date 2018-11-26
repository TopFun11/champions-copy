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
   <?= $profile->wemwbs_score = $profile->wembs_optimism + $profile->wembs_useful + $profile->wembs_relaxed + $profile->wembs_relaxed + $profile->interested_in_people + $profile->wembs_spare_energy + $profile->wembs_dealing_with_problems_well + $profile->wembs_thinking_clearly + $profile->wembs_good_about_self + $profile->wembs_close_to_others + $profile->wembs_feeling_confident + $profile->wembs_make_mind_up + $profile->wembs_loved + $profile->wembs_interested_in_new_things + $profile->wembs_cheerful; ?>
   <div class="col-sm-9">
     <div class="panel panel-primary">
       <div class="panel-heading">
         Personal Information <span class="pull-right edit-button"><a href="/profile/editPersonal"> Edit <i class="glyphicon glyphicon-pencil"></i></a></span>
       </div>
       <div class="panel-body">
         <table class="table table-striped" cellpadding="0" cellspacing="0">
            <tr>
               <td><?= __('Age') ?></td>
               <td>
               <?php
               switch ($profile->age) {
                 case "band1":
                  echo "18-25";
                  break;
                case "band2":
                  echo "26-35";
                  break;
                case "band3":
                  echo "36-45";
                  break;
                case "band4":
                  echo "46-55";
                  break;
                case "band5":
                  echo "56-65";
                  break;
                case "band6":
                  echo "65+";
                  break;
                default:
                  echo "Unspecified";
                  break;
               }
               ?>
               </td>
            </tr>
            <tr>
               <td><?= __('Gender') ?></td>
               <td><?= h($profile->gender) ?></td>
            </tr>
            <tr>
               <td><?= __('Health Board') ?></td>
               <td><?= h($profile->hospital) ?></td>
            </tr>
         </table>
       </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading">
           Contact Details <span class="pull-right edit-button"><a href="/profile/edit"> Edit <i class="glyphicon glyphicon-pencil"></i></a></span>
         </div>
         <div class="panel-body">
           <table class="table table-striped" cellpadding="0" cellspacing="0">
             <tr>
                <td><?= __('Subscribed to emails/text messages') ?></td>
                <td><?php if($profile->unsubscribed){echo "No";}else {echo "Yes";} ?></td>
             </tr>
              <tr>
                 <td><?= __('Email') ?></td>
                 <td><?= h($profile->email) ?></td>
              </tr>
              <tr>
                 <td><?= __('Phone Number') ?></td>
                 <td><?= h($profile->phone_number) ?></td>
              </tr>
           </table>
         </div>
        </div>
        <div class="panel panel-primary">
         <div class="panel-heading">
           Scores
         </div>
         <div class="panel-body">
           <table class="table table-striped" cellpadding="0" cellspacing="0">
             <tr>
                <td><?= __('Warwick-Edinburgh Mental Wellbeing Scale') ?></td>
                <td><?= h($profile->wemwbs_score) ?></td>
             </tr>
           </table>
         </div>
        </div>
      <div class="row user-profile-buttons">
        <a href="/users/dashboard"><div class="btn btn-success">
            My Dashboard
        </div></a>

      </div>
   </div>
</div>
