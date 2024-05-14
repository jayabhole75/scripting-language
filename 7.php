<!DOCTYPE html>
<html>

<head>
    <title>Circle Calculator</title>
</head>

<body>
    <h2>Circle Calculator</h2>
    <form method="post" action="">
        <label for="radius">Enter the radius meter:</label><br>
        <input type="number" id="radius" name="radius" required><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>
    <?php
    class Circle
    {
        private $radius;
        public function __construct($radius)
        {
            $this->radius = $radius;
        }
        public function getRadius()
        {
            return $this->radius;
        }
        public function setRadius($radius)
        {
            $this->radius = $radius;
        }
        public function getArea()
        {
            return pi() * pow($this->radius, 2);
        }
        public function getCircumference()
        {
            return 2 * pi() * $this->radius;
        }
    }
    if (isset($_POST['submit'])) {
        $radius = $_POST['radius'];
        $circle = new Circle($radius);
        echo "Radius: " . $circle->getRadius() . "<br>";
        echo "Area: " . $circle->getArea() ."sqmeter" ."<br>";
        echo "Circumference: " . $circle->getCircumference() ."meter". "<br>";
    }
    ?>
</body>

</html>