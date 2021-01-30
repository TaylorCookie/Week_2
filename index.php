<?php
    $firstname = filter_input(INPUT_GET, "firstname", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_GET, "lastname", FILTER_SANITIZE_STRING);
    $age = 0; //set to zero in case age does not get input
    $age = filter_input(INPUT_GET, "age", FILTER_DEFAULT);
    $numberOfDays = intval($age) * 365;
    $date = date('m/d/Y', time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <!--header include-->
    <?php include("header.php") ?>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname"><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"><br>

        <button type="submit">Submit</button><br>
    </form>    

    <?php
        //if firstname, lastname, and age are all set
        if (!empty($firstname) && !empty($lastname) && $age >= 0) {

            echo "Hello, my name is " . $firstname . " " . $lastname . ".<br>";
            echo "I am " . $age . " years old and ";

            if ($age >= 18) {
                echo "I am old enough to vote in the United States.<br>";
            } else {
                echo "I am not old enough to vote in the United States.<br>";
            }

            echo "That means I'm at least " . $numberOfDays . " days old.<br>";
        }

        //if they are not all set, output which ones are not set
        else {
            if (!isset($firstname) || $firstname === "") {
                echo "You did not submit firstname parameter.<br>";
            }

            if (!isset($lastname) || $lastname === "") {
                echo "You did not submit lastname parameter.<br>";
            }

            if (!isset($age) || $age <= 0) {
                echo "You did not submit a valid age.<br>";
            }
        }

        
    ?>
</body>
</html>