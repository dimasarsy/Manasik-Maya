<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= asset('assets/img/logo1.png') ?>" rel="icon">
    <link href="<?= asset('assets/img/logo1.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= asset('admin-dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('admin-dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= asset('admin-dashboard/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('admin-dashboard/assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= asset('admin-dashboard/assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= asset('admin-dashboard/assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= asset('admin-dashboard/assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= asset('admin-dashboard/assets/css/style.css') ?>" rel="stylesheet">

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-equzoUybFDg0QXTm"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

</head>

<body>
    @yield('content')

</body>

</html>
