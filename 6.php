<!DOCTYPE html>
<html>

<head>
    <title>Find Greatest Number</title>
</head>

<body>
    <h2>Find Greatest Number</h2>
    <form method="post" action="">
        Enter first number: <input type="number" name="num1"><br><br>
        Enter second number: <input type="number" name="num2"><br><br>
        Enter third number: <input type="number" name="num3"><br><br>
        <input type="submit" name="submit" value="Find Greatest">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];
        $greatest = max($num1, $num2, $num3);
        echo "The greatest number among $num1, $num2, and $num3 is: $greatest";
    }
    ?>
</body>

</html>