<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings</title>
    <style>
        .rating {
    display: flex;
    flex-direction: row-reverse;
}

.rating input {
    display: none;
}

.rating label {
    cursor: pointer;
    width: 25px;
    height: 25px;
    background-image: url('../nimages/star2.png');
    background-size: cover;
}

.rating input:checked ~ label {
    background-image: url('../nimages/star2.png');
}

textarea {
    width: 100%;
    height: 100px;
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    margin-top: 10px;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
}

    </style>
</head>
<body>
    <form id="ratingForm" action="submit_rating.php" method="post">
    <input type="hidden" name="providerId" id="providerId">
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5" />
            <label for="star5" title="5 stars"></label>
            <input type="radio" id="star4" name="rating" value="4" />
            <label for="star4" title="4 stars"></label>
            <input type="radio" id="star3" name="rating" value="3" />
            <label for="star3" title="3 stars"></label>
            <input type="radio" id="star2" name="rating" value="2" />
            <label for="star2" title="2 stars"></label>
            <input type="radio" id="star1" name="rating" value="1" />
            <label for="star1" title="1 star"></label>
        </div>
        <textarea id="feedback" name="feedback" placeholder="Leave your feedback"></textarea>
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>