var toggleState = {};
function toggleModuleCreatorField(sender) {
  var id = "#"+sender.parentNode.parentNode.id;
  console.log("the ID is "+id);
  if(toggleState[id]==null) {
    toggleState[id]={toggled:false};
  }
  if(toggleState[id].toggle == true) {
    createModule(id);
    console.log(toggleState[id].toggle);
    $(id+">.ed-display>.ed-preview").slideDown();
    $(id+">.ed-display>.ed-editor").slideUp();
    $(sender).text("Add/Edit").addClass("btn-success").removeClass("btn-danger");
    toggleState[id].toggle = false;
  } else {
    console.log($(id));
    $(id+">.ed-display>.ed-preview").slideUp();
    $(id+">.ed-display>.ed-editor").slideDown();
    $(sender).text("Save").removeClass("btn-success").addClass("btn-danger");
    toggleState[id].toggle = true;
  }
}
var tabIndex = 10;
function addAnotherScreenerOption(exercise){
  $("#newBox").attr("id","");
  var newBox = document.createElement("input");
  newBox.setAttribute("type","text");
  newBox.setAttribute("class","form-control multioption-text-box");
  newBox.setAttribute("id","newBox");
  newBox.setAttribute("placeholder","The answer as displayed to the user");
  newBox.setAttribute("tabindex",tabIndex);
  var newBoxValue = document.createElement("input");
  newBoxValue.setAttribute("type","number");
  newBoxValue.setAttribute("class","form-control multioption-value-box numeric");
  newBoxValue.setAttribute("id","newBox");
  newBoxValue.setAttribute("placeholder","Score used in calculation");
  newBoxValue.setAttribute("tabindex",tabIndex+1);
  $(newBoxValue).change(function() {
    addAnotherScreenerOption();
  });
  $(".multioption-text").append(newBox);
  $(".multioption-value").append(newBoxValue);
  $("#newBox").focus();
  tabIndex=tabIndex+2;
}
$(document).on("input", ".numeric", function() {
    this.value = this.value.replace(/[^\d\.\-]/g,'');
});
function submitModuleForm(inid) {
  var id = $(inid).closest("form");
  var cb = genAl;
  console.log("submitModuleForm"+$(id).serialize());
  $(id).submit();
}

//Performs null check on all relevant fields for module saving, and calls save
//method to save the module
function createModule(sender) {
  var modName = $("#title").val();
  var modIconPath = $("#icon").val();
  var modBannerPath = $("#banner").val();
  tinyMCE.triggerSave(false, true);
  var modDescription = $("#desc").val();
  if(modName==""||modIconPath==""||modBannerPath==""||modDescription=="") {
    genAl("info","Please ensure you've filled all required fields");
  } else {
    submitModuleForm("#md");
  }
}
var alertDelay = 5000;

String.prototype.format = function()
{
   var content = this;
   for (var i=0; i < arguments.length; i++)
   {
        var replacement = '{' + i + '}';
        content = content.replace(replacement, arguments[i]);
   }
   return content;
};

//ALERT STUFF
function genAl(alertType, message) {
  var alertHTML='<div class="alert alert-{0}"><span><div class="container"> \
              <div class="row"><div class="col-xs-12"> \
              <a class="close" data-dismiss="alert">×</a> \
              <i class="glyphicon glyphicon-info-sign"></i> \
              {1}</div></div></div></span></div>';
    $('#alert_placeholder').html(alertHTML.format(alertType,message))
    .slideDown().delay(alertDelay).slideUp();
}



//INIT STUFF, SHOULD REFACTOR.
addAnotherScreenerOption();
$(".ed-editor").hide();
//$("#sc").hide();


function openPartEditor(sender) {
  var id = "#"+sender.parentNode.parentNode.id;
  console.log("Opening: "+ $(id));
  $(id+">.ed-display>.ed-preview").slideUp();
  $(id+">.ed-display>.ed-editor").slideDown();
  if(id=="#md") {
    $(sender).text("Save").removeClass("btn-success")
    .addClass("btn-danger").attr('onclick','createModule(this)');
  } else if(id=="#sc"){
    $(sender).text("Save").removeClass("btn-success")
    .addClass("btn-danger").attr('onclick','closePartEditor(this)');
  }
}

function closePartEditor(sender) {
  var id = "#"+sender.parentNode.parentNode.id;
  console.log("Opening: "+ $(id));
  $(id+">.ed-display>.ed-preview").slideDown();
  $(id+">.ed-display>.ed-editor").slideUp();
  $(sender).text("Add/edit").removeClass("btn-success")
  .addClass("btn-danger").attr('onclick','openPartEditor(this)');
  if(id=="#sc"){
    createScreener();
  }
}


function createScreener() {
  var cb = genAl;
  var moduleID = $("#module-id").val();
  var moduleScreenerThreshold = $("#module-screener-threshold").val();
  console.log(moduleID + " - ID "+moduleID + " T:" + moduleScreenerThreshold);
  $.ajax({
    url: '/screener/add/'+moduleID+'.json',
    type: 'POST',
    data: {Name: "Questions for Module "+moduleID, module_id:moduleID, threshold: moduleScreenerThreshold},
    success: function(data)
    {
      console.log($(data));
      if(cb!=null) {
        cb("success","Screener saved!");
      }
      window.location.href = "/screener/edit/"+data.screener.id;
    },
    error: function(data)
    {
      if(cb!=null) {
        cb("warning", "Something went seriously wrong, and the Screener wasn't saved. Please contact us.");

      }
    }
  });
}

function editScreener() {
  var cb = genAl;
  var moduleID = $("#module-id").val();
  var moduleName = $("#module-name").val();
  var screenerID = $("#module-screener").val();
  var moduleScreenerThreshold = $("#module-screener-threshold").val();
  console.log("Creating screener for module "+ moduleName + " - ID "+moduleID);
  $.ajax({
    url: '/screener/edit/'+screenerID+'.json',
    type: 'POST',
    data: {id: screenerID, Name: "Questions for Module " + moduleName, module_id:moduleID,threshold:moduleScreenerThreshold},
    success: function(data)
    {
      console.log(data);
      if(cb!=null) {
        cb("success","Screener updated!");
      }
    },
    error: function(data)
    {
      if(cb!=null) {
        cb("danger","Something went seriously wrong, and the Screener wasn't updated. Please contact us.");

      }
    }
  });
}
$(".option-input").hide();
$(document).on("change","#screener-question-type", function() {
  switch($("#screener-question-type").val()) {
    case "0":
      console.log("Switching to Textbox input");
      $(".option-input").hide();
      break;
    case "1":
      console.log("Switching to Radio buttons - Allow creating options");
      $(".option-input").show();
      break;
    case "2":
      console.log("Switching to Checkboxes - Allow creating options");
      $(".option-input").show();
      break;
    default:
      console.log("Switch fell through (┛◉Д◉)┛彡┻━┻");
  }
})

function addScreenerQuestion(cb) {
  var alertGen = genAl;
  var screenerID = $("#module-screener").val();
  var screenerquestion = $("#screener-question").val();
  var screenerquestiontype = $("#screener-question-type").val();
  $.ajax({
    url: '/question/add.json',
    type: 'POST',
    data: {exercise_id: "", screener_id: screenerID, question: screenerquestion, type:screenerquestiontype},
    success: function(data)
    {
      console.log("Question added!!!! " +data);
        $("#question-being-worked-on").val(data.question.id);
        console.log("before callback!");
        alertGen("success","Question added!");
        if(cb!=null) {
          cb();
        }
    },
    error: function(data)
    {
        alertGen("danger","Something went seriously wrong, and the Question wasn't added. Please contact us.");
    }
  });
}

function addExerciseQuestion(cb) {
  var alertGen = genAl;
  var exerciseID = $("#module-exercise").val();
  var screenerquestion = $("#screener-question").val();
  var screenerquestiontype = $("#screener-question-type").val();
  $.ajax({
    url: '/question/add.json',
    type: 'POST',
    data: {exercise_id: exerciseID, screener_id: "", question: screenerquestion, type:screenerquestiontype},
    success: function(data)
    {
      console.log(data);
      /*TODO: FUCK BROKE */
        $("#question-being-worked-on").val(data.question.id);
        console.log("The question to work on is" + data.question.id);
        alertGen("success","Question added!");
        if(cb!=null) {
          cb();
        }
    },
    error: function(data)
    {
      if(cb!=null) {
        alertGen("danger","Something went seriously wrong, and the Question wasn't added. Please contact us.");
      }
    }
  });
}

var ajaxArray = [];
function addOption() {
  var cb = genAl;
  var questionID = $("#question-being-worked-on").val();
  console.log("After callback" + questionID);
  var options = [];
  var optionScore = [];
  $(".multioption-text-box").each(function() {options.push(this.value)});
  $(".multioption-value-box").each(function() {optionScore.push(this.value)});
  console.log(options+optionScore);
  for(var i=0;i<options.length;i++) {
    if(options[i]!="") {
      console.log("Question {0} is {1} with value{2}".format(i,options[i],optionScore[i]))
      var ajaxReq = $.ajax({
        url: '/QuestionOption/add.json',
        type: 'POST',
        data: {question_id: questionID, value:optionScore[i],text:options[i]},
        success: function(data)
        {
          console.log("Question added " +data);
          if(cb!=null) {
            $("#question-being-worked-on").val(data.question.id);
            cb("success","Question added!");
          }
        },
        error: function(data)
        {
          if(cb!=null) {
            cb("danger","Something went seriously wrong, and the Options for your question weren't added. Please contact us.");
          }
        }
      });
      ajaxArray.push(ajaxReq);
    }
  }
  $.when(ajaxArray).then(function() {
    resetQuestionForm();
  });
}
function resetQuestionForm() {
  $(".multioption-text-box").each(function() {this.remove()});
  $(".multioption-value-box").each(function() {this.remove()});
  $("#screener-question").val("");
  $("#screener-question-type").val("0");
  addAnotherScreenerOption();
  $(".option-input").hide();
}
//$('#tree').treeview({data: treeData});

function processQuestion() {
  var question = $("#screener-question").val();
  var questiontype = $("#screener-question-type").val();
  if(question!="") {
    if(questiontype!=0 && $(".multioption-text-box").length == 0) {
      genAl("warning","Please add some options!");
      return;
    } else if(questiontype!=0){
      console.log("Adding question and option");
      if($("#module-exercise").val()!=null) {
        addExerciseQuestion(addOption);
      } else {
        addScreenerQuestion(addOption);
      }
    } else {
      console.log("Just adding question");
      if($("#module-exercise").val()!=null) {
        console.log("exercise");
        addExerciseQuestion();
      } else {
        console.log("screener");
        addScreenerQuestion();
      }
    }
    addQuestionToTable(question, questiontype, parseQuestionForDisplay);
  }
}

function parseQuestionForDisplay() {
  var question = $("#screener-question").val();
  var questiontype = $("#screener-question-type").val();
  var options = [];
  var optionScore = [];
  var optionsOptionScoreDisplay = "";
  $(".multioption-text-box").each(function() {options.push(this.value)});
  $(".multioption-value-box").each(function() {optionScore.push(this.value)});
    for(var i=0;i<options.length;i++) {
      if(options[i]!=""){
      optionsOptionScoreDisplay += "{0}({1}), ".format(options[i],optionScore[i]);
    }
  }
  return optionsOptionScoreDisplay;
}
function submitTinymce(sender) {
  tinyMCE.triggerSave(false, true);
  var form = $(sender).closest('form');
  form.submit();
}


function addQuestionToTable(question, qtype, qoptions) {
  $("#questions-added").append("<tr><td>{0}</td><td>{1}</td><td>{2}</td></tr>".format(question,qtype,qoptions));
}



function createSection() {
  //if($("#module-screener").val() !="") {
    //console.log("Check passed");
    //return editScreener();
//}
  tinyMCE.triggerSave(false, true);
  var cb = genAl;
  var sectionTitle = "";
  var sectionContent = "";
  var moduleID = "";
  var parentSectionID = "";
  sectionTitle = $("#title").val();
  sectionContent = $("#description_text").val();
  moduleID = $("#module_id").val();
  parentSectionID = $("#section_id").val();
  if(sectionTitle==""||sectionContent=="") {
    cb("warning","Enter a title and content");
    return;
  } else if (moduleID!=""&&parentSectionID!=""){
    cb("warning","Please only associate this section with either a module (root section) or another section (it's parent)");
    return;
  }
  //console.log(moduleID + " - ID "+moduleID + " T:" + moduleScreenerThreshold);
  $.ajax({
    url: '/sections/add.json',
    type: 'POST',
    data: {title: sectionTitle,content: sectionContent,module_id:moduleID,section_id:parentSectionID},
    success: function(data)
    {
      console.log($(data));
      if(cb!=null) {
        cb("success","Screener saved!");
      }
      window.location.href = "/exercise/add/";
    },
    error: function(data)
    {
      if(cb!=null) {
        cb("success", "Something went seriously wrong, and the Section wasn't saved. Please contact us.");
      }
    }
  });
}

function createExercise() {
  var sectionID = $("#section-id").find(":selected").val();
  var typeID = $('#type').find(":selected").val();
  console.log(sectionID+", "+typeID);
  if(sectionID==""||typeID==""){
    genAl("warning","Specify both the type as well as the section to associate it with.");
    return;
  }
  $.ajax({
    url: '/exercise/add.json',
    type: 'POST',
    data: {"section_id":sectionID,"type":typeID},
    success: function(data)
    {
      console.log($(data));

        genAl("success","Exercise saved!");

      //window.location.href = "/exercise/edit/"+data.exercise.id;
    },
    error: function(data)
    {
        genAl("success", "Something went seriously wrong, and the Exercise wasn't saved. Please contact us.");
    }
  });

}

$("#exerciseForm").on("submit", function(event){
  event.preventDefault();
  var formData = $(this).serialize();
  var exID = $("input[name='exercise_id']", this).val();
  $.ajax({
    url: '/recordset/exercise/'+exID,
    type: 'POST',
    data: formData,
    success: function(data) {
      console.log($(data));
      alert("Data saved.");
    },
    error: function(data) {
      console.log($(data));
      alert("Error saving data. Please contact us.");
    }
  })
});

//Loads pre-existing recordsets
$(document).ready(function(){
  $(".section-exercises").each(function() {
    var exID = $("input[name='exercise_id']",this).val();
    $.ajax({
      url: '/recordset/exercise/'+exID+".json",
      type: 'GET',
      success: function(data) {
        loadDataIntoExerciseForm(data.recordset);
      },
      error: function(data) {
        alert(data);
      }
    })
  });
});

//loads data into relevant fields.
function loadDataIntoExerciseForm(recordset) {
  var exID = recordset.exercise_id;
  var records = recordset.record;
  var questions = recordset.exercise.question;
  for(var i=0;i<records.length;i++) {
    var questionID = records[i].question_id;
    var questionType;
    //getting questionID
    for(var j=0;j<questions.length;j++) {
      if(questions[j].id==questionID){
        questionType = questions[j].type;
      }
    }
    if(records[i].answer != null) {
      $("textarea[name='answer["+questionID+"]']").val(records[i].answer);
    }

    //not handling checkboxes or radiobuttons yet, seeing as they don't work anyway
  }
}


//Validates that email being entered into profile page is of correct format.
function validateNHSEmail(email){
    if(/^\"?[\w-_\.]*\"?@wales\.nhs\.uk$/.test(email)) {
      return true;
    } else if(email=="nic.hooper@uwe.ac.uk") {
      return true;
    } else if(email=="a.john@swansea.ac.uk") {
      return true;
    } else if(email=="menna.brown@swansea.ac.uk") {
      return true;
    } else {
      return false;
    }
}

$("#profile-add").submit(function (e) {

    var formId = this.id;  // "this" is a reference to the submitted form
    var email = validateNHSEmail($("#email").val());
    if(!email) {
      e.preventDefault();
      alert("Sorry - this pilot is only open to people with valid @wales.nhs.uk email addresses at the moment.");
    } else {
      if($("#phone-number").val()=="") {
        $("#phone-number").val("0");
      }
    }
});

$('.lazyYT').lazyYT();
