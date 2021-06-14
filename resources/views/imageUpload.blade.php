<!DOCTYPE html>
<html lang="en">

<head>
    <!--Meta data-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>imageUpload</title>
</head>

<body>
    <div class="container p-5">
        <h1>Upload Image</h1>
        <div class="mb-3">
            <form method="POST" action="imageUpload" enctype="multipart/form-data">
                @csrf
                <label for="formFile" class="form-label">Choose image</label>
                <input class="form-control mb-3" type="file" id="formFile" name="file">
                <input type="submit" name="imageUpload">
            </form>
        </div>
    </div>
    <div class="container">
        <h5>Orginal</h5>
        <img src="#" id="orginal">
        <h5>Medium</h5>
        <img src="#" id="medium">
        <h5>Large</h5>
        <img src="#" id="large">
        <h5>X-Large</h5>
        <img src="#" id="xlarge">
        <h5>XX-Large</h5>
        <img src="#" id="xxlarge">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>
<script>
fetch("http://localhost/imageCompression/getImage")
  .then(response => response.text())
  .then(function(result){
      let response = JSON.parse(result);
      let url = `http://localhost/imageCompression/public/storage/`;
      document.getElementById("orginal").src= url+'Original-'+response.name;
      document.getElementById("medium").src= url+'Medium-'+response.name;
      document.getElementById("large").src= url+'Large-'+response.name;   
      document.getElementById("xlarge").src= url+'XLarge-'+response.name;   
      document.getElementById("xxlarge").src= url+'XXLarge-'+response.name;      
  })
  .catch(error => console.log('error', error));
</script>
</html>