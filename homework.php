<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_GET['logout'])) {
    session_destroy(); // Уничтожаем все данные сессии
    header("Location: login.php"); // Перенаправляем на страницу входа
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $creator_name = $user_data['user_name'];
    $label_text = $_POST['form_label'];
    $main_text = $_POST['form_text'];

    if (!empty($label_text) && !empty($main_text)) {

        $query = "INSERT INTO comments (creator_name, header, main_text) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sss", $creator_name, $label_text, $main_text);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("Location: homework.php");
                exit();
            } else {
                echo "Registration failed.";
            }
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Not Valid Info";
    }
}

// Получаем комментарии из базы данных
$query = "SELECT * FROM comments";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="Header">
        <img class="LogoImage" src="Spike1.png"/>
        <h1 style="margin-top:20px; margin-left:5px;">Super Message Network</h1>
        <div>
            <button id="NavButton"><Img class="LogoImage" id="MenuIcon" src="LoginIcon.png"></Img></button>
            <div class="LoginMenu">
                <h1 style=" margin-top: 10px;">Welcome, <?php echo $user_data['user_name']; ?>!</h1>
                <h1 style=" margin-top: 20px;">To Log Out Click <a href="?logout=true">Here</a></h1>
            </div>
        </div>
    </div>
    <div id="center">
        <!-- Form Creator Modal Window -->
        <div id="form-creator-modal" class="modal CenterContent" style="display: none;">
            <span class="close"  id="close-form-creator">&times;</span>
            <form id="form-creator-form" class="CenterContent" action="homework.php" method="post">
                <div class="LoginInput">
                    <label><h1>Form Label:</h1></label>
                    <input class="InputField FormInput" type="text" name="form_label" id="form-label" maxlength="40">
                </div>  
                <div class="LoginInput">
                    <label><h1>Form Text:</h1></label>
                    <textarea cols="30" rows="10" class="InputField FormInput MainTextInput" name="form_text" id="form-text"></textarea>
                </div> 
                <button type="submit" class="FormSubmitButton InputField"><h1>Create Form</h1></button>
            </form>
        </div>

        <!-- Modal Window -->
        <div id="modal" class="modal CenterContent" style="display: none;">
            <span class="close" id="close-modal-window">&times;</span>
            <div class="LoginInput">
                <h1 id="modal-header" class="modal-field"></h1>
            </div>
            <div class="LoginInput">
                <textarea cols="30" rows="10" class="InputField modal-field FormInput MainTextInput" id="modal-text"></textarea>
            </div>
        </div>

        <div id="content">
            <div class="ContentBox InputField" id="form-creator-btn">
                <h2>Click To</h2>
                <h2>Create New Comment</h2>
            </div>
            <?php
            // Проверяем наличие комментариев
            if (mysqli_num_rows($result) > 0) {
                // Выводим каждый комментарий в отдельном элементе
                while ($row = mysqli_fetch_assoc($result)) {
                    $creator_name = $row['creator_name'];
                    $header = $row['header'];
                    $main_text = $row['main_text'];
                    ?>
                    <div class="ContentBox comment InputField">
                        <h3><?php echo $header; ?></h3>
                        <div class ="SeparateLine"></div>
                        <h2>Creator: <?php echo $creator_name; ?></h2>
                        <p style="display: none;"><?php echo $main_text; ?></p>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
