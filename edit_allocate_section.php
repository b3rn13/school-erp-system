<?php include_once("includes/header.php");?>
<?php 
if(isset($_POST['submit']))
{
	$section_id = $_POST['section_id'];
	 $class_id = $_POST['class_id'];
	
		  $sql1="SELECT * FROM allocate_class_section where  class_id='".$class_id."' and section_id='".$section_id."' and `allocate_id` != '" . $_GET['sid'] . "'";
	
	$res1=mysql_query($sql1) or die("Error : " . mysql_error());
	$num=mysql_num_rows($res1);
	if($num==0)
	{
	  $sql3="UPDATE allocate_class_section SET `class_id` = '".$class_id."',section_id='".$section_id."'   WHERE `allocate_id` = '" . $_GET['sid'] . "'";
	$res3=mysql_query($sql3) or die("Error : " . mysql_error());
	header("Location:allocate_section.php?msg=3");
	}else
		{    header("location:edit_allocate_section.php?error=2&&sid=".$_GET['sid']);
			
		}
}


if($_GET['error']==2)
	{
		$msg = "<span style='color:#FF0000;'><h4> Section Detail Already Exists  </h4></span>";
	}
	
		
	$sql2="SELECT * FROM allocate_class_section WHERE `allocate_id` = '" . $_GET['sid'] . "'";
	$res2=mysql_query($sql2);	
	$row2=mysql_fetch_array($res2);
		
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
<?php include_once("includes/school_setting_sidebar.php");?>

<div id="container">
	
	
	
	<div id="content">
		<div class="grid_container">

          
			<div class="grid_12">
				<div class="widget_wrap">
					<h3 style="padding-left:20px; color:#1c75bc">Edit Allocated Section </h3>
                    
                    <?php if($msg!=""){echo $msg; } ?>
					<form action="" method="post" class="form_container left_label" enctype="multipart/form-data">
							<ul>
								<li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Class  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="class_id" >
								<option value="" selected="selected"> - Select Class - </option>
							<?php
							 $sql="SELECT * FROM class where stream_status='1' ";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['class_id']==$row2['class_id'])                    {
									 $class='selected="selected"';
					
					             }else
								 {
									 $class="";
									 }
									?>
									<option <?php echo $class;?> value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
									<?php
								}
							?>
							</select>
											<span class=" label_intro">Class name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                <li>
								<div class="form_grid_12 multiline">
									<label class="field_title"> Section  Name</label>
                                    <div class="form_input">
										<div class="form_grid_5 alpha">
											<select name="section_id" >
								<option value="" selected="selected"> - Select Section - </option>
							<?php
							 $sql="SELECT * FROM section";
	                           $res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{   
								if($row['section_id']==$row2['section_id'])                    {
									 $stream='selected="selected"';
					
					             }else
								 {
									 $stream="";
									 }
									?>
									<option <?php echo $stream;?> value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>
									<?php
								}
							?>
							</select>
											<span class=" label_intro">Section name</span>
										</div>
									
										<span class="clear"></span>
									</div>

									
									<div class="form_input">

										<span class="clear"></span>
									</div>
								</div>
								</li>
                                
                                
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										
										<button type="submit" class="btn_small btn_blue" name="submit"><span>Save</span></button>
										
										<a href="stream.php"><button type="button" class="btn_small btn_orange"><span>Back</span></button></a>
										
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
<?php include_once("includes/footer.php");?>