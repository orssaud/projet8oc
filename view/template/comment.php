
  <?php


        foreach ($commentsById as $comment){

        ?> 
        <div   <?php echo('id="'.$comment->id.'"');

                   
                        if($comment->reply !== null){
                           
                            echo('class=" reply"');
                        }
                    
                ?> >
<hr class="hrComments">    
            

            <p><strong class="<?php 
             if($comment->by_author == 1){ 
                echo('red');
             }
                ?>"><?= $comment->author; ?>&nbsp;&nbsp;&nbsp;</strong><span class="grey"><?= $time->relativeTime($comment->comment_date); ?></span></p>
            <p><?=$comment->comment; ?></p>









             <?php
                if (isset($_SESSION['id']) && isset($_SESSION['account'])){ // logged
               // var_dump($post);
              ?> 







            <div class="row">
                <div class="col-md-1">
                   

                     <?php 

                     if($comment->reply === null){
                        require('replyForm.php');  
                     }
                     

                     ?>  


                </div>
                <div class="col-md-1   offset-md-10">
                <form class="col align-self-center" action="index.php?action=deleteCommentPost&amp;id=<?= $comment->id ?>&amp;postId=<?= $post->id; ?>#comments" method="post">
                    <button  type="submit" class="btn btn-danger" title="Supprimer ce message"><i class="fas fa-trash-alt"></i></button>
                </form>
             
                </div>

            </div>
        
            <?php      
                }else{ // not logged
            ?>

                  
        <div class="row" >



      <?php if($comment->reply === null){ ?>
                <div class="col-auto ">
                    <?php require('replyForm.php'); ?>
                </div>
     <?php  }   

            if($comment->by_author == 0){ ?>
                                <div class="col-auto">
                                    <form  action="index.php?action=reported&amp;id=<?= $post->id; ?>#<?= $comment->id ?>" method="post">
                                        <div>
                                            <input type="hidden" id="idComment" name="idComment" value="<?= $comment->id ?>">
                                        </div>
                                        
                                            <button  id="report_<?= $comment->id ?>" class="btn reportButton " title="Signaler ce commentaire !" type="submit"><i class="fas fa-exclamation-triangle"></i></button>
                                      
                                    </form>
                                </div>
     
     <?php                
            }  ?>
           
  


        </div>

    <?php  }  // end not logged ?>

       
         <?php 
         if(isset($_GET['comId']) && $_GET['comId'] === $comment->id){
            require('addComment.php'); 
         }
        

         ?>


        </div>
        
                <?php
              
              if(isset($comment->children)){
                //var_dump(array_reverse ($comment->children));
                //$memory = $commentsById;
                $commentsById = array_reverse($comment->children);
                ///foreach($comment->children as $commentsById){
                    //var_dump($commentsById);
                    require('comment.php');
               // $commentsById = $memory;
               // }
              }

              ?>
        <?php
        }
        ?>