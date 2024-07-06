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
                        <li><a href="Home.php">Home</a></li>
                        <li><a href="Politics.php">Politics</a></li>
                        <li><a href="Entertain.php">Entertainment</a></li>
                        <li><a href="Style.php">Style</a></li>
                        <li><a href="Sports.php">Sport</a></li>
                        <li><a href="Health.php">Health</a></li>
                        <li><a href="Food.php">Food</a></li>
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
                <?php

                $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                $sql = "SELECT id, PostTitle, PostDetails FROM tblposts WHERE viewCounter > 900";
                $result = $conn->query($sql);

        if ($result === false) {
            die("ERROR: Could not execute query: $sql. " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = $result->fetch_assoc() && $count < 4) {
                echo '<div class="popular-article">';
                echo '<a href="news-details.php?nid=' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">';
                echo '<h2>' . htmlspecialchars($row['PostTitle'], ENT_QUOTES, 'UTF-8') . '</h2>';
                echo '<p>' . htmlspecialchars(substr($row['PostDetails'], 0, 90), ENT_QUOTES, 'UTF-8') . '...</p>';
                echo '</a>';
                echo '</div>';
                $count++;
            }
        } else {
            echo '<p>No popular articles found.</p>';
        }

        mysqli_close($conn);
        ?>
        </div>
    </div>
            
            <div class="weather">
                <div class="weather-head"><h3>Weather</h3></div>
                <div class="weather-forecast">
                    <div class="forecast  first">
                            <div class="condition"><span>Cloudy</span></div>
                            <div class="icon"><i class="fa-solid fa-cloud"></i></div>
                            <div class="temp"><span>18°</span></div>
                            <div class="day"><span>March 21<br>Monday</span></div>
                    </div>
                    <div class="forecast  second">
                        <div class="condition"><span>Sunny</span></div>
                        <div class="icon"><img src="sun.png" alt="" height="38rem" width="38rem"></div>
                        <div class="temp"><span>32°</span></div>
                        <div class="day"><span>March 22<br>Tuesday</span></div>
                    </div>
                    <div class="forecast  third ">
                        <div class="condition"><span>Rainy</span></div>
                        <div class="icon"><i class="fa-solid fa-cloud-rain"></i></div>
                        <div class="temp"><span>6°</span></div>
                        <div class="day"><span>March 22<br>Tuesday</span></div>
                    </div>
                    <div class="forecast  fourth">
                        <div class="condition"><span>Snowy</span></div>
                        <div class="icon"><i class="fa-solid fa-snowflake"></i></div>
                        <div class="temp"><span>-11°</span></div>
                        <div class="day"><span>March 24<br>Thursday</span></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="featured-article">
                <div class="article-content">
                    <?php
                // Include the database connection script
           
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, PostTitle, PostDetails, PostingDate, PostImage, viewCounter 
            FROM tblposts 
            WHERE Is_Active=1 
            ORDER BY PostingDate DESC";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
        function isVideoByExtension($filePath) {
        $videoExtensions = ['mp4', 'avi', 'wmv', 'flv', 'mkv', 'mov', 'mpeg'];
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        return in_array(strtolower($fileExtension), $videoExtensions);
        }

        $videoFound = false; // Flag to track if video is found

        while ($row = $result->fetch_assoc()) {
        $filePath = $row['PostImage'];

        if (isVideoByExtension($filePath)) {
        $videoFound = true; // Set flag to true when video is found
        echo '<a href="news-details.php?nid=' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">';
        echo '<h2>' . htmlspecialchars($row['PostTitle'], ENT_QUOTES, 'UTF-8') . '</h2>';
        echo '<video width="100%" height="240" controls autoplay loop>
                <source src="admin/postimages/' . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8') . '" type="video/mp4">
                Your browser does not support the video tag.
            </video>';
        echo '<p>' . htmlspecialchars(substr($row['PostDetails'], 0, 100), ENT_QUOTES, 'UTF-8') . '...</p>';
        echo '<div class="meta">';
        echo '<span>viewed by ' . htmlspecialchars($row['viewCounter'], ENT_QUOTES, 'UTF-8') . ' people</span>';
        echo '</div>';
        echo'</a>';
        break; // Exit the loop once video is found

        }
        }

        if (!$videoFound) {
        // If no video was found, show default message
        echo "No video posts found.";
        }
        } else {
        echo "No posts found.";
        }
        $conn->close();
        ?>
                </div>
            </div>
        <div class="side-articles">
            <?php
          $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            // Define the SQL query to fetch the latest side articles
            $sql = "SELECT id, PostTitle, PostDetails, PostingDate, PostImage FROM tblposts WHERE Is_Active=1  ORDER BY PostingDate DESC LIMIT 2";
            $result = $conn->query($sql);

            // Check if there are any results
            if ($result->num_rows > 0) {
                // Display each post
                while($row = $result->fetch_assoc()) {
                    echo '<a href="news-details.php?nid=' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">';
                    echo '<div class="side-article">';
                    echo '<p class="heading">' . $row['PostTitle'] . '</p>';
                    echo '<img src="admin/postimages/' . $row['PostImage'] . '" alt="" height="60%" width="100%">';
                    // echo '<p>By ' . $row['Author'] . '</p>';
                    echo '</div>';
                    echo'</a>';
                }
            } else {
                echo "<p>No side articles found.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
                                      
            <aside class="recent-news">
                <h3>Recent News</h3>
                <ul>
                <?php
                // Reconnect to the database
                $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

                // Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
               
                // Define the SQL query to fetch the recent news
                $sql = "SELECT id, PostTitle,DATE(PostingDate) as PostingDate  FROM tblposts WHERE Is_Active=1 ORDER BY PostingDate DESC LIMIT 4";
                $result = $conn->query($sql);

                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Display each post
                    while($row = $result->fetch_assoc()) {
                        $postID = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                        $postTitle = htmlspecialchars($row['PostTitle'], ENT_QUOTES, 'UTF-8');
                        $postingDate = htmlspecialchars($row['PostingDate'], ENT_QUOTES, 'UTF-8');
                    
                        // Generate the link and list item
                        echo '<li>';
                        echo '<a href="news-details.php?nid=' . $postID . '">' . $postTitle . '</a>';
                        echo '<span class="time">' . $postingDate . '</span>';
                        echo '</li>';
                    }
                } else {
                    echo "<li>No recent news found.</li>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </ul>
            </aside>
        </section>
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
              
                </div>
            <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
            <button class="next" onclick="plusSlides(1)">&#10095;</button>
        </section>
        
        
         
            

        <section class="mycontent">  
        <div class="mycontainer">
            <div class="featured-article1">
                <?php
                // Reconnect to the database
                $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

                // Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                
                // Define the SQL query to fetch the featured articles
                $sql = "SELECT id, PostTitle, PostDetails, PostingDate, PostImage,viewCounter FROM tblposts WHERE Is_Active=1  ORDER BY PostingDate DESC";
                $result = $conn->query($sql);
          
                if ($result->num_rows > 0) {
                    echo '<section class="mycontent">';  
                    echo '<div class="mycontainer">';
                    
                    $count = 0;

                    while ($row = $result->fetch_assoc()) {
                        if ($count >= 6) {
                            break;
                        }
                        
                        if ($count % 3 == 0) {
                            if ($count > 0) {
                                echo '</div>'; // Close previous featured-article1 div
                            }
                            echo '<div class="featured-article1">';
                        }
                    
                        echo '<div class="article-content1">';
                        echo '<a href="news-details.php?nid=' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">';
                        echo '<h2>' . htmlspecialchars($row['PostTitle'], ENT_QUOTES, 'UTF-8') . '</h2>';
                        echo '<img src="admin/postimages/' . htmlspecialchars($row['PostImage'], ENT_QUOTES, 'UTF-8') . '" alt="" height="60%" width="100%">';
                        echo '<p>' . htmlspecialchars(substr($row['PostDetails'], 0, 90), ENT_QUOTES, 'UTF-8') . '...</p>';
                        echo '<div class="meta">';
                        // Example meta data can be added here
                        echo '<span>viewed by: ' . htmlspecialchars($row['viewCounter'], ENT_QUOTES, 'UTF-8') . ' people</span>';
                        echo '</a>';
                        echo '</div>';
                        echo '</div>';
                    
                        $count++;
                    }
                    
                    if ($count > 0) {
                        echo '</div>'; // Close the last featured-article1 div if there were any articles
                    }
                    
                    echo '</div>'; 
                    echo '</section>';
                }
                                
                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>


        </section>    
            
    </main>
    <footer>
        <p>&copy; 2024 News Portal. All rights reserved.</p>
    </footer>
    <script>
        let slideIndex = 0;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        
        function showSlides(n) {
            let slides = document.getElementsByClassName("slide");
            if (n >= slides.length) {slideIndex = 0}    
            if (n < 0) {slideIndex = slides.length - 1}
            let sliderContainer = document.querySelector('.slider-container');
            sliderContainer.style.transform = `translateX(-${slideIndex * 100}%)`;
        }
        
        document.getElementById("loginButton").addEventListener("click", function() {
            window.location.href = "admin/";
        });
    </script>  
    
        
</body>
</html>

<!-- this is my hone -->