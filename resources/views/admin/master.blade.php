<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.png')}}"/>
  
  <title>Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/admin/sb-admin.css')}}" rel="stylesheet">

  @stack('styles')

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{url('admin')}}">Admin Panel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome,&nbsp <strong>{{Auth::user()->name}}</strong>
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/product">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Product</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/sale">
          <i class="fas fa-fw fa-percent"></i>
          <span>Sale</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/order">
          <i class="fas fa-fw fa-dolly-flatbed"></i>
          <span>Order</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/slider">
          <i class="fas fa-fw fa-images"></i>
          <span>Slider</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/cover">
          <i class="fas fa-fw fa-th-large"></i>
          <span>Cover</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/manage">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

  @yield('content')


 </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" to end your session on the admin panel.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>


  @stack('scripts')

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->

  <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/admin/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('js/admin/demo/datatables-demo.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable2').DataTable();
        $('#dataTable3').DataTable();
    });
  </script>

  <script>
    $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

  </script> 

<script type="text/javascript">
  $(document).ready(function(){
    $("#sizeSelectBox").change(function(){
      $('#helper').hide(200);
      if($(this).val() == "bottom"){

        if ($('#checkboxXS').is(':checked')) {
          $('#stockXS').show();
        }
        if ($('#checkboxS').is(':checked')) {
          $('#stockS').show();
        }
        if ($('#checkboxM').is(':checked')) {
          $('#stockM').show();
        }
        if ($('#checkboxL').is(':checked')) {
          $('#stockL').show();
        }
        if ($('#checkboxXL').is(':checked')) {
          $('#stockXL').show();
        }

        $('#forNONE').hide();
        $('#notNONE').show();
        $('#checkboxTop').show();
        $('#checkboxAcc').hide();
          
        $('#checkboxXS').change(function(){
            this.checked?$('#stockXS').show(200):$('#stockXS').hide(200); //time for show
        });
        $('#checkboxS').change(function(){
            this.checked?$('#stockS').show(200):$('#stockS').hide(200); //time for show
        });
        $('#checkboxM').change(function(){
            this.checked?$('#stockM').show(200):$('#stockM').hide(200); //time for show
        });
        $('#checkboxL').change(function(){
            this.checked?$('#stockL').show(200):$('#stockL').hide(200); //time for show
        });
        $('#checkboxXL').change(function(){
            this.checked?$('#stockXL').show(200):$('#stockXL').hide(200); //time for show
        });
      }
      else if($(this).val() == "top"){
        if ($('#checkboxXS').is(':checked')) {
          $('#stockXS').show();
        }
        if ($('#checkboxS').is(':checked')) {
          $('#stockS').show();
        }
        if ($('#checkboxM').is(':checked')) {
          $('#stockM').show();
        }
        if ($('#checkboxL').is(':checked')) {
          $('#stockL').show();
        }
        if ($('#checkboxXL').is(':checked')) {
          $('#stockXL').show();
        }

        $('#forNONE').hide();
        $('#notNONE').show();
        $('#checkboxTop').show();
        $('#checkboxAcc').hide();

        $('#checkboxXS').change(function(){
            this.checked?$('#stockXS').show(200):$('#stockXS').hide(200); //time for show
        });
        $('#checkboxS').change(function(){
            this.checked?$('#stockS').show(200):$('#stockS').hide(200); //time for show
        });
        $('#checkboxM').change(function(){
            this.checked?$('#stockM').show(200):$('#stockM').hide(200); //time for show
        });
        $('#checkboxL').change(function(){
            this.checked?$('#stockL').show(200):$('#stockL').hide(200); //time for show
        });
        $('#checkboxXL').change(function(){
            this.checked?$('#stockXL').show(200):$('#stockXL').hide(200); //time for show
        });
      }
      else if($(this).val() == "accessories"){
        $('#checkboxTop').hide();
        $('#notNONE').hide();
        $('#forNONE').show();
        $('#checkboxAcc').show();
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).on('click', '.show-modal-kirim', function() {
    $('#order_number').val($(this).data('id'));
  });
</script>

</body>
</html>
