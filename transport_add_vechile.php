<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	
	 $sql1="SELECT * FROM transport_add_vechile where vechile_number='".$_POST['number']."'";
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
		$route_id=implode(",",$_POST['route_id']);
		
		if($_POST['number']!="")
		{
		 $sql3="INSERT INTO transport_add_vechile(vechile_number,route_id,seat) VALUES ('".$_POST['number']."','".$route_id."','".$_POST['seat']."')";
		$res3=mysql_query($sql3) or die("Error : " . mysql_error());
		header("Location:transport_add_vechile.php?msg=1");
		}else
		{    header("location:transport_add_vechile.php?error=2");
			
			}
		
	}
	else
	{
		$msg = "<span style='color:#FF0000;'><h4> This is all ready exist </h4></span>";

	}
}
else
{
	if($_GET['msg']==1)
	{
		$msg = "<span style='color:#009900;'><h4> Section Detail Added Successfully </h4></span>";
	}
	if($_GET['msg']==2)
	{
		$msg = "<span style='color:#009900;'><h4>Section Detail Deleted Successfully </h4></span>";
	}
	if($_GET['msg']==3)
	{
		$msg = "<span style='color:#009900;'><h4> Section Detail Updated Successfully </h4></span>";
	}
	else if($_GET['error']==1)
	{
		$msg = "<span style='color:#FF0000;'><h4> Route Detail Already Exists </h4></span>";
	}
	else if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Please fill all detail </h4></span>";
	}
}


?>
<div class="page_title">
	<!--	<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Dashboard</h3>-->
		<div class="top_search">
			<form action="#" method="post">
				<ul id="search_box">
					<li>
					<input name="" type="text" class="search_input" id="suggest1" placeholder="Search...">
					</li>
					<li>
					<input name="" type="submit" value="" class="search_btn">
					</li>
				</ul>
			</form>
		</div>
	</div>
<?php include_once("includes/transport_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Add New  Vehicle Number</h3>
                     <?php if($msg!=""){echo $msg; } ?>
					<form action="#" method="post" class="form_container left_label">
							<ul>
								<li>
								<div class="form_grid_12">
									<label class="field_title"> Vehicle Number</label>
									 <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="number" type="text"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>

								</li>
								<li>
								<div class="form_grid_12">
									<label class="field_title">Select Route</label>
									<div class="form_input">
										<select name="route_id[]" style=" width:300px; height:30px;" multiple class="chzn-select" tabindex="20">
											<option value=""></option>
											<?php 
											$sql="select * from transport_add_route";
											$ro=mysql_query($sql);
											while($row=mysql_fetch_array($ro)){
											
											?>
                                            											<option value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php }?>
										</select>
									</div>
								</div>
								</li>
                                
                                
                                
                                
                               <li>
								<div class="form_grid_12">
									<label class="field_title">No of Seats</label>
									 <div class="form_input">
										<div class="form_grid_5 alpha">
											<input name="seat" type="text"/>
											
										</div>
									
										<span class="clear"></span>
									</div>

									
									
								</div>

								</li>
                                
                                
                                
                                
                                
                                
                                <li>
								<div class="form_grid_12">
									<div class="form_input"><div class="form_grid_4 alpha">
										
										<button type="submit" name="submit" class="btn_small btn_blue"><span>Save</span></button>
										
										<button type="submit" class="btn_small btn_orange"><span>Back</span></button>
										
									</div>
								</div>
								</li>
							</ul>
						</form>
				</div>
			</div>
			
			
			<span class="clear"></span>
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>