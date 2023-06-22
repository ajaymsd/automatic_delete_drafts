<?php 

namespace AUDD\app;
class Route{
   function hook()
   {
      $deleteDraft = new \AUDD\app\Controllers\DeleteDraft();
      add_action('auto_delete_drafts_event',[$deleteDraft,'deleteDraftsAutomatically']);

      //Register activation hook registers a function (or) event when the plugin is activated
      register_activation_hook( AUDD_PLUGIN_FILE ,[$deleteDraft,'scheduleDeleteDrafts']);
      
      //Register deactivation hook removes a function (or) event when the plugin is deactivated
      register_deactivation_hook(AUDD_PLUGIN_FILE,'wp_clear_scheduled_hook');
   }

}

