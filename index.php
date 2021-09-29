<?php
require_once __DIR__ . '/vendor/autoload.php';


$collection = (new MongoDB\Client)->template->bootstrap;

$nv = '<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          $menu
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</div></nav>';

// $css = $collection->findOne(['_id' => 5])->css;

// example Create
// $document = $collection->insertOne([
//     '_id' => 5,
//     'css' => '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha385-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn5FJkqJByhZMI3AhiU" crossorigin="anonymous">',
//     'js'  => '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha385-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>',
//     'navbar' => $nv,
// ]);

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <?= $collection->findOne(['_id' => 5])->css ?>
    <title>Hello, world!</title>
</head>

<body>

    <div class="container">

        <!-- Example Read -->
        <?= $navbar = $collection->findOne(['_id' => 5])->navbar ?>

        <?php
            $newNavbar = '<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">Simple header</span>
            </a>
      
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
              <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
              <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
          </header>';
        ?>

        <!-- example update -->

        <?php 
            $newCSS = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha385-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn5FJkqJByhZMI3AhiU" crossorigin="anonymous">';
            $updateNavbar = $collection->updateOne(['navbar' => $navbar],['$set' => ['navbar' => $newNavbar]]);
            $updateCss = $collection->updateOne(['css' => $css],['$set' => ['css' => $newCSS]]);
        ?>

        <!-- example delete -->

        <?php
            // $deleteResult = $collection->deleteOne($collection->findOne(['_id' => 5])->css);
        ?>

    </div>


    <?= $collection->findOne(['_id' => 5])->js ?>
</body>

</html>