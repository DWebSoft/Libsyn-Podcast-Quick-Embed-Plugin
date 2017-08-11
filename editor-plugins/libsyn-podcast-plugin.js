(function() {
    tinymce.create('tinymce.plugins.LibsynPodcast', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            //Add Button
            ed.addButton('podcast', {
                title : 'Add libsyn podcast player shortcode',
                cmd : 'podcast',
                image : url + '/podcast.png'
            });

            //Add Button Command
            ed.addCommand('podcast', function() {
                var number = prompt("Enter Podcast ID: "),
                    shortcode;
                if (number !== null) {
                    number = parseInt(number);
                    shortcode = '[libsyn_podcast id=' + number + ']';
                    ed.execCommand('mceInsertContent', 0, shortcode);
                }
            });
        },
 
        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },
 
        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Libsyn Podcast Button',
                author : 'Durgesh Tayade',
                authorurl : 'http://durgeshtayade.com',
                version : "1.0"
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add( 'libsyn_podcast', tinymce.plugins.LibsynPodcast );
})();