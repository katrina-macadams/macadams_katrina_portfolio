<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');

$query = 'SELECT * FROM `projects`, `media` WHERE projects.id = 1';

$results = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($results);
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/casestudy.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <title>Case Study</title>
    
</head>
<body>
 <!-- HEADER -->
 <header id="main-header" class="grid-con">
 <a href="index.php">
    <img id="logo" class="col-span-1" src="images/invert_logo.svg" alt="girl sitting on moon looking at star icon">
</a>
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
                    <li class="nav-link m-col-start-6 m-col-span-4 col-start-1 col-span-full"><a href="details.php">Case Studies</a></li>
                    <li class="nav-link m-col-start-11 m-col-span-2 col-start-1 col-span-full"><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>

        <!-- Hero -->
        <section class="case-hero grid-con col-span-full">
          <h1 class="col-span-full"><?php echo $row['name'];?></h1>
          <!-- <h2 class="col-span-3">Drink Product Rebrand</h2>
          <h4 class="col-span-3">Interactive flavours and cosmic adventures in every botlle</h4> -->
        </section> 
    </header>
  <main>
    <section id="challenge" class="case-sec">
      <h2>The Challenge Awaits</h2>
      <p><?php echo $row['description'];?></p>
      
      <span>_______</span>
    </section>

    <section id="services" class="case-sec">
      <div class="role">
        <h2>What Did I Do?</h2>
        <p>Over the course of a semester, I redesigned the entire brand, went through variations of three dimensional bottles, and coded the new website from top to bottom. </p>
      </div>
      <span>_______</span>
      <div class="service">
        <h2>What Did I Use?</h2>
        <p>Adobe Illustrator — Logo Design<br>
          Adobe Photoshop — Promotional Materials<br>
          Adobe XD — Brand/Style GuideAdobe Premiere — Promotion Reel<br>
          Cinema4D — 3D Modelling<br>
          HTML/CSS/JS — Coding</p>
      </div>
    </section>

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


  <section id="conflict" class="case-plot-l">
    <h2>The Conflict</h2>
    <p class="sub-grad">Nostalgia meets reinvention as I tackle the challenge of rebranding a drink once lost to time.</p>
    <p>Orbitz, a 1990s drink known for its suspended orbs, failed to captivate audiences due to issues with taste, texture, and branding. This project reimagines Orbitz as a bold, modern product with updated branding and conceptual flavors while keeping its iconic orb feature. My role involved brand strategy, packaging design, web development, and storytelling. </p>
  </section>

  <section id="brainstorm" class="case-plot-r">
    <h2>Searching for the One</h2>
    <p class="sub-grad">Before landing on the final theme, I explored multiple creative directions to redefine Orbitz.</p>
    <p>Rebranding Orbitz began with a deep dive into thematic possibilities that could revive its identity. I explored a range of concepts, from a sleek, street-style aesthetic to retro-futurism and ethereal, aura-inspired designs. Ultimately, I returned to Orbitz’s original space theme but reimagined it with a bold, adventurous, and cartoonish twist.  </p>
  </section>

  <section id="map" class="case-plot-l">
    <h2>Mapping Out the Journey</h2>
    <p class="sub-grad">This rebranding demanded a careful balance of nostalgia and modernity.</p>
    <div class="bullet">
        <?xml version="1.0" encoding="UTF-8"?>
        <svg id="star" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 71 91">
          <defs>
            <style>
              .st0, .st1 {
                fill: #fff;
                stroke: #fff;
              }
        
              .st1 {
                stroke-miterlimit: 10;
              }
            </style>
          </defs>
          <path class="st1" d="M35.5,57.8c-6.6,0-12-5.5-12-12.3s5.4-12.3,12-12.3,12,5.5,12,12.3-5.4,12.3-12,12.3Z"/>
          <path class="st0" d="M35.5,57.3c-6.3,0-11.5-5.3-11.5-11.8s5.2-11.8,11.5-11.8,11.5,5.3,11.5,11.8-5.2,11.8-11.5,11.8Z"/>
        </svg>
        <p>Create a cohesive brand story rooted in nostalgia but updated for today’s market.</p>
    </div>
  </section>

  <section id="ideas" class="case-plot-r">
    <h2>Searching for the One</h2>
    <p class="sub-grad">From outdated to extraordinary, every element of Orbitz was reimagined step by step.</p>
    <p>Initial sketches focused on clean, futuristic packaging that highlighted the drink’s floating orbs as a feature, not a flaw. Inspiration was drawn from celestial motifs to evoke a sense of wonder. High-fidelity designs incorporated bold typography and playful flavor names, creating a product that felt vibrant and premium. </p>
  </section>

  <section id="testing" class="case-plot-l">
    <h2>Testing the Magic</h2>
    <p class="sub-grad">Feedback helped refine the rebranding into a cohesive, compelling product.</p>
    <p>Feedback from professors, family, and friends were crucial in developing the consistent direction and interesting style for Orbitz. With over 15 sketches of logo concepts,  and two different bottle versions, I eventually was able to come to a finalized version that satisfied the modern rebrand. During this process, I learned a lot about target audiences and the importance of ensuring that my message was consistently on brand. </p>
  </section>

  <section id="ideas" class="case-plot-r">
    <h2>The Destination</h2>
    <p class="sub-grad">Strategic execution and cohesive design made this project a triumph.</p>
    <p>This project demonstrated the power of storytelling in branding and marketing. By combining narrative elements with sleek 3D design, the campaign elevated the makeup products beyond their functional purpose, aligning them with a larger, aspirational identity. The process honed my skills in 3D modeling, animation, and cross-platform branding. </p>
  </section>

  <section id="reflection" class="case-sec">
    <h2>Reflection on the Journey</h2>
    <p>The project emphasized the importance of storytelling in Motion/UI/UX design. I learned to balance functionality with branding, ensuring every user interaction felt purposeful and engaging. The iterative process also strengthened my skills in coding and animation.</p>
  </section>

     <!-- VIDEO -->
     <h2 class="hidden">Video Section</h2>
     <div id="orb-player" class="col-span-full m-col-span-full l-col-span-full">
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
                <form action="sendmail.php" method="post" class="col-span-full grid-con">
                <div class="col-span-2 m-col-start-4">
                    <div id="f-name" class="f-box col-span-full">
                        <label for="first_name"></label>
                        <input id="first_name" id="first_name" placeholder="FIRST NAME*" type="text" class="txt-w" name="first_name" >
                    </div>
        
                    <div id="l-name" class="f-box col-start-1 col-span-full m-col-span-6">
                        <label for="last_name"></label>
                        <input placeholder="LAST NAME*" id="last_name" type="text" class="txt-w" name="last_name">
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

                    <div class="button col-start-3 col-span-1 m-col-start-7 m-col-span-2">
                        <button>
                            <input id="submit" type="submit" value="SEND" class="text-w">
                        </button>
                    </div>
                </form>
                <button class="back-to-top col-span-2" id="backToTopBtn">↑ Back to Top</button>
        </section>

  <!-- CASE STUDY TOGGLE -->
  <section id="case-toggle" class="grid-con">
    <div class="toggle col-span-full">
       <button id="case-butt"><?xml version="1.0" encoding="UTF-8"?>
        <svg id="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.65 19.59">
          <defs>
            <style>
              .cls-1 {
                fill: none;
                stroke: #fff;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-width: 1.5px;
              }
            </style>
          </defs>
          <path class="cls-1" d="M28.9,18.84L14.82.75.75,18.84"/>
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
    
  <footer></footer>

  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script> 
    <script src="js/gsap.min.js"></script>
    <script src="js/MorphSVGPlugin.min.js"></script>
    <script src="js/main.js"></script>
</body>


</html>