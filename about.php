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
           
            <h2>About InnoTech College</h2>
            <p>
                <img src="img/Guy-Student-300x263.jpg" alt="Smiling Student image">
                <br> <a href="https://innotechcollege.com">InnoTech College</a> is an Alberta technology college, specializing in programming/development for front-end
                and back-end, big data analytics, big data architecture, cloud security and cloud architecture.
                <br>
                <br> Founded in 2015, InnoTech College offers programs that fill the gap between the skillsets demanded out by
                employers and those under-delivered by more traditional educational institutions. Our main campus is in Calgary
                at 4014 MacLeod Trail SE. It is easily accessible via LRT, buses and driving, with much free parking in the
                area. Our satellite campus is in Edmonton and is located downtown, on Jasper Avenue. It is also easily accessible
                via Central LRT station.
                <br>
                <br> We ensure that the largest employers and tech leaders, from both cities, play an active role in our programs’
                curriculum development, instruction, as well as in welcoming our students and graduates into their organizations
                for internship and job opportunities.
                <br>
                <br> Our post-secondary programs are designed to take students from <strong>having no previous knowledge</strong> of their chosen
                industry, to being ready to successfully qualify for <strong>positions</strong> in the fields of programming, big-data and
                cloud services.
                <br>
                <br> We want to make a difference in helping individuals, unsure of thei
                r future, build a solid foundation of
                education and experience that enables them to reach their goals and create a life they’ve only ever dreamed
                of.
                <br>
                <br> InnoTech College is licensed and designated in Alberta, under the Private Vocational Training Act. Its provincial
                Educational Institution codes are BPOS (Calgary) and BPPE (Edmonton). With it being a designated institution,
                all of our students are eligible for <strong>government loans, grants and scholarships</strong>. We assist all of our students
                with applying for these funding sources. InnoTech College also has a DLI number and is happy to serve international
                students.
                <br>

                <br> We welcome you to learn more about the <a href="https://www.innotechcollege.com/about/team" target="_blank">instructors</a> of our programming college and if you’d like to learn
                eve more, we’d also love to meet you in person. Please schedule an information appointment by going <a href="https://www.innotechcollege.com/contact/information-appointment-request" target="_blank">here</a>.
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