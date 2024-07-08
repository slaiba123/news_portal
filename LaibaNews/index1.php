<?php 
session_start();
include('includes/config.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal Layout</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <header>
        <div class="head_padding">
            <div class="nav-box nav-box1">
                
            <h1>News Portal</h1></div>
            <div class="nav-box nav-box2">
                <nav>
                    <ul>
                        <li><a href="Home.html">Home</a></li>
                        <li><a href="politics.html">Politics</a></li>
                        <li><a href="entertain.html">Entertainment</a></li>
                        <li><a href="style.html">Style</a></li>
                        <li><a href="sport.html">Sport</a></li>
                        <li><a href="Health.html">Health</a></li>
                        <li><a href="food.html">Food</a></li>
                        <li><button class="nav-button" id="surveyButton">Survey</button></li>
                        <li><button class="nav-button" id="loginButton">LOGIN</button></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section class="extra-content">
            <div class="most-popular">
                <div class="most-popular-head">
                    <div class="most-p-icon"><i class="fa-regular fa-heart"></i></div>
                    <div class="m-p-text"><h3>Most Popular</h3></div>
                </div>
                <div class="popular-articles">
                    <div class="popular-article">
                        <h4>Eddie Trunk's 10 Favorite Metal Show Guests</h4>
                        <p>The metal host tells us the highlights, including Axl Rose's late-night...</p>
                    </div>
                    <div class="popular-article">
                        <h4>'Spectre' Is Perfect, Says 2015 Oscar-Nominated Writer</h4>
                        <p>Imagine if 'Inception' came starred Keanu Reeves...</p>
                    </div>
                    <div class="popular-article">
                        <h4>Applause, Please, for This Week's Style Heroes</h4>
                        <p>Moore, Candy, Smith, and Penn are just three of our favorite dressers right now...</p>
                    </div>
                </div>
            </div>
        
        <?php include('weather.php')  ?>

        </section>
        <section class="content">
            <div class="featured-article">
                <div class="article-content">
                    <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                    <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                    <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                    <div class="meta">
                        <span>13</span>
                        <span>34</span>
                        <span>99</span>
                        <span>Komol Kuckharov</span>
                    </div>
                </div>
            </div>
                        <div class="side-articles">
                            <div class="side-article">
                                <p class="heading">Watch Triumph Poop on Fallon's Game</p>
                                <img src="images/mushroom.jpeg" alt="" height="60%" width="100%">
                                <p>By Komol Kuckharov</p>
                            </div>
                            <div class="side-article">
                                <p class="heading">Watch Triumph Poop on Fallon's Game</p>
                                <img src="images/mushroom.jpeg" alt="" height="60%" width="100%">
                                <p>By Alexander Babarov</p>
                            </div>
                        </div>
                                      
            <aside class="recent-news">
                <h3>Recent News</h3>
                <ul>
                <?php
$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>
                    <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>


                    <?php } ?>
                </ul>
            </aside>
        </section>
<?php
        function sanitize_input($con, $input) {
    return mysqli_real_escape_string($con, htmlspecialchars(strip_tags($input)));
}


// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_response'])) {
        // Assuming you have a logged in user with an ID stored in $user_id
        $user_id = 0; // Replace with actual user ID retrieval logic
        
        // Sanitize the response input (assuming it's a text input)
        $response = sanitize_input($con, $_POST['survey_response']);
        
        // Insert the response into survey_response table
        $sql_insert = "INSERT INTO survey_response (user_id, response_text) VALUES ('$user_id', '$response')";
        
        if ($con->query($sql_insert) === TRUE) {
            echo "Response saved successfully!";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $con->error;
        }
    }
}
?>

     

<section class="slider">
            <div class="slider-container">
                <div class="slide">
                    <div class="slide-item">
                        <a href="post1.html">
                            <img src="image1.jpeg" alt="News Image 1">
                            <div class="description">
                                <h3>News Headline 1</h3>
                                <p>Brief description of news 1...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post2.html">
                            <img src="image2.jpg" alt="News Image 2">
                            <div class="description">
                                <h3>News Headline 2</h3>
                                <p>Brief description of news 2...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post3.html">
                            <img src="image3.jpg" alt="News Image 3">
                            <div class="description">
                                <h3>News Headline 3</h3>
                                <p>Brief description of news 3...</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-item">
                        <a href="post4.html">
                            <img src="image4.jpg" alt="News Image 4">
                            <div class="description">
                                <h3>News Headline 4</h3>
                                <p>Brief description of news 4...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post5.html">
                            <img src="image5.jpg" alt="News Image 5">
                            <div class="description">
                                <h3>News Headline 5</h3>
                                <p>Brief description of news 5...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post6.html">
                            <img src="image6.jpg" alt="News Image 6">
                            <div class="description">
                                <h3>News Headline 6</h3>
                                <p>Brief description of news 6...</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-item">
                        <a href="post7.html">
                            <img src="image7.jpg" alt="News Image 7">
                            <div class="description">
                                <h3>News Headline 7</h3>
                                <p>Brief description of news 7...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post8.html">
                            <img src="image8.jpg" alt="News Image 8">
                            <div class="description">
                                <h3>News Headline 8</h3>
                                <p>Brief description of news 8...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post9.html">
                            <img src="image9.jpg" alt="News Image 9">
                            <div class="description">
                                <h3>News Headline 9</h3>
                                <p>Brief description of news 9...</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slide">
                    <div class="slide-item">
                        <a href="post10.html">
                            <img src="image10.jpg" alt="News Image 10">
                            <div class="description">
                                <h3>News Headline 10</h3>
                                <p>Brief description of news 10...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post11.html">
                            <img src="image11.jpg" alt="News Image 11">
                            <div class="description">
                                <h3>News Headline 11</h3>
                                <p>Brief description of news 11...</p>
                            </div>
                        </a>
                    </div>
                    <div class="slide-item">
                        <a href="post12.html">
                            <img src="image12.jpg" alt="News Image 12">
                            <div class="description">
                                <h3>News Headline 12</h3>
                                <p>Brief description of news 12...</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
            <button class="next" onclick="plusSlides(1)">&#10095;</button>
        </section>



    
        
        
         
            

        <section class="mycontent">  
            <div class="mycontainer">

              <div class="featured-article1">
                <div class="article-content1">
                    <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                    <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                    <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                    
                    <div class="meta">
                        <span>13</span>
                        <span>34</span>
                        <span>99</span>
                        <span>Komol Kuckharov</span>
                    </div>
                </div>
                

                <div class="article-content1">
                    <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                    <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                    <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                    <div class="meta">
                        <span>13</span>
                        <span>34</span>
                        <span>99</span>
                        <span>Komol Kuckharov</span>
                    </div>
                </div>

                <div class="article-content1">
                    <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                    <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                    <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                    <div class="meta">
                        <span>13</span>
                        <span>34</span>
                        <span>99</span>
                        <span>Komol Kuckharov</span>
                    </div>
                </div>
              </div>
              <div class="featured-article1">
                    <div class="article-content1">
                        <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                        <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                        <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                        <div class="meta">
                            <span>13</span>
                            <span>34</span>
                            <span>99</span>
                            <span>Komol Kuckharov</span>
                        </div>
                    </div>
            

                        <div class="article-content1">
                            <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                            <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                            <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                            <div class="meta">
                                <span>13</span>
                                <span>34</span>
                                <span>99</span>
                                <span>Komol Kuckharov</span>
                            </div>
                        </div>

          
                        <div class="article-content1">
                            <h2>Why 'Boyhood' Will Be the 'Pulp Fiction' of the 2015 Oscars</h2>
                            <img src="images/mushroom.jpeg" alt="" height="50%" width="100%">
                            <p>Even if it doesn't win Best Picture, 'Boyhood', not 'Birdman' or 'American Sniper', will be the movie we cherish the longest.</p>
                            <div class="meta">
                                <span>13</span>
                                <span>34</span>
                                <span>99</span>
                                <span>Komol Kuckharov</span>
                            </div>
                        </div>
                </div>
                
            </div>


        </section>    
            
   <!-- The Modal -->
   <div id="surveyModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Would you like to participate in our survey?</p>
        <button onclick="handleSurveyClick()">Yes</button>
        <button id="noButton">No</button>
    </div>
</div>


    
    <footer>
        <p>&copy; 2024 News Portal. All rights reserved.</p>
    </footer>

    

    <script>
    // Get the modal
    var modal = document.getElementById("surveyModal");

    // Get the button that opens the modal
    var btn = document.getElementById("surveyButton");

    // Get the button that says No
    var noBtn = document.getElementById("noButton");

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on No button or outside the modal, close it
    noBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Check if user is logged in when clicking Yes button
    function handleSurveyClick() {
        // Check if user is logged in (you can adjust this condition as per your session variable structure)
        <?php if(isset($_SESSION['login'])) { ?>
            // Redirect to survey.php if logged in
            window.location.href = "survey.php";
        <?php } else { ?>
            // Display message and redirect to login page if not logged in
            alert("You need to be logged in to participate in our survey.");
            window.location.href = "admin/"; // Adjust this URL to your login page
        <?php } ?>
    }
</script>
 
    
        
</body>
</html>