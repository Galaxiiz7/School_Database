<!DOCTYPE html>
<html>

<head>
    <title>Admin page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .hidden {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: opacity 0.3s ease, max-height 0.3s ease;
    }

    .visible {
        opacity: 1;
        max-height: 100px; /* Set the desired height */
        transition: opacity 0.3s ease, max-height 0.3s ease, transform 0.3s ease;
    }

    .fade-in {
        opacity: 1;
        transform: translateY(0);
    }
</style>
    <script>
    function toggleChoices() {
        var choices = document.getElementById('choices');
        choices.classList.toggle('hidden');
        choices.classList.toggle('visible');

        if (choices.classList.contains('visible')) {
            setTimeout(function () {
                choices.classList.add('fade-in');
            }, 100);
        } else {
            choices.classList.remove('fade-in');
        }

        var bookBtn = document.getElementById('bookBtn');
        bookBtn.classList.toggle('hidden');

        var classroomBtn = document.getElementById('classroomBtn');
        classroomBtn.classList.toggle('hidden');

        var subjectBtnBtn = document.getElementById('subjectBtn');
        subjectBtnBtn.classList.toggle('hidden');

        var curriculumBtn = document.getElementById('curriculumBtn');
        curriculumBtn.classList.toggle('hidden');

        var paymentBtn = document.getElementById('paymentBtn');
        paymentBtn.classList.toggle('hidden');

        var studentBtn = document.getElementById('studentBtn');
        studentBtn.classList.toggle('hidden');

        var scoreBtn = document.getElementById('scoreBtn');
        scoreBtn.classList.toggle('hidden');

        var teacherBtn = document.getElementById('teacherBtn');
        teacherBtn.classList.toggle('hidden');
    }
</script>

</head>

<body>
    <section>
        <?php
        // Check if the user is logged in
        session_start();
        // Fetch the information of the logged-in student
        ?>

        <div class="container my-5">
            <!-- ...existing code... -->

            <!-- Button to redirect to info.php -->
            <div class="btn-container">
                <div class="logout-btn-container">
                    <a href="Logout.php"><button class='grade-btn'>Log out</button></a>
                </div>
            </div>

            <div class="student-info-container">
                <h2>Welcome Admin</h2>
            </div>
            <a href="#" onclick="toggleChoices()"><button class='grade-btn'>View Analysis</button></a>
            <div id="choices" class="hidden">
                <a href="Analysis/bookprice_report.php"><button class='grade-btn'>Book Price</button></a>
                <a href="Analysis/salary_report.php"><button class='grade-btn'" class='grade-btn'>Salary</button></a>
                <a href="Analysis/tuition_report.php"><button class='grade-btn'" class='grade-btn'>Tuition</button></a>
            </div>
            <a href="StudentCRUD/StudentCRUD.php"><button id="studentBtn" class='grade-btn'>Student</button></a>
            <a href="TeacherCRUD/TeacherCRUD.php"><button id="teacherBtn" class='grade-btn'>Teacher</button></a>
            <a href="ClassroomCRUD/UpdateClassroomForm.php"><button id="classroomBtn" class='grade-btn'>Update Classroom</button></a>
            <a href="CurriculumCRUD/CurriculumCRUD.php"><button id="curriculumBtn" class='grade-btn'>Curriculum</button></a>
            <a href="PaymentCRUD/StudentPaymentCRUD.php"><button id="paymentBtn" class='grade-btn'>Payment</button></a>
            <a href="BookCRUD/BookCRUD.php"><button id="bookBtn" class='grade-btn'>Book</button></a>
            <a href="SubjectCRUD/SubjectCRUD.php"><button id="subjectBtn" class='grade-btn'>Subject</button></a>
            <a href="ScoreCRUD/ScoreCRUD.php"><button id="scoreBtn" class='grade-btn'>Score</button></a>
        </div>
    </section>
</body>

</html>
