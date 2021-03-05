<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  body  {
      background-image: url("assets/star-wars-background.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      }
    </style>
  <title>YodaBot</title>
  <!-- Bootsrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./css/app.css">
</head>

<body>
  <main id="app">
    <chat class="container"></chat>
  </main>

  <!-- Vue JS -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <!-- Axios for AJAX requests -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

  <!-- Main app JS -->
  <script src="js/app.js"></script>
</body>
</html>
