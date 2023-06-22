<?php 

namespace AUDD\app;
class Route{
   function hook()
   {

      $delete = new \AUDD\app\Controllers\Delete_draft();
      // die(print_r($delete));
      add_action('auto_delete_drafts_event',[$delete,'delete_Drafts_Automatically']);

      //Register activation hook registers a function (or) event when the plugin is activated
      register_activation_hook( AUDD_PLUGIN_FILE ,[$delete,'schedule_Delete_Drafts']);
      
      //Register deactivation hook removes a function (or) event when the plugin is deactivated
      register_deactivation_hook(AUDD_PLUGIN_FILE,'wp_clear_scheduled_hook');
   }

}
