<?php
/**
 * @package sa
 * @version 1.7.2
 */
/*
Plugin Name: Satisfaction
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Version: 1.7.2
Author URI: http://ma.tt/
*/

// function bonjour(){ 
//     echo '<p> Bonjour !!</p>'; 
//  } 
//  add_action( 'init', 'bonjour');

require_once('QuestionWidget.php');

 class Satisfaction
 {
   public function __construct()
   {
    add_action('widgets_init',array($this,'declarerWidget'));
    add_action('admin_menu',array($this,'declareAdmin'));
   }

   public static function install(){
    Satisfaction::install_db();
   }
   public static function uninstall(){
    Satisfaction::uninstall_db();
   }

   public static function desactivate(){}
   public function install_db(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."reponse_question (id int(11) AUTO_INCREMENT PRIMARY KEY, reponse tinyint(1), idUser int(11));");
  }

  public function uninstall_db(){
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."reponse_question;"); 
  }

   function declarerWidget() {
        register_widget('QuestionWidget');
   }

   public function declareAdmin(){
        add_menu_page('Configuration du questionnaire', 'Questionnaire', 'manage_options', 'question', array($this, 'menuHtml'));
        add_submenu_page('question','Réinitialisation du questionnaire','Réinitialisation','manage_options','reinit',array($this,'menuHtmlInit'));
    }

    public  function menuHtml(){
        echo '<h1>'.get_admin_page_title().'</h1>';
        echo '<p>Page du plugin Questionnaire !!! </p>';
        echo $this->resume();
    }

    public static function menuHtmlInit(){
        global $wpdb;
        echo '<h1>Réinitialisation</h1>';
        echo '<p>Cliquer sur le bouton suivant pour réinitialiser le questionnaire</p>';
        echo "<form method='POST' action='#'>
        <input type='submit' name='reinit'>
        </form>
        ";
        if(isset($_POST['reinit'])){
            $query = 'TRUNCATE TABLE '.$wpdb->prefix.'reponse_question';
            $wpdb->query($query);
            echo "réinitialisation !!!"; 
        }
    }

    public function resume(){
        global $wpdb;
        $query = "SELECT * FROM ".$wpdb->prefix."reponse_question";
        $resultats = $wpdb->get_results($query) ;
        $oui = 0;
        $non = 0;
        foreach($resultats as $rep){
          if($rep->reponse==1)
            $oui++;
          else
            $non++;
          }
        return "Oui : $oui, Non : $non";
    }
}
  
 new Satisfaction();

register_activation_hook(__FILE__,array('Satisfaction','install'));
register_activation_hook(__FILE__,array('Satisfaction','install')); 
register_deactivation_hook(__FILE__,array('Satisfaction','desactivate'));
register_uninstall_hook(__FILE__,array('Satisfaction','uninstall'));
