<?php
if (!session_id()){session_start();}
require_once('db.php');
if(isset($_GET['level'])){
	if(!isset($_GET['key'])){
		header("HTTP/1.1 404 Hey! No Key Submitted!");
		die();
		}
	if($_GET['level']==0){
		if($_GET['key']=='{Yay_y0u_r0ck}'){
					if(!$_SESSION['level'][0]){
				$_SESSION['level'][0]=true;
				$_SESSION['points']=$_SESSION['points']+100;
				}
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			die();
		}
	}elseif($_GET['level']==1){
		if($_GET['key']=='{l3ak_K3y_f0unD}'){
			if(!$_SESSION['level'][1]){
				$_SESSION['level'][1]=true;
				$_SESSION['points']=$_SESSION['points']+200;
				}
		}else{
			$cookie_name = "key_lv2";
			$cookie_value = "{l3ak_K3y_f0unD}";
			setcookie($cookie_name, $cookie_value, time() + (86400), "/"); 
			header("HTTP/1.1 500 BADSERVER");
			die();
		}
	}elseif($_GET['level']==2&&$_GET['key']=='{th1s_15_the_r3al_key}'){
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
	?>Set a user name to start.<form><input name="register" type="text" /><input type="submit" /></form><?
	die();
}
echo "Hi ".$_SESSION['name'];?>. <br/>You have: <?php echo $_SESSION['points'];?> Points 
<progress value="<?php echo $_SESSION['points'];?>" max="1500"></progress>
<br/>
<form><input value="Reset" type="submit" name="unregister" /></form>
<h2>CTF 1: Wild land of UX. </h2>
<?php
if(!$_SESSION['level'][0]){?><a href="puzzle_level_0.html">MAM WEB 100</a><br/><?php }else{echo "Puzzle 1 Solved!<br/>";}
if(!$_SESSION['level'][1]){?><a href="puzzle_level_1.html">MAM WEB 200</a><br/><?php }else{echo "Puzzle 2 Solved!<br/>";}
if(!$_SESSION['level'][2]){?><a href="puzzle_level_2.html">MAM WEB 300</a><br/><?php }else{echo "Puzzle 3 Solved!<br/>";}
if(!$_SESSION['level'][3]){?><a href="puzzle_level_3.html">MAM WEB 400</a><br/><?php }else{echo "Puzzle 4 Solved!<br/>";}
if(!$_SESSION['level'][4]){?><a href="puzzle_level_4.html">MAM WEB 500</a><br/><?php }else{echo "Puzzle 5 Solved!<br/>";}
if($_SESSION['points']==1500){ ?>
<h1>Congratulations, you solved all the puzzles!</h1>
<?php }
?>
