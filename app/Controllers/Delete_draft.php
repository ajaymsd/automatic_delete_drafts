<?php
 
 namespace AUDD\app\Controllers;

 class Delete_draft 
 {
    function delete_Drafts_Automatically()
    {
        //Setting Up the options to get posts
        $args=array(
            'post_type'=>'post',
            'post_status'=>['draft','trash'],
            'posts_per_page'=>-1
        );
        //get_posts() function will get all the posts according to the args
        $draft_posts=get_posts($args);
        
      
        //Deleting Each of the Posts which is stored inside $draft_posts
        //True=>Force Delete
        //False=>Move to trash
        foreach($draft_posts as $dp){
            wp_delete_post($dp->ID,true);
        }
    }
    function schedule_Delete_Drafts(){
        if ( ! wp_next_scheduled( 'auto_delete_drafts_event' ) ) {
            wp_schedule_event(strtotime(get_gmt_from_date(date('Y-m-d 10:00:00'))), 'daily','auto_delete_drafts_event');
        }
    }
 }