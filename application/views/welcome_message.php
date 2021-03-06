<body>
<div class="container">
  <div class="row">
    <img src="<?php echo base_url('assets/img/logo.png');?>"><br><br>
    <div class="row">
      <div class="col-md-2">
        <a id="home" class="btn btn-default" href="#">Home</a>
      </div>
      <div class="col-md-3">
       <a class="btn btn-default" id="personalNav" href="#">Staff Personal Loan</a>
      </div>
      <div class="col-md-3">
        <a class="btn btn-default" id="collaNav" href="#">Collateral Loan</a>
      </div>
    </div>
    <div class="panel panel-body">
      <div class="container row" id="net">
         <form id="calculator" autocomplete="off">
           <h1 class="lead">Calculate Net Salary Amount:</h1>
           <div class="form-group col-md-3">
             <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              maxlength="10" id="bsalary" class="form-control form-control-sm" type="number" name="bsalary" placeholder="Basic Salary Amount">
           </div>
           <div class="form-check col-md-1">
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
           <div class="form-check col-md-1">
             <input id="tuico" class="form-check-input" type="checkbox">
             <label class="form-check-label" for="tuico">
               TUICO / FIBUKA
             </label>
           </div>
           <div class="form-group col-md-3">
             <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              maxlength="11"  id="allowanceAmount" class="form-control form-control-sm" type="number" name="allowance" placeholder="Allowance Amount">
           </div>
           <div class="form-group col-md-3">
             <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
              maxlength="11" placeholder="Heslb Amount" id="heslbAmount" type="number" class="form-control form-control-sm" name="heslb">
           </div>
           <div class="form-group col-md-3">
             <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
              maxlength="11" placeholder="TUICO/FIBUKA" id="tuicoamount" type="number" class="form-control form-control-sm" name="tuico">
           </div>
           <button id="submit" type="submit" class="btn btn-primary">Submit</button>
         </form>
        <div class="container row">
          <div class="col-md-3">
            <p id="resultTitle"><strong>Net Payment Salary Amount:</strong></p>
            <input readonly="" id="result1" class="form-control form-control-sm" type="text" name="" value=""><br>
            <button class="btn btn-success" id="copy" onclick="myFunction()">Copy Amount</button>
          </div>
        </div><br>
        <div class="col-md-3 mt-5">
            <a href="/calculator/" class="btn btn-danger"><i class="fas fa-sync-alt"></i>Refresh</a>
          </div>
      </div>
      <!-- End NetPayment Calculator Form -->
      <div class="container row" id="personal">
        <form id="pcalculator" autocomplete="off">
          <h1 class="lead">Generate Loan Annuity:-</h1>
          <div class="form-group col-md-6">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
             maxlength="11" id="netSalary" class="form-control form-control-sm" type="number" name="net" placeholder="Enter Net Salary Amount">
          </div>
          <div class="form-group col-md-6">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
             maxlength="11" id="loan" class="form-control form-control-sm" type="number" name="loan" placeholder="Enter Loan Amount">
          </div>
          <div class="form-group col-md-3">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
            maxlength="2" id="maturity" class="form-control form-control-sm" type="number" name="maturity" placeholder="Maturity in [Months]">
          </div>
          <button id="submitp" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="container row">
          <div id="result" class="col-md-3">
            <label>Maximum Loan Amount:</label>
            <input class="form-control form-control-sm" id="maximumLoan" type="number" readonly="" name="" value="">
          </div>
          <div id="resultm" class="col-md-3">
            <label>Maximum 40% of Net Pay:</label>
            <input class="form-control form-control-sm" id="maximumInstall" type="number" readonly="" name="" value="">
          </div>
          <div id="resulta" class="col-md-3">
            <label>Annuity:</label>
            <input class="form-control form-control-sm" id="annuity" type="number" readonly="" name="" value="">
          </div>
        </div>
      </div>
      <div class="container row" id="colla">
        <form id="cocalculator" autocomplete="off">
          <h1 class="lead">Generate Collateral Loan Annuity:-</h1>
          <div class="form-group col-md-6">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
             maxlength="11" id="netco" class="form-control form-control-sm" type="number" name="netco" placeholder="Enter Net Salary Amount">
          </div>
          <div class="form-group col-md-6">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
            maxlength="11" id="loanco" class="form-control form-control-sm" type="number" name="loanco" placeholder="Enter Loan Amount">
          </div>
          <div class="form-group col-md-3">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
            maxlength="2" id="maturityco" class="form-control form-control-sm" type="number" name="maturityco" placeholder="Maturity in [Months]">
          </div>
          <button id="submitco" type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="container row">
          <div id="resultma" class="col-md-3">
            <label>Maximum Loan Amount:</label>
            <input  class="form-control form-control-sm" id="a" type="number" readonly="" name="" value="">
          </div>
          <div id="resultmx" class="col-md-3">
            <label>Maximum 40% of Net Pay:</label>
            <input class="form-control form-control-sm" id="b" type="number" readonly="" name="" value="">
          </div>
          <div id="resultann" class="col-md-3">
            <label>Annuity:</label>
            <input class="form-control form-control-sm" id="c" type="number" readonly="" name="" value="">
          </div>
        </div>
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
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name="allowance"]').hide();
    $('#result1').hide();
    $('#resultm').hide();
    $('#resultma').hide();
    $('#resultmx').hide();
    $('#resultann').hide();
    $('#resulta').hide();
    $('#result').hide();
    $('#personal').hide();
    $('#colla').hide();
    $('#copy').hide();
    $('#resultTitle').hide();
    $('#result').hide();
    $('#heslbAmount').hide();
    $('#tuicoamount').hide();

    $('#allowance').on('click', function () {
        if ($(this).prop('checked')) {
            $('input[name="allowance"]').fadeIn();
        } else {
            $('input[name="allowance"]').hide();
        }
    });

    $('#tuico').on('click', function () {
        if ($(this).prop('checked')) {
            $('#tuicoamount').fadeIn();
        } else {
            $('#tuicoamount').hide();
        }
    });

    $('#home').on('click',function(){
      $('#net').fadeIn();
      $('#colla').hide();
      $('#personal').hide();
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
  $('#submitco').click(function(e){
    e.preventDefault();

    var net = $('#netco').val();
    var loan = $('#loanco').val();
    var maturity = $('#maturityco').val();

    console.log(net);

    console.log(loan);

    console.log(maturity);

    $.ajax({
        url: "<?php echo base_url();?>welcome/collateral",
        method: "POST",
        dataType: "JSON",
        data: {net:net,loan:loan, maturity:maturity},
        encode: true,
    }).done(function(data){
      if(data.success){
        $('#cocalculator').hide();
        $('#resultma').fadeIn();
        $('#resultmx').fadeIn();
        $('#resultann').fadeIn();

        document.getElementById('a').value = data.maximumLoan;
        document.getElementById('b').value = data.maximumInstall;
        document.getElementById('c').value = data.annuity;
      }else{
        $('#cocalculator').hide();
        $('#resultma').fadeIn();
        $('#resultma').append(
          '<div class="alert alert-danger">'+data.message+"</div>"
        );
      }
    });
  });
</script>
<script type="text/javascript">
  $('#submitp').click(function(e){
    e.preventDefault();

    var net = $('#netSalary').val();
    var loan = $('#loan').val();
    var maturity = $('#maturity').val();

    console.log(net);

    console.log(loan);

    $.ajax({
        url: "<?php echo base_url();?>welcome/generate",
        method: "POST",
        dataType: "JSON",
        data: {net:net,loan:loan,maturity:maturity},
        encode: true,
    }).done(function(data){
        if (!data.success) {
          if (data.errors.net) {
            $("#net").addClass("has-error");
            $("#net").append(
              '<div class="help-block">' + data.errors.net + "</div>"
            );
          }
          if (data.errors.loan) {
            $("#loan").addClass("has-error");
            $("#loan").append(
              '<div class="help-block">' + data.errors.loan + "</div>"
            );
          }
        }else{
            $('#pcalculator').hide();
            $('#result').fadeIn();
            $('#resulta').fadeIn();
            $('#resultm').fadeIn();
            document.getElementById('maximumLoan').value = data.maximumLoan;
            document.getElementById('maximumInstall').value = data.maximumInstall;
            document.getElementById('annuity').value = data.annuity;
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

      if($("#tuico").is(':checked')){
        var tuico  = $('#tuicoamount').val();
       }
       else{
         var tuico = "false";
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
       data: {bsalary:bsalary,amount:amount,tuico:tuico,heslb:heslb},
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
      } 
      else {

        $('#calculator').hide();
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
