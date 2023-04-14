<?php
$servername = "localhost";
$username = "yebidyco_football";
$password = "p+L}Wpj4.$^-";
$dbname = "yebidyco_football";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixtures</title>
<style>
    .fixtures {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .fixtures-body {
        overflow-x: auto;
        margin-bottom: 20px;
    }

    .fixture-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px;
        width: 100%;
    }

    .fixture-header-item, .fixture-item {
        padding: 10px;
        text-align: center;
        width: 100%;
    }

    /*.fixture-header-item {*/
    /*    font-weight: bold;*/
    /*    background-color: #eee;*/
    /*    flex-basis: 100%;*/
    /*}*/


    @media screen and (min-width: 768px) {
        .fixture-header-item, .fixture-item {
            padding: 15px;
        }

        .fixture-header-item {
            flex-basis: 20%;
        }

        .fixture-item {
            flex-basis: 16.66%;
        }
    }
    form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    select {
        width: 100%;
        max-width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin: 10px;
        cursor: pointer;
    }

    @media (max-width: 480px) {
        input[type="date"] {
            max-width: 100%;
        }
    }


</style>
</head>
<body>
<form method="post">
    <select id="bet_type" name="bet_type">
        <option value="" Selected>Select Bet Type</option>
        <option value="home_win">Home Win</option>
        <option value="away_win">Away Win</option>
        <option value="over1.5">Over 1.5 Goals</option>
        <option value="over2.5">Over 2.5 Goals</option>
        <option value="home_no_cleansheet">Home No Cleansheet</option>
        <option value="away_no_cleansheet">Away No Cleansheet</option>
    </select>
    <button type="submit">Submit</button>
</form>

<?php
$hour_ago = date('Y-m-d H:i:s', strtotime('-1 hour'));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['bet_type'] == 'home_win'){
        $sql = "SELECT * FROM fixtures WHERE date >= '$hour_ago' AND home_last_5_form > '70' AND away_last_5_form < '30' ORDER BY contentid ASC";
    } elseif($_POST['bet_type'] == 'away_win'){
        $sql = "SELECT * FROM fixtures WHERE date >= '$hour_ago' AND away_last_5_form > '70' AND home_last_5_form < '30' ORDER BY contentid ASC";
    } elseif($_POST['bet_type'] == 'over1.5'){
        $sql = "SELECT * FROM fixtures WHERE (SUBSTRING(home_goals_for, 1, 1) >= 1 AND SUBSTRING(home_goals_for, 5, 1) >= 1 OR SUBSTRING(away_goals_for, 1, 1) >= 1 AND SUBSTRING(away_goals_for, 5, 1) >= 1) AND date >= '$hour_ago'";
    } elseif($_POST['bet_type'] == 'over2.5'){
        $sql = "SELECT * FROM fixtures WHERE (SUBSTRING(home_goals_for, 1, 1) >= 2 AND SUBSTRING(home_goals_for, 5, 1) >= 2 OR SUBSTRING(away_goals_for, 1, 1) >= 2 AND SUBSTRING(away_goals_for, 5, 1) >= 2) AND date >= '$hour_ago'";
    } elseif($_POST['bet_type'] == 'home_no_cleansheet'){
        $sql = "SELECT * FROM fixtures WHERE date >= '$hour_ago' AND SUBSTRING_INDEX(home_clean_sheet, ',', 1) <= 1";
    } elseif($_POST['bet_type'] == 'away_no_cleansheet'){
        $sql = "SELECT * FROM fixtures WHERE date >= '$hour_ago' AND SUBSTRING_INDEX(away_clean_sheet, ',', 2) <= 1";
    } else {

    }

} else {
    $sql = "SELECT * FROM fixtures WHERE date >= '$hour_ago' ORDER BY contentid ASC";
}
//    $sql = "SELECT * FROM fixtures WHERE DATE(date) = '$date' ORDER BY contentid ASC";
    $result = $conn->query($sql);

// Process result set
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
//            echo "ID: " . $row["id"] . "<br>";

            ?>
            <div class="fixtures">
                <div class="fixtures-body">

                    <div class="fixture-row">
                        <div class="fixture-header-item">ID:<br><?php echo $row["id"]; ?></div>
                        <div class="fixture-header-item">Country:<br><?php echo $row["country"]; ?></div>
                        <div class="fixture-header-item">League:<br><?php echo $row["league"]; ?></div>
                        <div class="fixture-header-item">Date / Time:<br>
                            <?php
                            $date_str = $row["date"]; // input date string
                            $date = new DateTime($date_str); // create a DateTime object from the input string
                            $date->setTimezone(new DateTimeZone('Europe/London')); // convert to London timezone
                            $output_str = $date->format('d/m/Y H:i:s'); // format the date as a string in UK format
                            echo $output_str; // output the formatted date string
                            ?>
                        </div>
                        <div class="fixture-header-item">Home Team:<br><?php echo $row["home"]; ?></div>
                        <div class="fixture-header-item">Away Team:<br><?php echo $row["away"]; ?></div>
                        <div class="fixture-header-item">Prediction:<br>
                            <?php
                            if($_POST['bet_type'] == 'home_win'){
                                echo "<span style='font-weight: bold; color: #FF0000'>Home Win</span>";
                            } elseif($_POST['bet_type'] == 'away_win'){
                                echo "<span style='font-weight: bold; color: #FF0000'>Away Win</span>";
                            } elseif($_POST['bet_type'] == 'over1.5'){
                                echo "<span style='font-weight: bold; color: #FF0000'>Over 1.5 Goals</span>";
                            } elseif($_POST['bet_type'] == 'over2.5'){
                                echo "<span style='font-weight: bold; color: #FF0000'>Over 2.5 Goals</span>";
                            } elseif($_POST['bet_type'] == 'home_no_cleansheet'){
                                echo "<span style='font-weight: bold; color: #FF0000'>Home Team No Clean Sheet</span>";
                            } elseif($_POST['bet_type'] == 'away_no_cleansheet'){
                                echo "<span style='font-weight: bold; color: #FF0000'>Away Team No Clean Sheet</span>";
                            } else {
                                echo "<span style='font-weight: bold; color: #FF0000'>Please select a bet type</span>";
                            }
                            ?></div>
<!--                        <div class="fixture-header-item">Comment:<br>--><?php //echo $row["comment"]; ?><!--</div>-->
<!--                        <div class="fixture-header-item">Advice:<br>--><?php //echo $row["advice"]; ?><!--</div>-->
                        <div class="fixture-header-item">Home Team Last 5 Fixtures Form:<br><?php echo $row["home_last_5_form"]; ?>%</div>
                        <div class="fixture-header-item">Away Team Last 5 Fixtures Form:<br><?php echo $row["away_last_5_form"]; ?>%</div>
                        <div class="fixture-header-item">Home Team Form:<br><?php echo $row["home_form"]; ?></div>
                        <div class="fixture-header-item">Away Team Form:<br><?php echo $row["away_form"]; ?></div>
                        <div class="fixture-header-item">No. of Time Home Team Played:<br>
                            <?php
                            $value = $row["home_played"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Home Team Won:<br>
                            <?php
                            $value = $row["home_wins"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Home Team Lost:<br>
                            <?php
                            $value = $row["home_loss"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Home Team Draw:<br>
                            <?php
                            $value = $row["home_draw"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Away Team Played:<br>
                            <?php
                            $value = $row["away_played"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Away Team Won:<br>
                            <?php
                            $value = $row["away_wins"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Away Team Lost:<br>
                            <?php
                            $value = $row["away_loss"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">No. of Time Away Team Draw:<br>
                            <?php
                            $value = $row["away_draw"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Home Team Clean Sheets:<br>
                            <?php
                            $value = $row["home_clean_sheet"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Away Team Clean Sheets:<br>
                            <?php
                            $value = $row["away_clean_sheet"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Home Team Average Goals Scored:<br>
                            <?php
                            $value = $row["home_goals_for"];
                            $numbers = explode(",", $value);
                            $first_number = number_format((float) $numbers[0], 1);
                            $second_number = number_format((float) $numbers[1], 1);
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Home Team Average Goals Conceded:<br>
                            <?php
                            $value = $row["home_goals_against"];
                            $numbers = explode(",", $value);
                            $first_number = number_format((float) $numbers[0], 1);
                            $second_number = number_format((float) $numbers[1], 1);
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Away Team Average Goals Scored:<br>
                            <?php
                            $value = $row["away_goals_for"];
                            $numbers = explode(",", $value);
                            $first_number = number_format((float) $numbers[0], 1);
                            $second_number = number_format((float) $numbers[1], 1);
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Away Team Average Goals Conceded:<br>
                            <?php
                            $value = $row["Away_goals_against"];
                            $numbers = explode(",", $value);
                            $first_number = number_format((float) $numbers[0], 1);
                            $second_number = number_format((float) $numbers[1], 1);
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Home Team Failed To Score:<br>
                            <?php
                            $value = $row["home_failed_to_score"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                        <div class="fixture-header-item">Away Team Failed To Score:<br>
                            <?php
                            $value = $row["away_failed_to_score"];
                            $numbers = explode(",", $value);
                            $first_number = (int) $numbers[0];
                            $second_number = (int) $numbers[1];
                            echo "Home: $first_number, Away: $second_number ";
                            ?>
                        </div>
                    </div>

                </div>
            </div>
<?php
        }
    } else {
        echo "No results found.";
    }

// Close connection
    $conn->close();
//}
?>
</body>
</html>
