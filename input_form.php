<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Name</title>
</head>
<body>
    <h2>Check if Name Exists</h2>
    <form method="get" action="check_name.php"> <!-- Form action points to the PHP script -->
        <label for="name">Enter Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <button type="submit">Check Name</button>
    </form>
</body>
</html>
