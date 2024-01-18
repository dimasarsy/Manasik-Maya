@extends('layouts.admin-dashboard.index')
@section('midtrans')
    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-equzoUybFDg0QXTm"></script> --}}
  
@endsection
@section('content')
@include('layouts.admin-dashboard.navbar')

@include('layouts.admin-dashboard.sidebar')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <button class="btn btn-primary" id="pay-button">Pay!</button>

    <form action="" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{$snap_token}}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              console.log(result);
              send_response_to_form(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              console.log(result);
              send_response_to_form(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              console.log(result);
              send_response_to_form(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });

        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }
    </script>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('layouts.admin-dashboard.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
@include('layouts.admin-dashboard.script')

