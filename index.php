<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    <h2>Zoom metting</h2>

    <form method="post" action="insert.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone" required><br><br>

        <button type="submit">Submit</button>
    </form>


    <button id="redirectButton">Go to Second Page</button>

    <script>
        document.getElementById("redirectButton").addEventListener("click", function() {
            window.location.href = "second.html";
        });
    </script>
</body>
</html>
