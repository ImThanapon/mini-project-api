<?php

    //Calling API ด้วย file_get_contents()

    $get_data = file_get_contents('https://covid19.ddc.moph.go.th/api/Cases/today-cases-all');
    $json_data = json_decode($get_data);


    $new_case = $json_data[0]->new_case;
    $total_case = $json_data[0]->total_case;
    $new_death = $json_data[0]->new_death;
    $total_death = $json_data[0]->total_death;
    $new_recovered = $json_data[0]->new_recovered;
    $update_date = $json_data[0]->update_date;


    //Calling API ด้วย Library cURL

    $url = 'https://covid19.ddc.moph.go.th/api/Cases/today-cases-all'; 
    try{
        $ch = curl_init(); 
        curl_setopt( $ch, CURLOPT_URL, $url );  
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec( $ch );
        curl_close($ch);
        $data = json_decode($content);
        
        $curl_new_case = $data[0]->new_case;
        $curl_total_case = $data[0]->total_case;
        $curl_new_death = $data[0]->new_death;
        $curl_total_death = $data[0]->total_death;
        $curl_new_recovered = $data[0]->new_recovered;
        
    }catch(Exception $ex){
        echo $ex;
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Covid API</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0-rc/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container brand">
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="JS_Calling_API.html" class="nav-link">JavaScript</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="PHP_Calling_API.php" class="nav-link">PHP</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="covid_api.php" class="nav-link">Covid</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Today Covid 2019 <small>Calling API <br><b> <?php echo $update_date ?></b></small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                                <span class="info-box-text">ผู้ป่วยสะสม</span>
                                <span class="info-box-number"><br><h1><?php echo number_format($total_case) ?></h1> ราย</span></span>
                            <!-- /.col -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                
                <div class="container">
                
                    <!-- widgets -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-bed"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">ผู้ติดเชื้อใหม่</span>
                                <span class="info-box-number"><?php echo number_format($new_case) ?></span>                                
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-smile"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">รักษาหาย</span>
                                <span class="info-box-number"><?php echo number_format($new_recovered) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-dizzy"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">ผู้เสียชีวิต</span>
                                <span class="info-box-number"><?php echo number_format($new_death) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-book-dead"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">เสียชีวิตสะสม</span>
                                <span class="info-box-number"><?php echo number_format($total_death) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        
                    </div>
                    <!-- /.row -->
                    <div class="text-right">
                        เรียก API ด้วยฟังก์ชัน <b>file_get_contents()</b>  <br>
                    </div>
                   
                    <!-- end widgets -->




                    <!-- widgets -->
                    <div class="row mt-5">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-bed"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">ผู้ติดเชื้อใหม่</span>
                                <span class="info-box-number"><?php echo number_format($curl_new_case) ?></span>                                
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-smile"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">รักษาหาย</span>
                                <span class="info-box-number"><?php echo number_format($curl_new_recovered) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-dizzy"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">ผู้เสียชีวิต</span>
                                <span class="info-box-number"><?php echo number_format($curl_new_death) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fas fa-book-dead"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">เสียชีวิตสะสม</span>
                                <span class="info-box-number"><?php echo number_format($curl_total_death) ?></span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        
                    </div>
                    <!-- /.row -->
                    <div class="text-right">
                        เรียก API ด้วย <b>cURL Library</b>  <br>
                    </div>
                   
                    <!-- end widgets -->
 
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
</body>
</html>