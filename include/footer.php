<div class="container_12"style='height:100px;'>
    
    
        <!--/ footer col 1 -->
<div class="f_col_1">
    <div id="categories-3" class="widget-container widget_categories">
        
    </div>
</div>
      
        <!--/ footer col 2 -->
<div class="f_col_2">
    <div id="categories-3" class="widget-container widget_categories">
        
    </div>
</div>    
              
        <!--/ footer col 3 -->
 <div class="f_col_4">
    <div id="categories-3" class="widget-container widget_categories">
        <h3 class="widget-title"><a href='admin/index.php'>Administration</a></h3>
    </div>
</div>       
        
        <!--/ footer col 4 -->
        
        <div class="clear"></div>
    	        
    </div>
<script type="text/javascript" src="admin/js/plugins/jGrowl/jquery.jgrowl.js"></script>
<link rel='stylesheet' type='text/css' href='admin/css/plugins/jquery.jgrowl.css'>
 <?php
                    if(isset($_SESSION['client_id'])){
                        $client_id = $_SESSION['client_id'];
                        $reponse = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_read = 0");
                        $reponse = $reponse->fetchAll();
                        $total = $reponse[0]['total'];

                ?>
  <script type="text/javascript">
  jQuery(document).ready(function($){
        var id= "<?php echo $client_id; ?>"; 
        var total = "<?php echo $total; ?>";

    function refreshmessage(){
 

        $.get('admin/php/script.getNewMessage.php',{id:id},function(result){
            if(result.total > total){
                total = result.total;
                if(total == 1)
                    var text = "You get a New Message";
                else
                    var text = "You get "+total+" News Messages";
                $.jGrowl(text, {
                    header: 'Messages',
                    sticky: true,
                    theme: 'warning'
                });
                $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
            }else{

            }
            
        });
        setTimeout(refreshmessage, 5000);
    }

    function refreshCallendar(){
        var id= "<?php echo $client_id; ?>";

        $.get('admin/php/script.getNewCallendar.php',{id:id},function(result){
            if(result.id != ""){
                    var text = "You get a New Visite on your Calendar </br><a href='calendar.php'>Click here</a>";
               
                $.jGrowl(text, {
                    header: 'Calendar',
                    sticky: true,
                    theme: 'warning'
                });
                $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
            }else{

            }
            
        });
        setTimeout(refreshCallendar, 5000);
    }
    refreshmessage();
    refreshCallendar();

  });

  </script>

  <?php  

}

?>