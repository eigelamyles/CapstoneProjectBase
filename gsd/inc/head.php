<?php include '../conn.php';
    session_start();
    if(empty($_SESSION))
    {
        ?>
            <script>
                alert("Session Expired");
                location.href='../index.php';
            </script>
        <?php 
    }
    else{
        $e = $_SESSION['email'];
        $get_teach = mysqli_query($conn, "SELECT * FROM tbl_accounts WHERE email='$e' AND status='Guidance'");
        while($teach = mysqli_fetch_object($get_teach))
        {
            $lastname =  $teach->lastname;
            $firstname = $teach->firstname;
            $address = $teach->address;
            $email = $teach->email;
            $password = $teach->password;
            $profile = $teach->profile;
            $usertype = $teach->status;
            $id_no = $teach->id_no;
            $phone = $teach->contact;
            $id = $teach->id;
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <!-- bootstrap 5 icons cdn-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- data tables -->
<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.8.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.js"></script>
 <!-- Script -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Country change
            $(".sel_country").change(function() {

                // Selected country id
                var country_id = $(this).val();
                $.ajax({
                    url: "ajaxfile.php",
                    method: "POST",
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $(".sel_state").html(data);
                    }

                });
            });

            // State change
            $('#sel_state').change(function() {

                // Selected state id
                var state_id = $(this).val();

                // Empty city dropdown
                $('#sel_city').find('option').not(':first').remove();

                // Fetch state cities
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {
                        request: 'getStateCities',
                        state_id: state_id
                    },
                    dataType: 'json',
                    success: function(response) {

                        var len = response.length;

                        // Add data to city dropdown
                        for (var i = 0; i < len; i++) {
                            var city_id = response[i]['id'];
                            var city_name = response[i]['name'];

                            $("#sel_city").append("<option value='" + city_id + "' >" + city_name + "</option>");

                        }
                    }
                });

            });
        });
    </script>
<style>
  #calendar {
    max-width: 1100px;
    margin: 0 auto;
    height: 100vh;
 
  }

</style>

</head>


<body>