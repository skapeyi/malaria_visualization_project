<script type="text/javascript">
//Search by date range
$(document).ready(function() {
 $(".post-input").keyup(function(){
   var from = $("#from").val();
   var to = $("#to").val();
   if(from != '' || to != ''){
   $("#seach-result").html('<img src="media/wait.gif" align="absmiddle"/> &nbsp;&nbsp; Processing...');
	$.ajax ({
         type: "POST", 
         url: "case-find.php",
         data: "from="+ from + "&to="+ to, 
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
       <span class="container-inner-data-title">Cases within range</span>
    <span class="information">Last received data update <?php echo date('dS-m-Y');?></span>
    <div class="advancedsearch-seperator">
        <table>
          <tr>
            <td><input name="from" type="text" class="post-input" id="from" size="15" placeholder="type here" maxlength="15" /></td>
            <td>&nbsp;</td>
            <td>to</td>
            <td>&nbsp;</td>
            <td><input name="to" type="text" class="post-input" id="to" size="15" placeholder="type here" maxlength="15" /></td>
          </tr>
        </table>
      </div>
    <div id="seach-result"></div>
  </div>
</div>