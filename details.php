<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once('includes/connect.php');

    // Get the project name from the URL
    $project_name = $_GET['name'];

    // Fetch project details from the database
    $project_query = "SELECT * FROM projects WHERE name = :name";
    $stmt = $connection->prepare($project_query);
    $stmt->execute(['name' => $project_name]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
    

    // Fetch sections for the project
    $sections_query = "SELECT * FROM sections WHERE project_id = :project_id ORDER BY id ASC";
    $stmt = $connection->prepare($sections_query);
    $stmt->execute(['project_id' => $project['id']]);
    $sections_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    // Fetch media for the project
    $media_query = "SELECT * FROM media WHERE project_id = :project_id ORDER BY section_id ASC";
    $stmt = $connection->prepare($media_query);
    $stmt->execute(['project_id' => $project['id']]);
    $media_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $media = [];
    $hero_image = '';
    foreach ($media_result as $row) {
        if (in_array($row['id'], [21, 22, 23])) {
            $hero_image = $row['filename'] . $row['filetype'];
        } else {
            $media[$row['section_id']][] = $row;
        }
    }
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
    <title><?php echo ($project['name']); ?> - Case Study</title>
    
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

     <!-- HERO -->  
     <section class="case-hero grid-con col-span-full">
            <h1 class="col-span-full"><?php echo ($project['name']); ?></h1>
            <?php foreach ($sections_result as $section): ?>
            <h2 class="col-span-full"><?php echo ($section['content']); ?></h2>
        </section>
        <img id="divider" src="images/divider.svg" alt="pink-green gradient divider">
    <main>
        <!-- SECTIONS -->

        <section class="grid-con case-plot-l">
      <div class="col-span-3 m-col-span-6">
        <p class="sub-grad"><?php echo ($section['title']);?></p>
        <?php if (!empty($section['tagline'])): ?>
        <p class="col-span-full cs-tagline"><?php echo ($section['tagline']); ?></p>
        <?php endif; ?>        
        <p>The challenge was to seamlessly integrate three makeup products into a cohesive visual story while evoking the brand’s femme fatale persona. Every deliverable—from the video to the magazine spread—had to reflect the brand's boldness and captivate the target audience. </p>
      </div>
    </section>
  
    <section class="grid-con">
      <div class="col-span-2 col-start-2 m-col-start-4 m-col-span-6">
              <img  class="case-images" src="images/kev-board.jpg" alt="Enlarged Project Image">
      </div>
  </section>

        <?php endforeach; ?>

        <!-- CONTACT -->
        <section id="contact" class="grid-con">
            <h2 class="col-start-2 col-span-full m-col-start-5 m-col-span-4">Begin Your Story Today</h2>
            <form action="#" method="post" enctype="text/plain" class="col-span-full grid-con">
                <div class="col-span-2">
                    <div id="f-name" class="f-box col-span-full m-col-span-6">
                        <label for="name"></label>
                        <input placeholder="FIRST NAME*" type="text" class="txt-w">
                    </div>

                    <div id="l-name" class="f-box col-start-1 col-span-full m-col-span-6">
                        <label for="name"></label>
                        <input placeholder="LAST NAME*" type="text" class="txt-w">
                    </div>
                    <div id="e-mail" class="f-box col-span-full m-col-start-1 m-col-span-6">
                        <label for="mail"></label>
                        <input placeholder="EMAIL*" type="email" class="txt-w">
                    </div>
                </div>
                <div class="col-span-2">
                    <div id="message" class="f-box col-span-full">
                        <label for="message"></label>
                        <textarea placeholder="MESSAGE*" class="txt-w"></textarea>
                    </div>
                    <div class="col-span-full">
                        <button type="submit" class="btn">Send</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>