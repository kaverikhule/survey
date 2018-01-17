<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
   
<script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery.js"></script>
   <div class="tab">
     <button class="tablinks"">Result</button>
  <button class="tablinks" onclick="openCity(event, 'Home')">Home</button>
  
</div>
<div id="Result" class="tabcontent">
<table id="">
<tr>
<td>Name:</td>
<td id="name_label"></td>
</tr>
<tr>
<td>DOB:</td>
<td id="dob_label"></td>
</tr>
<tr>
<td>Phone:</td>
<td id="phone_label"></td>
</tr>
<tr>
<td>Address:</td>
<td id="address_label"></td>
</tr>
</table>

<div id="html1">
  <ul id="dataTree">
   
  </ul>
</div>
</div>
<div id="Home" class="tabcontent">
<div class="container1">
  <form id="surveyForm" action="action_page.php">

    <label for="fname">First Name</label>
    <input type="text" id="name" name="name"  placeholder="Your name..">

    <label for="lname">Date Of Birth</label>
    <input type="date" id="dob" onclick="changeInfo()"name="dob" >

	
    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone"  placeholder="Enter phone">
	  <label for="address">Address</label>
    <textarea id="address" name="address" placeholder="Enter phone"></textarea>
<table id="question_div">
</table>
  
    <input type="submit" id="submit" value="Submit">
	<div style="float:right">
	<img id="addQuestion" src="<?php echo base_url(); 
   ?>/images/plus1.png" height="40px"width="40px" alt="No Image"> Add New Question
</div>
</div>
  </form>
</div>  
  </div>
  <script>
  function changeInfo(){
	  
	
  }
    $("#submit").click(function(event){
		event.preventDefault();
		flag=true;

	$('#surveyForm select').each(function(){
		var id1=$(this).val();
		if(id1==''){
			flag=false;
			$(this).focus();
			return false;
					}
});
	$('#surveyForm textarea').each(function(){
		var id1=$(this).val();
		if(id1==''){
			flag=false;
			$(this).focus();
			return false;
					}
});
	$('#surveyForm input').each(function(){
		var id1=$(this).val();
		if(id1==''){
			flag=false;
			$(this).focus();
			return false;
					}
});
	$('#surveyForm radio').each(function(){
		var id1=$(this).val();
		if(id1==''){
			flag=false;
			$(this).focus();
			return false;
					}
});
if(flag){
	
	 var val=$("#name").val();
	 $("#name_label").append(val);
	 var val=$("#phone").val();
	 $("#phone_label").append(val);
	 var val=$("#dob").val();
	 $("#dob_label").append(val);
	 var val=$("#address").val();
	 $("#address_label").append(val);
	 $("#dataTree").empty();
	 $('.normal_que').each(function(){
		var id1=$(this).find("td").find(".que").val();
		var ans=$(this).find("td").find(".ans").val();
		var str="<li>"+id1+"<ul><li>"+ans+"</li></ul></li>";
    $("#dataTree").append(str);
	
});
	openCity(event, 'Result');	
}
  });
  $("#addQuestion").click(function(){
	  var str='<tr class="normal_que"><td><select class="que_type"> <option value="">-----Select-----</option> <option value="Multiline Text">Multiline Text</option>  <option value="Multiple Choice">Multiple Choice</option>'+
	 ' <option value="Single Choice">Single Choice</option></select></td></tr>';
	$("#question_div").append(str);
  });
  
   $(".que_type").live("change",function(){
	   var res=$(this).closest("tr").hasClass("normal_que");
	   var tr=$(this).closest("tr");
	   var text=$(this).val();
	    $(tr).find("td:gt(0)").remove();
	   var que_count=$("tr.normal_que").length;
	   if(text=='Single Choice'){
		 str= "<td class='que_ans'><input type='text' value='Question #"+que_count+" ("+text+")' class='que'readonly><br><input class='ans'type='text' value='Ans #"+que_count+" ("+text+")'readonly></td>"; 
	   }else if(text=='Multiline Text'){
		 str= "<td class='que_ans'><input type='text' value='Question #"+que_count+" ("+text+")'class='que'readonly><br><textarea class='ans'readonly>Ans #"+que_count+" ("+text+")</textarea></td>";    
	   }
	   else{
		str= "<td class='que_ans'><input type='text' value='Question #"+que_count+" ("+text+")'class='que'readonly><br> <input class='ans'type='radio' name='gender' value='yes' checked > Yes<br>"+
  "<input type='radio' name='gender' value='no'> No<br></td>";     
	   }
	  
	 if(res){
		 
		 $(tr).append(str);
	 }
  });
  
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
  </script>
