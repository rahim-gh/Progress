<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Progress</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <main>
        <h1>Student Informations</h1>
        <table>
            <thead>
                <tr class="table_header">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Family Name</th>
                    <th>Level</th>
                    <th>Birth Date</th>
                    <th>Place of Birth</th>
                    <th>Field</th>
                    <th>Branch</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'Control/list_students.php';
                ?>
            </tbody>
        </table>
    </main>

    <div class="footer">
        <footer>
            <p>&copy; Abderrahim</p>
        </footer>
    </div>
</body>

</html>