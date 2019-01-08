<?= $this->Form->create($profile, ['id' => 'profile-add']); ?>
<div class="container">
  <div class="col-md-10">
      <h1>Registration Form</h1>
      <h5>As part of the evaluation of this website, we would like to ask some brief questions about you, your general health and wellbeing, and your work.  This is to help us understand more about who has used the website and whether using the website has an effect on health and wellbeing. Your answers will be completely confidential.
      </h5>
   </div>
</div>
<!-- Personal Information -->
<div class="container">
  <div class="col-md-10">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">Personal Information</div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-body">
          <?php
             echo $this->Form->input('email', ['class'=>'form-control','type'=>'email','placeholder'=>'joebloggs@email.com','label'=>'Email*']);
             echo $this->Form->input('phone_number', ['class'=>'form-control','type'=>'tel','placeholder'=>'Telephone number', 'required' => false, 'label'=>'Phone number (Optional)']);
             ?>
             <label> Health board and hospital location:* </label>
                <select name="hospital" class="form-control" required>
                   <option value="Singleton">Singleton Hospital</option>
                   <option value="Moriston">Moriston Hospital</option>
                   <option value="Neath Port Talbot">Neath Port Talbot Hospital</option>
                   <option value="Princess of Wales">Princess of Wales Hospital</option>
                </select>


             <div class="form-group">
                <label> Age Band:* </label>
                   <select name="age" class="form-control" required>
                      <option value="band1">18-25</option>
                      <option value="band2">26-35</option>
                      <option value="band3">36-45</option>
                      <option value="band4">46-55</option>
                      <option value="band5">56-65</option>
                      <option value="band6">65+</option>
                   </select>
             </div>

             <div class="form-group">
               <label> Gender:* </label>
                  <select name="gender" class="form-control" required>
                     <option value="Female">Female</option>
                     <option value="Male">Male</option>
                     <option value="Not Given">Prefer not to say</option>
                     <option value="Other">Other</option>
                  </select>
             </div>
             <?php echo $this->Form->input('motiv', ['class'=>'form-control','type'=>'text','placeholder'=>'Motivational Message', 'required' => false, 'label'=>'Motivational Message (Optional)']); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Professsional Information -->
<div class="container">
  <div class="col-md-10">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">Professional Information</div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-body">

            <div class="form-group">
              <label>In general would you say your health is:* </label><br/>
              <label class="radio-inline"><input type="radio" name="general_health" value="excellent" required>Excellent</label>
              <label class="radio-inline"><input type="radio" name="general_health" value="vgood">Very Good</label>
              <label class="radio-inline"><input type="radio" name="general_health" value="good">Good</label>
              <label class="radio-inline"><input type="radio" name="general_health" value="fair">Fair</label>
              <label class="radio-inline"><input type="radio" name="general_health" value="poor">Poor</label>
            </div>

            <div class="form-group">
              <label>Do (did) you supervise any other employees?*</label><br/>
              <label class="radio-inline"><input type="radio" name="supervises" value="yes" required>Yes</label>
              <label class="radio-inline"><input type="radio" name="supervises" value="no">No</label>
            </div>

            <div class="form-group">
              <label>Occupation:* </label><br/>
              <input type="radio" name="occupation" value="excellent" required>Professional Occupation
              <br/><div class="radio-extra">Teacher, nurse, physiotherapist, social worker, welfare officer, software designer, accountant, solicitor, medical practitioner, scientist<br/></div>
              <input type="radio" name="occupation" value="excellent">Clerical and intermediate occupations
              <br/><div class="radio-extra">Secretary, personal assistant, clerical worker, office clerk, call centre agent, nursing auxiliary, nursery nurse<br/></div>
              <input type="radio" name="occupation" value="excellent">Senior managers or administrators
              <br/><div class="radio-extra">Finance manager, chief executive<br/></div>
              <input type="radio" name="occupation" value="excellent">Middle or junior managers
              <br/><div class="radio-extra">Office manager, retail manager, bank manager, restaurant manager, warehouse manager<br/></div>
              <input type="radio" name="occupation" value="excellent">Technical and craft occupations
              <br/><div class="radio-extra">Inspector, plumber, printer, electrician, gardener, tool maker<br/></div>
              <input type="radio" name="occupation" value="excellent">Routine manual and service occupations
              <br/><div class="radio-extra">Postal worker, security guard, caretaker, catering assistant, receptionist, sales assistant, HGV/van driver, cleaner, porter, messenger<br/></div>
          </div>

          <div class="form-group">
            <label>In the last 6 months, how many days were you off work for health reasons?*</label>
            <input type="number" class="form-control" name="days_off_work" placeholder="Number of sick days" required>
          </div>

          <div class="form-group">
            <label>In the last 6 months, how many spells of sickness absence lasting a week or more have you experienced?*</label>
            <input type="number" class="form-control" name="absences_lasting_a_week" placeholder="Number of spell sickness" required>
          </div>

          <div class="form-group">
            <label>Generally, over the past 30 days, how would you rate your performance at work?*</label>
            <table class="work-performance table table-striped">
              <thead><tr class="work-performance-header">
                <th>0</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
              </tr></thead>
              <tbody><tr>
                <td><input type="radio" name="work_performance" value="0" required></td>
                <td><input type="radio" name="work_performance" value="1"></td>
                <td><input type="radio" name="work_performance" value="2"></td>
                <td><input type="radio" name="work_performance" value="3"></td>
                <td><input type="radio" name="work_performance" value="4"></td>
                <td><input type="radio" name="work_performance" value="5"></td>
                <td><input type="radio" name="work_performance" value="6"></td>
                <td><input type="radio" name="work_performance" value="7"></td>
                <td><input type="radio" name="work_performance" value="8"></td>
                <td><input type="radio" name="work_performance" value="9"></td>
                <td><input type="radio" name="work_performance" value="10"></td>
              </tr></tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- WEMWBS Information -->

<div class="container">
  <div class="col-md-10">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">Warwick-Edinburgh Mental Well-being Scale*</div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-body">
          <div class="well">
            <p>The <strong>Warwick-Edinburgh Mental Well-being scale (WEMWBS)</strong> includes 14 self-report statements about participant’s thoughts and feelings, over the past two weeks.
            </p>
            <p>"The Warwick- Edinburgh Mental Well-being Scale was funded by the Scottish Executive National Programme for improving mental health and well-being, commissioned by NHS Health Scotland, developed by the University of Warwick and the University of Edinburgh, and is jointly owned by NHS Health Scotland, the University of Warwick and the University of Edinburgh." Copyright statement.
            </p>
          </div>

          <div class="form-group">
            <table class="wemwbs-table table table-striped">
              <th></th>
              <th>None of the time</th>
              <th>Rarely</th>
              <th>Some of the time</th>
              <th>Often</th>
              <th>All of the time</th>
              <tr>
                <td>I've been feeling optimistic about the Future</td>
                <td><input type="radio" name="wembs_optimism" value="1" required></td>
                <td><input type="radio" name="wembs_optimism" value="2"></td>
                <td><input type="radio" name="wembs_optimism" value="3"></td>
                <td><input type="radio" name="wembs_optimism" value="4"></td>
                <td><input type="radio" name="wembs_optimism" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling useful</td>
                <td><input type="radio" name="wembs_useful" value="1" required></td>
                <td><input type="radio" name="wembs_useful" value="2"></td>
                <td><input type="radio" name="wembs_useful" value="3"></td>
                <td><input type="radio" name="wembs_useful" value="4"></td>
                <td><input type="radio" name="wembs_useful" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling relaxed</td>
                <td><input type="radio" name="wembs_relaxed" value="1" required></td>
                <td><input type="radio" name="wembs_relaxed" value="2"></td>
                <td><input type="radio" name="wembs_relaxed" value="3"></td>
                <td><input type="radio" name="wembs_relaxed" value="4"></td>
                <td><input type="radio" name="wembs_relaxed" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling interested in other people</td>
                <td><input type="radio" name="wembs_interested_in_people" value="1" required></td>
                <td><input type="radio" name="wembs_interested_in_people" value="2"></td>
                <td><input type="radio" name="wembs_interested_in_people" value="3"></td>
                <td><input type="radio" name="wembs_interested_in_people" value="4"></td>
                <td><input type="radio" name="wembs_interested_in_people" value="5"></td>
              </tr>
              <tr>
                <td>I've had energy to spare</td>
                <td><input type="radio" name="wembs_spare_energy" value="1" required></td>
                <td><input type="radio" name="wembs_spare_energy" value="2"></td>
                <td><input type="radio" name="wembs_spare_energy" value="3"></td>
                <td><input type="radio" name="wembs_spare_energy" value="4"></td>
                <td><input type="radio" name="wembs_spare_energy" value="5"></td>
              </tr>
              <tr>
                <td>I've been dealing with problems well</td>
                <td><input type="radio" name="wembs_dealing_with_problems_well" value="1" required></td>
                <td><input type="radio" name="wembs_dealing_with_problems_well" value="2"></td>
                <td><input type="radio" name="wembs_dealing_with_problems_well" value="3"></td>
                <td><input type="radio" name="wembs_dealing_with_problems_well" value="4"></td>
                <td><input type="radio" name="wembs_dealing_with_problems_well" value="5"></td>
              </tr>
              <tr>
                <td>I've been thinking clearly</td>
                <td><input type="radio" name="wembs_thinking_clearly" value="1" required></td>
                <td><input type="radio" name="wembs_thinking_clearly" value="2"></td>
                <td><input type="radio" name="wembs_thinking_clearly" value="3"></td>
                <td><input type="radio" name="wembs_thinking_clearly" value="4"></td>
                <td><input type="radio" name="wembs_thinking_clearly" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling good about myself</td>
                <td><input type="radio" name="wembs_good_about_self" value="1" required></td>
                <td><input type="radio" name="wembs_good_about_self" value="2"></td>
                <td><input type="radio" name="wembs_good_about_self" value="3"></td>
                <td><input type="radio" name="wembs_good_about_self" value="4"></td>
                <td><input type="radio" name="wembs_good_about_self" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling close to other people</td>
                <td><input type="radio" name="wembs_close_to_others" value="1" required></td>
                <td><input type="radio" name="wembs_close_to_others" value="2"></td>
                <td><input type="radio" name="wembs_close_to_others" value="3"></td>
                <td><input type="radio" name="wembs_close_to_others" value="4"></td>
                <td><input type="radio" name="wembs_close_to_others" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling confident</td>
                <td><input type="radio" name="wembs_feeling_confident" value="1" required></td>
                <td><input type="radio" name="wembs_feeling_confident" value="2"></td>
                <td><input type="radio" name="wembs_feeling_confident" value="3"></td>
                <td><input type="radio" name="wembs_feeling_confident" value="4"></td>
                <td><input type="radio" name="wembs_feeling_confident" value="5"></td>
              </tr>
              <tr>
                <td>I've been able to make up my own mind about things</td>
                <td><input type="radio" name="wembs_make_mind_up" value="1" required></td>
                <td><input type="radio" name="wembs_make_mind_up" value="2"></td>
                <td><input type="radio" name="wembs_make_mind_up" value="3"></td>
                <td><input type="radio" name="wembs_make_mind_up" value="4"></td>
                <td><input type="radio" name="wembs_make_mind_up" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling loved</td>
                <td><input type="radio" name="wembs_loved" value="1" required></td>
                <td><input type="radio" name="wembs_loved" value="2"></td>
                <td><input type="radio" name="wembs_loved" value="3"></td>
                <td><input type="radio" name="wembs_loved" value="4"></td>
                <td><input type="radio" name="wembs_loved" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling interested in new things</td>
                <td><input type="radio" name="wembs_interested_in_new_things" value="1" required></td>
                <td><input type="radio" name="wembs_interested_in_new_things" value="2"></td>
                <td><input type="radio" name="wembs_interested_in_new_things" value="3"></td>
                <td><input type="radio" name="wembs_interested_in_new_things" value="4"></td>
                <td><input type="radio" name="wembs_interested_in_new_things" value="5"></td>
              </tr>
              <tr>
                <td>I've been feeling cheerful</td>
                <td><input type="radio" name="wembs_cheerful" value="1" required></td>
                <td><input type="radio" name="wembs_cheerful" value="2"></td>
                <td><input type="radio" name="wembs_cheerful" value="3"></td>
                <td><input type="radio" name="wembs_cheerful" value="4"></td>
                <td><input type="radio" name="wembs_cheerful" value="5"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PHQ-4 -->
<div class="container">
  <div class="col-md-10">
    <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">Patient Health Questionnaire for Depression and Anxiety</div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-body">
          <div class="well">
            <p>The <strong>Patient Health Questionnaire for Depression and Anxiety (PHQ-4)</strong> is a screener for depression and anxiety it is not a diagnostic tool. Total score is determined by adding together the scores for each of the 4 items.
            </p>
          </div>

          <div class="form-group">
            <label>Over the <u>last 2 weeks</u> how often have you been bothered by the following problems?*</label>
            <table class="work-performance table table-striped">
              <thead><tr class="work-performance-header">
              <th></th>
              <th>Not at all</th>
              <th>Several days</th>
              <th>More than half the days</th>
              <th>Nearly every day</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>Feeling nervous, anxious or on edge</td>
                <td><input type="radio" name="phq_anxious" value="0" required></td>
                <td><input type="radio" name="phq_anxious" value="1"></td>
                <td><input type="radio" name="phq_anxious" value="2"></td>
                <td><input type="radio" name="phq_anxious" value="3"></td>
              </tr>
              <tr>
                <td>Not being able to stop or control worrying</td>
                <td><input type="radio" name="phq_worrying" value="0" required></td>
                <td><input type="radio" name="phq_worrying" value="1"></td>
                <td><input type="radio" name="phq_worrying" value="2"></td>
                <td><input type="radio" name="phq_worrying" value="3"></td>
              </tr>
              <tr>
                <td>Little interest or pleasure in doing things</td>
                <td><input type="radio" name="phq_interest_please" value="0" required></td>
                <td><input type="radio" name="phq_interest_please" value="1"></td>
                <td><input type="radio" name="phq_interest_please" value="2"></td>
                <td><input type="radio" name="phq_interest_please" value="3"></td>
              </tr>
              <tr>
                <td>Feeling down, depressed or hopeless</td>
                <td><input type="radio" name="phq_depressed" value="0" required></td>
                <td><input type="radio" name="phq_depressed" value="1"></td>
                <td><input type="radio" name="phq_depressed" value="2"></td>
                <td><input type="radio" name="phq_depressed" value="3"></td>
              </tr></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="col-md-10 text-right">
    <br/>
    <?= $this->Form->button(__('Finish registration'), ['class' => 'btn btn-success btn-lg']); ?>
    </div>
    <br/>
</div>


<?= $this->Form->end() ?>
