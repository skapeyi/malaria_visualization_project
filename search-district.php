<script type="text/javascript">
$(document).ready(function() {
 $(".post-input").keyup(function(){
   var dist = $("#district").val();
   if(dist != ''){
   $("#seach-result").html('<img src="media/wait.gif" align="absmiddle"/> &nbsp;&nbsp; Processing...');
	$.ajax ({
         type: "POST", 
         url: "district-find.php",
         data: "&dist="+ dist, 
         success: function(option){        
 			$("#seach-result").html(option);
			}
      	});
	}  
   else { 
       $("#seach-result").html("");
}  
return false;});
});
</script>
<div id="container">
  <div class="container-inner-data">
    <span class="container-inner-data-title">Cases by district</span>
    <span class="information">Last received data update <?php echo date('dS-m-Y');?></span>
    <div class="advancedsearch-seperator">
        <table>
          <tr>
            <td><input name="district" type="text" class="post-input" id="district" size="30" placeholder="type district name" maxlength="50" /></td>
          </tr>
        </table>
    </div>
    <div id="seach-result"></div>
  </div>
</div>