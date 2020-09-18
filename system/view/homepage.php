<!-- add navigation bar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">GNews API</a>
</nav>
<main role="main" class="container starter-template">
    <div class="row">
        <div class="col">
        	<!--error / success message will apprear here -->
            <div id="response"></div>
            <div class="gnews">
              <div class="searchresult">
                <!-- toggle the search button -->
                <button class="newSearch">New Search</button>
                <!-- gnews ice results will be displayed here -->
                <div class="showsearchresult"></div>
              </div>
              <!-- form for searching fire ice -->
              <div class="searchFormdiv">
                <h2>Search External Server for News</h2>
                <form  method="post" role="form" id='fireicesearch'>
                  <input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">
                  <button type='submit' class='btn btn-primary'>Get News</button>
                  <div class="SubmitLoader Loader"></div>
                </form>
              </div>
            </div>
        </div>
    </div>
</main>
<!-- this file holds the javascripts for processing the page -->
<?php 
require_once "processor.php";
?>

<style type="text/css">
  .newSearch{display: none; float: right;}.SubmitLoader{margin-top:8px; float:left; margin-right:10px; display: none;}
</style>