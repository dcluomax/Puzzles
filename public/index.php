<?php
if (!session_id()){session_start();}

if(isset($_GET['level'])){
	if(!isset($_GET['key'])){
		header("HTTP/1.1 404 Hey! No Key Submitted!");
		die();
		}
	if($_GET['level']==0){
		if($_GET['key']=='{First_Taste_of_Victory}'){
					if(!$_SESSION['level'][0]){
				$_SESSION['level'][0]=true;
				$_SESSION['points']=$_SESSION['points']+100;
				}
		}else{
			header("HTTP/1.1 400 Nice Try, but wrong key input");
			die();
		}
	}elseif($_GET['level']==1){
		if($_GET['key']=='{the_key_is_K3Y}'){
			if(!$_SESSION['level'][1]){
				$_SESSION['level'][1]=true;
				$_SESSION['points']=$_SESSION['points']+200;
				}
		}else{
			header("HTTP/1.1 500 BADSERVER");
			die();
		}
	}elseif($_GET['level']==2&&$_GET['key']=='{mam_team_12345}'){
			if(!$_SESSION['level'][2]){
				$_SESSION['level'][2]=true;
				$_SESSION['points']=$_SESSION['points']+300;
				}
	}elseif($_GET['level']==3&&$_GET['key']=='{May_the_Force_be_with_you}'){
					if(!$_SESSION['level'][3]){
				$_SESSION['level'][3]=true;
				$_SESSION['points']=$_SESSION['points']+400;
				}
	}elseif($_GET['level']==4&&$_GET['key']=='{w0W_Y0u_S0lved_HARD_LEVEL}'){
					if(!$_SESSION['level'][4]){
				$_SESSION['level'][4]=true;
				$_SESSION['points']=$_SESSION['points']+500;
				}
	}else{
		header("HTTP/1.1 400 Nice Try, but wrong key input");
		die();
	}
}
if(isset($_GET['register'])){
	$_SESSION['name'] = filter_input(INPUT_GET, 'register', FILTER_SANITIZE_STRING);
	//registerUser($_SESSION['name']);
	if(!isset($_SESSION['points'])){
		$_SESSION['points']=0;
	}
	if(!isset($_SESSION['level'])){
		$_SESSION['level']=[false,false,false,false,false];
	}
}
if(isset($_GET['unregister'])){
	unset($_SESSION['name']);
	$_SESSION['level']=[false,false,false,false,false];
	$_SESSION['points']=0;
}
if(!isset($_SESSION['name'])){
	echo "Set a user name to start.<form><input name=\"register\" type=\"text\" /><input type=\"submit\" /></form>";
	die();
}
echo "Hi ".$_SESSION['name'].". <br/>You have: ".$_SESSION['points']." Points";
?>
<progress value="<?php echo $_SESSION['points'];?>" max="600"></progress>
<br/>
<form><input value="Reset" type="submit" name="unregister" /></form>
<h2>CTF 2: Decrypt at will. </h2>
<?php
if(!$_SESSION['level'][0]){?><a href="puzzle_level_0.html">MAM CRYPTO 100</a><br/><?php }else{echo "Puzzle 1 Solved!<br/>";}
if(!$_SESSION['level'][1]){?><a href="puzzle_level_1.html">MAM CRYPTO 200</a><br/><?php }else{echo "Puzzle 2 Solved!<br/>";}
if(!$_SESSION['level'][2]){?><a href="puzzle_level_2.html">MAM CRYPTO 300</a><br/><?php }else{echo "Puzzle 3 Solved!<br/>";}

if($_SESSION['points']==600){ echo "<h1>Congratulations, you solved all the puzzles!</h1>"; } 

?>