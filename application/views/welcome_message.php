<body>
<div class="container">
  <div class="row">
    <img src="<?php echo base_url('assets/img/logo.png');?>">
    <div class="row">
      <div class="col-md-2">
        <a class="btn btn-default" href="/calculator/">Home</a>
      </div>
      <div class="col-md-3">
       <a class="btn btn-default" id="personalNav" href="#">Staff Personal Loan</a>
      </div>
      <div class="col-md-3">
        <a class="btn btn-default" id="collaNav" href="#">Collateral Loan</a>
      </div>
    </div>
    <div class="panel panel-body">
      <div class="row" id="net">
         <form id="calculator" autocomplete="off">
           <h1 class="lead">Calculate Net Salary Amount:</h1>
           <div class="form-group col-md-6">
             <input id="bsalary" class="form-control form-control-sm" type="number" name="bsalary" placeholder="Basic Salary Amount">
           </div>
           <div class="form-check col-md-1 mt-1">
             <input id="allowance" class="form-check-input" type="checkbox">
             <label class="form-check-label" for="allowance">
               Allowance
             </label>
           </div>
           <div class="form-check col-md-1">
             <input id="heslb" class="form-check-input" type="checkbox">
             <label class="form-check-label" for="heslb">
               Heslb
             </label>
           </div>
           <div class="form-group col-md-3">
             <input  id="allowanceAmount" class="form-control form-control-sm" type="number" name="allowance" placeholder="Allowance Amount">
           </div>
           <div class="form-group col-md-3">
             <input placeholder="Heslb Amount" id="heslbAmount" type="number" class="form-control form-control-sm" name="heslb">
           </div>
           <button id="submit" type="submit" class="btn btn-primary">Submit</button>
         </form>
        <div class="row">
          <div class="col-md-3">
            <p id="resultTitle"><strong>Net Payment Salary Amount:</strong></p>
            <input readonly="" id="result1" class="form-control form-control-sm" type="text" name="" value=""><br>
            <button class="btn btn-success" id="copy" onclick="myFunction()">Copy Amount</button>
          </div>
        </div>
      </div>
      <!-- End NetPayment Calculator Form -->
      <div class="row" id="personal">
        <p>Personal what what</p>
      </div>
      <div class="row" id="colla">
        <p>Colateral</p>
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
  function myFunction() {
    var copyText = document.getElementById("result1");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("Copied the Amount: " + copyText.value);
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name="allowance"]').hide();
    $('#result1').hide();
    $('#personal').hide();
    $('#colla').hide();
    $('#copy').hide();
    $('#resultTitle').hide();
    $('#heslbAmount').hide();

    $('#allowance').on('click', function () {
        if ($(this).prop('checked')) {
            $('input[name="allowance"]').fadeIn();
        } else {
            $('input[name="allowance"]').hide();
        }
    });

    $('#personalNav').on('click',function(){
      $('#net').hide();
      $('#colla').hide();
      $('#personal').fadeIn();
    });

    $('#collaNav').on('click',function(){
      $('#net').hide();
      $('#personal').hide();
      $('#colla').fadeIn();
    });


    $('#heslb').on('click', function(){
        if($(this).prop('checked')){
          $('#heslbAmount').fadeIn();
        }else{
          $('#heslbAmount').hide();
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
       var heslb  = $('#heslbAmount').val();
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
        $('#resultTitle').fadeIn();
        $('#result1').fadeIn();
        $('#copy').fadeIn();
        document.getElementById("result1").value = data.result;
      }

    });

  });
</script>
</body>
</html>
