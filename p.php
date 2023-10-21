<?php
$conn = mysqli_connect("localhost", "root", "", "user_db");
$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    .container-x {
    text-align: center;
    margin-bottom: 30px;
}

.container-x h1 {
    color: var(--main-color);
    font-size: 5em;
    font-family: Roboto;
    margin-bottom: 30px;
    margin-top: 20px;
    font-weight: 600;
}

.container-x .event-card {
    height: 400px;
    width: 300px;
    padding: 15px;
    background-color: #4a4c54;
    overflow: hidden;
    transition: 0.3s ease;
    margin: 15px;
    font-family: 'Roboto';
    display: inline-block;
    vertical-align: top;
    border-radius: 8px;
}

.container-x .event-card h4 {
    color: white;
    margin-top: 20px;
    margin-bottom: 15px;
    transition: inherit;
    transition-delay: 0.5s;
    font-size: 20px;
}

.container-x .event-card img {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    margin-bottom: 10px;
}

.container-x .event-card .read {
    color: #f4f3f3;
    overflow: hidden;
    display: inline-block;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 700;
    color: #fff;
    position: relative;
    padding-right: 2rem;
}

.container-x .event-card .read:before {
    background: #FFC312;
    bottom: 0;
    height: .125rem;
    margin: auto;
    left: 0;
    content: '';
    position: absolute;
    top: 0;
    width: 100%;
    transform: scaleX(.2);
    transform-origin: left center;
    z-index: 0;
    animation: link;
    animation-fill-mode: forwards;
    animation-duration: 0.4s;
    animation-timing-function: cubic-bezier(0.6, 0.01, 0, 1);
}

.container-x .event-card .read span {
    position: relative;
    color: #fcfbfb;
    transform: translateX(-200%);
    display: inline-block;
    transition: 0.6s cubic-bezier(0.6, 0.01, 0, 1);
}

.container-x .event-card:hover .read span {
    transform: translateX(0%);
}

.container-x .event-card:hover .read:before {
    animation: link-in;
    animation-fill-mode: forwards;
    animation-duration: 0.4s;
    animation-timing-function: cubic-bezier(0.6, 0.01, 0, 1);
}

.container-x .event-card:hover h4,
.container-x .event-card:hover img,
.container-x .event-card:hover .read {
    transform: translateY(-0.625rem);
}

</style>
</head>
<body>
<div class="container-x">
    <div>
        <h1><span>New Events</span></h1>
    </div>
    <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
        <div class="event-card">
            <h4>Event id: <?php echo $fetch['event_id']; ?></h4>
            <h4>Event name: <?php echo $fetch['event_name']; ?></h4>
            <?php
            $imagePath = "images/" . $fetch['event_image'];
            if (file_exists($imagePath)) {
                $imageInfo = pathinfo($imagePath);
                $imageExtension = strtolower($imageInfo['extension']);
                if (in_array($imageExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo '<img src="' . $imagePath . '" alt="Event Image">';
                } else {
                    echo 'Invalid Image Type';
                }
            } else {
                echo 'Image not found';
            }
            ?>
            <a class="read" href="book.php"><span>Book Now</span></a>
        </div>
    <?php } ?>
</div>

</body>
