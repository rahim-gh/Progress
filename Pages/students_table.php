<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/index.html">Progress</a>
            </div>
            <div class="navigation">
                <ul class="nav-list">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h1>Student Informations</h1>
        <table id="students_table">
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
                    include '../Control/list_students.php';
                ?>
            </tbody>
        </table>
    </main>

    <script src="/Scripts/function.js"></script>
    <div class="footer">
        <footer>
            <p>&copy; Abderrahim</p>
        </footer>
    </div>
</body>

</html>
