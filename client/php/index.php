<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garment Website</title>
  <link rel="stylesheet" href="../styles/style.css">
  <!-- <script src="script.js"></script> -->
</head>
<body>
  <?php include './client/includes/header.php'; ?>

  <main>
    <section class="hero">
      <h1>Welcome to our Garment Website</h1>
      <p>Discover the latest trends in fashion.</p>
      <a href="#products" class="btn">View Products</a>
    </section>

    <section id="products" class="products">
      <h2>Our Products</h2>
      <div class="product-container">
        <?php include 'db_connection.php';

        // Fetch products from the database
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          $name = $row['name'];
          $image = $row['image'];
          $price = $row['price'];

          echo '<div class="product">';
          echo '<img src="images/' . $image . '" alt="' . $name . '">';
          echo '<h3>' . $name . '</h3>';
          echo '<p>$' . $price . '</p>';
          echo '</div>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
      </div>
    </section>

    <section class="testimonials">
      <h2>Testimonials</h2>
      <div class="testimonial-container">
        <div class="testimonial">
          <img src="images/avatar1.jpg" alt="Testimonial Avatar">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
          <h4>John Doe</h4>
        </div>
        <div class="testimonial">
          <img src="images/avatar2.jpg" alt="Testimonial Avatar">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
          <h4>Jane Smith</h4>
        </div>
      </div>
    </section>
  </main>

  <?php require 'footer.php'; ?>
</body>
</html>
