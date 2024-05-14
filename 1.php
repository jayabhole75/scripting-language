<!DOCTYPE html>
<html>

<head>
    <title>Factorial Calculator</title>
</head>

<body>
    <h2>Factorial Calculator</h2>
    <form method="post" action="">
        <label for="number">Enter a number: </label>
        <input type="number" name="number">
        <input type="submit" name="submit" value="Calculate Factorial">
    </form>
    <?php
    function factorial($number)
    {
        $result = 1;
        for ($i = 1; $i <= $number; $i++) {
            $result *= $i;
        }
        return $result;
    }
    if (isset($_POST['submit'])) {
        $number = $_POST['number'];
        $result = factorial($number);
        echo "Factorial of $number is: $result";
    }
    ?>
</body>

</html>