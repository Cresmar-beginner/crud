<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Fish</title>
    <style>
    /* Basic styling for body and container */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 500px;
        margin: 40px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #1e90ff;
        font-size: 20px;
        margin-bottom: 20px;
    }

    /* Form styling */
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input[type="text"], 
    input[type="number"], 
    input[type="date"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
        border-color: #1e90ff;
        outline: none;
    }

    button {
        padding: 10px;
        color: white;
        background-color: #1e90ff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #1c86ee;
    }

    /* Styling for success message */
    p {
        text-align: center;
        color: #1e90ff;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Add New Fish</h2>

    <form action="" method="POST">
        <input type="text" name="name" placeholder="Fish Name" required>
        <input type="text" name="species" placeholder="Fish Species" required>
        <input type="number" name="weight" placeholder="Weight (kg)" required>
        <input type="date" name="date_added" required>
        <button type="submit" name="save">Save</button>
    </form>

    <?php
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $species = $_POST['species'];
        $weight = $_POST['weight'];
        $date_added = $_POST['date_added'];  // No need for conversion if the field is DATE type

        $sql = "INSERT INTO fish (name, species, weight, date_added) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssds", $name, $species, $weight, $date_added);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Fish added successfully!</p>";
            header("Location: index.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
    ?>
</div>
</body>
</html>