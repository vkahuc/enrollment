<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Enrollment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the body fills the viewport */
        }

        /* Header styles */
        header {
            background-color: #8bc34a; /* Light green color */
            color: #000000;
            padding: 20px;
            text-align: center;
            margin-left: 250px; /* Adjusted to move the header to the right */
            width: calc(100% - 250px); /* Ensure the header takes up the full width minus the sidebar width */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        /* Main container */
        .main-container {
            display: flex;
            flex: 1;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px; /* Sidebar width */
            background-color: #8bc34a; /* Light green sidebar */
            color: #000000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto; /* Enable scrolling if sidebar content exceeds height */
            height: 100vh; /* Sidebar height equal to viewport height */
            position: fixed; /* Fixed position to keep sidebar in view */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin-top: 115px;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #000000;
            font-size: 18px;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #e1f5fe; /* Lighter text color on hover */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #5a9216; /* Darker green on hover */
        }

        /* Content styles */
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px; /* Adjust for sidebar width */
            overflow-y: auto; /* Enable scrolling for content */
        }

        /* Footer styles */
        footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            margin-left: 250px; /* Adjusted to move the footer to the right */
            width: calc(100% - 250px); /* Ensure the footer takes up the full width minus the sidebar width */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }
    </style>
    <script>
        function showPage(pageId) {
            var sections = document.querySelectorAll('section');
            sections.forEach(function(section) {
                section.style.display = 'none';
            });

            var page = document.getElementById(pageId);
            if (page) {
                page.style.display = 'block';
            }
        }
    </script>
</head>

<body>

<header>
    <h1>School Enrollment System</h1>
</header>

<div class="sidebar">
    <ul>
        <li><a href="<?php echo e(route('home')); ?>" onclick="showPage('home')">Home</a></li>
        <li><a href="<?php echo e(route('student.index')); ?>" onclick="showPage('student')">Students</a></li>
        <li><a href="<?php echo e(route('teacher.index')); ?>" onclick="showPage('teacher')">Teachers</a></li>
        <li><a href="<?php echo e(route('program.index')); ?>" onclick="showPage('program')">Program</a></li>
        <li><a href="<?php echo e(route('subject.index')); ?>" onclick="showPage('subject')">Subjects</a></li>
        <li><a href="<?php echo e(route('offer.index')); ?>" onclick="showPage('offers')">Subject Offered</a></li>
        <li><a href="<?php echo e(route('enrollment.index')); ?>" onclick="showPage('enrollment')">Enrollment</a></li>
    </ul>
</div>

<div class="content">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<footer>
    &copy; <?php echo e(date('Y')); ?> School Enrollment System
</footer>

</body>

</html>
<?php /**PATH C:\Users\Virgilio Jr\student-enrollment\resources\views/layout/layout.blade.php ENDPATH**/ ?>