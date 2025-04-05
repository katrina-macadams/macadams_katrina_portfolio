<!DOCTYPE html>
<html lang="en">
<head>

<?php
require_once('includes/connect.php');
$stmt = $connection->prepare('SELECT media.filename, media.filetype, projects.name FROM media
            JOIN projects ON media.project_id = projects.id 
            WHERE media.id IN (
            SELECT MIN(id) 
            FROM media 
            WHERE project_id IN (1, 2, 3, 17, 18, 19)
            GROUP BY project_id
    )
');
$stmt->execute();

?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.48/build/spline-viewer.js" async></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js" defer></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <script src="js/MorphSVGPlugin.min.js"></script>
    <script src="js/ScrollToPlugin.min.js"></script>
    <script src="js/SplitText.min.js"></script>
    <script type="module" src="js/home.js" defer></script>
    <title>Portfolio</title>
</head>
<body>

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
                        <li class="nav-link m-col-start-4 m-col-span-2 col-start-1 col-span-full"><a href="#about">About</a></li>
                        <li class="nav-link m-col-start-6 m-col-span-4 col-start-1 col-span-full"><a href="#gallery">Case Studies</a></li>
                        <li class="nav-link m-col-start-11 m-col-span-2 col-start-1 col-span-full"><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header> 

        <main>

          <!-- HERO -->  
        <section id="hero" class="grid-con">
            <canvas id="lily"></canvas>
            <div class="hero-text col-span-full m-col-span-6">
                <h1>Hi There! <br> I'm Katrina</h1>
                <h2 id="creative-text" class="creative-text">Creative Motion</h2>
                <h2>I bring stories to life through motion, crafting visuals that don’t just move—but make you feel. With a mind that sees the world differently, I turn imagination into immersive experiences.</h2>
                <button id="anecdote"><span id="anecdote-tex">🌸 Tell Me an anecdote</span></button>
            </div>  
            
        </section>

        <div id="speech-bubble" class="hidden"></div>
        <img id="divider" src="images/divider.svg" alt="pink-green gradient divider">

    <!-- GALLERY -->
    <section id="gallery" class="grid-con">
    <div id="gallery-cont" class="col-span-full">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="gal-row">
                    <div class="gal-card">
                        <a href="details.php?name=<?php echo urlencode($row['name']); ?>">
                            <img class="gal-image" src="images/<?php echo ($row['filename'] . $row['filetype']); ?>" alt="<?php echo ($row['name']); ?>">
                            <div class="gal-content">
                            <h3><?php echo ($row['name']); ?></h3>
                            </div>
                        </a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </section>

<?php

$stmt = null;
?>
            </div>
        </section>

      <!-- ABOUT -->
        <section id="about" class="grid-con">
            <h2 class="col-span-full m-col-start-6 m-col-span-7">About Me</h2>
            <p class="col-span-full m-col-start-6 m-col-span-7" id="about-content">
                Hi, I’m Katrina MacAdams—a web developer with a heart that beats for motion and a mind that thrives on weaving creativity and code into something magical. I’ve always been a writer at my core, crafting limitless worlds and stories in my head. Motion design and web development have become my medium to tell stories beyond ink and paper...
            </p>
        </section>

         <!-- <spline-viewer hint loading-anim-type="spinner-small-light" url="https://prod.spline.design/OnPWwO71qYGFMSAP/scene.splinecode"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAATCAYAAADxlA/3AAAJ+ElEQVR4AQCBAH7/ANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwPZjK8W2YyvJ9mMrzTZjK882YyvPtmMrzvZjK8y2YyvJNmMrxTZjK8B2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8AAIEAfv8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8D2YyvGNmMryzZjK892YyvStmMr1PZjK9V2YyvUdmMr0jZjK862YyvKNmMrxXZjK8C2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwAAgQB+/wDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvEdmMrybZjK882YyvUtmMr2TZjK9y2YyvetmMr33ZjK942YyvbtmMr1/ZjK9N2YyvONmMryTZjK8Q2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvAACBAH7/ANmMrwXZjK8D2YyvANmMrwDZjK8A2YyvANmMrwDZjK8G2YyvEtmMryTZjK852YyvUNmMr2jZjK9/2Yyvk9mMr6LZjK+r2YyvrdmMr6jZjK+d2YyvjNmMr3jZjK9i2YyvS9mMrzXZjK8h2YyvENmMrwHZjK8A2YyvANmMrwDZjK8AAIEAfv8A2YyvEtmMrxHZjK8P2YyvDdmMrw3ZjK8Q2YyvF9mMryLZjK8y2YyvRtmMr1/ZjK952Yyvk9mMr6zZjK/B2Yyv0dmMr9rZjK/b2Yyv1tmMr8nZjK+32YyvodmMr4nZjK9v2YyvV9mMr0HZjK8t2YyvHdmMrxDZjK8H2YyvAdmMrwAAgQB+/wDZjK8W2YyvFtmMrxXZjK8W2YyvGNmMrx7ZjK8o2YyvNtmMr0nZjK9h2YyvfNmMr5nZjK+22Yyv0NmMr+fZjK/32Yyv/9mMr//ZjK/72Yyv7dmMr9nZjK/B2YyvptmMr4rZjK9v2YyvVtmMr0HZjK8v2YyvINmMrxbZjK8P2YyvCwCBAH7/ANmMrxPZjK8T2YyvFNmMrxbZjK8b2YyvI9mMry/ZjK9A2YyvV9mMr3HZjK+P2YyvrtmMr83ZjK/p2Yyv/9mMr//ZjK//2Yyv/9mMr//ZjK//2Yyv7tmMr9PZjK+22YyvmNmMr3vZjK9g2YyvSNmMrzTZjK8k2YyvGdmMrxHZjK8NAIEAfv8A2YyvC9mMrwvZjK8N2YyvEdmMrxfZjK8h2YyvMNmMr0PZjK9c2YyveNmMr5jZjK+52Yyv2dmMr/bZjK//2Yyv/9mMr//ZjK//2Yyv/9mMr//ZjK/22Yyv2tmMr7vZjK+b2YyvfNmMr1/ZjK9G2YyvMNmMrx/ZjK8S2YyvCtmMrwYAgQB+/wDZjK8D2YyvBNmMrwbZjK8K2YyvEtmMrx3ZjK8t2YyvQtmMr1zZjK962YyvmtmMr7zZjK/d2Yyv+tmMr//ZjK//2Yyv/9mMr//ZjK//2Yyv/9mMr/XZjK/Y2Yyvt9mMr5bZjK922YyvWNmMrz3ZjK8n2YyvFdmMrwjZjK8A2YyvAACBAH7/ANmMrwDZjK8B2YyvA9mMrwjZjK8Q2YyvG9mMryzZjK9B2YyvW9mMr3nZjK+a2Yyvu9mMr9vZjK/42Yyv/9mMr//ZjK//2Yyv/9mMr//ZjK//2Yyv7tmMr9DZjK+w2YyvjtmMr23ZjK9P2YyvNdmMrx7ZjK8N2YyvANmMrwDZjK8AAIEAfv8A2YyvA9mMrwTZjK8G2YyvC9mMrxLZjK8d2YyvLdmMr0HZjK9b2YyveNmMr5fZjK+42Yyv19mMr/PZjK//2Yyv/9mMr//ZjK//2Yyv/9mMr/7ZjK/l2Yyvx9mMr6fZjK+G2YyvZtmMr0jZjK8u2YyvGdmMrwfZjK8A2YyvANmMrwAAgQB+/wDZjK8L2YyvC9mMrw3ZjK8R2YyvF9mMryHZjK8v2YyvQtmMr1rZjK912Yyvk9mMr7HZjK/P2Yyv6dmMr/7ZjK//2Yyv/9mMr//ZjK//2Yyv8dmMr9jZjK+72YyvnNmMr33ZjK9e2YyvQtmMryrZjK8W2YyvBtmMrwDZjK8A2YyvAACBAH7/ANmMrxPZjK8T2YyvFNmMrxbZjK8b2YyvI9mMry/ZjK9A2YyvVdmMr23ZjK+J2YyvpdmMr8DZjK/Y2Yyv7NmMr/jZjK/92Yyv+tmMr/DZjK/e2Yyvx9mMr6vZjK+O2YyvcdmMr1XZjK882YyvJtmMrxTZjK8G2YyvANmMrwDZjK8AAIEAfv8A2YyvFtmMrxbZjK8W2YyvF9mMrxrZjK8f2YyvKdmMrzbZjK9I2YyvXtmMr3bZjK+Q2YyvqdmMr7/ZjK/R2Yyv3NmMr+HZjK/e2Yyv1NmMr8PZjK+u2YyvldmMr3rZjK9g2YyvR9mMrzHZjK8e2YyvDtmMrwPZjK8A2YyvANmMrwAAgQB+/wDZjK8S2YyvEdmMrxDZjK8P2YyvENmMrxPZjK8Z2YyvJNmMrzPZjK9G2YyvW9mMr3LZjK+I2YyvnNmMr6zZjK+32Yyvu9mMr7jZjK+v2YyvoNmMr43ZjK932YyvX9mMr0jZjK8y2YyvH9mMrw/ZjK8D2YyvANmMrwDZjK8A2YyvAACBAH7/ANmMrwXZjK8E2YyvAdmMrwDZjK8A2YyvANmMrwLZjK8K2YyvFtmMrybZjK842YyvTNmMr2DZjK9z2YyvgdmMr4vZjK+P2YyvjdmMr4XZjK942YyvZ9mMr1PZjK8+2YyvKtmMrxjZjK8I2YyvANmMrwDZjK8A2YyvANmMrwDZjK8AAIEAfv8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvBNmMrxTZjK8m2YyvONmMr0nZjK9W2YyvYNmMr2TZjK9i2YyvW9mMr0/ZjK9A2YyvLtmMrxzZjK8L2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwAAgQB+/wDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwbZjK8X2YyvJtmMrzPZjK882YyvQNmMrz/ZjK852YyvLtmMryDZjK8Q2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvAAGBAH7/ANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwTZjK8T2YyvINmMryjZjK8s2YyvK9mMryXZjK8b2YyvDtmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8A2YyvANmMrwDZjK8Alv6h11zjL4YAAAAASUVORK5CYII=" alt="Spline preview" style="width: 100%; height: 100%;"/></spline-viewer> -->
        
        <div id="overlay" class="hidden">
            <div id="overlay-content">
                <button class="btn" id="close-overlay">&times;</button>
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
            <video id="player" playsinline controls data-poster="images/poster.jpg">
                    <source src="videos/demoreel.mp4" type="video/mp4">
                    <source src="videos/demoreel.webm" type="video/webm">
                    Your browser does not support the video. 
                </video>
            </div>
        </section>

        <!-- CONTACT -->
        <section id="contact" class="grid-con">
            <h2 class="col-start-2 col-span-full m-col-start-5 m-col-span-4">Begin Your Story Today</h2>
                <form id="userForm" action="sendmail.php" method="post" class="col-span-full grid-con">
                <div class="col-span-2 m-col-start-4">
                    <div id="f-name" class="f-box col-span-full">
                        <label for="fname"></label>
                        <input id="fname" id="fname" placeholder="FIRST NAME*" type="text" class="txt-w" name="fname" >
                    </div>
        
                    <div id="l-name" class="f-box col-start-1 col-span-full m-col-span-6">
                        <label for="lname"></label>
                        <input placeholder="LAST NAME*" id="lname" type="text" class="txt-w" name="lname">
                    </div>
                    <div id="e-mail" class="f-box col-span-full m-col-start-1 m-col-span-6">
                        <label for="email"></label>
                        <input placeholder="EMAIL*" name="email"  id="email" type="email" class="txt-w">
                    </div>
    
                </div>
                    <div class="f-box col-start-3 col-span-2 m-col-start-7 m-col-span-6">
                        <label for="message"></label>
                        <textarea class="txt-w" placeholder="MESSAGE"  id="message"  name="message" rows="2"></textarea>
                    </div>

                    <div class="col-start-3 col-span-1 m-col-start-7 m-col-span-2">
                        <button class="btn">
                            <input id="submit" type="submit" value="SEND" class="text-w">
                        </button>
                    </div>
                    <section id="feedback"><p>*Please fill out all required sections</p></section>
                </form>
                <button class="btn back-to-top col-span-2" id="backToTopBtn">↑ Back to Top</button>
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
   

</body>
</html>

