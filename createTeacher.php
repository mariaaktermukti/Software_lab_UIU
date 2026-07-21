<?php
require_once('database_connection.php');

$courseQuery = "SELECT course_id, title FROM Course";
$courseResult = mysqli_query($conn, $courseQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $course_id = $_POST['course_id'];

    if ($course_id == '') {
        $course_id = "NULL";
    }

    $query = "INSERT INTO Teacher (name, course_id) VALUES ('$name', $course_id)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: readTeacher.php');
        exit;
    }

    echo "Error: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Teacher</title>
</head>
<body>
    <h2>Create Teacher</h2>

    <form method="POST">
        Name: <input type="text" name="name" required><br><br>

        Course:
        <select name="course_id">
            <option value="">None</option>
            <?php while ($row = mysqli_fetch_array($courseResult)) { ?>
                <option value="<?php echo $row['course_id']; ?>">
                    <?php echo $row['title']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="Create">
    </form>

    <p><a href="index.html">Go to main page</a></p>
</body>
</html>
