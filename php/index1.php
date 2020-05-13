<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Homepage</title>
    <link rel="stylesheet" href="stil1.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include 'header.php';?>
<section class="wrap" id="s1">
    <div id="podnaslov">
        <h1>
            Feeling hungry?
        </h1>
        <p>
            Order now and avoid waiting!
        </p>
    </div>
    <div class="slika" id="slika">
        <img src="1529573631.png">
    </div>
</section>
<section class="wrap" id="s2">
    <a href="LogIn.php">Order Now</a>
</section>

<section class="wrap" id="s3">
    <section id="ss">
        <h3>Recommended by others:</h3>
    </section>
    <div>
        <img src="https://image.dnevnik.hr/media/images/567x350/Oct2018/61585381.jpg">
        <p>Pizza</p>
        <button>Add to cart</button>
    </div>
    <div>
        <img src="https://image.dnevnik.hr/media/images/567x350/Oct2018/61585381.jpg">
        <p>Pizza</p>
        <button>Add to cart</button>
    </div>
    <div>
        <img src="https://image.dnevnik.hr/media/images/567x350/Oct2018/61585381.jpg">
        <p>Pizza</p>
        <button>Add to cart</button>
    </div>
    <div>
        <img src="https://image.dnevnik.hr/media/images/567x350/Oct2018/61585381.jpg">
        <p>Pizza</p>
        <button>Add to cart</button>
    </div>
    <div>
        <img src="https://image.dnevnik.hr/media/images/567x350/Oct2018/61585381.jpg">
        <p>Pizza</p>
        <button>Add to cart</button>
    </div>

</section>

<section class="wrap" id="s4">
    <div>
        <h3>About</h3>
        <p><strong>orderly</strong> is an easy to use online reservation app made for SSST restaurant. It was develop by three SSST students.</p>
    </div>
    <div>
        <h3>Contact us</h3>
        <p>Want to contact SSST restaurant? <br> Call us on: +387603094532<br> or send us an email: <br> restaurant@ssst.edu.ba</p>
    </div>
    <div>
        <h3>How to order</h3>
        <p><strong>orderly</strong> is simple to use. Register, order and enjoy your meal without waiting!
            No need to wait for Maca to show up.</p>
    </div>
</section>

<?php include 'footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script>
    $(function () {
        $(document).scroll(function () {
            var $nav = $("#fix");
            var $nav2 = $(".menu-item");
            $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
            $nav2.addClass('notactive', $(this).scrollTop() > $nav.height());
        });
    });


    function myFunction() {
        let x = document.getElementsByClassName("menu-item");
        for (let i = 0; i < x.length; i++) {
            x[i].classList.toggle('notactive');
        }
    }
</script>
</body>
</html>