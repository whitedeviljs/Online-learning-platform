<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "connection.php";
  include "nav.php";
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .container {
      width: 100%;
      max-width: 1300px;
      margin: 20px auto;
      background: #030140;
      padding: 20px;
      box-shadow: 0 0 30px cyan;
      border-radius: 20px;
    }

    .container .typed-content::-webkit-scrollbar {
      width: 10px;
    }

    .container .typed-content::-webkit-scrollbar-track {
      background-color: #444;
      border-radius: 5px;
    }

    .container .typed-content::-webkit-scrollbar-thumb {
      background-color: white;
      border-radius: 5px;
    }

    #typed-content {
      color: white;
    }

    .typed-cursor {
      font-size: inherit;
      color: white;
      display: inline;
      white-space: nowrap;
      animation: blink 0.7s infinite;
    }

    @keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <main>
    <div class="container">
      <div id="typed-content"></div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var options = {
        strings: [
          "<h2>Welcome to Skillup !</h2><h4>Empowering Learners Everywhere</h4><br><h5>At Skillup, we believe in the transformative power of education. Our mission is to provide accessible, high-quality learning experiences to students around the globe. As we embark on this exciting journey, we are dedicated to helping individuals reach their full potential through flexible, engaging, and personalized learning.</h5><br><h2>Our Story</h2><h4>From Vision to Reality</h4><br><h5>Founded in 2023, our journey began with a small team of passionate educators and technologists who wanted to bridge the gap between traditional education and modern technology. Although we are just starting, our commitment to making learning accessible and effective is unwavering. We are building our platform with the future of education in mind.</h5><br><h2>What We Offer</h2><h4>Courses for Everyone</h4><br><h5>Diverse Subjects: We are in the process of developing a wide range of courses that cater to various interests and career goals, from technology and business to the arts and personal development.<br><br>Expert Instructors: Our team is curating a selection of industry professionals and academic experts to bring real-world experience and insights into our virtual classrooms.<br><br>Flexible Learning: We aim to provide a platform that allows you to study at your own pace, on your own schedule, making learning convenient for everyone."
        ],
        typeSpeed: 0.1,
        backSpeed: 5,
        backDelay: 5000,
        startDelay: 500,
        loop: false,
        showCursor: true,
        cursorChar: '|',
      };
      var typed = new Typed('#typed-content', options);
    });
  </script>

  <?php include "footer.php"; ?>
</body>

</html>