<?php
namespace projet8;

class time{

	 function relativetime($comment_date){
	 
	 	                $sub = time() - $comment_date;



                if($sub < 3600){// 1 min ago
                   if($sub < 60){
                    return 'maintenant';
                   }elseif($sub < 120){
                    return 'il y a 1 minute';
                   }else{
                    return 'il y a ' . round($sub/60) . ' minutes';
                   }
                }elseif($sub < 82800){//23 hours
                    if($sub < 7200){
                        return 'il y a 1 heure';
                    }else{
                        return 'il y a ' . round($sub/3600) . ' heures';
                    }
                }elseif($sub < 518400){ // 6 days
                    if($sub < 172800){ //2 days
                        return 'il y a 1 jour';
                    }else{
                        return 'il y a ' . round($sub/86400) . ' jours';
                    }
                }elseif($sub < 2592000){ // 1 month
                    if($sub < 1123200){ // 13 days
                        return 'il y a 1 semaine';
                    }
                    else{
                        return 'il y a ' . round($sub/604800) . ' semaines';
                    }
                }elseif($sub < 28886400){ // 48 week ~ 1 year
                    if($sub < 3628800){ // 6 week
                        return 'il y a 1 mois';
                    }else{
                        return 'il y a ' . round($sub/2563200) . ' mois';
                    }

                }else{
                    if($sub < 47174400){//1.5 year
                        return 'il y a 1 an';
                    }else{
                        return 'il y a ' . round($sub/31449600) . ' ans';
                    }
                }
            }


}