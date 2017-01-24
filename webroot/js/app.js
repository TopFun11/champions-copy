$(document).ready(function(){
  tinymce.init({
    selector:'#description_text',
    height: 250,
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'template paste textcolor colorpicker textpattern imagetools codesample'
      ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft \
              aligncenter alignright alignjustify | bullist numlist outdent \
              indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true,
    });
});

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

function addAnotherOption(){
  $("#newBox").attr("id","");
  var newBox = document.createElement("input");
  newBox.setAttribute("type","text");
  newBox.setAttribute("class","form-control multioption");
  newBox.setAttribute("id","newBox");
  $(newBox).change(function() {
    addAnotherOption();
  });
  var x = $(".multioption-input").append(newBox);
  $("#newBox").focus();
}

function addAnotherScreenerOption(){
  $("#newBox").attr("id","");
  var newBox = document.createElement("input");
  newBox.setAttribute("type","text");
  newBox.setAttribute("class","form-control multioption-text");
  newBox.setAttribute("id","newBox");
  newBox.setAttribute("placeholder","The answer as displayed to the user");
  var newBoxValue = document.createElement("input");
  newBoxValue.setAttribute("type","text");
  newBoxValue.setAttribute("class","form-control multioption-value");
  newBoxValue.setAttribute("id","newBox");
  newBoxValue.setAttribute("placeholder","Score used in calculation");
  $(newBoxValue).change(function() {
    addAnotherScreenerOption();
  });
  $("#newBox").focus();
  $(".multioption-text").append(newBox);
  $(".multioption-value").append(newBoxValue);
}

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
var alertHTML='<div class="alert alert-{0}"><span><div class="container"> \
            <div class="row"><div class="col-xs-12"> \
            <a class="close" data-dismiss="alert">×</a> \
            <i class="glyphicon glyphicon-info-sign"></i> \
            {1}</div></div></div></span></div>';

function genAl(alertType, message) {
    $('#alert_placeholder').html(alertHTML.format(alertType,message))
    .slideDown().delay(alertDelay).slideUp();
}



//INIT STUFF, SHOULD REFACTOR.
addAnotherOption();
addAnotherScreenerOption();
$(".ed-editor").hide();
//$("#sc").hide();
$("#sd").hide();


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
  if($("#module-screener").val() !="") {
    console.log("Check passed");
    return editScreener();
  }
  var cb = genAl;
  var moduleID = $("#module-id").val();
  var moduleName = $("#module-name").val();
  var moduleScreenerThreshold = $("#module-screener-threshold").val();
  console.log(moduleName + " - ID "+moduleID + " T:" + moduleScreenerThreshold);
  $.ajax({
    url: '/screener/add.json',
    type: 'POST',
    data: {Name: "Questions for Module " + moduleName, module_id:moduleID, threshold: moduleScreenerThreshold},
    success: function(data)
    {
      console.log(data);
      $("#module-screener").val(data.screener.id);
      if(cb!=null) {
        cb("success","Screener saved!");

      }
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

$(document).on("change","#screener-question-type", function() {
  switch($("#screener-question-type").val()) {
    case "0":
      console.log("Switching to Textbox input")
      break;
    case "1":
      console.log("Switching to Radio buttons - Allow creating options");
      break;
    case "2":
      console.log("Switching to Checkboxes - Allow creating options");
      break;
    default:
      console.log("Switch fell through (┛◉Д◉)┛彡┻━┻")
  }
})

//TODO: Make thing that can validate a screener (ie check there is at least one question and that there are at least two options for option type answers) - should then call createScreener()
//TODO: Refactor screener stuff so screener can only be created if validation critereon are met
//TODO: Create thing that can save questions and options in logical fashion
