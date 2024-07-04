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
                    <li>
                        <a href="#">Perfect New Shoes at Any Price</a>
                        <span class="time">1 hour ago</span>
                    </li>
                    <li>
                        <a href="#">Why Kanye's Adidas Collection...</a>
                        <span class="time">2 hours ago</span>
                    </li>
                    <li>
                        <a href="#">Your Dog Can Tell Whether You're Happy or Sad</a>
                        <span class="time">3 hours ago</span>
                    </li>
                    <li>
                        <a href="#">John Kitzhaber Resigns as Oregon...</a>
                        <span class="time">4 hours ago</span>
                    </li>
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