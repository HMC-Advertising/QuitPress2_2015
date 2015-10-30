(function() {
   tinymce.create('tinymce.plugins.pageintro', {
      init : function(ed, url) {
         ed.addButton('pageintro', {
            title : 'Page Intro',
            image : url + '/pageintrobutton.png',

            onclick : function() {
               ed.execCommand('mceInsertContent', false, '[page_intro][/page_intro]');
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Page Intro",
            author : 'Propeller Media Works',
            authorurl : 'http://www.propellermediaworks.com',
            infourl : 'http://www.propellermediaworks.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('pageintro', tinymce.plugins.pageintro);
})();