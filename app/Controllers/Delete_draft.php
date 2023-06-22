<?php
 
 namespace AUDD\app\Controllers;

 class DeleteDraft 
 {
    function deleteDraftsAutomatically()
    {
        
        $args=array(
            'post_type' => 'post',                  //Setting Up the options to get posts
            'post_status' => ['draft','trash'],
            'posts_per_page' => -1
        );
        $draftPosts=get_posts($args);      //get_posts() function will get all the posts according to the args
        foreach($draftPosts as $dp){       //Deleting Each of the Posts which is stored inside $draft_posts
            wp_delete_post($dp->ID,true);  //True=>Force Delete , False=>Move to trash
        }
    }
    function scheduleDeleteDrafts(){
        if ( ! wp_next_scheduled( 'auto_delete_drafts_event' ) ) {
            wp_schedule_event(strtotime(get_gmt_from_date(date('Y-m-d 10:00:00'))), 'daily','auto_delete_drafts_event');
        }
    }
 }