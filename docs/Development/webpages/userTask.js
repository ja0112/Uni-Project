document.addEventListener('DOMContentLoaded', function() {
  // do stuff here
  $('.btn-saveTask, .btn-cancelTask').hide();
  $('.txtaTask').hide();
$('.btn-editTask').click(function () {
        $(this).closest('div').find('.btn-editTask').hide();
        $(this).closest('div').find('.btn-saveTask, .btn-cancelTask').show();
        document.getElementById("ptagTask").style.display = "none";
        $(this).closest('div').find('.txtaTask').show();
        /*$(this).closest('div').find('input').removeAttr('readonly').focus();
        inputVal = $(this).closest('div').find('input').val();*/

      });

  $('.btn-saveTask').click(function () {
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-saveTask, .btn-cancelTask').hide();
      $(this).closest('div').find('.btn-editTask').show();
      $(this).closest('div').find('.txtaTask').hide();
      document.getElementById("ptagTask").style.display = "block";
      //console.log($('.txta').val())
      var taskval = $('.txtaTask').val();
      

      $.post("updateTask.php", {taskvalue: taskval}, function(data){
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

  $('.btn-cancelTask').click(function () {
      //$(this).closest('div').find('input').val(inputVal);
      //$(this).closest('div').find('input').attr('readonly', 'readonly');
      $(this).closest('div').find('.btn-saveTask, .btn-cancelTask').hide();
      $(this).closest('div').find('.btn-editTask').show();
      $(this).closest('div').find('.txtaTask').hide();
      document.getElementById("ptagTask").style.display = "block";
  });

}, false);
