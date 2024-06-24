<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: admin/login.php');
    exit;
}
require_once 'includes/db.php';
require_once 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $naam = $_POST['naam'];
        $beschrijving = $_POST['beschrijving'];
        $docent_id = $_POST['docent_id'];

        $sql = "INSERT INTO cursussen (naam, beschrijving, docent_id) VALUES ('$naam', '$beschrijving', '$docent_id')";
        $conn->query($sql);
    } elseif (isset($_POST['edit'])) {
        $cursus_id = $_POST['cursus_id'];
        $naam = $_POST['naam'];
        $beschrijving = $_POST['beschrijving'];
        $docent_id = $_POST['docent_id'];

        $sql = "UPDATE cursussen SET naam='$naam', beschrijving='$beschrijving', docent_id='$docent_id' WHERE cursus_id='$cursus_id'";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $cursus_id = $_POST['cursus_id'];
        $sql = "DELETE FROM cursussen WHERE cursus_id='$cursus_id'";
        $conn->query($sql);
    }
}

$result = $conn->query("SELECT * FROM cursussen");
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursussen Beheer</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
        }
        nav a:hover {
            background-color: #575757;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #575757;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Homepagina</a>
        <a href="cursussen.php">Cursussen</a>
        <a href="studenten.php">Studenten</a>
        <a href="admin/logout.php">Logout</a>
    </nav>

    <div class="container">
        <h1>Cursussen</h1>
        <input type="text" id="filterInput" onkeyup="filterTable()" placeholder="Zoeken naar namen..">
        <table id="dataTable">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Docent ID</th>
                <th>Acties</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['cursus_id']; ?></td>
                <td><?php echo $row['naam']; ?></td>
                <td><?php echo $row['beschrijving']; ?></td>
                <td><?php echo $row['docent_id']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="cursus_id" value="<?php echo $row['cursus_id']; ?>">
                        <input type="submit" name="edit" value="Bewerken">
                        <input type="submit" name="delete" value="Verwijderen">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h2>Nieuwe Cursus Toevoegen</h2>
        <form method="post" action="">
            Naam: <input type="text" name="naam"><br>
            Beschrijving: <textarea name="beschrijving"></textarea><br>
            Docent ID: <input type="text" name="docent_id"><br>
            <input type="submit" name="add" value="Toevoegen">
        </form>
    </div>

    <script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("filterInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
    </script>

</body>
</html>
<?php require_once 'includes/footer.php'; ?>