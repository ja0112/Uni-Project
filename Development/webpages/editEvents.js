document.addEventListener('DOMContentLoaded', function() {
  // do stuff here
  $('.btn-save, .btn-cancel').hide();
  $('.txta').hide();
$('.btn-edit').click(function () {
        $(this).closest('div').find('.btn-edit').hide();
        $(this).closest('div').find('.btn-save, .btn-cancel').show();
        document.getElementById("ptag").style.display = "none";
        $(this).closest('div').find('.txta').show();
        /*$(this).closest('div').find('input').removeAttr('readonly').focus();
        inputVal = $(this).closest('div').find('input').val();*/

      });

  $('.btn-save').click(function () {
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-save, .btn-cancel').hide();
      $(this).closest('div').find('.btn-edit').show();
      $(this).closest('div').find('.txta').hide();
      document.getElementById("ptag").style.display = "block";
      //console.log($('.txta').val())
      var ps = $('.txta').val();
      console.log(ps);

      $.post("update-event-title.php", {txtvalue: ps}, function(data){
         location.reload();
      console.log("data sent and received: "+data);
  });
    /*$.ajax({  URL:"update.php",
                type:"post",
                data: {txta:ps},
                success: function(result) {
        console.log('ok');
      },
      error: function(result) {
        console.log('error');
      }
    });*/
  });

  $('.btn-cancel').click(function () {
      //$(this).closest('div').find('input').val(inputVal);
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-save, .btn-cancel').hide();
      $(this).closest('div').find('.btn-edit').show();
      $(this).closest('div').find('.txta').hide();
      document.getElementById("ptag").style.display = "block";
  });
//**************************************event location edit start********************************************************/
  $('.btn-saveEL, .btn-cancelEL').hide();
  $('.txtaEL').hide();
$('.btn-editEL').click(function () {
        $(this).closest('div').find('.btn-editEL').hide();
        $(this).closest('div').find('.btn-saveEL, .btn-cancelEL').show();
        document.getElementById("ptagEL").style.display = "none";
        $(this).closest('div').find('.txtaEL').show();
        /*$(this).closest('div').find('input').removeAttr('readonly').focus();
        inputVal = $(this).closest('div').find('input').val();*/

      });

  $('.btn-saveEL').click(function () {
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-saveEL, .btn-cancelEL').hide();
      $(this).closest('div').find('.btn-editEL').show();
      $(this).closest('div').find('.txtaEL').hide();
      document.getElementById("ptagEL").style.display = "block";
      //console.log($('.txta').val())
      var interest = $('.txtaEL').val();
      console.log(interest);

      $.post("event-location-update.php", {intvalue: interest}, function(data){
         location.reload();
      console.log("data sent and received: "+data);
  });
    /*$.ajax({  URL:"update.php",
                type:"post",
                data: {txta:ps},
                success: function(result) {
        console.log('ok');
      },
      error: function(result) {
        console.log('error');
      }
    });*/
  });

  $('.btn-cancelEL').click(function () {
      //$(this).closest('div').find('input').val(inputVal);
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-saveEL, .btn-cancelEL').hide();
      $(this).closest('div').find('.btn-editEL').show();
      $(this).closest('div').find('.txtaEL').hide();
      document.getElementById("ptagEL").style.display = "block";
  });
/**************************End of edit event location*********************************************************************/

/***************************start of edit event description************************************************************************/
$('.btn-saveSkill, .btn-cancelSkill').hide();
$('.txtaSkill').hide();
$('.btn-editSkill').click(function () {
      $(this).closest('div').find('.btn-editSkill').hide();
      $(this).closest('div').find('.btn-saveSkill, .btn-cancelSkill').show();
      document.getElementById("ptagSkill").style.display = "none";
      $(this).closest('div').find('.txtaSkill').show();
      /*$(this).closest('div').find('input').removeAttr('readonly').focus();
      inputVal = $(this).closest('div').find('input').val();*/

    });

$('.btn-saveSkill').click(function () {
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveSkill, .btn-cancelSkill').hide();
    $(this).closest('div').find('.btn-editSkill').show();
    $(this).closest('div').find('.txtaSkill').hide();
    document.getElementById("ptagSkill").style.display = "block";
    //console.log($('.txta').val())
    var interest = $('.txtaSkill').val();
    console.log(interest);

    $.post("event-desc-update.php", {skillvalue: interest}, function(data){
       location.reload();
    console.log("data sent and received: "+data);
});
  /*$.ajax({  URL:"update.php",
              type:"post",
              data: {txta:ps},
              success: function(result) {
      console.log('ok');
    },
    error: function(result) {
      console.log('error');
    }
  });*/
});

$('.btn-cancelSkill').click(function () {
    //$(this).closest('div').find('input').val(inputVal);
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveSkill, .btn-cancelSkill').hide();
    $(this).closest('div').find('.btn-editSkill').show();
    $(this).closest('div').find('.txtaSkill').hide();
    document.getElementById("ptagSkill").style.display = "block";
});

/********************************end of edit event descripton***************************************************************************/
/***************************start of edit num of volunteers************************************************************************/
$('.btn-saveNumVol, .btn-cancelNumVol').hide();
$('.txtaNumVol').hide();
$('.btn-editNumVol').click(function () {
      $(this).closest('div').find('.btn-editNumVol').hide();
      $(this).closest('div').find('.btn-saveNumVol, .btn-cancelNumVol').show();
      document.getElementById("ptagNumVol").style.display = "none";
      $(this).closest('div').find('.txtaNumVol').show();
      /*$(this).closest('div').find('input').removeAttr('readonly').focus();
      inputVal = $(this).closest('div').find('input').val();*/

    });

$('.btn-saveNumVol').click(function () {
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveNumVol, .btn-cancelNumVol').hide();
    $(this).closest('div').find('.btn-editNumVol').show();
    $(this).closest('div').find('.txtaNumVol').hide();
    document.getElementById("ptagNumVol").style.display = "block";
    //console.log($('.txta').val())
    var interest = $('.txtaNumVol').val();
    console.log(interest);

    $.post("update-num-vol.php", {skillvalue: interest}, function(data){
       location.reload();
    console.log("data sent and received: "+data);
});
  /*$.ajax({  URL:"update.php",
              type:"post",
              data: {txta:ps},
              success: function(result) {
      console.log('ok');
    },
    error: function(result) {
      console.log('error');
    }
  });*/
});

$('.btn-cancelNumVol').click(function () {
    //$(this).closest('div').find('input').val(inputVal);
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveNumVol, .btn-cancelNumVol').hide();
    $(this).closest('div').find('.btn-editNumVol').show();
    $(this).closest('div').find('.txtaNumVol').hide();
    document.getElementById("ptagNumVol").style.display = "block";
});

/********************************end of num of volunteers***********************************************************************/


/***************************start of edit attendees limit************************************************************************/
$('.btn-saveAttLim, .btn-cancelAttLim').hide();
$('.txtaAttLim').hide();
$('.btn-editAttLim').click(function () {
      $(this).closest('div').find('.btn-editAttLim').hide();
      $(this).closest('div').find('.btn-saveAttLim, .btn-cancelAttLim').show();
      document.getElementById("ptagAttLim").style.display = "none";
      $(this).closest('div').find('.txtaAttLim').show();
      /*$(this).closest('div').find('input').removeAttr('readonly').focus();
      inputVal = $(this).closest('div').find('input').val();*/

    });

$('.btn-saveAttLim').click(function () {
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveAttLim, .btn-cancelAttLim').hide();
    $(this).closest('div').find('.btn-editAttLim').show();
    $(this).closest('div').find('.txtaAttLim').hide();
    document.getElementById("ptagAttLim").style.display = "block";
    //console.log($('.txta').val())
    var interest = $('.txtaAttLim').val();
    console.log(interest);

    $.post("attendees-limit.php", {skillvalue: interest}, function(data){
       location.reload();
    console.log("data sent and received: "+data);
});
  /*$.ajax({  URL:"update.php",
              type:"post",
              data: {txta:ps},
              success: function(result) {
      console.log('ok');
    },
    error: function(result) {
      console.log('error');
    }
  });*/
});

$('.btn-cancelAttLim').click(function () {
    //$(this).closest('div').find('input').val(inputVal);
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveAttLim, .btn-cancelAttLim').hide();
    $(this).closest('div').find('.btn-editAttLim').show();
    $(this).closest('div').find('.txtaAttLim').hide();
    document.getElementById("ptagAttLim").style.display = "block";
});

/********************************end of num of attendees limit*************************************************/

/***************************start of edit event date************************************************************************/
$('.btn-saveDate, .btn-cancelDate').hide();
$('.txtaDate').hide();
$('.btn-editDate').click(function () {
      $(this).closest('div').find('.btn-editDate').hide();
      $(this).closest('div').find('.btn-saveDate, .btn-cancelDate').show();
      document.getElementById("ptagDate").style.display = "none";
      $(this).closest('div').find('.txtaDate').show();
      /*$(this).closest('div').find('input').removeAttr('readonly').focus();
      inputVal = $(this).closest('div').find('input').val();*/

    });

$('.btn-saveDate').click(function () {
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveDate, .btn-cancelDate').hide();
    $(this).closest('div').find('.btn-editDate').show();
    $(this).closest('div').find('.txtaDate').hide();
    document.getElementById("ptagDate").style.display = "block";
    //console.log($('.txta').val())
    var interest = $('.txtaDate').val();
    console.log(interest);

    $.post("date-update.php", {skillvalue: interest}, function(data){
       location.reload();
    console.log("data sent and received: "+data);
});
  /*$.ajax({  URL:"update.php",
              type:"post",
              data: {txta:ps},
              success: function(result) {
      console.log('ok');
    },
    error: function(result) {
      console.log('error');
    }
  });*/
});

$('.btn-cancelDate').click(function () {
    //$(this).closest('div').find('input').val(inputVal);
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveDate, .btn-cancelDate').hide();
    $(this).closest('div').find('.btn-editDate').show();
    $(this).closest('div').find('.txtaDate').hide();
    document.getElementById("ptagDate").style.display = "block";
});

/********************************end of num of event date*************************************************/

/***************************start of edit event time************************************************************************/
$('.btn-saveTime, .btn-cancelTime').hide();
$('.txtaTime').hide();
$('.btn-editTime').click(function () {
      $(this).closest('div').find('.btn-editTime').hide();
      $(this).closest('div').find('.btn-saveTime, .btn-cancelTime').show();
      document.getElementById("ptagTime").style.display = "none";
      $(this).closest('div').find('.txtaTime').show();
      /*$(this).closest('div').find('input').removeAttr('readonly').focus();
      inputVal = $(this).closest('div').find('input').val();*/

    });

$('.btn-saveTime').click(function () {
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveTime, .btn-cancelTime').hide();
    $(this).closest('div').find('.btn-editTime').show();
    $(this).closest('div').find('.txtaTime').hide();
    document.getElementById("ptagTime").style.display = "block";
    //console.log($('.txta').val())
    var interest = $('.txtaTime').val();
    console.log(interest);

    $.post("time-update.php", {skillvalue: interest}, function(data){
       location.reload();
    console.log("data sent and received: "+data);
});
  /*$.ajax({  URL:"update.php",
              type:"post",
              data: {txta:ps},
              success: function(result) {
      console.log('ok');
    },
    error: function(result) {
      console.log('error');
    }
  });*/
});

$('.btn-cancelTime').click(function () {
    //$(this).closest('div').find('input').val(inputVal);
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveTime, .btn-cancelTime').hide();
    $(this).closest('div').find('.btn-editTime').show();
    $(this).closest('div').find('.txtaTime').hide();
    document.getElementById("ptagTime").style.display = "block";
});

/********************************end of num of attendees limit*************************************************/

/***************************start of edit image************************************************************************/
$('.btn-saveImage, .btn-cancelImage').hide();
$('.txtaImage').hide();
$('.btn-editImage').click(function () {
      $(this).closest('div').find('.btn-editImage').hide();
      $(this).closest('div').find('.btn-saveImage, .btn-cancelImage').show();
      document.getElementById("ptagImage").style.display = "none";
      $(this).closest('div').find('.txtaImage').show();
      /*$(this).closest('div').find('input').removeAttr('readonly').focus();
      inputVal = $(this).closest('div').find('input').val();*/

    });

$('.btn-saveImage').click(function () {
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveImage, .btn-cancelImage').hide();
    $(this).closest('div').find('.btn-editImage').show();
    $(this).closest('div').find('.txtaImage').hide();
    document.getElementById("ptagImage").style.display = "block";
    //console.log($('.txta').val())
    var fileToUpload = $('.txtaImage').val();
    console.log(fileToUpload);

    $.post("image-update.php", {fileToUpload: fileToUpload}, function(data){
       location.reload();
    console.log("data sent and received: "+data);
});
  /*$.ajax({  URL:"update.php",
              type:"post",
              data: {txta:ps},
              success: function(result) {
      console.log('ok');
    },
    error: function(result) {
      console.log('error');
    }
  });*/
});

$('.btn-cancelImage').click(function () {
    //$(this).closest('div').find('input').val(inputVal);
    //$(this).closest('div').find('input').attr('readonly', 'readonly');
    $(this).closest('div').find('.btn-saveImage, .btn-cancelImage').hide();
    $(this).closest('div').find('.btn-editImage').show();
    $(this).closest('div').find('.txtaImage').hide();
    document.getElementById("ptagImage").style.display = "block";
});

/********************************end of num edit image*************************************************/
}, false);
