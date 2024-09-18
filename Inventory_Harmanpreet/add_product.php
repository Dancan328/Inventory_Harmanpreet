<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'Inventory_Harmanpreet');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['ProductName'];
    $category = $_POST['Category'];
    $units_in_stock = $_POST['UnitsInStock'];
    $unit_price = $_POST['UnitPrice'];

    $sql = "INSERT INTO Products (ProductName, Category, UnitsInStock, UnitPrice) 
            VALUES ('$product_name', '$category', '$units_in_stock', '$unit_price')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="POST" action="">
        <label>Product Name:</label>
        <input type="text" name="ProductName" required><br><br>
        
        <label>Category:</label>
        <input type="text" name="Category" required><br><br>
        
        <label>Units In Stock:</label>
        <input type="number" name="UnitsInStock" required><br><br>
        
        <label>Unit Price:</label>
        <input type="text" name="UnitPrice" required><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
