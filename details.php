<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once('includes/connect.php');

// Get the project name from the URL
$project_name = $_GET['name'];

// Fetch project details
$project_query = "SELECT * FROM projects WHERE name = :name";
$stmt = $connection->prepare($project_query);
$stmt->execute(['name' => $project_name]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch sections for the project
$sections_query = "SELECT * FROM sections WHERE project_id = :project_id ORDER BY id ASC";
$stmt = $connection->prepare($sections_query);
$stmt->execute(['project_id' => $project['id']]);
$sections = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch media for the project
$media_query = "SELECT * FROM media WHERE project_id = :project_id ORDER BY id ASC";
$stmt = $connection->prepare($media_query);
$stmt->execute(['project_id' => $project['id']]);
$media = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <script src="js/gsap.min.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <script src="js/MorphSVGPlugin.min.js"></script>
    <script src="js/ScrollToPlugin.min.js"></script>
    <script src="js/SplitText.min.js"></script>
    <script type="module" src="js/details.js" defer></script>
    <title><?php echo($project['name']); ?> - Case Study</title>
    
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
            </label>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="case-hero grid-con col-span-full">
        <h1 class="col-span-full"><?php echo ($project['name']); ?></h1>
        <h2 id="creative-text" class="creative-text col-span-full">Intentional Motion</h2>
        <h2 class="col-span-full m-col-span-6"><?php echo ($project['description']); ?></h2>
    </section>

    <img id="divider" src="images/divider.svg" alt="pink-green gradient divider">

    <!-- Sections -->

    <main>
        <div class="grid-con case-sections">
            <?php 
            foreach ($sections as $index => $section): 
                $section_media = array_slice($media, $index * 2, 2);
            ?>
            <div class="col-span-full grid-con section-container">
                <div class="section-content col-span-full">
                    <h3 class="sub-grad"><?php echo ($section['title']); ?></h3>
                    <?php if (!empty($section['tagline'])): ?>
                        <p class="cs-tagline"><?php echo ($section['tagline']); ?></p>
                    <?php endif; ?>
                    <div class="section-text <?php echo $section['content_type']; ?>">
                        <?php echo ($section['content']); ?>
                    </div>
                </div>
                <div class="section-media col-span-full grid-con">
                    <?php foreach ($section_media as $media_item): ?>
                        <img class="case-images m-col-span-5" src="images/<?php echo ($media_item['filename'] . $media_item['filetype']); ?>" 
                             alt="<?php echo ($project['name']); ?> image">
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

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
</body>
</html>