(function() {
    tinymce.create('tinymce.plugins.homes1', {
        init : function(ed, url) {
            ed.addButton('homes1', {
                title : 'Home Style 1',
                image : url+'/../img/home-style1.png',
                onclick : function() {
                     ed.selection.setContent('[space height="50"] [column1_3_wrap] [heading title_color="#fff" title="Very Flexible" caption="conse ctetur adipiscingel it" caption_color="#999"] [space height="11"] [frame_center width="296" height="120"]http://localhost/soulbop/wp-content/uploads/2011/04/4992651672_e1e667267f_b.jpg[/frame_center] [space height="3"] Lorem ipsum dolor sit amet, conse ctetur adipiscingel it. Mae cenas in ullamcorpepu. Quisque aliquet dui.conse ctetur adipiscingel it.conse ctetur adipiscingel it.[space height="0"]<span style="font-weight: bold;"><a href="#">Continue Reading &rarr;</a></span>[/column1_3_wrap] [column1_3_wrap] [heading  title_color="#fff" title="Great Design" caption="consectetur adipiscing elit" caption_color="#999"] [space height="11"] [frame_center width="296" height="120"]http://localhost/soulbop/wp-content/uploads/2011/04/4992651672_e1e667267f_b.jpg[/frame_center] [space height="3"] Lorem ipsum dolor sit amet, conse ctetur adipiscingel it. Mae cenas in ullamcorpepu. Quisque aliquet dui.conse ctetur adipiscingel it.conse ctetur adipiscingel it.[space height="0"] <span style="font-weight: bold;"><a href="#">Continue Reading &rarr;</a></span>[/column1_3_wrap] [column1_3_wrap_last] [heading  title_color="#fff" title="Easy to Use" caption="ipsum dolor sit amet aliquet" caption_color="#999"] [space height="11"] [frame_center width="296" height="120"]http://localhost/soulbop/wp-content/uploads/2011/04/4992651672_e1e667267f_b.jpg[/frame_center] [space height="3"] Lorem ipsum dolor sit amet, conse ctetur adipiscingel it. Mae cenas in ullamcorpepu. Quisque aliquet dui.conse ctetur adipiscingel it.conse ctetur adipiscingel it. [space height="0"]<span style="font-weight: bold;"><a href="#">Continue Reading &rarr;</a></span>[/column1_3_wrap_last] [space height="20"]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('homes1', tinymce.plugins.homes1);
	/*
	tinymce.create('tinymce.plugins.homes2', {
        init : function(ed, url) {
            ed.addButton('homes2', {
                title : 'Home Style 2',
                image : url+'/../img/home-style2.png',
                onclick : function() {
                     ed.selection.setContent('[quote2]' + ed.selection.getContent() + '[/quote2]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('homes2', tinymce.plugins.homes2);
	*/
	
	
})();
