(function($){
    "use strict";
    var G5PlusWidgetApp = {
        initialize: function() {
            G5PlusWidgetApp.widget_select2_process();
        },
        widget_select2: function(event, widget) {
            if (typeof (widget) == "undefined") {
                $('#widgets-right select.widget-select2:not(.select2-ready)').each(function(){
                    G5PlusWidgetApp.widget_select2_item(this);
                });
            }
            else {
                $('select.widget-select2:not(.select2-ready)', widget).each(function(){
                    G5PlusWidgetApp.widget_select2_item(this);
                });
            }
        },
        widget_select2_item: function(target){
            $(target).addClass('select2-ready');

            var data_value = $(target).attr('data-value');

            var choices = [];

            if (data_value != '') {
                var arr_data_value = data_value.split('||');

                for (var i = 0; i < arr_data_value.length; i++) {
                    var option = $('option[value='+ arr_data_value[i]  + ']', target);
                    choices[i] = { 'id':arr_data_value[i], 'text':option.text()};
                }

            }
            $(target).select2().select2('data', choices);
            $(target).on("select2-selecting", function(e) {
                var ids = $('input',$(this).parent()).val();
                if (ids != "") {
                    ids +="||";
                }
                ids += e.val;
                $('input',$(this).parent()).val(ids);
            }).on("select2-removed", function(e) {
                var ids = $('input',$(this).parent()).val();
                var arr_ids = ids.split("||");
                var newIds = "";
                for(var i = 0 ; i < arr_ids.length; i++) {
                    if (arr_ids[i] != e.val){
                        if (newIds != "") {
                            newIds +="||";
                        }
                        newIds += arr_ids[i];
                    }
                }
                $('input',$(this).parent()).val(newIds);
            });
        },
        widget_select2_process: function() {
            $(document).on('widget-added', G5PlusWidgetApp.widget_select2);
            $(document).on('widget-updated', G5PlusWidgetApp.widget_select2);
            G5PlusWidgetApp.widget_select2();
        },
    };
    $(document).ready(function(){
        G5PlusWidgetApp.initialize();
    });
})(jQuery);