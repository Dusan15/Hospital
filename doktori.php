<?php
require 'db_conn.php';

if (isset($_POST['submitButton'])){
    if ($_POST['ime'] != '' && $_POST['prezime'] != '' && $_POST['pass'] != '' && $_POST['spec'] != ''){
        $tempName = $_POST['ime'];
        $tempLastName = $_POST['prezime'];
        $tempPass = $_POST['pass'];
        $tempSpec = $_POST['spec'];

        $query = "INSERT INTO doktori (ime, prezime, specijalnost) VALUES ('$tempName', '$tempLastName', '$tempSpec')";
        $conn->query($query);
    }
}

$poziv = "SELECT * FROM doktori ORDER BY id";
$podaci = $conn->query($poziv);
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <!--    <link rel="stylesheet" href="stilo.css">-->
  <title>Doktori Lui</title>
</head>
<body>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <form method="post" action="doktori.php">
        <h1 style="text-align: center">ADD NEW DOCTOR</h1>
        <div class="form-group">
          <label for="inputAddress">First name:</label>
          <input name="ime" type="text" class="form-control" id="inputAddress" placeholder="Milan">
        </div>
        <div class="form-group">
          <label for="inputAddress">Last name:</label>
          <input name="prezime" type="text" class="form-control" id="inputAddress" placeholder="Markovic">
        </div>
        <div class="form-group">
          <label for="inputAddress">Password:</label>
          <input name="pass"  type="password" class="form-control" id="inputAddress" placeholder="*******">
        </div>
        <div class="form-group">
          <label for="inputState">Speciality:</label>
          <select id="inputState" class="form-control" name="spec">
            <option selected>Choose...</option>
            <option value="Hirurg">Hirurg</option>
            <option value="Internista">Internista</option>
            <option value="Plasticni hirurg">Plasticni hirurg</option>
            <option value="Otorinolaringolog">Otorinolaringolog</option>
            <option value="Ortoped">Ortoped</option>
            <option value="Pedijatar">Pedijatar</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submitButton">Sign up new doctor</button>
      </form>
    </div>
    <div class="col-sm">
      <h1 style="text-align: center; margin-bottom: 15px;">DOCTORS EMPLOYED</h1><br>
      <table class="table table-striped table-dark">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Speciality</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($red = $podaci->fetch_assoc()) {?>
          <tr>
            <th scope="row"><?=$red['id']?></th>
            <td><?=$red['ime']?></td>
            <td><?=$red['prezime']?></td>
            <td><?=$red['specijalnost']?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>