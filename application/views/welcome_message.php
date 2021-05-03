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
          <input id="heslb" class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Heslb
          </label>
        </div>
        <div class="form-check col-md-1 mt-1">
          <input id="allowance" class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">
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
    $(function () {
        $('input[name="allowance"]').hide();
        $('#result1').hide();
        $('#allowance').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="allowance"]').fadeIn();
            } else {
                $('input[name="allowance"]').hide();
            }
        });

        $(document).ready(function(){

          $('#submit').click(function(e){
            e.preventDefault();

            var bsalary = $('#bsalary').val();

            if($("#allowance").is(':checked')){
              var amount  = $('#allowanceAmount').val();
            }
            if($("#heslb").is(':checked')){
              var heslb  = "true";
            }
          });

        });
      });
</script>
</body>
</html>
