<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
<h2>List of clients</h2>
<a href="/project/create.php" class="btn btn-primary" role="button">New client</a>
<br>
<table class="table">
    <thead>
        <th>ID</th>
        <th>name</th>
        <th>phone</th>
        <th>email</th>
        <th>address</th>
        <th>action</th>
    </thead>
    <tbody>
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $database="project";
        $connection=new mysqli($servername,$username,$password,$database);
        if($connection->connect_error){
            die("connection failed:".$connection->connect_error);
        }
        $sql="SELECT * FROM clients";
        $result=$connection->query($sql);
        if(!$result)
        {
            die("invalid:".$connection->error);
        }
while($row=$result->fetch_assoc()){
    echo"
    <tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[phone]</td>
    <td>$row[email]</td>
    <td>$row[adress]</td>
    <td>
        <a href='/project/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>edit</a>
        <a href='/project/delete.php?id=$row[id]'class='btn btn-danger btn-sm'>delete</a>
    </td>
</tr>
    ";
}
        
        
        ?>


    </tbody>
</table>
    </div>
</body>
</html>