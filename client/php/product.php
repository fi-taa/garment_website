<!DOCTYPE html>
<html>

<head>
    <title>Garment Website</title>
    <link rel="stylesheet" href="../styles/product.css">
</head>

<body>
    <header>
        <h1>Garment Website</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="hero">
        <h2>Welcome to Garment Website</h2>
        <p>Discover our latest collection of fashionable garments</p>
    </div>

    <div class="category-nav">
        <ul>
            <li><a href="product.php" id="all">All</a></li>
            <li><a href="product.php?category=tshirt" id="tshirt">T-Shirts</a></li>
            <li><a href="product.php?category=dress" id="dress">Dresses</a></li>
            <li><a href="product.php?category=trouser" id="trouser">Trousers</a></li>
            <li><a href="product.php?category=jacket" id="jacket">Jackets</a></li>
        </ul>
    </div>

    <div class="product-container">
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
    </div>

    <footer>
        <p>&copy; 2023 Garment Website. All rights reserved.</p>
    </footer>

    <script>
        const categoryLinks = document.querySelectorAll('.category-nav ul li a');
        const productContainer = document.querySelector('.product-container');

        categoryLinks.forEach(link => {
            link.addEventListener('click', handleCategoryClick);
        });

        function handleCategoryClick(event) {
            event.preventDefault();

            const clickedLink = event.target;
            const category = clickedLink.getAttribute('href').split('=')[1];

            categoryLinks.forEach(link => {
                link.classList.remove('active');
            });

            if (category === undefined) {
                const allLink = document.getElementById('all');
                allLink.setAttribute('href', 'product.php');
                allLink.classList.add('active');
                fetchProducts('');
                updateURL('');
            } else {
                clickedLink.classList.add('active');
                fetchProducts(category);
                updateURL(category);
            }
        }

        function fetchProducts(category) {
            // Make an AJAX request to fetch products based on the category
            fetch(`fetch_products.php?category=${category}`)
                .then(response => response.text())
                .then(data => {
                    // Update the product container with the fetched products
                    productContainer.innerHTML = data;
                })
                .catch(error => {
                    console.log('Error:', error);
                });
        }

        function updateURL(category) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('category', category);
            const newURL = window.location.pathname + '?' + urlParams.toString();
            window.history.pushState({
                path: newURL
            }, '', newURL);
        }
    </script>
</body>

</html>
