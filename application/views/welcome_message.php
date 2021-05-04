<body>
<div class="container">
  <div class="row">
    <div class="panel panel-heading"><h1>Calculator</h1></div>
    <div class="panel panel-body">
      <form id="calculator" autocomplete="off">
        <div class="form-group col-md-6">
          <input id="bsalary" class="form-control form-control-sm" type="number" name="bsalary" placeholder="Basic Salary Amount">
        </div>
        <div class="form-check col-md-1">
          <input id="heslb" class="form-check-input" type="checkbox">
          <label class="form-check-label" for="heslb">
            Heslb
          </label>
        </div>
        <div class="form-check col-md-1 mt-1">
          <input id="allowance" class="form-check-input" type="checkbox">
          <label class="form-check-label" for="allowance">
            Allowance
          </label>
        </div>
        <div class="form-group col-md-3">
          <input  id="allowanceAmount" class="form-control form-control-sm" type="number" name="allowance" placeholder="Allowance Amount">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div id="result1" class="row">
        <div class="col-md-3">Net Pay Amount:</div>
      </div>
    </div>
    <div class="panel panel-footer">
        <div class="container">
          <span class="text-muted">&copy; <?php if($title){echo $title;}?> - <?php echo date('Y'); ?></span>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name="allowance"]').hide();
    $('#result1').hide();
    $('#allowance').on('click', function () {
        if ($(this).prop('checked')) {
            $('input[name="allowance"]').fadeIn();
        } else {
            $('input[name="allowance"]').hide();
        }
    });
  });
</script>
<script type="text/javascript">
  $('#submit').click(function(e){
      e.preventDefault();

      var bsalary = $('#bsalary').val();
     console.log(bsalary);


     if($("#allowance").is(':checked')){
       var amount  = $('#allowanceAmount').val();
      }
      else{
        var amount = "false";
      }
     if($("#heslb").is(':checked')){
       var heslb  = "true";
     }else{
       var heslb = "false";
     }
     $.ajax({
       url: "<?php echo base_url();?>welcome/process",
       method: "POST",
       dataType: "JSON",
       data: {bsalary:bsalary,amount:amount,heslb:heslb},
       encode: true,
     }).done(function (data) {
      console.log(data);

      if (!data.success) {
        if (data.errors.bsalary) {
          $("#bsalary").addClass("has-error");
          $("#bsalary").append(
            '<div class="help-block">' + data.errors.bsalary + "</div>"
          );
        }
        if (data.errors.amount) {
          $("#allowanceAmount").addClass("has-error");
          $("#allowanceAmount").append(
            '<div class="help-block">' + data.errors.amount + "</div>"
          );
        }
      } else {
        $('#result1').fadeIn();
        $("#result1").html(
          '<div class="col-md-3 alert alert-success">' + data.message + "</div>"
        );
      }

    });

  });
</script>
</body>
</html>
