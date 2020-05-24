<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

	<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Menu</header>
      <a href="produktOversigt.php" class="active">
        <span>Produktoversigt</span>
      </a>
      <a href="ordrer.php">
        <span>Igangværende ordrer</span>
      </a>
      <a href="afsluttedeOrdrer.php">
        <span>Afsluttede ordrer</span>
      </a>
    </div>


	<header>
		<div class="nav">
			<h1 class="logo-text" > <a class="logo-text" href="logud.php" onclick="return confirm ('Er du sikker på at du vil logge ud?')">Log ud</a></h1>
		</div>
	</header>

	<div class="admin-wrapper">


		<div class="admin-content">
			
			<div class="button-group">
				<a href="#" class="btn">Print ordreliste</a>
			</div>

			<div class="content">
				
				<h2 class="page-title">Afsluttede ordrer</h2>

				<table>
					<thead>
						<th>SN</th>
						<th>Ordrer nr.</th>
						<th>Produkter</th>
						<th>Produkt nr.</th>
						<th colspan="2">Handling</th>
					</thead>

					<tbody>
						<tr>
							<td>1</td>
							<td>77</td>
							<td>Six Ames Strik <br>Six Ames Strik</td>
							<td>NI115000M-A11<br>NI115000M-A11</td>
							<td><a href="#" class="godkend">Afsluttet</a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>78</td>
							<td>Six Ames Buks</td>
							<td>NI115000M-A12</td>
							<td><a href="#" class="godkend">Afsluttet</a></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>
</html>