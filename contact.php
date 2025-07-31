<?php include("header.php"); ?>
<style type="text/css">
  .hero {
      background: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 600;
    }
</style>
<div class="hero">
  <h1>Contact Us  GB-Tourism</h1>
</div>

<section class="container-fluid bg-light my-3 py-5">
    <h2 class="text-center">Lets Get Conected With Us</h2>
    <div class="row py-5">
    <div class="col-md-6 mt-5">
        <h3 class="px-5 font-weight-bold">Send Us A Message</h3>
            <p class="px-5 py-2" style="font-size:17px;">Let us know about your queries and we will get back to you with a complete packages. Get ready to see the results you desire.</p>
            <ul style="font-size:21px; list-style: none;">
               
                <li class="py-1">
                        <i class="fa fa-envelope-square" aria-hidden="true"></i>  <span>Info@admingbtourism</span>
                    </li>
                    <li class="py-1" >
                       <i class="fa fa-phone-square" aria-hidden="true"></i> <span>+9203123456</span>
                    </li>
                
            </ul>
            </div>
<div class="col-md-6 ">
  <form action="" method="POST" enctype="multipart/form-data">
        <div class="row  py-3 mr-2 card" >
          <div class="col-12 ">
                <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
                            </div>
                        </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="Email"  placeholder="Enter Your Email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Massage</label>
                            <input type="text" placeholder="Enter Your Massage" class="form-control" name="massage" required>
                        </div>
                    </div>
                    <div class="col-12 my-2 ">
                        <button class="btn btn-primary w-100" type="submit" name="add-contact">Submit</button>
                    </div>
                    <?php
if (isset($_POST['add-contact'])) {
    $cname = $_POST['name'];
    $cemail = $_POST['email'];
    $csmg = $_POST['massage'];
    $query = "INSERT INTO contact(name, email, massage) 
              VALUES('$cname', '$cemail', '$csmg')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<div class="alert alert-info" role="alert">Form submitted successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error</div>';
    }
}
?>

                </div>
    </form>
  </div>
  </div>
</section>