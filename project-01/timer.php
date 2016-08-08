<?php
declare(strict_types=1);

// Store and filter the input
$hours = (int)filter_input(INPUT_GET, 'hours', FILTER_SANITIZE_NUMBER_INT);
$mins = (int)filter_input(INPUT_GET, 'mins', FILTER_SANITIZE_NUMBER_INT);
$secs = (int)filter_input(INPUT_GET, 'secs', FILTER_SANITIZE_NUMBER_INT);

// Turn everything into seconds
$secs += ($hours * 60 * 60) + ($mins * 60);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Timer</title>

    <link rel="stylesheet" href="css/custom.css">
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
</head>
<body>

<div class="gradient page-wrapper">

    <div class="timer-container">
        <h1>Countdown</h1>
        <p>Just another countdown timer.</p>
        <?php if ($secs <= 0): ?>
                <form action="">
                    <div class="input-container">
                        <div class="input-column">
                            <label for="hours">hour</label>
                            <input type="tel" name="hours" placeholder="0" >
                        </div>
                        <div class="input-column">
                            <label for="mins">mins</label>
                            <input type="tel" name="mins" placeholder="0" >
                        </div>
                        <div class="input-column">
                            <label for="secs">secs</label><br />
                            <input type="tel" name="secs" placeholder="0" >
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <input type="submit" value="Set Timer">
                </form>
        <?php else: ?>
            <div class='countdown'>
                <div class='input-container'>
                    <p id="time">0</p>
                </div>
                <a class='btn' href='timer.php'>Reset</a>
            </div>
        <?php endif; ?>

    </div>

</div>

<div class="hidden-message">
    <p>No more down here! :)</p>
</div>

<script>
    document.ontouchmove = function(event){
        event.preventDefault();
    };

    var countdown = <?= $secs > 0 ? 'true' : 'false'; ?>;
    var totalSeconds = <?= $secs; ?>;

    if (countdown) {
        UpdateTime(totalSeconds); // update countdown text with start time

        // initiate countdown
        var myTimer = setInterval(function() {
            AdjustTime()
        }, 1000);

        function AdjustTime()
        {
            totalSeconds--;
            UpdateTime(totalSeconds); // update countdown text every time

            if (totalSeconds === 0) {
                TimesUp();
            }
        }

        function TimesUp()
        {
            clearInterval(myTimer);
            beep();
        }

        function beep()
        {
            var snd = new Audio("sound/chime.wav");
            snd.play();
        }
    }

    function UpdateTime(timeRemaining)
    {
        var hours   = Math.floor(timeRemaining / 3600);
        var minutes = Math.floor((timeRemaining - (hours * 3600)) / 60);
        var seconds = timeRemaining - (hours * 3600) - (minutes * 60);

        if (hours   < 10) {
            hours   = "0" + hours;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }

        document.getElementById("time").innerHTML = hours + ':' + minutes + ':' + seconds;
    }

</script>

</body>
</html>
