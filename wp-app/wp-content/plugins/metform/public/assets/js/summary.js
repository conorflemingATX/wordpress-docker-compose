jQuery(document).ready(function($) {
    'use strict'

    $.fn.extend({
        mfSerializeArray: function () {
            var brokenSerialization = $.fn.serializeArray.apply(this);
            var checkboxValues = $(this).find('input[type=checkbox], input[type=radio]').map(function () {
                return { 'name': this.name, 'value': this.checked };
            }).get();
            var checkboxKeys = $.map(brokenSerialization, function (element) { return element.name; });
            var onlyCheckboxes = $.grep(checkboxValues, function (element) {
                return $.inArray(element.name, checkboxKeys) == -1;
            });

            return $.merge(brokenSerialization, onlyCheckboxes);
        }
    });

    function metFormData(){
        var forms = $('.metform-form-content');
        if(forms.length > 0){
            forms.each(function(i, v){
                var form = $(this),
                    elSummary = form.find('.mf-input.mf-input-summary.metform-entry-data'),
                    elTbody = elSummary.find('tbody');

                    var rawFormData = form.mfSerializeArray();
                    rawFormData.shift();

                    $.each(rawFormData, function(index, value){
                        elTbody.append('<tr class="mf-data-label"><td colspan="2"><strong>'+value.name+'</strong></td></tr>');
                        elTbody.append('<tr class="mf-data-value"><td class="mf-value-space">&nbsp;</td><td class="value-'+value.name+'">'+value.value+'</td></tr>');
                    });
                    
                form.on('change keyup paste', 'input, select, textarea', delay( function (e){
                    var rawFormData = form.mfSerializeArray();
                    rawFormData.shift();

                    $.each(rawFormData, function(index, value){
                        let elCurrent = elTbody.find(".value-"+value.name);
                        elCurrent.html(value.value);
                    });

                }, 200));
            });
        }
    }


    function delay(callback, ms) {
        var timer = 0;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    metFormData();
    
});