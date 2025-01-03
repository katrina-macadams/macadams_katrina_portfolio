-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 03, 2025 at 06:09 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `fname`, `lname`, `email`, `message`) VALUES
(1, 'John', 'Doe', 'johndoe@fakeemail.com', 'YOUR PORTFOLIO IS SO AMAZING AND PERFECT I LOVE IT!!! I LOVE IT SO MUCH I\'M GIVING YOU A JOB OFFER FOR 1,000,000 YEARLY SALARY AND UNLIMITED BENEFITS AND PENSION!!!'),
(2, 'Jane', 'Doe', 'janedoe@fakeemail.com', 'WOW YOUR PROTFOLIO IS THE BEST I\'VE EVERY SEEN PLEASE CONTACT FOR JOB OFFER 1,000,001 YEARLY SALARY UNLIMITED TIME OFF AND BENEFITS'),
(3, 'Cersei', 'Lannister', 'houselannisteristhebest@gmail.com', 'I\'m gonne blow up your website'),
(4, 'Lady', 'Gaga', 'iwasbornthisway@gmail.com', 'You were born this way '),
(5, '', '', '', 'message here'),
(6, 'katry', 'perry', 'katyberry@email.com', 'message here'),
(7, 'xcewce', 'cewcwe', 'ewcew@gmail.com', 'xdcdewew');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int UNSIGNED NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  `section_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `filename`, `filetype`, `project_id`, `section_id`) VALUES
(1, 'med-greenbud', '.jpg', 1, 1),
(2, 'med-scroll', '.jpg', 1, 4),
(3, 'med-pin1', '.jpg', 1, 5),
(4, 'med-sketch', '.jpg', 1, 6),
(5, 'med-ar', '.jpg', 1, 7),
(6, 'med-xray', '.jpg', 1, 8),
(7, 'med-case', '.jpg', 1, 9),
(8, 'kev-board', '.jpg', 2, 11),
(9, 'kev-mirror', '.jpeg', 2, 12),
(10, 'kev-pin1', '.jpg', 2, 13),
(11, 'kev-pieces', '.jpg', 2, 15),
(12, 'kev-queen', '.jpg', 2, 16),
(13, 'kev-cherry', '.jpeg', 2, 17),
(14, 'orb-space', '.jpg', 3, 21),
(15, 'orb-glass', '.jpg', 3, 24),
(16, 'orb-pin', '.png', 3, 25),
(17, 'orb-orb', '.png', 3, 26),
(18, 'orb-purple', '.jpg', 3, 27),
(19, 'orb-old', '.jpg', 3, 28),
(20, 'orb-bottle', '.jpg', 3, 29);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `tagline` varchar(250) NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` varchar(50) NOT NULL,
  `service_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `subtitle`, `tagline`, `description`, `date`, `service_id`) VALUES
(1, 'Medvsa', '3D Earbud Models and Interactive Webpage', ' Unique earbud models and engaging interactive experiences in the palm of your hand.', 'What if your earbuds could look more unique than ever? Go beyond the traditional designs and craft an interface that’s as captivating as the earbuds themselves.', 'November 2024', 1),
(2, 'Kevorka', 'Makeup Product Line Campaign', ' Bold beauty reimagined: where cunning meets seduction', 'What if your makeup could command the room like a queen on the chessboard? Have an aura of danger, and be packaged in sleek, yet confidently radiant designs. ', 'November 2024', 2),
(3, 'Orbitz', 'Drink Product Rebrand and Webpage', ' Interactive flavors and cosmic adventures in every bottle.', 'What if the long forgotten brand, Orbitz, was given an update? A brand that left consumers feeling a little weird, but in a good way this time. Bring out the nostalgia of the old drink, by combining it’s space theme with a modern redesign.', 'April 2024', 3);

-- --------------------------------------------------------

--
-- Table structure for table `projects_services`
--

CREATE TABLE `projects_services` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  `service_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects_services`
--

INSERT INTO `projects_services` (`id`, `project_id`, `service_id`) VALUES
(1, 1, 4),
(2, 2, 6),
(3, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` varchar(1000) NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  `content_type` varchar(50) NOT NULL DEFAULT 'paragraph'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `tagline`, `content`, `project_id`, `content_type`) VALUES
(1, 'The Challenge Awaits', '', 'What if your earbuds could look more unique than ever? Go beyond the traditional designs and craft an interface that’s as captivating as the earbuds themselves.', 1, 'paragraph'),
(4, 'The Conflict', 'These earbuds needed more than the typical promotion strategies— they demanded something visually demanding.', 'The challenge was to create a pair of earbuds, and then promote them through an interactive  webpage and video for my earbud design. Users needed to be able to see the product in  AR view, X-Ray view, and kept engaged with interesting scroll animations that are reflective of the modern webpages for earbuds. ', 1, 'paragraph'),
(5, 'Searching for the One', 'Gathering inspiration is all part of  the process that drives me. Exploring and playing with different idea’s— no matter how wild— is how great idea’s are born.      ', 'With no restraints on design choices, it was important to craft something that excited me and those around me. So, I scoured Pinterest and concepts that got the gears in my mind turning, until I found the one.  ', 1, 'paragraph'),
(6, 'Mapping Out the Journey', 'To capture the essence of Medusa and snake-inspired branding, the design had to balance elegance, ease, and a sense of danger.', '• Craft a unique and interesting brand that combines out-of-the-box designs with modern trends\r\n\r\n• Design and model 3D earbuds that balance functionality with creativity\r\n\r\n• Infuse the UI and interactive elements with MEDVSA’s theme’s while maintaining sleek minimalism \r\n\r\n• Engage user’s with a thrilling and electrifying visual’s that make the audience feel the power of MEDVSA', 1, 'bulletpoint'),
(7, 'Bringing Ideas to Life', 'From initial sketches to polished models, the design came to life step by step.', 'Sketching and wireframing laid the groundwork for intuitive designs. Animations were integrated to emphasize seamless transitions and the brands serpentine elegance, evolving into polished AR models.      ', 1, 'paragraph'),
(8, 'Testing the Magic', 'Getting feedback allowed me to see my project from a different perspective, and refine it to it’s full potential. ', 'Feedback from professors, family members, friends, and classmates were all very positive when it came to the overall idea of the serpent design of the earbuds. Area’s that needed improvement came down to fine details in the website and lighting choices for the promotional imagery. Refining the webpage to give more access to detailed information ensured the functionality of the promotional page was met beyond aesthetics.', 1, 'paragraph'),
(9, 'The Destination', 'A seamless blend of myth and modernity, the final design elevated user experince to new heights. ', 'The final product delivered an intuitive interface with Medusa-inspired visuals, AR/X-Ray Views, a promotional video, and slithering scroll animations that showcased the rendered product alongside a 3D snake modelled from scratch.', 1, 'paragraph'),
(10, 'Reflection on Journey', '', 'The project emphasized the importance of storytelling in Motion/UI/UX design. I learned to balance functionality with branding, ensuring every user interaction felt purposeful and engaging. The iterative process also strengthened my skills in coding and animation.', 1, 'paragraph'),
(11, 'The Challenge Awaits', '', 'What if your makeup could command the room like a queen on the chessboard? Have an aura of danger, and be packaged in sleek, yet confidently radiant designs. ', 2, 'paragraph'),
(12, 'The Conflict', '', 'The challenge was to seamlessly integrate three makeup products into a cohesive visual story while evoking the brand’s femme fatale persona. Every deliverable—from the video to the magazine spread—had to reflect the brand\'s boldness and captivate the target audience.', 2, 'paragraph'),
(13, 'Searching for the One', 'Choosing femme fatale as the main concept started with the name I picked- Kevorka, which means “lure of the animal.” ', 'I knew the concept almost as soon as I saw the name when given it as an option for this project, Kevorka, doesn’t that just send a chill down your spine. My concept had to be sexy, with an edge of danger, and when compared to the beauty industry today, it needed some way to stand out. ', 2, 'paragraph'),
(14, 'Mapping Out the Journey', 'To really see my vision for the brand come to fruition I would need a solid design direction, 3D models, advertisement and finally, a promotional masterpiece.', '• Bring Kevorka to life through a comprehensive style guide\r\n\r\n• Model the lipstick, eye pencil, and eye shadow in 3D as realistically as possible to use in the marketing materials\r\n\r\n• Design media banners and posters to promote the brand, and the chess-inspired video promo\r\n\r\n• Put together a story-driven video that promotes the makeup line through an unique concept while staying true to the brand.', 2, 'bulletpoint'),
(15, 'Bringing Ideas to Life', 'From concept to creation, this campaign was grounded in meticulous design and bold storytelling.', 'Each product was hand modelled in Cinema 4D Standard, then paired with social media banners, magazine spreads, and ad layouts that carried the narrative seamlessly across platforms, ensuring brand cohesion. Lastly, those same models were paired with 3D chess assets where they moved with precision and obliterated their opponents, which was open for interpretation, adding an edge of mystery. ', 2, 'paragraph'),
(16, 'The Final Cut', 'A story of power, elegance, and strategic dominance.', 'The promotional video opens with an atmospheric shot of the chessboard, setting a tone of mystery and sophistication. As the game unfolds, makeup products emerge as key pieces, symbolizing the strategic choices women make in their beauty routines. The final frame declares victory, as the crowned lipstick crashes and destroys the King piece in a final ‘checkmate.’ Giving the audience an exaggerated version of checkmate, and framing Kevorka as the empowered, dangerous, brand that I envisioned. ', 2, 'paragraph'),
(17, 'The Destination', 'Strategic execution and cohesive design made this project a triumph.', 'This project demonstrated the power of storytelling in branding and marketing. By combining narrative elements with sleek 3D design, the campaign elevated the makeup products beyond their functional purpose, aligning them with a larger, aspirational identity. The process honed my skills in 3D modeling, animation, and cross-platform branding.', 2, 'paragraph'),
(18, 'Reflection on the Journey', '', 'The project emphasized the importance of storytelling in Motion/UI/UX design. I learned to balance functionality with branding, ensuring every user interaction felt purposeful and engaging. The iterative process also strengthened my skills in coding and animation.', 2, 'paragraph'),
(21, 'The Challenge Awaits', '', 'What if the long forgotten brand, Orbitz, was given an update? A brand that left consumers feeling a little weird, but in a good way this time. Bring out the nostalgia of the old drink, by combining it’s space theme with a modern redesign.', 3, 'paragraph'),
(24, 'The Conflict', 'Nostalgia meets reinvention as I tackle the challenge of rebranding a drink once lost to time.', 'Orbitz, a 1990s drink known for its suspended orbs, failed to captivate audiences due to issues with taste, texture, and branding. This project reimagines Orbitz as a bold, modern product with updated branding and conceptual flavors while keeping its iconic orb feature. My role involved brand strategy, packaging design, web development, and storytelling. ', 3, 'paragraph'),
(25, 'Searching for the One', 'Before landing on the final theme, I explored multiple creative directions to redefine Orbitz.', 'Rebranding Orbitz began with a deep dive into thematic possibilities that could revive its identity. I explored a range of concepts, from a sleek, street-style aesthetic to retro-futurism and ethereal, aura-inspired designs. Ultimately, I returned to Orbitz’s original space theme but reimagined it with a bold, adventurous, and cartoonish twist. ', 3, 'paragraph'),
(26, 'Mapping Out the Journey', 'This rebranding demanded a careful balance of nostalgia and modernity.', '• Create a cohesive brand story rooted in nostalgia but updated for today’s market\r\n\r\n• Design sleek, eye-catching packaging that elevates Orbitz’s visual appeal\r\n\r\n• Wireframe and develop an interactive webpage to promote and tell the story of Orbitz\r\n\r\n• Create a commercial to promote the rebrand and excite audiences', 3, 'bulletpoint'),
(27, 'Bringing Ideas to Life', 'From outdated to extraordinary, every element of Orbitz was reimagined step by step.', 'Initial sketches focused on clean, futuristic packaging that highlighted the drink’s floating orbs as a feature, not a flaw. Inspiration was drawn from celestial motifs to evoke a sense of wonder. High-fidelity designs incorporated bold typography and playful flavor names, creating a product that felt vibrant and premium.', 3, 'paragraph'),
(28, 'Testing the Magic', 'Feedback helped refine the rebranding into a cohesive, compelling product.', 'Feedback from professors, family, and friends were crucial in developing the consistent direction and interesting style for Orbitz. With over 15 sketches of logo concepts,  and two different bottle versions, I eventually was able to come to a finalized version that satisfied the modern rebrand. During this process, I learned a lot about target audiences and the importance of ensuring that my message was consistently on brand. ', 3, 'paragraph'),
(29, 'The Destination', 'Strategic execution and cohesive design made this project a triumph.', 'This project demonstrated the power of storytelling in branding and marketing. By combining narrative elements with sleek 3D design, the campaign elevated the makeup products beyond their functional purpose, aligning them with a larger, aspirational identity. The process honed my skills in 3D modeling, animation, and cross-platform branding.', 3, 'paragraph'),
(30, 'Reflection on Journey', '', 'The project emphasized the importance of storytelling in Motion/UI/UX design. I learned to balance functionality with branding, ensuring every user interaction felt purposeful and engaging. The iterative process also strengthened my skills in coding and animation.', 3, 'paragraph');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `service` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`) VALUES
(1, 'Front-End Web Development'),
(2, 'Back-End Web Development'),
(3, 'Motion Design'),
(4, 'Front-End'),
(5, 'Back-End'),
(6, 'Branding'),
(7, '3D'),
(8, 'Motion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_services`
--
ALTER TABLE `projects_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects_services`
--
ALTER TABLE `projects_services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
