<?php
	function setComment($conn){
		if(isset($_POST['commentSubmit'])){
			$uid=$_POST['uid'];
			$cdate=$_POST['cdate'];
			$message=$_POST['message'];
	
			$sql="INSERT INTO commentsection (oauth_uid,cdate,message) VALUES ('$uid','$cdate','$message')";
			$result = $conn->query($sql);
	$_POST['commentSubmit']='NULL';
		}	
	}
	
	function getComment($conn){
		$sql="select * from commentsection natural join users ";
		$result = $conn->query($sql);
		while($row=$result->fetch_assoc()){
			$cid = $row['cid'];
			$uid=$row['id'];
			
			
				$sql2="select * from users where id='$uid'";
				$result2=$conn->query($sql2);
				if($row2 = $result2->fetch_assoc()){
					if(empty($row['message'])){
						
					}else{
					$oauth_uid=$row2['oauth_uid'];
					?>
					<div class='commentBox'><p>
					<img src ="<?php echo $row['picture'];?>" width='5%' height='auto' >
						<?php echo $row['first_name'] ?> <?php echo $row['last_name'];?> <br>
						<?php echo $row['cdate'];?> <br>
						<?php echo nl2br($row['message']); ?>
			
						</p>
						<?php						
					if(isset($_SESSION['id'])){
						if($_SESSION['id'] == $oauth_uid){
							?>
							
								<script type="text/javascript">
			
			
				function show_hide(x){
					
					var y=x.previousElementSibling[3];
					y=((((y.parentElement).parentElement).parentElement).parentElement).parentElement;
					
					
						if(y.style.display==="none")
						{
							y.style.display="block";
						}
						else
							y.style.display="none";
						if(x.style.display==="none")
						{
							x.style.display="block";
						}
						else
							x.style.display="none";
				
				
				
					
				};
				var submit_btn=document.querySelectorAll("#reply1");
				for(var j=0;j<submit_btn.length;j++)
				{
				submit_btn[j].addEventListener("click",function(event)
				{
					show_hide(event.target);
					event.preventDefault();
					event.stopPropagation();
				});
				}
					
			
			</script>
								
								
								 	<form class='reply-form' method='POST' action='replyComment.php'>
								<input type='hidden' name='cid' value='<?php echo $row['cid'];?>'>
								<input type='hidden' name='uidr' value='<?php echo $uid;?>'>
								<input type='hidden' name='rdate' value='<?php echo $row['cdate'];?>'>
								<input  type='hidden' name='rmessage' value='<?php echo $row['message'];?>'>
								<div class="container" style="display: none;">
    							<div class="row">
	    						<div class="col-md-6 col-xs-12">
    							<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form>
										<textarea cols="35" name="reply_box" id="reply_box"></textarea>
										<input type="submit" name="reply" id="reply2" text="Reply" value="Reply" class="btn " style="background-color: #009999; color:white;">
										<br>
									</form>
								</div>
								</div>
								</div>
        
    							</div>
								</div>
								<input type="submit" name="reply" id="reply1" text="Reply" value="Reply" class="btn " style="display:block;background-color: #009999; color:white;">
							
								</form>
								<?php
						}else{ 
								?>
								<form class='reply-form' method='POST' action='replyComment.php'>
								<input type='hidden' name='cid' value='<?php echo $row['cid'];?>'>
								<input type='hidden' name='uidr' value='<?php echo $uid;?>'>
								<input type='hidden' name='rdate' value='<?php echo $row['cdate'];?>'>
								<input  type='hidden' name='rmessage' value='<?php echo $row['message'];?>'>
								<div class="container" style="display: none;">
    							<div class="row">
	    						<div class="col-md-6 col-xs-12">
    							<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form>
										<textarea cols="35" name="reply_box" id="reply_box"></textarea>
										<input type="submit" name="reply" id="reply2" text="Reply" value="Reply" class="btn " style="background-color: #009999; color:white;">
										<br>
									</form>
								</div>
								</div>
								</div>
        
    							</div>
								</div>
								<input type="submit" name="reply" id="reply1" text="Reply" value="Reply" class="btn " style="display:block;background-color: #009999; color:white;">
							
								</form>
								<?php
							}
								
					}}
						echo "</div>";
						$sql4="SELECT * from replycomments natural join users WHERE cid='$cid'";
						$result4 = $conn->query($sql4);
						while($row4 = $result4->fetch_assoc()){
							if(empty(row4['rmessage'])){
								
							}else{
						echo "<div class='commentrBox'><p>";
						echo "<img src=".$row4['picture']." width='5%' height='auto'>";
							echo $row4['first_name'];echo $row4['last_name']."<br>";
							echo $row4['rdate']."<br>";
							echo nl2br($row4['rmessage']);
							echo "</p>";
							echo "</div>";
						}}
				
			}
		}
	}
	
	
	