<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["username"])){

    header("LOCATION: /index.php");

}
include('include/database.php');

if(isset($_POST['bill']))
{
    $sql = "SELECT * FROM student WHERE sid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    
    while($row = $result->fetch_array())
    {

    $stdid = $row["sid"];
    $stdname = $row["sname"];
    $stdroll = $row["roll"];
    $stdhname = $row["hname"];
    $stdroomno = $row["RoomNo"];
    $stdtotpaymnt = $row["TotalPayment"];
    $stdpaymntdone = $row["Paymentdone"];
    $stdcurrpaymnt = $row["Currentpayment"];
    $date = $row["Cpaydate"];
    $time = $row["Cpaytime"];

    }
}

    // $decode_simple = json_decode($Json_item,true);

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-right mb-3 mt-5 ">

                    <div class="col-md-12 text-right">
                        <a href="dashboard.php" value="" class="btn btn-success float-left"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
                        <button class="btn btn-primary mx-2 float-left" id="download"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
                        
                    </div>
                   
                </div>
            </div>
        </div>

        <!-- pdf -->

        <div class="container" id="invoice">

            <div class="row">

                <div class="col-6">
                    <div class="card">
                        <div class="card-body p-0 ">
                            <div class="row py-2 px-3">
                                <div class="col-md-6">
                                <img src="img/logo.png" style="width: 150px; height:60px;">
                                </div>
                                <div class="col-md-6 text-right">
                                <p class="text-dark font-weight-bold">Date: <?php echo $date; ?></p>
                                </div>
                            </div>

                            <hr class="my-5">

                            <div class="row pb-0 px-3">
                                <div class="col-md-6">
                                    <p class="font-weight-bold mb-4"><?php echo  date("Y/m/d"); ?></p>
                                    <p class="font-weight-bold mb-4">Student Information</p>
                                    <p class="mb-1 ">student ID: <span class="font-weight-bold"><?php echo $stdid; ?></span></p>
                                    <p class="mb-1">Name: <span class="font-weight-bold"><?php echo $stdname; ?></span></p>
                                    <p class="mb-1 ">Roll No: <?php echo $stdroll; ?></p>
                                    <p class="mb-1 ">Hostel Name: <?php echo $stdhname; ?></p>
                                    <p class="mb-1 ">Room No: <?php echo $stdroomno; ?></p>
                                    <p class="mb-1 ">Last payment date: <?php echo $date; ?></p>
                                    <p class="mb-1 ">Last payment time: <?php echo $time; ?></p>
                            

                                </div>

                            </div>

                            <div class="row p-2">
                                <div class="col-md-12">
                                    <!-- table -->
                                    <table class="table ">
                                       <thead>
                                                <th>Total Payment</th>
                                                <th>Payment Received </th>
                                                <th>last Payment</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $stdtotpaymnt; ?></td>
                                                <td><?php echo $stdpaymntdone; ?></td>
                                                <td><?php echo $stdcurrpaymnt; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- av -->
        <script>
            window.onload = function () {
                document
                    .getElementById("download")
                    .addEventListener("click", () => {
                        const invoice = this
                            .document
                            .getElementById("invoice");
                        console.log(invoice);
                        console.log(window);

                        var opt = {
                            margin: 0,
                            filename: 'receipt.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 1
                            },
                            html2canvas: {
                                scale: 1
                            },
                            jsPDF: {
                                unit: 'mm',
                                format: 'a4',
                                orientation: 'portrait'
                            }
                        };
                        html2pdf()
                            .from(invoice).set(opt).save();
                    })
            }
        </script>

        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>
</html>