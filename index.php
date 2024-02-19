<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Login Page</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
  <!-- Vendor CSS Files -->
  <link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets1/vendor/quill/quill.snow.css" rel="stylesheet" />
  <link href="assets1/vendor/quill/quill.bubble.css" rel="stylesheet" />
  <link href="assets1/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets1/vendor/simple-datatables/style.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets1/css/style.css" rel="stylesheet" />
  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      background-color: #8BC6EC;
      background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);

    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
</head>

<body>
  <main>
    <section class="h-100 gradient-form" style="background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">

                    <div class="text-center">
                      <p>WELCOME TO </p>


                      <h4 class="mt-1 mb-5 pb-1">CITE CLEARANCE</h4>
                    </div>

                    <form action="process.php" method="POST">

                      <div class="input-group mb-3">

                        <select name="user_type" class="form-select" required>
                          <option value="">--Login As</option>
                          <option value="Admin">Admin</option>
                          <option value="Students">Students</option>
                          <option value="Librarian">Librarian</option>
                          <option value="Gsd">Gsd</option>
                          <option value="Csdl">Csdl</option>
                          <option value="Registrar">Registrar</option>
                          <option value="College Dean">College Dean</option>
                          <option value="Finance">Finance</option>
                        </select>
                      </div>
                      <div class="form-outline mb-4">
                        <label class="form-label px-2" for="form2Example11">Email</label>
                        <input type="email" name="admin_email" id="form2Example11" class="form-control" placeholder="Email"  />

                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label px-2" for="form2Example22">Password</label>
                        <input type="password" name="admin_pass" id="pwd" class="form-control" placeholder="Password"  />
                        <input class="px-2" type="checkbox" onclick="showpwd()"> Showpassword
                        <script>
                          function showpwd() {
                            var y = document.getElementById('pwd');
                            if (y.type === "password") {
                              y.type = "text";
                            } else {
                              y.type = "password";
                            }
                          }
                        </script>
                      </div>

                      <div class="text-center pt-1 mb-5 pb-1">
                        <button name="login" class="btn btn-block fa-lg gradient-custom-2 mb-3 form-control rounded-pill" type="submit">Log
                          in</button><br>
                        <a class="text-muted" href="#!" data-bs-toggle="modal" data-bs-target="#registration">Create Account</a>

                        

                      </div>
                      </form>

                      <div class="modal" id="registration" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Create Account</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="process.php" method="POST">
                              <div class="modal-body">
                                <div class="row">

                               

                                  <div class="col-6 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-123"></i></div>
                                      <input class="form-control" type="text" name="id_number" id="" placeholder="ID Number" required >
                                    </div>
                                  </div>

                                  <div class="col-6 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-person"></i></div>
                                      <input class="form-control" type="text" name="lastname" id="" placeholder="Lastname" required>
                                    </div>
                                  </div>

                                  <div class="col-6 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-person"></i></div>
                                      <input class="form-control" type="text" name="firstname" id="" placeholder="Firstname" required>
                                    </div>
                                  </div>
                                  
                                  <div class="col-6 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-phone"></i></div>
                                      <input class="form-control" type="text" name="contact" id="" placeholder="Contact" required>
                                    </div>
                                  </div>
                                  <div class="col-12 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                      <input class="form-control" type="email" name="email" id="" placeholder="Email" required>
                                    </div>
                                  </div>

                                  <div class="col-12 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-building"></i></div>
                                      <select class="form-select" required name="department">
                                        <option value="">--Select Department</option>
                                        <option value="College of Information Technology">College of Information Technology</option>
                                        <option value="College of Education">College of Education</option>
                                      
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-12 mb-3">
                                    <div class="input-group ">
                                      <div class="input-group-text"><i class="bi bi-person"></i></div>
                                      <input type="text" name="course" class="form-control" placeholder="Enter Course" required>
                                    </div>
                                  </div>
                                


                                  <div class="col-12 mb-3">
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-key"></i></div>
                                      <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
                                    </div>
                                    <input type="checkbox" onclick="showpass()">Showpassword
                                  </div>
                                 
                               

                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="add_students" class="btn btn-primary" value="Create Account">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

              

                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center d-flex justify-content-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <center> <img class="mb-2" src="img/uilogo.png" style="width: 75px;height:75px;" alt="logo"></center>
                    <h4 class="mb-4 d-flex align-items-center justify-content-center">CITE CLEARANCE</h4>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
   
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets1/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/vendor/chart.js/chart.umd.js"></script>
  <script src="assets1/vendor/echarts/echarts.min.js"></script>
  <script src="assets1/vendor/quill/quill.min.js"></script>
  <script src="assets1/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets1/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets1/vendor/php-email-form/validate.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Template Main JS File -->
  <script src="assets1/js/main.js"></script>
  <script>
    function showPass4() {
      var x = document.getElementById("pass4");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <?php
  if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
    echo $_SESSION['status'];
  ?>
    <script>
      Swal.fire({
        icon: '<?php echo $_SESSION['status_code']; ?>',
        title: '<?php echo $_SESSION['status']; ?>',
        button: 'Ok'
      })
    </script>
  <?php
    unset($_SESSION['status']);
  }
  ?>

</body>

</html>