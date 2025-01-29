<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin/admin.css">
    <script src="admin/admin.js"></script>

</head>

<body>
    <div class="admin-dashboard">
        <h1>Admin Dashboard</h1>
        <h2>Add a New Project</h2>
        <form method="POST" action="admin.php" enctype="multipart/form-data">
            <input type="text" name="project_title" placeholder="Project Title" required><br>
            <textarea name="project_description" placeholder="Project Description" required></textarea><br>
            <input type="file" name="project_image" accept="image/*" required><br>
            <input type="url" name="project_link" placeholder="Project Link (URL)"><br>
            <button type="submit" name="add_project">Add Project</button>
        </form>
        <?php
            include('connection.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_project'])) {
                $project_title = trim($_POST['project_title']);
                $project_description = trim($_POST['project_description']);
                $project_link = trim($_POST['project_link']);
                $target_file1 = basename($_FILES["project_image"]["name"]);
                $query1 = "INSERT INTO `project`(`title`, `image`, `description`, `link`) 
                VALUES ('$project_title', '$target_file1', '$project_description', '$project_link')";
                if (mysqli_query($con, $query1)) {
                    echo "<script>alert('Project added successfully!');</script>";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }
        ?>


        <h2>Add a New Skill</h2>
        <form method="POST" action="admin.php" enctype="multipart/form-data">
            <input type="text" name="skill_name" placeholder="Skill Name" required><br>
            <input type="file" name="skill_image" accept="image/*" required><br>
            <button type="submit" name="add_skill">Add Skill</button>
        </form>
        <?php
            include('connection.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_skill'])) {
                $skill_name = trim($_POST['skill_name']);
                $target_file = basename($_FILES["skill_image"]["name"]);
                $query = "INSERT INTO `skills`(`name`, `image_url`) VALUES ('$skill_name', '$target_file')";
                if (mysqli_query($con, $query)) {
                    echo "<script>alert('Skill added successfully!');</script>";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } 
        ?>



        <!-- Display All Contact Messages -->
        <h2>All Contact Messages</h2>
        <table class="contact-messages">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('connection.php');
                    $query2 = "SELECT * FROM `contact` WHERE `id`";
                    $result = mysqli_query($con, $query2);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>" . htmlspecialchars($row['Name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['subject']) . "</td>
                                <td>" . htmlspecialchars($row['message']) . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No contact messages found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="index.php">Logout</a>
    </div>
</body>

</html>