<h3>Search for individual Student</h3><hr>
<form action="" method="post">
  <input class="form-control" name="individual" id="individual" onkeyup="show_result(this.value)" placeholder="Search by ID, Name, Phone Number, Roll..">
  <div id="show_results"></div>
</form>
<hr>

<script>
function show_result(individual){
  if (individual == "") {
    document.getElementById("show_results").innerHTML = "";
    return;
  }
  else {

    //document.getElementById("show_results").innerHTML = individual;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("show_results").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","views/all_form_individual_result.php?individual="+individual,true);
    xmlhttp.send();
  }
}
</script>
