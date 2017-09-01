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
                <form action="textarea.html" method="post"> 
					<div>  
						<label for="text">Anmerkung</label>
							<textarea id="text" name="text" cols="35" rows="15"></textarea> 	
						<input type="submit" value="Senden" />
					</div> 
				</form> 
				
				
			
				
			</div>
			
			
		</div>
	</header>
</body>
<?php
include("templates/footer.inc.php");
?>
</html>