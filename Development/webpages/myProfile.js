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

      $.post("update.php", {txtvalue: ps}, function(data){
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
//**************************************Interests edit start********************************************************/
  $('.btn-saveInt, .btn-cancelInt').hide();
  $('.txtaInt').hide();
$('.btn-editInt').click(function () {
        $(this).closest('div').find('.btn-editInt').hide();
        $(this).closest('div').find('.btn-saveInt, .btn-cancelInt').show();
        document.getElementById("ptagInt").style.display = "none";
        $(this).closest('div').find('.txtaInt').show();
        /*$(this).closest('div').find('input').removeAttr('readonly').focus();
        inputVal = $(this).closest('div').find('input').val();*/

      });

  $('.btn-saveInt').click(function () {
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-saveInt, .btn-cancelInt').hide();
      $(this).closest('div').find('.btn-editInt').show();
      $(this).closest('div').find('.txtaInt').hide();
      document.getElementById("ptagInt").style.display = "block";
      //console.log($('.txta').val())
      var interest = $('.txtaInt').val();
      console.log(interest);

      $.post("interestUpdate.php", {intvalue: interest}, function(data){
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

  $('.btn-cancelInt').click(function () {
      //$(this).closest('div').find('input').val(inputVal);
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-saveInt, .btn-cancelInt').hide();
      $(this).closest('div').find('.btn-editInt').show();
      $(this).closest('div').find('.txtaInt').hide();
      document.getElementById("ptagInt").style.display = "block";
  });
/**************************End of edit interests*********************************************************************/

/***************************start of edit skills************************************************************************/
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

    $.post("skillsUpdate.php", {skillvalue: interest}, function(data){
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

/********************************end of edit skills***************************************************************************/
}, false);
