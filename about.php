<!DOCTYPE html>
<html lang="en">
    <?php 
        try {
            include 'php/reusables/head.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>

<body>
    <?php   
        try {
            include 'php/reusables/hero.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    <!-- ABOUT -->

    <section class="about" id="about">
        <div class="about__container">
           
            <h2>About Innovation College</h2>
            <p>
                <img src="img/Guy-Student-300x263.jpg" alt="Smiling Student image">
                <br> <a href="#">Innovation College</a> is a technology college, specializing in programming/development for front-end
                and back-end, big data analytics, big data architecture, cloud security and cloud architecture.
                <br>
                <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br>
                <br> Sit amet tellus cras adipiscing enim eu turpis egestas. Sit amet porttitor eget dolor morbi. Ac turpis egestas maecenas pharetra convallis. Nulla aliquet porttitor lacus luctus. Lorem ipsum dolor sit amet. Id interdum velit laoreet id donec ultrices tincidunt arcu. Non arcu risus quis varius quam quisque id. 
                <br>
                <br> Tortor consequat id porta nibh venenatis cras sed felis. Sit amet nulla facilisi morbi tempus iaculis urna. Mattis rhoncus urna neque viverra justo nec ultrices. Pharetra sit amet aliquam id diam maecenas ultricies mi eget.
                <br>
                <br> Sodales ut etiam sit amet. Consectetur lorem donec massa sapien faucibus et. Nisl condimentum id venenatis a. Turpis in eu mi bibendum neque. Justo eget magna fermentum iaculis eu. Dolor purus non enim praesent elementum facilisis leo. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus.
                <br>
                <br>
                </p>
            <br>
            <div class="about__container--thisWebsite">
            <h2>About this website</h2>
            <p>This Job<span>Board</span> was created by
                <a href="https://www.linkedin.com/in/tisha-murvihill-tech" target="_blank">Tisha Murvihill</a>, a graduate of
                <a href="https://www.innotechcollege.com" target="_blank">InnoTech College</a> in Calgary, Alberta, Canada. The layout is fully responsive and is coded in HTML5, CSS, and JavaScript.
                This site keeps things sleek, simple, and fast by using only PHP and SQL for content management (no
                WordPress et al.). Tisha can be reached at
                <a href="http://www.take2tech.ca" target="_blank">tech@take2tech.ca</a>.</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->

    <section>
    <?php 
        try {
            include 'php/reusables/footer.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    </section>

</body>

</html>