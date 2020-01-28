jQuery(window).on('elementor:init', function () {
  "use strict";
  
  var ControlBaseDataView = elementor.modules.controls.BaseData;
  var ControlFormPickerItemView = ControlBaseDataView.extend({
    interval : null,

    ui: function ui() {
      var ui = ControlBaseDataView.prototype.ui.apply(this, arguments);
      ui.inputs = '[type="text"]';
      return ui;
    },

    events: function events() {
      return _.extend(ControlBaseDataView.prototype.events.apply(this, arguments), {
        'change @ui.inputs': 'onBaseInputChange'
      });
    },

    onBaseInputChange: function onBaseInputChange(event) {
      clearTimeout(this.correctionTimeout);
  
      var input = event.currentTarget,
          value = this.getInputValue(input);
 
          //console.log(event.currentTarget);
          //console.log(value);

      this.updateElementModel(value, input);
  
      //this.triggerMethod('input:change', event);
    },

    onDestroy: function onRender() {
      // console.log('boo');
      clearInterval(window.metFormPickerInterval2555);
    },

    onRender: function onRender() {
      ControlBaseDataView.prototype.onRender.apply(this, arguments);
      var self = this;

      window.metFormPickerInterval2555 = setInterval(function(){
        
        var formpicker_load = jQuery('body').attr('data-metform-template-load'),
        formpicker_key = jQuery('body').attr('data-metform-template-key');

        // console.log(self.isRendered);
        
        if(formpicker_load == 'true' && self.isRendered == true && formpicker_key !== undefined){
          // console.log([formpicker_key, formpicker_load, self.isRendered, self.isDestroyed]);
          var time = new Date().getTime(),
          new_val,
          formpicker_key_spilt = formpicker_key.split('***');

          formpicker_key_spilt = formpicker_key_spilt[0];
          new_val = formpicker_key_spilt + '***' + time;
          // console.log(new_val);
          
          jQuery('body').attr('data-metform-template-load', 'false');
          self.setValue(new_val);
        }
      }, 200);
    }
  },{
    
  });
  elementor.addControlView('formpicker', ControlFormPickerItemView);
});
