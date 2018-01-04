var dhxWins,w1,menu,sb;
function doOnLoad() {
	dhxWins = new dhtmlXWindows();
    dhxWins.enableAutoViewport(true);
    dhxWins.setImagePath("media/imgs/");
    
	w1 = dhxWins.createWindow("w1", 0, 0);
	dhxWins.window("w1").maximize();
    w1.setText("<?php echo $row_app['app_name']." - ".$row_user['clinic'];?>");
	w1.attachObject('obj');
	w1.button("minmax2").hide();
	

    
	menu = w1.attachMenu();
	menu.setTopText("<?php echo $row_user['staff_first_name']." ".$row_user['staff_last_name']." - ".$row_user['department'];?>");
    menu.setImagePath("media/imgs/");
    menu.setIconsPath("media/imgs/");
    menu.loadXML("menu.xml?" + new Date().getTime());
}