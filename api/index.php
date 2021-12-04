<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calling API</title>

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
<body class="hold-transition">
    <div class="warpper">
        <!-- Navbar -->
        <nav class="ml-3 navbar navbar-expand navbar-white navbar-light">
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
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            </ul>
        </nav>
        <!-- /.navbar -->
    </div>
    <div class="login-page">
        <div class="">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-body text-center">
                <div class="mb-3">
                    <a class="h1"><b>Admin</b>LTE</a>
                </div>
                <div class="mt-1 d-flex justify-content-between">
                <button onclick="callAPI()" class="mr-2 btn btn-primary ">Calling API</button><br>
                <button onclick="callAPItoTable()" class="btn btn-warning btn-block">Calling API to Table</button>
                </div>
                

                <table class="mt-3 table table-sm">
                  <thead id='htable'>

                  </thead>
                  <tbody id='info'>
                    
                  </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>

    </div>        
    <!-- /.login-box -->
    <!-- เรียกใช้ API ด้วย PHP -->
    <?php
        //set map api url
        $url = "http://localhost/DEENA/api-project/api/employee.php";

        //เรียกใช้ function file_get_contents ใช้ดึงข้อมูลรูปแบบ String จากไฟล์ หรือ url 
        $array = file_get_contents($url);
        $json = json_decode($array);
        echo $array;
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    function callAPI() {
        axios.get("http://localhost/DEENA/api-project/api/service/employee.php").then(res => {
            let data_api = JSON.stringify(res.data);
            Swal.fire({
                title: '<strong>Data in format <u>JSON</u></strong>',
                icon: 'info',
                html: data_api,
                showCloseButton: true
            })
            console.log(data);

        }).catch(error => {
            console.log(error);
        })
    }

    function callAPItoTable(){
        document.getElementById('htable').innerHTML = 
            '<tr>'+
                '<th>#</th>'+
                '<th>ชื่อ</th>'+
                '<th>สกุล</th>'+
                '<th>Email</th>'+
            '</tr>';
        let d;
        let request = new XMLHttpRequest(); 
        request.open('GET','http://localhost/DEENA/api-project/api/service/employee.php')
        request.send();
        request.onload = () => {
            if(request.status === 200){
               d = JSON.parse(request.response);
                console.log(d)
            }else{
                console.log('error ${request.status} ${request.statusText}');
            }

            for (let i = 0; i < d.length; i++) {
                    document.getElementById('info').innerHTML += 
                        '<tr>'+
                            '<td>'+ d[i].id +'</td>'+
                            '<td>'+ d[i].first_name +'</td>'+
                            '<td>'+ d[i].last_name +'</td>'+
                            '<td>'+ d[i].email_address +'</td>'+
                        '</tr>';
            }

        }
        document.getElementById('info').innerHTML ='';
    }

    </script>

    
    
</body>
</html>
