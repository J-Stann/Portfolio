<?php 
                    include('connection.php');
                    $name = $email = $subject = $message = "";
                    $submitted = false;
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name = htmlspecialchars(trim($_POST['name']));
                        $email = htmlspecialchars(trim($_POST['email']));
                        $subject = htmlspecialchars(trim($_POST['subject']));
                        $message = htmlspecialchars(trim($_POST['message']));
                    }
                    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
                        $query = "INSERT INTO `contact`(`Name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";
                        if (mysqli_query($con, $query)) {
                            $submitted = true;
                            header("Location: index.php"); 
                        exit();
                        } else {
                            echo "Error: " . mysqli_error($con);
                        }
                    }
                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style/NavBar.css">
    <link rel="stylesheet" href="style/Home.css">
    <link rel="stylesheet" href="style/About.css">
    <link rel="stylesheet" href="style/project.css">
    <link rel="stylesheet" href="style/Contact.css">
    <link rel="stylesheet" href="style/Footer.css">
    <link rel="stylesheet" href="style/responsive.css">
    <link rel="stylesheet" href="style/project_details.css">

    <!-- Script -->
    <script src="js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="js/project.js"></script>
    <script src="js/contact.js"></script>


    <!-- Google Map-->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Portfolio</title>
</head>

<body>

    <!-- NavBar -->
    <div class="navbar-container">
        <div class="navbar" id="navbar">
            <p class="navbar-brand">Joe <span class="highlighted-text">Stanbouly</span></p>
            <ul class="navbar-links">
                <li><a href="#home" id="home-link">Home</a></li>
                <li><a href="#about" id="about-link">About</a></li>
                <li><a href="#mywork" id="mywork-link">My Work</a></li>
                <li><a href="#contact" id="contact-link">Contact Me</a></li>
                <li><a href="#footer" id="contact-link">More Info</a></li>
            </ul>
        </div>
    </div>


    <!-- Home -->
    <div class="home-content" id="home">
        <div class="home-section-1">
            <h2>Hello I'm Joe</h2>
            <h1>I'm a <span class="profession"></span><span class="separator"></span></h1>
            <script src="js/home.js"></script>
            <div class="cta-buttons">
                <a href="Joe Stanbouly.pdf" download>
                    <button>Resume</button>
                </a>
                <a href="mailto:joe123stanbouli@gmail.com">
                    <button>Contact Us</button>
                </a>
            </div>
            <div class="social-media">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://github.com/Stan-ista"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/joe-stanbouly-8a389a322/"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
        <div class="home-section-2">
            <img src="images/Picture-Home.JPG" alt="">
        </div>
    </div>


    <!-- About -->
    <div class="about" id="about">
        <div class="about-sec1">
            <div class="about-img">
                <img src="images/About.jpeg" alt="">
            </div>
            <div class="about-ver">
                <h2 class="animated-heading">
                    About Me
                </h2>
                <h3>Let me Introduce Myself</h3>
                <p>
                    I am a student at the Lebanese International University (LIU) in Lebanon, pursuing a
                    degree in Computer Science. Throughout my academic journey, I have taken part in numerous courses
                    that have deepened my understanding of the field. My primary focus is on web development, a domain I
                    am deeply passionate about. While I continue to learn and explore programming, I have also worked on
                    several projects that have allowed me to apply and enhance my knowledge. I remain committed to
                    growing my expertise and staying curious about the endless possibilities in technology.
                </p>
            </div>
        </div>

        <?php
            include('connection.php');
            $query = "SELECT * FROM skills";
            $result = mysqli_query($con, $query);
        ?>
        <div class="about-sec2">
            <div class="all-card">
                <?php
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="card">';
                            echo '<img src="images/' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                            echo '<p>' . htmlspecialchars($row['name']) . '</p>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>


    <!-- Project -->
    <div class="my-project" id="mywork">
        <p class="intro-text">
            This project is a reflection of my skills, creativity,
            and dedication, showcasing my ability to solve complex problems.
        </p>
        <div class="card-project">
            <?php
        include('connection.php');
        $query = "SELECT id, title, image, description, link FROM `project`";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $project_title = htmlspecialchars($row['title']);
                $project_image = htmlspecialchars($row['image']);
                $project_description = htmlspecialchars($row['description']);
                $project_link = htmlspecialchars($row['link']);
                $project_id = htmlspecialchars($row['id']);
        ?>
            <div class="card" style="background-image: url('images/<?php echo $project_image; ?>');">
                <div class="card-content">
                    <p><?php echo $project_title; ?></p>
                    <button class="learn-more" data-id="<?php echo $project_id; ?>"
                        data-title="<?php echo $project_title; ?>" data-image="<?php echo $project_image; ?>"
                        data-description="<?php echo $project_description; ?>" data-link="<?php echo $project_link; ?>">
                        Learn more
                    </button>
                </div>
            </div>
            <?php
            }
        } else {
            echo "<p>No projects found.</p>";
        }
        ?>
        </div>

        <!--Project Details -->
        <div id="projectModal" class="modal">
            <div class="modal-content">
                <span id="closeModal" class="close">&times;</span>
                <div class="modal-body">
                    <div class="modal-header">
                        <h2 id="modalTitle"></h2>
                    </div>
                    <div class="modal-main">
                        <div class="modal-left">
                            <p id="modalDescription"></p>
                        </div>
                        <div class="modal-right">
                            <img id="modalImage" src="" alt="Project Image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" id="modalLink" class="modal-link" target="_blank">Visit Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/project.js"></script>

    <!-- Contact Me -->
    <div class="contact-section" id="contact">
        <div class="contact-info">
            <h2>Contact me</h2>
            <p>
                I'd love to hear from you! Feel free to reach out if you have any questions or need assistance.
                Let's
                connect and discuss how I can help.
            </p>
            <form action="index.php" method="post" class="contact-form">
                <div class="form-line">
                    <input type="text" placeholder="Name" name="name" required>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <input class="subject" type="text" placeholder="Subject" name="subject" required>
                <textarea name="message" required placeholder="Your Message"></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
        <div class="map-location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100041.
                68919741347!2d35.857389!3d33.840687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                1!3m3!1m2!1s0x151c9b0565794443%3A0xd0a61e15d18c8b4f!2sZahle%2C%20Lebanon!5e
                0!3m2!1sen!2sus!4v1682118993254!5m2!1sen!2sus" width="100%" height="100%" style="border:0;"
                allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer" id="footer">
        <div class="footer-all">
            <div class="footer-line1">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente fugiat commodi atque
                    molestias
                    illum,
                    aperiam provident omnis iusto delectus sed nam et ullam eos eaque ipsa voluptate tenetur,
                    facilis
                    quisquam.
                </p>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-line2">
                <h3>Portfolio</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Project</a></li>
                </ul>
            </div>
            <div class="footer-line3">
                <h3>Contact</h3>
                <ul>
                    <li><a href="mailto:joe123stanbouli@gmail.com">joe123stanbouli@gmail.com</a></li>
                    <li>Lebanon</li>
                    <li>+961 70 *** ***</li>
                </ul>
            </div>
        </div>
        <div class="copy">© Joe Stanbouli <a href="login.php">Admin</a></div>
    </div>

</body>

</html>