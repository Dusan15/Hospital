<?php
require 'db_conn.php';

if (isset($_POST['submitButton'])){
    if ($_POST['ime'] != '' && $_POST['prezime'] != '' && $_POST['karton'] != '' && $_POST['chosen'] != ''){
        $tempName = $_POST['ime'];
        $tempLastName = $_POST['prezime'];
        $tempCard = $_POST['karton'];
        $tempChoosen = $_POST['chosen'];

        $query = "INSERT INTO pacijenti (ime, prezime, karton, izabrani) VALUES ('$tempName', '$tempLastName', '$tempCard', '$tempChoosen')";
        $conn->query($query);
    }
}

$pozivZaDoktore = "SELECT * FROM doktori ORDER BY id";
$podaciDok = $conn->query($pozivZaDoktore);

$pozivZaPacijente = "SELECT * FROM pacijenti";
$podaciPac = $conn->query($pozivZaPacijente);

?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <!--    <link rel="stylesheet" href="stilo.css">-->
  <title>Pacijenti Lui</title>
</head>
<body>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <form method="post" action="pacijenti.php">
        <h1 style="text-align: center">ADD NEW PACIENT</h1>
        <div class="form-group">
          <label for="inputAddress">First name:</label>
          <input name="ime" type="text" class="form-control" id="inputAddress" placeholder="Milan">
        </div>
        <div class="form-group">
          <label for="inputAddress">Last name:</label>
          <input name="prezime" type="text" class="form-control" id="inputAddress" placeholder="Markovic">
        </div>
        <div class="form-group">
          <label for="inputAddress">Zdravstveni karton:</label>
          <input name="karton"  type="text" class="form-control" id="inputAddress" placeholder="00000">
        </div>
        <div class="form-group">
          <label for="inputState">Choose your doctor:</label>
          <select id="inputState" class="form-control" name="chosen">
            <option selected>Choose...</option>
              <?php while ($red = $podaciDok->fetch_assoc()) {  ?>
                <option value="<?=$red['ime'] . ' ' . $red['prezime'] . ' ' . $red['specijalnost']?>">
                    <?=$red['ime'] . ' ' . $red['prezime'] . ' - ' . $red['specijalnost']?>
                </option>
              <?php }?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submitButton">Sign up new pacient</button>
      </form>
    </div>
    <div class="col-sm">
      <h1 style="text-align: center; margin-bottom: 15px;">PACIENTS IN SYSTEM</h1><br>
      <table class="table table-striped table-dark">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Choosen doctor</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($red = $podaciPac->fetch_assoc()) {?>
          <tr>
            <th scope="row"><?=$red['id']?></th>
            <td><?=$red['ime']?></td>
            <td><?=$red['prezime']?></td>
            <td><?=$red['izabrani']?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>