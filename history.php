<!DOCTYPE html>
<html>

<head>
	<title>Entry History</title>
    <link rel="stylesheet" href="assets/styles/main.css" />
	<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
      integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q"
      crossorigin="anonymous"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
</head>
<style>
	body {
		background-color: #957c8e;
	}
	header{
		color: white;
	}
	main,
	footer {
		background-color: white;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	th,
	td {
		text-align: left;
		padding: 8px;
	}

	th {
		background-color: #dddddd;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	footer {
		background-color: #957c8e;
		margin-top: 348px;
		color: black;
		max-width: 264px;

	}
</style>

<body>
	<?php
	include('nav.php');
	?>
	<header>
		<h1 class="title">
			<?php session_start();
			$user = $_SESSION['user'];
			echo $user['name']; ?>'s Entries
		</h1>
	</header>

	<main>
		<section>
			<table>
				<tr>
					<th>Date </th>
					<th>Entrty </th>
				</tr>
				<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "db_ediary";

				// Create connection
				$conn =
					new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$total = 0;

				// Loop through entries in history and display in table
				foreach ($_SESSION['EntryHistory'] as $date => $date) {
					$sql = "SELECT * FROM entries WHERE id = $date";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$date = $row['date'];
						$entry = $row['entry'];

						echo "<tr>";
						echo "<td>$date</td>";
						echo "<td>$entry</td>";
						echo "</tr>";
					}
				}
				?>
			</table>
			<form action="logout.php" method="post">
				<input type="logout" value="logout" class="button" />
			</form>
		</section>
	</main>

	<footer>
		<p>&COPY;2023 E-Diary</p>
	</footer>
</body>

</html>