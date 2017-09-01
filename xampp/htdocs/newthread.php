<?php 
session_start();
require_once("register/inc/config.inc.php");
require_once("register/inc/functions.inc.php");
include("templates/header.inc.php");
$user = check_user();
?>
<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <header>
        <div class="header-content" style="max-width:100%;">
            <div class="header-content-inner">
                <form action="newthread_script.php" method="post" id="newthread">
                    First name:<br />
					<input type="text" name="firstname" value="Mickey"><br />
					Last name:<br />
					<input type="text" name="lastname" value="Mouse"><br /><br />
					Dein Beitrag:<br />
					
					<input type="submit" value="Submit">
                   
				</form>
				
				
				<textarea name="comment" form="newthread">Enter text here...</textarea>
				
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php")
?>
</html>