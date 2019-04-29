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
               <?= $this->Number->format($profile->points) ?> Points
            </div>
         </div>
      </div>
   </div>
   <?php $profile->wemwbs_score = $profile->wembs_optimism + $profile->wembs_useful + $profile->wembs_relaxed + $profile->wembs_relaxed + $profile->interested_in_people + $profile->wembs_spare_energy + $profile->wembs_dealing_with_problems_well + $profile->wembs_thinking_clearly + $profile->wembs_good_about_self + $profile->wembs_close_to_others + $profile->wembs_feeling_confident + $profile->wembs_make_mind_up + $profile->wembs_loved + $profile->wembs_interested_in_new_things + $profile->wembs_cheerful; ?>
   <?php $profile->phq4_score = $profile->phq_anxious + $profile->phq_worrying + $profile->phq_interest_please + $profile->phq_depressed; ?>
   <?php $profile->phq4_anxiety = NULL;
   if (($profile->phq_anxious + $profile->phq_worrying >= 2) and ($profile->phq_anxious + $profile->phq_worrying <= 4)) {
      $profile->phq_anxiety = "Slight cause for concern (we suggest you try the ACT wellbeing module)";
   } else if ($profile->phq_anxious + $profile->phq_worrying > 4) {
      $profile->phq_anxiety = "Cause for concern (we suggest you contact your GP as well as using this wellbeing module)";
   } else {
      $profile->phq_anxiety = "No Cause for Concern";
   }
   ?>
   <?php $profile->phq_depression = NULL;
   if (($profile->phq_interest_please + $profile->phq_depressed >= 2) and ($profile->phq_interest_please + $profile->phq_depressed <= 4)) {
      $profile->phq_depression = "Slight cause for concern (we suggest you try the ACT wellbeing module)";
   } else if ($profile->phq_interest_please + $profile->phq_depressed > 4) {
      $profile->phq_depression = "Cause for concern (we suggest you contact your GP as well as using this wellbeing module)";
   } else {
      $profile->phq_depression = "No Cause for Concern";
   }
   ?>
   <div class="col-sm-9">
     <div class="panel panel-primary">
       <div class="panel-heading">
         Personal Information <span class="pull-right edit-button"><a href="/profile/editPersonal"> Edit <i class="glyphicon glyphicon-pencil"></i></a></span>
       </div>
       <div class="panel-body">
          <?php echo ($profile->motiv) ?>
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
           Questionnaire Results & Feedback
         </div>
         <div class="panel-body">
           <table class="table table-striped" cellpadding="0" cellspacing="0">
             <tr>
                <td><?= __('WEMWBS') ?></td>
                <td><?= h($profile->wemwbs_score) ?></td>
             </tr>
             <tr>
                <td><?=__('WEMWBS Male National Average (2016)  - 50.1') ?></td>
                <td><?=__('WEMWBS Female National Average (2016) - 49.6') ?></td>
             <tr>
                <td><?= __('PHQ-4') ?></td>
                <td><?= h($profile->phq4_score) ?></td>
              </tr>
              <tr>
                 <td><?= __('Anxiety:') ?></td>
                 <td><?= h($profile->phq_anxiety) ?></td>
              </tr>
              <tr>
                 <td><?= __('Depression:') ?></td>
                 <td><?= h($profile->phq_depression) ?></td>
              </tr> 
              <?php if($profile->hospital != 'Neath Port Talbot') { ?>
              <?php $postsum = 0; ?>
              <?php $presum = 0; ?>
              <tr>
                 <td><?= __('AAQ-II (Week 1):') ?></td>
                 <?php foreach($recordset as $wk1recordset) if ($recordset->exercise_id == '49'){ ?>
                     <?php foreach($record as $wk1record) if ($record->recordset_id == $wk1recordset->id){ ?>
                        <?php $presum += ($record->answer); ?>
                     <?php } ?>
                 <?php } ?>
                 <?php if($presum == 0) { ?>
                 <td><?= h("Please complete the AAQ-II Questionnaire in the ACT Wellbeing Module"); ?></td></tr>
                 <?php } else { ?>
                 <td><?= h($presum) ?></td></tr>
                 <tr><td><?= __('A Higher AAQ-II score indicates greater levels of psychological inflexibility.') ?></td></tr>
                 <?php } ?>
              <tr>
                 <td><?= __('AAQ-II (Week 12):') ?></td>
                 <?php foreach($recordset2 as $recordset2) if ($recordset2->exercise_id == '51') { ?>
                     <?php foreach($record2 as $record2) if ($record2->recordset_id == $recordset2->id) { ?>
                        <?php $postsum += ($record2->answer); ?>
                     <?php }  ?>
                 <?php } ?>
                 <?php if($postsum == 0) { ?>
                 <td><?= h("Please complete the AAQ-II Questionnaire in the ACT Wellbeing Module"); ?></td></tr>
                 <?php } else { ?>
                 <td><?= h($postsum) ?></td></tr>
                 <tr><td><?= __('Compare with your initial score to see the effects of the ACT intervention.') ?></td></tr>
                 <?php } ?>
              <?php } ?>
           </table>
         </div>
        </div>
      <div class="row user-profile-buttons">
        <a href="/users/dashboard"><div class="btn btn-success">
            My Dashboard
        </div></a>
         <br>
      </div>
   </div>
</div>
