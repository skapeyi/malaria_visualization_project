<script type="text/javascript">
$(document).ready(function() {
 $(".post-input").keyup(function(){
   var reg = $("#region").val();
   if(reg != ''){
   $("#seach-result").html('<img src="media/wait.gif" align="absmiddle"/> &nbsp;&nbsp; Processing...');
	$.ajax ({
         type: "POST", 
         url: "region-find.php",
         data: "&reg="+ reg, 
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
    <span class="container-inner-data-title">Cases by region</span>
    <span class="information">Last received data update <?php echo date('dS-m-Y');?></span>
    <div class="advancedsearch-seperator">
        <table>
          <tr>
            <td><input name="region" type="text" class="post-input" id="region" size="30" placeholder="type region name" maxlength="50" /></td>
          </tr>
        </table>
    </div>
    <div id="seach-result"></div>
  </div>
</div>