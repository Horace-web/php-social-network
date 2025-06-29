<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 id="welcome"></h1>


<script>
  const user = JSON.parse(sessionStorage.getItem("user"));
  if (!user) {
    // Redirection forcée si non connecté
    window.location.href = "index.php";
  } else {
    document.getElementById("welcome").textContent = `Bienvenue, ${user.prenom} ${user.nom}`;
  }
</script>
</body>
</html>

 -->
