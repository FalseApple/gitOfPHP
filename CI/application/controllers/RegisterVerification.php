<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class RegisterVerification extends CI_Controller {
	public function Verification($pId) {
		
		$this->load->model ( "Login_check", "Logc", True );
		
		echo "$pId<br/>";
		switch ($this->Logc->getUserOfInfoCheck ( 'user', $pId )) {
			
			case 1 :
				echo '<p><font color=black  style="font-size: 12pt">已有人申請過 請重新輸入!!</font></p>';
				echo "<br/>";
				echo '<input onclick="window.close();" value="確定" type="button">';
				break;
			default :
				echo '<p>可申請!!</p>';
				echo "<br/>";
				echo '<input onclick="window.close();" value="確定" type="button">';
				break;
		}
	}
}
