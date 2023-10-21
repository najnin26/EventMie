<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Reviews</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .r{
            text-align: center;
            font-size: 50px;
            color: white;
            padding: 20px;
            font-weight: 700;
        }
        .r:hover{
            color:var(--main-color);
            text-transform: uppercase;
        }
        .card-container {
            display: flex;
            justify-content: center;
            padding-bottom: 50px;
            padding-top: 20px;
        }

        .card {
            border: 1px solid black;
            padding: 10px;
            margin: 0 10px;
            width: 400px;
            height: 150px;
            max-width: 700px;
            background-color: #4a4c54;
            font-size: 2.5em;
            border-radius: 5px;
        }

        .user-info {
            margin-bottom: 10px;
            font-size: 20px;
            color: white;
            text-align: center;
        }

        .rating-golden {
            color: gold;
            font-size: 1.5em;
        }
        .rating-golden:hover {
            color: gold;
            font-size: 2em;
        }
        .rating-white {
            color: black;
            font-size: 1.5em;
        }
        .rating-white:hover {
            color: white;
            font-size: 2em;
        }
        .rating i {
            font-size: 20px;
            margin-right: 2px;
        }
    </style>
</head>
<body>
<h1 class="r">Client's Reviews</h1>

<div class="card-container">
    <?php
    include 'config.php';

    // Function to generate star icons based on rating
    function generateStars($rating) {
        $output = '';

        // Full star icons
        for ($i = 1; $i <= $rating; $i++) {
            $output .= '<i class="fas fa-star rating-golden"></i>';
        }

        // Half star icon if rating is not an integer
        if ($rating - floor($rating) >= 0.5) {
            $output .= '<i class="fas fa-star-half-alt rating-golden"></i>';
        }

        // Empty star icons
        for ($i = ceil($rating); $i < 5; $i++) {
            $output .= '<i class="far fa-star rating-white"></i>';
        }

        return $output;
    }

    // Fetching and displaying user reviews
    $select_reviews = mysqli_query($connection, "SELECT * FROM `review_table`") or die('query failed');
    if (mysqli_num_rows($select_reviews) > 0) {
        while ($review = mysqli_fetch_assoc($select_reviews)) {
            echo '<div class="card">';
echo '<div class="user-info">';
echo '<h3>Name : ' . $review['user_name'] . '</h3>';
echo '<p>Rating : ';
echo generateStars($review['user_rating']);
echo '</p>';
echo '<p>Review : ' . $review['user_review'] . '</p>';
echo '</div>';
echo '</div>';


        }
    } else {
        echo 'No reviews found.';
    }
    ?>
</div>
</body>
</html>
