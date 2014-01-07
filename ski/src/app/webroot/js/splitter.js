(function($){
  $.fn.splitter = function(args){
    args = args || {};
    
    var mSettings = $.extend({
      'panelsBefore': [],
      'panelsBefore': []
    }, args);
    
    function toArray(aName) {
      if (args[aName]) {
        var lArray = args[aName];
        if (lArray)
        var lNewArray = [];
        for(var index = 0; index < lArray.length; index++) {
          lNewArray.push(lArray[index]);
        }
        return lNewArray;
      }
      return [];
    }
    
    var mPanelsBefore = toArray('panelsBefore');
    var mPanelsAfter = toArray('panelsAfter');
    var mType = args['type'] || 'horizontal';
    var mEvtPosX = 'pageX';
    var mEvtPosY = 'pageY';
    var mHolder = $(this);
    mHolder.css({
      'z-index': '9999',
    });
    var mCaptured = false;
    
    return this.each(function() {
      
      function toNullCoord() {
        return {
          x: 0,
          y: 0
        };
      }
      
      var mCoord = toNullCoord(); 
      var mStartCoord = toNullCoord();
      
      function getPos(aEvt) {
        return {
          x: aEvt[mEvtPosX],
          y: aEvt[mEvtPosY]
        }
      };
      
      function getBounds(aItem) {
        var lBounds = {
          'left': aItem.offset().left,
          'top': aItem.offset().top,
          'width': aItem.width(),
          'height': aItem.height()
        };
        lBounds.right = lBounds.left + lBounds.width;
        lBounds.bottom = lBounds.top + lBounds.height;
        return lBounds;
      }
      
      function propagateChanges(aCoord) {
        if (mType == 'vertical') {
          
        } else if (mType == 'horizontal') {
          for(var index=0; index < mPanelsBefore.length; index++) {
            var lItem = $(mPanelsBefore[index]);
            var lBounds = getBounds(lItem);
            
            var lNewHeight = aCoord.y - lBounds.top;
            lItem.css({
              'position': 'fixed',
              'top': lBounds.top + 'px',
              'bottom': 'none',
              'height': lNewHeight + 'px'
            });
          }
          for(var index=0; index < mPanelsAfter.length; index++) {
            $(mPanelsAfter[index]).css({
              'top': (aCoord.y + 3) + 'px',
              'bottom': '0',
              'height': 'auto'
            });
          }
        }
      }
      
      function movePos(aEvt) {
        if (!mCaptured) return;
        mCoord = getPos(aEvt);
        if (mType == 'vertical') {
          mHolder.css("left", mCoord.x + "px");
        } else if (mType == 'horizontal') {
          mHolder.css('top', mCoord.y + 'px');
          //$('#admin-title').text('Move #3 x=' + mCoord.x + '; y=' + mCoord.y);
        }
        propagateChanges(mCoord);
      };
      
      function doMouseDown(aEvt) {
        mCaptured = false;
        var lPressed = getPos(aEvt);
        var lBounds = getBounds(mHolder);  
        if (lPressed.x < lBounds.left || lPressed.y < lBounds.top || lPressed.x > lBounds.right || lPressed.y > lBounds.bottom) return; 
        
        mCaptured = true;
        mStartCoord = lPressed;
      };
      
      function doMouseMove(aEvt) {
        movePos(aEvt);
        aEvt.stopPropagation();
      };
      
      function doMouseUp(aEvt) {
        mCaptured = false;
        mStartCoord = toNullCoord();
      };
      
      $(document).bind('mousedown', doMouseDown);
      $(document).bind('mousemove', doMouseMove);
      $(document).bind('mouseup', doMouseUp);
      
      /* $(window).bind("resize", function(){ //start propagation
        splitter.trigger("resize"); 
      });*/
    });
  }
})(jQuery);