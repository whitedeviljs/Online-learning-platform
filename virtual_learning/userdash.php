<?php include "usernav.php" ?>
<?php
if(!isset($_SESSION['id'])){
  header("Location:index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: white; 
}

header {
  padding: 20px;
  text-align: center;
  color: #fff; /* white text on dark background */
}

header h1 {
  font-size: 36px;
  margin-bottom: 10px;
  color: #030140;
}

main {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 40px;
}

#hero {
  background-image: url("bg.jpg");
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

#hero h2 {
  font-size: 48px;
  margin-bottom: 20px;
  color: white;
}

#hero p {
  font-size: 18px;
  margin-bottom: 30px;
  color: white; /* gray text */
}

#hero button {
  background-color: white;
  border: none;
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
}

#hero button:hover {
  background-color: #01005A;

}
</style>
</head>
<body>
<body>
	<header><br>
		<h1><u>Welcome To SKILLUP!! </u></h1>
	</header>
	<main>
		<section id="hero">
			<h2><u>Unlock Your Potential</u></h2>
			<p>Discover new skills and knowledge with our online courses and resources.</p>
			<button><a href="mycourse.php" style="text-decoration: none;">Get Started</button>
		</section>
	</main>
</body>
</html>
