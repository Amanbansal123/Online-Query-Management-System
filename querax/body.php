
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">

      </div>

      <br>
      <div class="w3-card w3-round w3-white">


      </div>




    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7">

      <div class="w3-row-padding">
        <div class="w3-col m10">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Search any Query</h6>
              <p contenteditable="true" class="w3-border w3-padding">Search</p>
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Search</button>
            </div>
          </div>
        </div>
      </div><br>
      <div class="w3-row-padding">
        <div class="w3-col m10">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Ask Query</h6>
              <p contenteditable="true" class="w3-border w3-padding">Query</p>
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>Ask</button>
            </div>
          </div>
        </div>
      </div>





    <!-- End Middle Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-col m2">


    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>


<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

</script>

</body>
