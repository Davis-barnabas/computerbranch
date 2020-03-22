<?php
session_start();
require_once "dbh.inc.php";
$username = $_SESSION['userName'];
#Login confirmation message 
if (!isset($_SESSION['userName'])) {
    header("Location: ../login.php?");
    exit();
}
?>
<html>

<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <meta http-equiv="Location" content="upload.php">
     <style>
        html {
            scroll-behavior: smooth;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 1.2rem;
        }

        .but-sea {
            background-color: teal;
            color: white;
            border: none;
            padding: 0.75rem 1.2rem;
            margin-top: 1rem;
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        footer {
            margin-top: 3rem;
        }

        .infostud {
            margin-top: 3rem;
            margin-left: 1rem;
            margin-right: 1rem;
            border-radius: 10px;
            background-color: rgba(0, 203, 125, 0.83);
            padding: 2rem;

        }

        .header {
            font-size: 4rem;
        }
    </style>
</head>

<body>
    
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php
            echo '<div class="row">
                <div class="input-field col s5 l5">
                    <i class="material-icons prefix">school</i>
                    <select name="studRoll">
                        <option disabled selected>Roll number</option>
                        ';
            $s = "SELECT * from teachers where teaUsername='$username';";
            $r = mysqli_query($conn, $s);
            $t = mysqli_fetch_assoc($r);
            $class = $t['teaClass'];
            $sql = "SELECT * from students WHERE studYear='$class';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"" . $row['studRoll'] . "\">" . $row['studRoll'] . "</option>";
                }
            }
            echo '
                    </select>
                    <label class="black-text" style="font-family:\'Poppins\',sans-serif;">Roll number</label>
                  </div>
                    <div class="col offset-s2 s1 offset-l1 l2">
                    <input type="submit" name="marks-sub" class="but-sea" value="Search">
                   </div>';
            ?>
    </div>
    </form>

    <!--Displaying the details-->
    <?php
    if (isset($_POST['marks-sub'])) {
        $roll = $_POST['studRoll'];
        $sql = "SELECT * from students WHERE studRoll='$roll';";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<table class="highlight "><tr><th>';
            echo 'Roll number</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Gender</th>';
            echo '<th>Department</th>';
            echo '<th>Year</th>';
            echo '<th>Semester</th>';
            echo '<th>Phone Number</th>';
            echo '<th>Father Number</th>';
            echo '<th>Address</th>';
            echo '<th>Email</th></tr>';
            echo '<tr><td>' . $row['studRoll'] . '</td>';
            echo '<td>' . $row['studFname'] . '</td>';
            echo '<td>' . $row['studLname'] . '</td>';
            echo '<td>' . $row['studGender'] . '</td>';
            echo '<td>' . $row['studDep'] . '</td>';
            echo '<td>' . $row['studYear'] . '</td>';
            echo '<td>' . $row['studSemester'] . '</td>';
            echo '<td>' . $row['studPhone'] . '</td>';
            echo '<td>' . $row['studFatherPhone'] . '</td>';
            echo '<td>' . $row['studAddress'] . '</td>';
            echo '<td>' . $row['studEmail'] . '</td></tr></table>';
        }
    }
    ?>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
                duration: 500,
            });
            $(".button-collapse").sideNav();
            $('select').material_select();
            $(".dropdown-trigger").dropdown();
        });
    </script>
</body>

</html>