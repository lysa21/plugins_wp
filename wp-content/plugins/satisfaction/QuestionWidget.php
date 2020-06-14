<?php
class QuestionWidget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct('idAfficheQuestion', 'Affiche Question', array('description', 'Un formulaire pour répondre'));
 
  }

  public function widget($args,$instance) {

    global $wpdb;

    $table =$wpdb->prefix.'reponse_question';
    $idUser = get_current_user_id();
    if(isset($_POST['oui'])){
      $wpdb->insert( $table, array('idUser'=>$idUser,'reponse'=>1));
    }
    if(isset($_POST['non'])){
      $wpdb->insert( $table, array('idUser'=>$idUser,'reponse'=>0));
    }

    echo '<form action="" method="post">
      <h1>'.$instance['question'].'</h1> 
       <input type="checkbox" name="oui" id="oui"/> Oui 
       <input type="checkbox" name="non" id="non"/> Non <br/>
      <input type="submit"/>
    </form>';
  }

  public function form($instance){
    $question = isset($instance['question'])?$instance['question']:'Aimez-vous ce site ?';
    $id = $this->get_field_id('question');
    $name = $this->get_field_name('question');
    echo "<p>Nom de la question <input type='text' id=$id name='".$name."' value='".$question."'></p>";
  }
}

