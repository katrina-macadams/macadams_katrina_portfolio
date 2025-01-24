<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once('includes/connect.php');

    // Get the project name from the URL
    $project_name = mysqli_real_escape_string($connect, $_GET['name']);

    // Fetch project details from the database
    $project_query = "SELECT * FROM projects WHERE name = '$project_name'";
    $project_result = mysqli_query($connect, $project_query);
    $project = mysqli_fetch_assoc($project_result);

    // Fetch sections for the project
    $sections_query = "SELECT * FROM sections WHERE project_id = {$project['id']} ORDER BY id ASC";
    $sections_result = mysqli_query($connect, $sections_query);

    // Fetch media for the project
    $media_query = "SELECT * FROM media WHERE project_id = {$project['id']} ORDER BY section_id ASC";
    $media_result = mysqli_query($connect, $media_query);
    $media = [];
    $hero_image = '';
    while ($row = mysqli_fetch_assoc($media_result)) {
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
    <title><?php echo htmlspecialchars($project['name']); ?> - Case Study</title>
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

    <!-- Hero -->
    <section class="case-hero grid-con col-span-full">
        <div class="col-span-full hero-background">
            <img src="images/<?php echo htmlspecialchars($project['name']); ?>-hero.png" alt="<?php echo htmlspecialchars($project['name']); ?>">
        </div>
        <h1 class="col-span-full"><?php echo htmlspecialchars($project['name']); ?></h1>
        <h2 class="col-span-full"><?php echo htmlspecialchars($project['subtitle']); ?></h2>
        <p class="col-span-full"><?php echo htmlspecialchars($project['tagline']); ?></p>
    </section> 

    <main>
        <!-- SECTIONS -->
        <?php while ($section = mysqli_fetch_assoc($sections_result)): ?>
            <section class="grid-con">
                <h2 class="col-span-full cs-title"><?php echo htmlspecialchars($section['title']); ?></h2>
                <?php if (!empty($section['tagline'])): ?>
                    <h4 class="col-span-full cs-tagline"><?php echo htmlspecialchars($section['tagline']); ?></h4>
                <?php endif; ?>
                <?php if ($section['content_type'] == 'bulletpoint'): ?>
                    <ul class="col-span-full">
                        <?php foreach (explode("\n", $section['content']) as $bullet): ?>
                            <li><p class="bullet"><?php echo htmlspecialchars($bullet); ?></p></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="col-span-full cs-content"><?php echo nl2br(htmlspecialchars($section['content'])); ?></p>
                <?php endif; ?>
                <?php if (isset($media[$section['id']])): ?>
                    <div class="col-span-full">
                        <?php foreach ($media[$section['id']] as $media_item): ?>
                            <img src="images/<?php echo $media_item['filename'] . $media_item['filetype']; ?>" alt="<?php echo htmlspecialchars($project['name']); ?>">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endwhile; ?>

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