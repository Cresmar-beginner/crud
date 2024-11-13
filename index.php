<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fish Management System</title>
    <style>
    /* Basic styling for body and container */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #1e90ff;
        font-size: 24px;
    }

    /* Button styling */
    .button {
        display: inline-block;
        padding: 10px 20px;
        color: white;
        background-color: #1e90ff;
        border-radius: 5px;
        text-decoration: none;
        margin-bottom: 20px;
        text-align: center;
    }

    .button:hover {
        background-color: #1c86ee;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #1e90ff;
        color: white;
    }

    td {
        color: #333;
    }

    /* Link styling */
    a {
        color: #1e90ff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Styling for messages */
    p {
        color: #1e90ff;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Fish Management System</h1>
    <a href="create.php" class="button">Add New Fish</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Species</th>
                <th>Weight (kg)</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Modify SQL to explicitly select the id
            $sql = "SELECT id, name, species, weight, date_added FROM fish"; 
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Safely get the 'id' from the row
                    $id = $row['id']; 
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['species']}</td>
                            <td>{$row['weight']}</td>
                            <td>{$row['date_added']}</td>
                            <td>
                                <a href='edit.php?id=$id'>Edit</a> | 
                                <a href='delete.php?id=$id' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>