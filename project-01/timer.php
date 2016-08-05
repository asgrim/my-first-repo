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
        <form action="">
            <div class="input-container">
                <div class="input-column">
                    <label for="hours">hour</label>
                    <input type="tel" name="hours" placeholder="0" pattern="[0-9]" min="0" max="999">
                </div>
                <div class="input-column">
                    <label for="mins">mins</label>
                    <input type="tel" name="mins" placeholder="0" pattern="[0-9]" min="0" max="59">
                </div>
                <div class="input-column">
                    <label for="seconds">seconds</label><br />
                    <input type="tel" name="seconds" placeholder="0" pattern="[0-9]" min="0" max="59">
                </div>
                <div class="clearfix"></div>
            </div>
            <input type="submit" value="Set Timer">
        </form>
    </div>

</div>

<div class="hidden-message">
    <p>No more down here! :)</p>
</div>

<script>
    document.ontouchmove = function(event){
        event.preventDefault();
    }
</script>

</body>
</html>