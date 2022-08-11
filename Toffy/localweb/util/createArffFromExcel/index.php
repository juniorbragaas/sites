<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Welcome</title>
</head>
<body>
    <div>
        <form action="./upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Selecione o arquivo:</label> 
                <input class="form-control" type="file" name="arquivo" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</body>
</html>