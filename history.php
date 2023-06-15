<?php
session_start();
require_once 'assets/php/connection.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Entry History</title>
    <link rel="stylesheet" href="assets/styles/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css"
        integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
</head>
<style>
body {
    background-color: #957c8e;
}

header,
nav,
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
    <header>
        <h1 class="title">
            <?php
            $user = $_SESSION['user'];
            echo $user['name']; ?> EntryHistory
        </h1>
    </header>

    <nav>
        <ul>
            <li>
                <a href="diary.php">Home</a>
            </li>
            <li>
                <a href="history.php">Entry History</a>
            </li>

            <li><a href="assets/php/logout.php">Logout</a></li>
            </li>
        </ul>
    </nav>

    <main>
        <section>
            <table>
                <tr>
                    <th>Date </th>
                    <th>Title </th>
                    <th>Entry </th>

                </tr>
                <?php

                $total = 0;
                $userId = $_SESSION['user']['id'];

                // Loop through entries in history and display in table
                $sql = "SELECT * FROM entries WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$userId]);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $date = $row['date'];
                    $title = $row['title'];
                    $entry = $row['entry'];

                    echo "<tr>";
                    echo "<td>$date</td>";
                    echo "<td>$title</td>";
                    echo "<td>$entry</td>";
                    echo "</tr>";
                }
                ?>

            </table>
        </section>
    </main>

    <footer>
        <p>&COPY;2023 E-Diary</p>
    </footer>
</body>

</html>