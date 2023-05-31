<?php
require 'db_connection.php';

// Retrieve products based on the selected category
$category = $_GET['category'] ?? '';

if ($category !== '') {
    $query = "SELECT * FROM products JOIN categories ON products.category_id = categories.category_id WHERE categories.name = '$category'";
} else {
    $query = "SELECT * FROM products JOIN categories ON products.category_id = categories.category_id";
}

$result = mysqli_query($conn, $query);

// Render product cards
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $category_name = $row['name'];
    $image_url = '../images/' . $row['image_url'];

    echo '<div class="product-card">';
    echo '<img src="' . $image_url . '" alt="' . $name . '">';
    echo '<h3>' . $name . '</h3>';
    echo '<p>' . $description . '</p>';
    echo '<p class="price">Price: $' . $price . '</p>';
    echo '<button onclick="addToCart(' . $product_id . ')">Add to Cart</button>';
    echo '<button onclick="buyNow(' . $product_id . ')">Buy Now</button>';
    echo '</div>';
}

// Close database connection
mysqli_close($conn);
?>
