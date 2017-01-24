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
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
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
  var newBoxValue = document.createElement("input");
  newBoxValue.setAttribute("type","text");
  newBoxValue.setAttribute("class","form-control multioption-value");
  newBoxValue.setAttribute("id","newBox");
  $(newBoxValue).change(function() {
    addAnotherScreenerOption();
  });
  $("#newBox").focus();
  $(".multioption-text").append(newBox);
  $(".multioption-value").append(newBoxValue);
}

function submitModuleForm(inid) {
  var id = $(inid).closest("form");
  var cb = bootstrap_alert;
  console.log("submitformAJax"+$(id).serialize());
  /*$.ajax({
    url: '/module/add',
    type: 'POST',rap_alert.info = function(message) {
    data: $(id).serialize(),
    success: function(data)
    {
      if(cb!=null) {
        cb.success("Module saved!");
        $("#sc").slideDown();
      }
    },
    error: function(data)
    {
      if(cb!=null) {
        cb.danger("Something went seriously wrong, and the module wasn't saved. Please contact us.");
        $("#sc").slideDown(); //TODO: Remove once requests work
      }
    }
  });*/
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
    bootstrap_alert.warning("Please ensure you've given your module a name, a filepath to an icon, a filepath to a banner, and a description.");
  } else {
    submitModuleForm("#md");
  }
}
var alertDelay = 5000;

//ALERT STUFF
bootstrap_alert = function() {}
bootstrap_alert.info = function(message) {
    $('#alert_placeholder').html('<div class="alert alert-info"><span><div class="container"><div class="row"><div class="col-xs-12"><a class="close" data-dismiss="alert">×</a><i class="glyphicon glyphicon-warning-sign"></i> '+message+'</div></div></div></span></div>').slideDown().delay(alertDelay).slideUp();
}
bootstrap_alert.success = function(message) {
      $('#alert_placeholder').html('<div class="alert alert-success"><span><div class="container"><div class="row"><div class="col-xs-12"><a class="close" data-dismiss="alert">×</a>'+message+'</div></div></div></span></div>').slideDown().delay(alertDelay).slideUp();
}
bootstrap_alert.danger = function(message) {
      $('#alert_placeholder').html('<div class="alert alert-danger"><span><div class="container"><div class="row"><div class="col-xs-12"><a class="close" data-dismiss="alert">×</a>'+message+'</div></div></div></span></div>').slideDown().delay(alertDelay).slideUp();
}
bootstrap_alert.warning = function(message) {
      $('#alert_placeholder').html('<div class="alert alert-warning"><span><div class="container"><div class="row"><div class="col-xs-12"><a class="close" data-dismiss="alert">×</a>'+message+'</div></div></div></span></div>').slideDown().delay(alertDelay).slideUp();
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
    $(sender).text("Save").removeClass("btn-success").addClass("btn-danger").attr('onclick','createModule(this)');
  } else if(id=="#sc"){
    $(sender).text("Save").removeClass("btn-success").addClass("btn-danger").attr('onclick','createScreener()');
  }
}

function createScreener() {
  if($("#module-screener").val() !="") {
    return editScreener();
  }
  var cb = bootstrap_alert;
  var moduleID = $("#module-id").val();
  var moduleName = $("#module-name").val();
  console.log("Creating screener for module "+ moduleName + " - ID "+moduleID);
  $.ajax({
    url: '/screener/add.json',
    type: 'POST',
    data: {Name: "Questions for Module " + moduleName, module_id:moduleID},
    success: function(data)
    {
      console.log(data);
      $("#module-screener").val(data.screener.id);
      if(cb!=null) {
        cb.success("Screener saved!");

      }
    },
    error: function(data)
    {
      if(cb!=null) {
        cb.danger("Something went seriously wrong, and the Screener wasn't saved. Please contact us.");

      }
    }
  });
}

function editScreener() {
  var cb = bootstrap_alert;
  var moduleID = $("#module-id").val();
  var moduleName = $("#module-name").val();
  var screenerID = $("#module-screener").val();
  console.log("Creating screener for module "+ moduleName + " - ID "+moduleID);
  $.ajax({
    url: '/screener/edit/'+screenerID+'.json',
    type: 'POST',
    data: {id: screenerID, Name: "Questions for Module " + moduleName, module_id:moduleID},
    success: function(data)
    {
      console.log(data);
      if(cb!=null) {
        cb.success("Screener updated!");
      }
    },
    error: function(data)
    {
      if(cb!=null) {
        cb.danger("Something went seriously wrong, and the Screener wasn't updated. Please contact us.");

      }
    }
  });
}
