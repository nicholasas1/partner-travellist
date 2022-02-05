<?php include 'include/session.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TRAVELLIST | Withdraw</title>
    <link rel="icon" href="include/img/logo.png" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include 'include/header.php'; ?>
    <?php include 'include/sidebar.php'; ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Withdraw</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Withdraw</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php
        if (isset($_POST['table_search'])) {
            $status = $_POST['table_search'];
        }
        $api = "https://api.travellist.id/partner-ballance.php?user_id=1&status=$status";
        $json = file_get_contents($api);
        $data = json_decode($json);
        $ballance = floatval($data->balance);
        ?>

        <div class="small-box bg-info" style="margin: 11px;">
            <div class="inner">
                <p>Ballance</p>
                <h3>Rp. <?php echo  number_format($ballance, 0, ',', '.') ?></h3>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <form action="" method="post">
                                        <select name="table_search" class="form-control float-right">
                                            <option value="">All</option>
                                            <option value="wc-completed">Complate</option>
                                            <option value="wc-on-hold">On Hold</option>
                                            <option value="approved">Withdraw Approve</option>
                                            <option value="wc-cancel">Cancel</option>
                                        </select>
                                        <div class="input-group-append">
                                            <input type="submit" name="Submit" value="Filter">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Date</th>
                                        <th>Keterangan</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data->result as $des) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $des->date ?></td>
                                            <td><?php echo $des->keterangan ?></td>
                                            <td><?php echo $des->debit ?></td>
                                            <td><?php echo $des->credit ?></td>
                                            <td><?php echo $des->status ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>



                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Withdraw</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                                <span style="font-weight: bold;">Minimal</span> Saldo untuk di tarik adalah <span style="font-weight: bold;"> Rp. 10.000</span>
                                </br>
                                <span style="font-weight: bold;">Maximal</span> Penarikan Saldo adalah <span style="font-weight: bold;">Rp. 10.000 </span>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Jumlah</label>
                                <input type="number" id="inputName" class="form-control" min="10000" max="30000">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Metode</label>
                                <select name="methid" id="" class="form-control">
                                    <option value="bank">Bank Transfer</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary">Primary</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Withdraw Transaction</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Request
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> Approve
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option3" autocomplete="off"> Cancel
                                    </label>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $api2 = "https://api.travellist.id/withdraw_list.php?user_id=$user_id&status=0";
                                    $json2 = file_get_contents($api2);
                                    $transaction = json_decode($json2);
                                    foreach ($transaction->result as $data) {
                                        $amount = floatval($data->amount);
                                    ?>
                                        <tr>
                                            <td><?php echo $data->date ?></td>
                                            <td>Rp. <?php echo number_format($amount, 0, ',', '.') ?></td>
                                            <td><?php echo $data->method ?></td>
                                            <td><?php echo $data->status ?></td>
                                            <td>
                                                <?php
                                                if ($data->status_id == 0) { ?>
                                                    <form action="" method="post" onclick="delete(1)">
                                                        <button type="submit" name="delete">
                                                            <i class="fas fa-minus-circle"></i>
                                                        </button>
                                                    </form>
                                                <?php
                                                }
                                                function delete($id) {
                                                    $url = 'https://api.travellist.id/withdraw-cancel-request.php?id=$id';
                                                    $options = array(
                                                        'http' => array(
                                                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                                            'method'  => 'POST',
                                                            'content' => http_build_query()
                                                        )
                                                    );
                                                    $context  = stream_context_create($options);
                                                    $result = file_get_contents($url, false, $context);
                                                    if ($result === FALSE) { /* Handle error */
                                                    }

                                                    var_dump($result);
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>