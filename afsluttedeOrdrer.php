<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="adminStyle.css">
</head>
<body>


	<header>
		<div class="logo">
			<h1 class="logo-text">Strøyer</h1>
		</div>
		<div class="nav">
			<h1 class="logo-text">Username</h1>
		</div>
	</header>

	<div class="admin-wrapper">

		<div class="left-sidebar">
			<ul>
				<li><a href="produktOversigt.php">Produktoversigt</a></li>
				<li><a href="ordrer.php">Igangværende ordrer</a></li>
				<li><a href="afsluttedeOrdrer.php">Afsluttede ordrer</a></li>
				
			</ul>
		</div>

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