<?php

$isPosted = $_SERVER['REQUEST_METHOD'] === 'POST';

$client_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$server_name = $_SERVER['SERVER_NAME'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

<h2>Client Information</h2>
<p><strong>Client IP:</strong> <?= $client_ip ?></p>
<p><strong>Browser/OS (User-Agent):</strong> <?= $user_agent ?></p>
<p><strong>Server Name:</strong> <?= $server_name ?></p>

<hr>

<h1>Student Registration Form</h1>

<form method="post" action="student_registration.php">

    <label>Full Name:</label><br>
    <input type="text" name="fullname" required>
    <br><br>


    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Other"> Other
    <br><br>


    <label>Hobbies:</label><br>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports
    <input type="checkbox" name="hobbies[]" value="Music"> Music
    <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling
    <br><br>


    <label>Country:</label><br>
    <select name="country" required>
        <option value="">Select Country</option>
        <option value="Nepal">Nepal</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
    </select>
    <br><br>


    <label>Subjects:</label><br>
    <select name="subjects[]" multiple size="5" required>
        <option value="PHP">PHP</option>
        <option value="Java">Java</option>
        <option value="Database">Database</option>
        <option value="Networking">Networking</option>
        <option value="AI">AI</option>
    </select>
    <br><br>

    <button type="submit">Submit</button>
</form>

<hr>

<?php if ($isPosted): ?>
    <h2>Student Registration Details</h2>

    <?php
 
        $fullname = htmlspecialchars($_POST['fullname']);
        $gender = htmlspecialchars($_POST['gender']);
        $country = htmlspecialchars($_POST['country']);

        $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
        $subjects = isset($_POST['subjects']) ? $_POST['subjects'] : [];

        $hobbies_list = htmlspecialchars(implode(", ", $hobbies));
        $subjects_list = htmlspecialchars(implode(", ", $subjects));
    ?>

    <p><strong>Full Name:</strong> <?= $fullname ?></p>
    <p><strong>Gender:</strong> <?= $gender ?></p>
    <p><strong>Hobbies:</strong> <?= $hobbies_list ?></p>
    <p><strong>Country:</strong> <?= $country ?></p>
    <p><strong>Subjects:</strong> <?= $subjects_list ?></p>
<?php endif; ?>

</body>
</html>
