<?php include("templates/header.php"); ?>
<body>
<?php include("templates/nav.php"); ?>
<div class="header">
    <h1>Header</h1>
</div>
<div class="row">
    <div class="content">
        <h3>Our Projects</h3>

<p id="demo"></p>

<script>
    document.getElementById("demo").innerHTML="Printed with JS";
</script>

<button onclick="document.getElementById('myImage').src='images/lights/buld_on.jpg';">Turn On The Light</button>

<img id="myImage" src="images/lights/buld_off.jpg" />

<button onclick="document.getElementById('myImage').src='images/lights/buld_off.jpg';">Turn Off The Light</button>

<br>
<br>
<br>
<br>
<br>

<script>
    document.write("This is a JS String");
</script>
<br>
<br>
<br>
<br>

<script>
    document.write("This is a JS String");
</script>
<br>
<br>

<script>
    let fname = "Alex Okama";
    document.write(fname);

</script>

    </div>
    <div class="side_bar">
        <h3>Sign In</h3>
        
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
    </div>
</div>
<?php include("templates/footer.php"); ?>