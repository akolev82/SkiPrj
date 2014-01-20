(function() {
  $.widget("ui.acecombobox", {
    options : {
      'prefix' : 'Combo_',
      'css' : {
        'classBox' : 'combo-box',
        'classListBox' : 'combo-list-box',
        'classFilterText' : 'combo-filter-text',
        'classBtnShow' : 'combo-btn-show',
        'pagingBox': 'combo-paging'
      }
    },
    _currentIndex: -1,
    _lockFilterCounter: 0, //used to prevent change of filter text box to reload
    _isToResize: 0,
    _filter: '',
    _records: [],
    _create : function() {
      var lThat = this;
      this.element.hide();
      this.element.attr({
        'type' : 'hidden'
      });
      
      var lIsToLoad = false;
      if (typeof(this.options.source) == 'function') {
        this.source(this.options.source);  
        lIsToLoad = true;
      }
      
      if (typeof(this.options.loaded) == 'function') {
        this.loaded(this.options.loaded);  
      }
      
      this._srcObjectID = this.element.attr('id');
      this._boxID = this.options.prefix + 'Container_' + this._srcObjectID;
      this._filterBoxID = this.options.prefix + 'FilterInput' + this._srcObjectID;
      this._listBoxID = this.options.prefix + 'List_' + this._srcObjectID;
      this._btnShowListID = this.options.prefix + 'Btn_' + this._srcObjectID;

      this._boxObj = $('<span/>').addClass(this.options.css.classBox).attr({
        'id' : this._boxID
      }).css({
        'overflow' : 'hidden'
      }).insertBefore(this.element);

      this._listBoxObj = $('<div/>').addClass(this.options.css.classListBox).attr({
        'id' : this._listBoxID
      }).css({
        'position' : 'absolute',
        'left' : 0,
        'bottom' : 0,
        'display' : 'block',
        'z-index' : 60000
      }).hide().insertAfter(this._boxObj); //appendTo(this._boxObj);

      this._filterBoxObj = $('<input/>').addClass(this.options.css.classFilterText).attr({
        'id' : this._filterBoxID,
        'type' : 'text'
      }).bind("change paste keyup", function() {
        if (lThat.isLockedFilter()) return true;
        lThat.filter(this.value);
      }).appendTo(this._boxObj);

      this._btnShowList = $('<button/>').addClass(this.options.css.classBtnShow).attr({
        'id' : this._btnShowListID,
        'type' : 'button'
      }).text('D').click(function() {
        lThat.toggleList();
      }).appendTo(this._boxObj);
      
      this._tableContent = null;
      this._tablePaging = null;
      
      if (lIsToLoad) {
        this.load({
          'showList': false
        });
      }
    },
    lockFilter: function() {
      this._lockFilterCounter++;
      return this;
    },
    unlockFilter: function() {
      this._lockFilterCounter--;
      if (this._lockFilterCounter < 0) this._lockFilterCounter = 0;
      return this;
    },
    isLockedFilter: function() {
      return (this._lockFilterCounter > 0) ? true : false;
    },
    isVisibleList: function() {
      return this._listBoxObj.is(':visible');
    },
    _clearList: function() {
      this._listBoxObj.html("");
    },
    showList : function() {
      var lParent = this._filterBoxObj;
      var lCoord = {
        x : lParent.position().left,
        y : lParent.position().top,
        width : lParent.outerWidth(),
        height : lParent.outerHeight()
      };
      this._listBoxObj.css({
        'position' : 'absolute',
        'left' : lCoord.x + 'px',
        'top' : (lCoord.y + lCoord.height) + 'px',
      });
      this._listBoxObj.width(lCoord.width + 20);
      this._listBoxObj.height(300);
      this._listBoxObj.fadeIn("slow");
      if (this._isToResize === true) {
        this.resizeList();
        this._isToResize = false;
      }
      return this;
    },
    hideList : function() {
      this._listBoxObj.fadeOut("slow");
      return this;
    },
    toggleList : function() {
      if (this.isVisibleList()) {
        this.hideList();
      } else {
        this.showList();
      }
      return this;
    },
    _selectIndexAndValue: function(aIndex, aValue, aCaption) {
      this._currentIndex = aIndex;
      this.lockFilter(); 
      try {
        this.element.val(aValue);
      } finally {
        this.unlockFilter();
      }
      this._filterBoxObj.val(aCaption);
      if (!this.isLockedFilter()) {
        this.element.triggerHandler('changed', [ aValue ]);
      }
    },
    loadData: function(aOptions) {
      var lThat = this;
      
      this._records = [];
      
      var lType = '';
      if (aOptions.type) {
        lType = aOptions.type;
      }
      if (lType == 'all') {
        this._filter = '';
      } else if (lType == 'filter') {
        this._filter = aOptions.value;
      } else if (lType == 'current') {
        aOptions.value = this._filter
      }
      
      var lSourceOptions = lThat.element.triggerHandler('source', [ aOptions ]);
      var lIsShowList = true;
      if (typeof(aOptions.showList) != 'undefined') {
        lIsShowList = (aOptions.showList === true) ? true : false;
      }
      if (typeof(lSourceOptions) == 'undefined') return false;
      if (typeof (lSourceOptions) == 'array') {

      } else {
        var lIndexItem = 0;
        var mAddItem = function(aTable, aCaption, aValue) {
          lThat._records.push({
            'index': lIndexItem,
            'selected': false,
            'value': aValue,
            'caption': aCaption
          });
          var lObj = $('<li>').data('value', aValue).text(aCaption).click(function() {
            lThat._selectIndexAndValue(lIndexItem, aValue, aCaption);
            lThat.hideList();
          }).appendTo(aTable);
          lIndexItem++;
          return lObj;
        };
        $.ajax({
          type : "get",
          dataType : 'json',
          url : lSourceOptions.source.url,
          success : function(aDataJSON) {
            lThat._clearList();
            lThat._tableContent = $('<ul/>');
            lThat._tablePaging = $('<div/>').addClass(lThat.options.css.pagingBox);
            if (aDataJSON.messages) {
              var lMessagesStr = '';
              for (var index = 0; index < aDataJSON.messages.length; index++) {
                lMessagesStr += aDataJSON.messages[index] + "\n";
              }
              if (lMessagesStr > '') {
                alert(lMessagesStr);
              }
            }
            if (aDataJSON.data && aDataJSON.data[lSourceOptions.model]) {
              var lRoot = aDataJSON.data[lSourceOptions.model];
              if (typeof (lRoot.empty) == 'string' && lRoot.empty > '') {
                mAddItem(lThat._tableContent, '', lRoot.empty);
              }
              var lRecords = lRoot.records;
              var lPaging = lRoot.paging;
              for (var index = 0; index < lRecords.length; index++) {
                var lRecord = lRecords[index];
                var lValuesID = '';
                var lCaptions = '';
                for ( var lMember in lRecord.id) {
                  if (lValuesID > '')
                    lValuesID += ',';
                  lValuesID += lRecord.id[lMember];
                }
                for ( var lMember in lRecord.display) {
                  if (lCaptions > '')
                    lCaptions += ',';
                  lCaptions += lRecord.display[lMember];
                }
                mAddItem(lThat._tableContent, lCaptions, lValuesID);
              }
              
              /*'current' => count($results),
              'count' => $count,
              'prevPage' => ($page > 1),
              'nextPage' => ($count > ($page * $limit)),
              'pageCount' => $pageCount,
              'order' => $order,
              'limit' => $limit,*/
              
              $('<p/>').text('Page ' + lPaging.page + ' of ' + lPaging.pageCount + '.').appendTo(lThat._tablePaging);
              $('<p/>').text('There ' + lPaging.limit + ' items per page.').appendTo(lThat._tablePaging);
              
              if (lPaging.pageCount > 1) {
                var lGoToID = lThat.options.prefix + '_GoToPage' + lThat._srcObjectID;
                var lUrl = lPaging.url;
                $('<label/>').attr({
                  'for': lGoToID
                }).text('Go to page: ').appendTo(lThat._tablePaging);
                var lInputGoto = $('<input/>').attr({
                  'type': 'text',
                  'id': lGoToID
                }).css({
                  'padding': 0,
                  'margin': 0,
                  'width': '40px'
                }).val(lPaging.page).appendTo(lThat._tablePaging);
              
                $('<button/>').attr({
                  'type': 'button'
                }).css({
                  'padding': 0,
                  'margin': 0,
                }).text('Go!').click(function() {
                  lThat.load({
                    'type': 'current',
                    'page': lInputGoto.val(),
                    'limit': '20'
                  });
                }).appendTo(lThat._tablePaging);
              }
            }
            lThat._tableContent.appendTo(lThat._listBoxObj);
            lThat._tablePaging.appendTo(lThat._listBoxObj);
            
            if (lIsShowList) {
              lThat.showList();
              lThat.resizeList();
              lThat._isToResize = false;
            } else {
              lThat._isToResize = true;
            }
            //activating list
            lThat.element.triggerHandler('loaded');
          }
        });
        return true;
      }
      return this;
    },
    resizeList: function() {
      var lPagingHeight = 130;
      var lMinHeight = 200;
      var lHeight = this._listBoxObj.height()-lPagingHeight;
      if (this._tableContent) {
        this._tableContent.outerHeight((lHeight > lMinHeight) ? lHeight : lMinHeight);
      }
      if (this._tablePaging) {
        this._tablePaging.outerHeight(lPagingHeight);
      }
      return this;
    },
    filter: function(aText) {
      this.loadData({
        'type': 'filter',
        'value': aText
      });
      //lThat.element.triggerHandler('filter', [ this.value, true ]);
      return this;
    },
    load: function(aOptions) {
      var lOptions = $.extend({
        'type': 'all',
      }, aOptions);
      this.loadData(lOptions);
    },
    hiddenLoad: function(aOptions) {
      var lOptions = $.extend({
        'type': 'all',
        'showList': false
      }, aOptions);
      this.loadData(lOptions);
    },
    source: function(aCallback) {
      this.element.on('source', aCallback);
      return this;
    },
    loaded: function(aCallback) {
      this.element.on('loaded', aCallback);
      return this;
    },
    changed: function(aCallback) {
      this.element.on('changed', aCallback);
      return this;
    },
    getSelectedIndex: function() {
      return this._currentIndex;
    },
    getSelectedValue: function() {
      return this.element.val();
    },
    getSelectedCaption: function() {
      return this._filterBoxObj.val();
    },
    val: function(aChangeValue) {
      var lThat = this, lFound = false;
      $.each(this._records, function(aIndex, aCompValue) {
        if (aCompValue.value == aChangeValue) {
          lThat._selectIndexAndValue(aCompValue.index, aCompValue.value, aCompValue.caption);
          lFound = true;
          return false; //break;
        }
        return true; //continue;
      });
      return this;
    }
  });
}(jQuery));

Ace.Locations = function(aCountryName, aStateName, aCityName, aZipName, aInitialValues) {
  var mNames = {
    country : aCountryName,
    state : aStateName,
    city : aCityName,
    zip : aZipName
  };
  var mInitialValues = {
    'country': '',
    'state': '',
    'city': '',
    'zip': ''
  };
  if (aInitialValues.country) mInitialValues.country = aInitialValues.country;
  if (aInitialValues.state) mInitialValues.state = aInitialValues.state;
  if (aInitialValues.city) mInitialValues.city = aInitialValues.city;
  if (aInitialValues.zip) mInitialValues.zip = aInitialValues.zip;
  
  var mBuildAjaxUrl = function(aRootUrl, aValues, aPage, aLimit, aEmptyOnEmptyFilter) {
    var lUrl = '', lCurVal;
    var lIsAll = false;
    if (typeof (aValues) == 'string') {
      if (aValues.toLowerCase() != 'all') {
        lUrl = aWhatToFind + '/' + lCurVal;
      } else {
        lUrl = 'all/*';
        lIsAll = true;
      }
    } else {
      var lPassed = false;
      $.each(aValues, function(aKey, aValue) {
        aKey = aKey.toLowerCase();
        if (aKey == 'page') return;
        if (aKey == 'limit') return;
        if (aKey == 'beginswith' && aValue <= '') {
          if (!aEmptyOnEmptyFilter) return;
        }
        if (aValue <= '') return;
        if (lUrl != '') lUrl = lUrl + '/';
        lUrl = lUrl + aKey + '/' + aValue;
        lPassed = true;
      });
      if (!lPassed && !aEmptyOnEmptyFilter) {
        lUrl = 'all/*';
        lIsAll = true;
      }
    }
    if (!lIsAll && lUrl <= '') {
      lUrl = (aAllOnEmptyFilter == true) ? 'all/*' : 'empty/0';
    }
    var lFullPath = aRootUrl + lUrl + '/page:' + aPage + '/limit:' + aLimit;
    
    return {
      'url': lFullPath,
      'postData': null
    }
  };

  var lThat = this; // because of the scope of event handlers

  var mCountryObject = null;
  if (mNames.country > '') {
    $(mNames.country).acecombobox();
    mCountryObject = $(mNames.country).data('ui-acecombobox');
  }

  var mStateObject = null;
  if (mNames.state > '') {
    $(mNames.state).acecombobox();
    mStateObject = $(mNames.state).data('ui-acecombobox');
  }

  var mCityObject = null;
  if (mNames.city > '') {    
    $(mNames.city).acecombobox();
    mCityObject = $(mNames.city).data('ui-acecombobox');
  }
  
  var mZipObject = null;
  if (mNames.zip > '') {    
    $(mNames.zip).acecombobox();
    mZipObject = $(mNames.zip).data('ui-acecombobox');
  }
  
  var mSetSource = function(aEvent, aOptions, aController, aModel, aFilter, aEmptyOnEmptyFilter, aSpecificFunction) {
    var lValue = (aOptions.value) ? aOptions.value : '';
    var lPage = (aOptions.page) ? aOptions.page : 1;
    var lLimit = (aOptions.limit) ? aOptions.limit : 20;
    aFilter = aFilter || {};
    aFilter.beginswith = lValue;
    return {
      'source': mBuildAjaxUrl(AcePath + aController +'/find/', aFilter, lPage, lLimit, aEmptyOnEmptyFilter),
      'model': aModel
    }
  }
  
  var mProtectedChange = function(aValue, aWidgetObj) {
    aWidgetObj.lockFilter();
    try {
      aWidgetObj.val(aValue);  
    } finally {
      aWidgetObj.unlockFilter();
    }
  }
  
  //initialization
  if (mCountryObject != null) {
    mCountryObject.source(function(aEvent, aOptions) {
      return mSetSource(aEvent, aOptions, 'countries', 'country', {}, false, null);
    });
    var mChangedCountry = function() {
      if (mInitialValues.country > '') {
        mProtectedChange(mInitialValues.country, mCountryObject);
        mInitialValues.country = '';
        return;
      }
      if (mStateObject != null) mStateObject.hiddenLoad();
      if (mStateObject == null && mCityObject != null) mCityObject.hiddenLoad();
      if (mStateObject == null && mCityObject == null && mZipObject != null) mZipObject.hiddenLoad();
    };
    mCountryObject.loaded(mChangedCountry);
    mCountryObject.changed(mChangedCountry);
  }
  
  if (mStateObject != null) {
    mStateObject.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mCountryObject != null && mCountryObject.getSelectedValue() > '') {
        lFilter.country = mCountryObject.getSelectedValue();
      }
      return mSetSource(aEvent, aOptions, 'states', 'state', lFilter, false, null);
    });
    var mChangedState = function() {
      if (mInitialValues.state > '') {
        mProtectedChange(mInitialValues.state, mStateObject);
        mInitialValues.state = '';
        return;
      }
      if (mCityObject != null) mCityObject.hiddenLoad();
      if (mCityObject == null && mZipObject != null) mZipObject.hiddenLoad();
    };
    mStateObject.loaded(mChangedState);
    mStateObject.changed(mChangedState);
  }
  
  if (mCityObject != null) {
    mCityObject.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mCountryObject != null && mCountryObject.getSelectedValue() > '') {
        lFilter.country = mCountryObject.getSelectedValue();
      }
      if (mStateObject != null && mStateObject.getSelectedValue() > '') {
        lFilter.state = mStateObject.getSelectedValue();
      }
      return mSetSource(aEvent, aOptions, 'cities', 'city', lFilter, false, null);
    });
    var mChangedCity = function() {
      if (mInitialValues.city > '') {
        mProtectedChange(mInitialValues.city, mCityObject);
        mInitialValues.city = '';
        return;
      }
      if (mZipObject != null) mZipObject.hiddenLoad();
    };
    mCityObject.loaded(mChangedCity);
    mCityObject.changed(mChangedCity);
  }
  
  if (mZipObject != null) {
    mZipObject.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mCountryObject != null && mCountryObject.getSelectedValue() > '') {
        lFilter.country = mCountryObject.getSelectedValue();
      }
      if (mStateObject != null && mStateObject.getSelectedValue() > '') {
        lFilter.state = mStateObject.getSelectedValue();
      }
      if (mCityObject != null && mCityObject.getSelectedValue() > '') {
        lFilter.city = mCityObject.getSelectedValue();
      }
      return mSetSource(aEvent, aOptions, 'zips', 'zip', lFilter, false, null);
    });
    mZipObject.loaded(function() {
    });
    mZipObject.changed(function() {
      if (mInitialValues.city > '') {
        mProtectedChange(mInitialValues.city, mCityObject);
        mInitialValues.city = '';
        return;
      }
    });
  }
  
  //now loading data, and dependiing data
  if (mCountryObject != null) {
    mCountryObject.hiddenLoad(); //this cause chain reaction of loading states and cities
  } else if (mStateObject != null) {
    mStateObject.hiddenLoad();
  } else if (mCityObject != null) {
    mCityObject.hiddenLoad();
  } else if (mZipObject != null) {
    mZipObject.hiddenLoad();
  }

  return {
    changeCountry : function(aCountryID) {
      if (mCountryObject == null) return this;
      mCountryObject.val(aCountryID);
      return this;
    },
    changeState : function(aStateID) {
      if (mStateObject == null) return this;
      mStateObject.val(aStateID);
      return this;
    },
    changeCity : function(aCityID) {
      if (mCityObject == null) return this;
      mCityObject.val(aCityID);
      return this;
    },
    changeZip : function(aZipID) {
      if (mZipObject == null) return this;
      mZipObject.val(aZipID);
      return this;
    }
  }

};