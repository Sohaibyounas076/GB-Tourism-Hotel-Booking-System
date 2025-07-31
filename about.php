<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us GB-Tourism</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f8;
      color: #333;
    }
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
    .section {
      padding: 60px 20px;
    }
    .section-title {
      font-weight: 600;
      font-size: 2rem;
      color: #007bff;
      margin-bottom: 20px;
    }
    .card-style {
      border: none;
      border-left: 5px solid #007bff;
      background-color: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 30px;
      margin-bottom: 30px;
      border-radius: 10px;
    }
    ul li::marker {
      color: #007bff;
    }
    .footer {
      background-color: #fff;
      text-align: center;
      padding: 20px;
      font-size: 0.9rem;
      color: #777;
      border-top: 1px solid #ddd;
    }
  </style>
</head>
<body>

<div class="hero">
  <h1> About Us GB-Tourism</h1>
</div>

<div class="container section">
  <div class="card-style">
    <h2 class="section-title">Our Story</h2>
    <p>
      Gilgit Hostels was created with one goal in mind — to connect travelers with trusted, admin-approved accommodations in the beautiful region of Gilgit. 
      We personally review and verify each hostel listed on our platform to ensure quality, cleanliness, and excellent service. Whether you're a solo backpacker, a student, or a family explorer, we help you find the perfect place to stay.
    </p>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card-style">
        <h2 class="section-title">Our Mission</h2>
        <p>
          To make travel stress-free by offering a curated selection of safe, high-quality, and reliable hostel accommodations in Gilgit.
        </p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card-style">
        <h2 class="section-title">Our Vision</h2>
        <p>
          To become Pakistan’s leading hostel discovery platform for travelers by expanding our verified network beyond Gilgit and into other key tourist destinations.
        </p>
      </div>
    </div>
  </div>

  <div class="card-style">
    <h2 class="section-title">Why Choose Us?</h2>
    <ul>
      <li>Only admin-approved hostels are featured</li>
      <li>Focused on hygiene, safety, and comfort</li>
      <li>Authentic information with real hostel images</li>
      <li>Reviewed regularly for quality assurance</li>
      <li>Time-saving and trustworthy recommendations</li>
      <li>Built exclusively for tourists visiting Gilgit</li>
    </ul>
  </div>
</div>

<section class="container-fluid bg-light my-2">
  <?php $reviews = mysqli_query($conn, "SELECT * FROM reviews"); ?>
  <h1 class="text-center py-3">Testimonials</h1>
  <div class="row">
    <div class="col-md-8 mt-4">
      <div class="row text-center px-1">
        <?php while ($review = mysqli_fetch_assoc($reviews)) : ?>
          <div class="col-md-6 my-2 card">
            <div class="d-flex justify-content-center py-1">
              <img class="rounded-circle" src="<?php echo $review['user_pic']; ?>" width="150" height="150" />
            </div>
            <h5 class="my-2 card-title"><?php echo $review['name']; ?></h5>
            <p style="font-size: 16px;">
              <i class="fas fa-quote-left card-text"></i> <?php echo $review['comments']; ?>.
              <i class="fas fa-quote-right pe-2"></i>
            </p>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="col-md-4 mt-3">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center pt-3">Write Your Comments</h3>
          <form action="" method="POST" enctype="multipart/form-data" class="p-3">
            <div class="row pt-3">
              <div class="col-12">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control" name="comments" required></textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Upload Your Pic</label>
                  <input type="file" class="form-control" name="user">
                </div>
              </div>
              <div class="col-12 my-2">
                <button class="btn btn-primary w-100" type="submit" name="add_reviews">Submit</button>
              </div>
              <?php
              if (isset($_POST['add_reviews'])) {
                $rname = $_POST['name'];
                $rcomments = $_POST['comments'];

                $pic_filename = $_FILES["user"]["name"];
                $pic_tempname = $_FILES["user"]["tmp_name"];
                $pic = "images/" . $pic_filename;
                move_uploaded_file($pic_tempname, $pic);

                $query = "INSERT INTO reviews(name, comments, user_pic) VALUES('$rname', '$rcomments', '$pic')";
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
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
