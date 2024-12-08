<!DOCTYPE html>
<html lang="en">
<?php

require_once('includes/connect.php');

$query = 'SELECT * FROM `media` ORDER BY `media`.`caption` ASC';

$results = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($results);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <title>Portfolio</title>
</head>
<body>

    <!-- HEADER -->
    <header id="main-header" class="grid-con">
        <img id="logo" class="col-span-1" src="images/invert_logo.svg" alt="girl sitting on moon looking at star icon">
        <h2 class="hidden">Main Navigation</h2>
            <nav id="main-nav" class="grid-con col-start-4 m-col-start-6 m-col-span-full">
                <label id="checkbox" class="grid-con col-start-2">
                    <input type="checkbox" id="toggleCheckbox">
                    <svg width="60" height="60" viewBox="0 0 100 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path id="line7" d="M2 73H58" stroke="white" stroke-width="4" stroke-linecap="round" />
                      <path id="line6" d="M2 59H58" stroke="white" stroke-width="4" stroke-linecap="round" />
                      <path id="line5" d="M2 44H58" stroke="white" stroke-width="4" stroke-linecap="round" />
                      <path id="darc" d="M2 27C2 27 14.6452 2 30 2C45.3548 2 58 27 58 27" stroke="white" stroke-width="4" stroke-linecap="round" />
                    </svg>
                    <svg class="checked" width="101" height="4" viewBox="0 0 101 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g id="portal">
                        <path id="line3" d="M2 73L42 73" stroke="white" stroke-width="4" stroke-linecap="round" />
                        <path id="line2" d="M12 59L42 59" stroke="white" stroke-width="4" stroke-linecap="round" />
                        <path id="line1" d="M27 44L42 44" stroke="white" stroke-width="4" stroke-linecap="round" />
                        <path id="arc" d="M56 84V27C56 27 56 2 77.5 2C99 2 99 27 99 27V84H56Z" stroke="white" stroke-width="3" stroke-linecap="square" />
                      </g>
                    </svg>
                  </label>
                <div class="grid-con col-span-full" id="burger-con">
                    <ul class="nav-menu grid-con col-span-full m-col-span-full">
                        <li class="nav-link m-col-start-4 m-col-span-2 col-start-1 col-span-full"><a href="#">About</a></li>
                        <li class="nav-link m-col-start-6 m-col-span-4 col-start-1 col-span-full"><a href="case-study.html">Case Studies</a></li>
                        <li class="nav-link m-col-start-11 m-col-span-2 col-start-1 col-span-full"><a href="#">Contact</a></li>
                    </ul>
                </div>
            </nav>

            <!-- HERO -->  
            </div>
        <section id="hero" class="grid-con col-span-full">
            <?xml version="1.0" encoding="UTF-8"?>
        <svg class="hero-bg" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 427 335">
  <!-- Generator: Adobe Illustrator 29.1.0, SVG Export Plug-In . SVG Version: 2.1.0 Build 142)  -->
  <defs>
    <style>
      .st0 {
        fill: url(#radial-gradient);
      }

      .st0, .st1, .st2 {
        stroke-width: .5px;
      }

      .st0, .st1, .st2, .st3 {
        stroke: #fff;
      }

      .st1 {
        fill: url(#radial-gradient2);
      }

      .st2 {
        fill: url(#radial-gradient3);
      }

      .st3 {
        fill: url(#radial-gradient1);
        stroke-width: .3px;
      }
    </style>
    <radialGradient id="radial-gradient" cx="63.4" cy="302" fx="63.4" fy="302" r="49.9" gradientUnits="userSpaceOnUse">
      <stop offset="0" stop-color="#fff"/>
      <stop offset="1" stop-color="#fff"/>
    </radialGradient>
    <radialGradient id="radial-gradient1" cx="80.3" cy="18" fx="80.3" fy="18" r="17.8" xlink:href="#radial-gradient"/>
    <radialGradient id="radial-gradient2" cx="369.8" cy="276.5" fx="369.8" fy="276.5" r="43.3" xlink:href="#radial-gradient"/>
    <radialGradient id="radial-gradient3" cx="330.7" cy="25.2" fx="330.7" fy="25.2" r="35.7" xlink:href="#radial-gradient"/>
  </defs>
  <path class="st0" d="M115.3,304.5l-29.7,25.1M55.9,308.3l22.8,20.3M30.5,276.9l17.5,21.7M6.1,274.8l14.1-2.5M52.1,299c2.4.2,4.2,2.4,4,4.9-.2,2.5-2.3,4.4-4.7,4.2-2.4-.2-4.2-2.4-4-4.9.2-2.5,2.3-4.4,4.7-4.2ZM27.4,269.4c1.9.2,3.3,1.9,3.2,3.9s-1.8,3.5-3.7,3.4c-1.9-.2-3.3-1.9-3.2-3.9.1-2,1.8-3.5,3.7-3.4ZM2.8,272.9c1,0,1.7,1,1.6,2,0,1-.9,1.8-1.9,1.7-1,0-1.7-1-1.6-2,0-1,.9-1.8,1.9-1.7ZM121.2,293.7c2.9.2,5,2.9,4.8,5.9-.2,3-2.7,5.3-5.6,5s-5-2.9-4.8-5.9c.2-3,2.7-5.3,5.6-5ZM82.9,329.2c1.4.1,2.5,1.4,2.4,3-.1,1.5-1.4,2.6-2.8,2.5-1.4-.1-2.5-1.4-2.4-3s1.4-2.6,2.8-2.5Z"/>
  <path class="st3" d="M73.7,2.8l24.2,28.9M81.1,34.3l14.3.2M66.4,31.1l11.5,3.3M71.5,4.1c-.6-1.1-.2-2.6.8-3.2,1.1-.7,2.4-.3,3.1.9.6,1.1.2,2.6-.8,3.2-1.1.7-2.4.3-3.1-.9ZM78.7,34.9c-.2-.4,0-1,.3-1.2.4-.2.9,0,1.1.3.2.4,0,1-.3,1.2-.4.2-.9,0-1.1-.3ZM62.3,30.9c-.5-.8-.2-1.9.6-2.4.8-.5,1.8-.2,2.3.7.5.8.2,1.9-.6,2.4-.8.5-1.8.2-2.3-.7ZM96,34.7c-.4-.7-.2-1.6.5-2,.7-.4,1.5-.2,1.9.5.4.7.2,1.6-.5,2-.7.4-1.5.2-1.9-.5Z"/>
  <path class="st1" d="M321.4,295.8l51.2,2.3M404.3,258.3l-27.2,34.5M421.5,274.3l-14.2-16.1M336.8,274.4l-15.2,15M347.5,271.9c0,2.5-2,4.6-4.4,4.6s-4.4-2.1-4.4-4.6,1.9-4.6,4.4-4.6,4.4,2.1,4.4,4.6ZM407.4,256.4c0,1-.7,1.7-1.6,1.7s-1.6-.8-1.6-1.7.7-1.7,1.6-1.7,1.6.8,1.6,1.7ZM319.2,292.6c0,1.9-1.5,3.5-3.3,3.5s-3.3-1.5-3.3-3.5,1.5-3.5,3.3-3.5,3.3,1.5,3.3,3.5ZM427,276.5c0,1.9-1.5,3.5-3.3,3.5s-3.3-1.5-3.3-3.5,1.5-3.5,3.3-3.5,3.3,1.5,3.3,3.5ZM378,295.5c0,1.6-1.2,2.9-2.7,2.9s-2.7-1.3-2.7-2.9,1.2-2.9,2.7-2.9,2.7,1.3,2.7,2.9Z"/>
  <path class="st2" d="M356.4,22.1l13.1,9.2M367,46.7l-51.2-19.6M354.2,22.2l13.1,21.9M295.4,9.5l14.2,12.7M295.3,5.1c0,2.5-1.9,4.6-4.4,4.6s-4.4-2.1-4.4-4.6,1.9-4.6,4.4-4.6,4.4,2.1,4.4,4.6ZM355.2,20.6c0,1-.7,1.7-1.6,1.7s-1.6-.8-1.6-1.7.7-1.7,1.6-1.7,1.6.8,1.6,1.7ZM316,24.6c0,1.9-1.5,3.5-3.3,3.5s-3.3-1.5-3.3-3.5,1.5-3.5,3.3-3.5,3.3,1.5,3.3,3.5ZM372.6,46.5c0,1.9-1.5,3.5-3.3,3.5s-3.3-1.5-3.3-3.5,1.5-3.5,3.3-3.5,3.3,1.5,3.3,3.5ZM374.7,28.6c0,1.6-1.2,2.9-2.7,2.9s-2.7-1.3-2.7-2.9,1.2-2.9,2.7-2.9,2.7,1.3,2.7,2.9Z"/>
        </svg>
            <h1 class="col-span-full m-col-start-5 m-col-span-3 l-col-start-6 l-col-span-3">Crafting Stories In Motion</h1>
                <h3 class="col-span-full m-col-start-5 m-col-span-3 l-col-start-6 l-col-span-3">Hi, I'm Katrina, a front-end developer and motion designer. I specialize in creating immersive, interactive experiences that captivate and inspire.</h3>
            </div>
            <svg width="45" height="217" viewBox="0 0 45 217" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_ddf_247_550)">
                <path d="M22.5 14L26.3971 194.75H18.6029L22.5 14Z" fill="white"/>
                </g>
                <defs>
                <filter id="filter0_ddf_247_550" x="0.00302696" y="0.4" width="44.9939" height="215.95" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dx="-1" dy="4"/>
                <feGaussianBlur stdDeviation="8.8"/>
                <feComposite in2="hardAlpha" operator="out"/>
                <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.3 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_247_550"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dx="1" dy="4"/>
                <feGaussianBlur stdDeviation="8.8"/>
                <feComposite in2="hardAlpha" operator="out"/>
                <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.3 0"/>
                <feBlend mode="normal" in2="effect1_dropShadow_247_550" result="effect2_dropShadow_247_550"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_247_550" result="shape"/>
                <feGaussianBlur stdDeviation="1.25" result="effect3_foregroundBlur_247_550"/>
                </filter>
                </defs>
                </svg>
                
        </section>
    </header>

    <main>
        <!-- CAROUSAL -->
        <section class="carousal-sec">
            <h2 class="hidden">Carousal</h2>
                <ul class="col-span-full grid-con car-links">
                    <li class="col-span-1 m-col-span-2 l-col-span-1"><a href="#">All Projects</a></li>
                    <li class="col-start-2 col-span-1 m-col-start-4 m-col-span-2 l-col-start-2 l-col-span-1"><a href="#">Medvsa</a></li>
                    <li class="col-start-3 col-span-1 m-col-start-6 m-col-span-2 l-col-start-3 l-col-span-1"><a href="#">Kevorka</a></li>
                    <li class="col-start-4 col-span-1  m-col-start-8 m-col-span-2 l-col-start-4 l-col-span-1"><a href="#">Orbitz</a></li>
                </ul>
            <div class="carousal">
                <div class="images-slide">
                <?php
                 while($row = mysqli_fetch_array($results)) {
            echo'<img src="images/'; 
                
                echo $row['filename']; echo $row['filetype']; echo'">';
            }
            ?>

            </div>
            </div>
      
        </section>


        <!-- ABOUT -->
        <section id="about" class="grid-con">
            <h2 class="col-span-full">About Me</h2>
            <p class="col-span-full m-col-span-8" id="about-content">
                Hi, I’m Katrina MacAdams—a web developer with a heart that beats for motion and a mind that thrives on weaving creativity and code into something magical. I’ve always been a writer at my core, crafting limitless worlds and stories in my head. Motion design and web development have become my medium to tell stories beyond ink and paper...
            </p>
        </section>
        
        <div id="overlay" class="hidden">
            <div id="overlay-content">
                <button id="close-overlay">&times;</button>
                <h2>About Me</h2>
                <p> 
                Hi, I’m Katrina MacAdams—a web developer with a heart that beats for motion and a mind that thrives on weaving creativity and code into something magical.
                I’ve always been a writer at my core, crafting limitless worlds and stories in my head. Motion design and wbe development have become my medium to tale stories beyond ink and paper.  <br> <br> To me, a project isn’t just a task—it’s a story waiting to unfold. Whether I’m animating 3D worlds, editing cinematic moments, or piecing together the logic behind the scenes, I’m always searching for that spark where art and technology meet. <br> <br> I’m drawn to projects that challenge me to think differently, where I can connect dots others might not see and let my imagination roam. <br> <br> Every line of code, every render, and every frame I create is a chance to invite people into something extraordinary—something that lingers like the last line of a favourite book. So whether I’m starting from scratch or jumping in to refine, my goal is always to leave a bit of wonder behind.
                </p>
            </div>
        </div>

        <!-- VIDEO -->
            <h2 class="hidden">Video Section</h2>
            <div id="video-player" class="col-span-full m-col-span-full l-col-span-full">
                <video controls preload="metadata">
                    <source src="videos/demoreel.mp4" type="video/mp4">
                    <source src="videos/demoreel.webm" type="video/webm">
                    Your browser does not support the video. 
                </video>
            </div>
        </section>

        <!-- CONTACT -->
        <section id="contact" class="grid-con">
            <h2 class="col-start-2 col-span-full m-col-start-5 m-col-span-4">Begin Your Story Today</h2>
                <form action="send_mail.php" method="post" enctype="text/plain" class="col-span-full grid-con">
                <div class="col-span-2">
                    <div id="f-name" class="f-box col-span-full m-col-span-6">
                        <label for="name"></label>
                        <input placeholder="FIRST NAME*" type="text" class="txt-w">
                    </div>
        
                    <div id="l-name" class="f-box col-start-1 col-span-full m-col-span-6">
                        <label for="name"></label>
                        <input placeholder="LAST NAME*"  type="text" class="txt-w">
                    </div>
                    <div id="e-mail" class="f-box col-span-full m-col-start-1 m-col-span-6">
                        <label for="mail"></label>
                        <input placeholder="EMAIL*"  type="email" class="txt-w">
                    </div>
    
                </div>
                    <div class="f-box col-start-3 col-span-2 m-col-start-7 m-col-span-6">
                        <label for="message"></label>
                        <textarea class="txt-w" placeholder="MESSAGE"  id="message" rows="2"></textarea>
                    </div>

                    <div class="button col-start-3 col-span-1 m-col-start-7 m-col-span-2">
                        <input id="submit" type="button" value="Send">
                    </div>
                </form>
        </section>

        <!-- CASE STUDY TOGGLE -->
    <section id="case-toggle" class="grid-con">
        <div class="toggle col-span-full">
           <button id="case-butt"><svg id="arrow" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 37 26">
            <defs>
              <style>
                .st0 {
                  fill: none;
                  stroke: #040047;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 1.5px;
                }
              </style>
            </defs>
            <path class="st0" d="M32.9,21.2L18.8,3.1,4.7,21.2"/>
          </svg>
        </button> 
        <div><h4> Case Studies</h4></div>
        </div>
                <div class="bottom-sheet">
                    <div class="sheet-overlay"></div>
                    <div class="content">
                        <div class="header">
                            <div class="drag-icon"></div>
                        </div>
                        <div class="body">
                            <div id="available">
                                <svg id="blink" viewBox="0 0 200 100" xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="50" cy="50" rx="50" ry="50" />
                                  </svg>
                            <h4>Available for Internship</h4>
                            </div>
                            <div class="case-direct">
                                <div id="studies">
                                    <h2>Case Studies</h2>
                                    <ul>
                                        <li><a href="">Medvsa</a></li>
                                    </ul>
                                </div>
                                <div id="tools">
                                    <h2>Tools</h2>
                                    <div class="filter">
                                        <button>Front-End</button>
                                    </div>
                                <p>Front-End</p>
                                </div>
                                <div id="date">
                                    <h2>Completed</h2>
                                    <p>November 2024</p>
                                </div>
                            </div>
                       
                            
                        </div>
                    </div>
                </div>
    </section>
    </main>
    <footer> 
    </footer>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script> 
    <script src="js/gsap.min.js"></script>
    <script src="js/MorphSVGPlugin.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

