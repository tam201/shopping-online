<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Upload File</h1>
    <!-- sử dụng enctype -->
    <form method="post" enctype="multipart/form-data" action="upload-process.php">
        <input type="file" name="image">
        <button>upload</button>
    </form>
    <img src="<?php echo $direction; ?>" alt="">
</body>

</html>