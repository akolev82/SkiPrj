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
      },
      'depends': {
        
      }
    },
    _currentIndex: -1,
    _lockFilterCounter: 0, // used to prevent change of filter text box to
                            // reload
    _isToResize: 0,
    _filter: '',
    _records: [],
    _firstDependentAlways: true,
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
      }).hide().insertAfter(this._boxObj); // appendTo(this._boxObj);

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
    _selectIndexAndValue: function(aIndex, aValue, aCaption, aDepends) {
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
        if (aDepends) {
          this.element.triggerHandler('depended', [ aDepends, this._firstDependentAlways ]);
          this._firstDependentAlways = false;
        }
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
      } else if (lType == 'oneitem') {
        this._filter = '';
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
        var mAddItem = function(aTable, aCaption, aValue, aDepends) {
          lThat._records.push({
            'index': lIndexItem,
            'selected': false,
            'value': aValue,
            'caption': aCaption,
            'depends': aDepends
          });
          var lObj = $('<li>').data('value', aValue).text(aCaption).click(function() {
            lThat._selectIndexAndValue(lIndexItem, aValue, aCaption, aDepends);
            lThat.hideList();
          }).appendTo(aTable);
          lIndexItem++;
          return lObj;
        };
        $.ajax({
          type : "post",
          dataType : 'json',
          url : lSourceOptions.source.url,
          data : {
            'depends': this.options.depends
          },
          success : function(aDataJSON) {
            lThat._clearList();
            lThat._tableContent = $('<ul/>');
            lThat._tablePaging = $('<div/>').addClass(lThat.options.css.pagingBox);
            if (aDataJSON.messages) {
              var lMessagesStr = '';
              for (var index = 0; index < aDataJSON.messages.length; index++) {
                var lMessageItem = aDataJSON.messages[index];
                lMessagesStr += lMessageItem.message + "\n";
              }
              if (lMessagesStr > '') {
                alert(lMessagesStr);
              }
            }
            if (aDataJSON.data && aDataJSON.data[lSourceOptions.model]) {
              var lRoot = aDataJSON.data[lSourceOptions.model];
              if (typeof (lRoot.empty) == 'string' && lRoot.empty > '') {
                mAddItem(lThat._tableContent, '', lRoot.empty, null);
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
                mAddItem(lThat._tableContent, lCaptions, lValuesID, (lRecord.depends) ? lRecord.depends : null);
              }
              
              /*
               * 'current' => count($results), 'count' => $count, 'prevPage' =>
               * ($page > 1), 'nextPage' => ($count > ($page * $limit)),
               * 'pageCount' => $pageCount, 'order' => $order, 'limit' =>
               * $limit,
               */
              
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
            // activating list
            lThat.element.triggerHandler('loaded');
          }
        });
        return true;
      }City
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
      // lThat.element.triggerHandler('filter', [ this.value, true ]);
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
    depended: function(aCallback) {
      this.element.on('depended', aCallback);
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
          lThat._selectIndexAndValue(aCompValue.index, aCompValue.value, aCompValue.caption, aCompValue.depends);
          lFound = true;
          return false; // break;
        }
        return true; // continue;
      });
      if (!lFound || this.options.depends) {
        var lElementName = lThat.element.prop('name'); 
        var lSourceOptions = lThat.element.triggerHandler('source', [ {
          'type': 'oneitem',
          'one_item_value': aChangeValue,
        } ]);
        $.ajax({
          type : "post",
          dataType : 'json',
          data : {
            'depends': this.options.depends
          },
          url : lSourceOptions.source.url,
          success : function(aDataJSON) {
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
              var lRecords = lRoot.records;
              for (var index = 0; index < lRecords.length; index++) {
                var lRecord = lRecords[index];
                var lValuesID = '';
                var lCaptions = '';
                for (var lMember in lRecord.id) {
                  if (lValuesID > '')
                    lValuesID += ',';
                  lValuesID += lRecord.id[lMember];
                }
                for (var lMember in lRecord.display) {
                  if (lCaptions > '')
                    lCaptions += ',';
                  lCaptions += lRecord.display[lMember];
                }
                lThat._selectIndexAndValue(-1, lValuesID, lCaptions, lRecord.depends);
              }
            }
          }
        });
      }
      return this;
    }
  });
}(jQuery));

Ace.Ajax = {}

Ace.Ajax.Url = function(aRootUrl, aParameters) {
  var mRootUrl = aRootUrl;
  var mAllowedParams = aParameters || {};
  
  var mConcatNamedUrl = function(aContent, aNew) {
    var lLen = aContent.length;
    if (lLen > 0) {
      if (aContent.charAt(lLen-1) == '/') aContent = aContent + '/';
    }
    aContent = aContent + aNew;
  }
  
  return {
    toControllerUrl: function(aController, aAction) {
      var lUrl = mRootUrl;
      if (aController > '') {
        lUrl = mConcatNamedUrl(lUrl, aController); 
      }
      if (aController > '') {
        lUrl = mConcatNamedUrl(lUrl, aController); 
      }
      return lUrl;
    },
    toFilterUrl: function(aOptions) {
      var lType = (aOptions['type']) ? aOptions['type'] : 'grid';
      var lController = (aOptions['controller']) ? aOptions['controller'] : '';
      var lAction = (aOptions['action']) ? aOptions['action'] : '';
      lType = lType.toLowerCase();      
      var lControllerUrl = this.toControllerUrl(lController, lAction);
      
      if (lType == 'oneitem') {
        return {
          'url': mConcatNamedUrl(lControllerUrl, aOptions.one_item_value),
          'postData': null
        }
      }
      var lUrl = '', lCurVal;
      var lIsAll = false;
      
      var lValues = aOptions['values'] || null;
      var lReturnSingleRecord = false;
      var lEmptyOnEmptyFilter = aOptions['empty_on_empty_filter'] || false;
  
      var lPassed = false;
      if (lValues) {
        $.each(lValues, function(aKey, aValue) {
          aKey = aKey.toLowerCase();
          if (aKey == 'page') return true;
          if (aKey == 'limit') return true;
          if (aKey == 'record') return true;
          if (aKey == 'beginswith' && aValue <= '') {
            if (!lEmptyOnEmptyFilter) return false;
          }
          if (aValue <= '') return true;
          if (lUrl != '') lUrl = lUrl + '/';
          lUrl = lUrl + aKey + '/' + aValue;
          lPassed = true;
        });  
      }
      if (!lPassed && !lEmptyOnEmptyFilter) {
        lUrl = 'all/*';
        lIsAll = !lReturnSingleRecord;
      }
        
      if (!lIsAll && lUrl <= '') {
        lUrl = (lEmptyOnEmptyFilter === true) ? 'empty/0' : 'all/*';
      }
      var lFullPath = lControllerUrl;
      lFullPath = mConcatNamedUrl(lFullPath, lUrl);
      if (aOptions['page']) {
        lFullPath = mConcatNamedUrl(lFullPath, 'page:' + aOptions['page']);
      }
      if (aOptions['limit']) {
        lFullPath = mConcatNamedUrl(lFullPath, 'limit:' + aOptions['limit']);
      }
     
      return {
        'url': lFullPath,
        'postData': null
      };
    }
  }
};

Ace.Locations = function(aFields) {
  var mFields = aFields;
  
  var mNames = {
    'country': '',
    'state': '',
    'city': '',
    'zip': '',
    'school': '',
  };
  var mInitialValues = {
    'country': '',
    'state': '',
    'city': '',
    'zip': '',
    'school': ''
  };
  
  if (mFields.country) {
    mNames.country = mFields.country.id;
    mInitialValues.country = mFields.country.value;
  }
  if (mFields.state) {
    mNames.state = mFields.state.id;
    mInitialValues.state = mFields.state.value;
  }
  if (mFields.city) {
    mNames.city = mFields.city.id;
    mInitialValues.city = mFields.city.value;
  }
  if (mFields.zip) {
    mNames.zip = mFields.zip.id;
    mInitialValues.zip = mFields.zip.value;
  }
  if (mFields.school) {
    mNames.school = mFields.school.id;
    mInitialValues.school = mFields.school.value;
  }
  
  var mBuildAjaxUrl = function(aRootUrl, aType, aValues, aPage, aLimit, aEmptyOnEmptyFilter, aOptions) {
    if (aType == 'oneitem') {
      return {
        'url': aRootUrl + aOptions.one_item_value,
        'postData': null
      }
    }
    var lUrl = '', lCurVal;
    var lIsAll = false;
    aType = aType.toLowerCase();
    aValues = aValues || {};
    var lReturnSingleRecord = false;
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
        if (aKey == 'page') return true;
        if (aKey == 'limit') return true;
        if (aKey == 'record') return true;
        if (aKey == 'beginswith' && aValue <= '') {
          if (!aEmptyOnEmptyFilter) return false;
        }
        if (aValue <= '') return true;
        if (lUrl != '') lUrl = lUrl + '/';
        lUrl = lUrl + aKey + '/' + aValue;
        lPassed = true;
      });
      if (!lPassed && !aEmptyOnEmptyFilter) {
        lUrl = 'all/*';
        lIsAll = !lReturnSingleRecord;
      }
    }
    if (!lIsAll && lUrl <= '') {
      lUrl = (aEmptyOnEmptyFilter === true) ? 'empty/0' : 'all/*';
    }
    var lFullPath = aRootUrl + lUrl + '/page:' + aPage + '/limit:' + aLimit;
   
    return {
      'url': lFullPath,
      'postData': null
    }
  };

  var lThat = this; // because of the scope of event handlers

  var mObjectLoad = function(aName) {
    if (mFields[aName]) {
      var lRef = mFields[aName];
      if (lRef.id > '') {
        $(lRef.id).acecombobox({
          'depends' : (lRef.depends) ? lRef.depends : ''
        });
        return $(lRef.id).data('ui-acecombobox');
      }
    }
    return null;
  }
  
  var mDefDependent = function(aSender) {
    aSender.depended(function(aEvent, aDepends, aIsFirstUpdate) {
      $.each(aDepends, function(aKey, aValue) {
        if (mObjects[aKey]) {
          var lObj = mObjects[aKey];
          if (aIsFirstUpdate || lObj.getSelectedValue() != aValue) {
            lObj.val(aValue);
          }
        }
      });
    });
  }
  
  var mObjects = {
      'country': mObjectLoad('country'),
      'state': mObjectLoad('state'),
      'city': mObjectLoad('city'),
      'zip': mObjectLoad('zip'),
      'school': mObjectLoad('school')
  }
  
  var mSetSource = function(aEvent, aOptions, aController, aModel, aFilter, aEmptyOnEmptyFilter, aSpecificFunction) {
    var lValue = (aOptions.value) ? aOptions.value : '';
    var lPage = (aOptions.page) ? aOptions.page : 1;
    var lLimit = (aOptions.limit) ? aOptions.limit : 20;
    var lType = (aOptions.type) ? aOptions.type.toLowerCase() : '';
    var lAction = (lType == 'oneitem') ? 'oneitem' : 'find';
    aFilter = aFilter || {};
    aFilter.beginswith = lValue;
    return {
      'source': mBuildAjaxUrl(AcePath + aController +'/' + lAction + '/', lType, aFilter, lPage, lLimit, aEmptyOnEmptyFilter, aOptions),
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
  
  // initialization
  if (mObjects.country != null) {
    mObjects.country.source(function(aEvent, aOptions) {
      return mSetSource(aEvent, aOptions, 'countries', 'country', {}, false, null);
    });
    var mChangedCountry = function() {
      if (mInitialValues.country > '') {
        mProtectedChange(mInitialValues.country, mObjects.country);
        mInitialValues.country = '';
      }
      if (mObjects.state != null) mObjects.state.hiddenLoad();
      if (mObjects.state == null && mObjects.city != null) mObjects.city.hiddenLoad();
      if (mObjects.state == null && mObjects.city == null && mObjects.zip != null) mObjects.zip.hiddenLoad();
    };
    mObjects.country.loaded(mChangedCountry);
    mObjects.country.changed(mChangedCountry);
    mDefDependent(mObjects.country);
  }
  
  if (mObjects.state != null) {
    mObjects.state.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mObjects.country != null && mObjects.country.getSelectedValue() > '') {
        lFilter.country = mObjects.country.getSelectedValue();
      }
      return mSetSource(aEvent, aOptions, 'states', 'state', lFilter, false, null);
    });
    var mChangedState = function() {
      if (mInitialValues.state > '') {
        mProtectedChange(mInitialValues.state, mObjects.state);
        mInitialValues.state = '';
      }
      if (mObjects.city != null) mObjects.city.hiddenLoad();
      if (mObjects.city == null && mObjects.zip != null) mObjects.zip.hiddenLoad();
    };
    mObjects.state.loaded(mChangedState);
    mObjects.state.changed(mChangedState);
    mDefDependent(mObjects.state);
  }
  
  if (mObjects.city != null) {
    mObjects.city.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mObjects.country != null && mObjects.country.getSelectedValue() > '') {
        lFilter.country = mObjects.country.getSelectedValue();
      }
      if (mObjects.state != null && mObjects.state.getSelectedValue() > '') {
        lFilter.state = mObjects.state.getSelectedValue();
      }
      return mSetSource(aEvent, aOptions, 'cities', 'city', lFilter, false, null);
    });
    var mChangedCity = function() {
      if (mInitialValues.city > '') {
        mProtectedChange(mInitialValues.city, mObjects.city);
        mInitialValues.city = '';
      }
      if (mObjects.zip != null) mObjects.zip.hiddenLoad();
    };
    mObjects.city.loaded(mChangedCity);
    mObjects.city.changed(mChangedCity);
    mDefDependent(mObjects.city);
  }
  
  if (mObjects.zip != null) {
    mObjects.zip.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mObjects.country != null && mObjects.country.getSelectedValue() > '') {
        lFilter.country = mObjects.country.getSelectedValue();
      }
      if (mObjects.state != null && mObjects.state.getSelectedValue() > '') {
        lFilter.state = mObjects.state.getSelectedValue();
      }
      if (mObjects.city != null && mObjects.city.getSelectedValue() > '') {
        lFilter.city = mObjects.city.getSelectedValue();
      }
      return mSetSource(aEvent, aOptions, 'zips', 'zip', lFilter, false, null);
    });
    var mChangedZip = function() {
      if (mInitialValues.zip > '') {
        mProtectedChange(mInitialValues.zip, mObjects.zip);
        mInitialValues.zip = '';
      }
      if (mObjects.school != null) mObjects.school.hiddenLoad();
    };
    mObjects.zip.loaded(mChangedZip);
    mObjects.zip.changed(mChangedZip);
    mDefDependent(mObjects.zip);
  }
  
  if (mObjects.school != null) {
    mObjects.school.source(function(aEvent, aOptions) {
      var lFilter = {};
      if (mObjects.country != null && mObjects.country.getSelectedValue() > '') {
        lFilter.country = mObjects.country.getSelectedValue();
      }
      if (mObjects.state != null && mObjects.state.getSelectedValue() > '') {
        lFilter.state = mObjects.state.getSelectedValue();
      }
      if (mObjects.city != null && mObjects.city.getSelectedValue() > '') {
        lFilter.city = mObjects.city.getSelectedValue();
      }
      if (mObjects.zip != null && mObjects.zip.getSelectedValue() > '') {
    	lFilter.zip = mObjects.zip.getSelectedValue();
	  }
      return mSetSource(aEvent, aOptions, 'schools', 'school', lFilter, false, null);
    });
    mObjects.school.loaded(function() {
    });
    mObjects.school.changed(function() {
      if (mInitialValues.school > '') {
        mProtectedChange(mInitialValues.school, mObjects.school);
        mInitialValues.school = '';
      }
    });
    mDefDependent(mObjects.school);
  }
  
  // now loading data, and dependiing data
  if (mObjects.country != null) {
    mObjects.country.hiddenLoad(); // this cause chain reaction of loading
                                    // states and cities
  } else if (mObjects.state != null) {
    mObjects.state.hiddenLoad();
  } else if (mObjects.city != null) {
    mObjects.city.hiddenLoad();
  } else if (mObjects.zip != null) {
    mObjects.zip.hiddenLoad();
  } else if (mObjects.school != null) {
    mObjects.school.hiddenLoad();
  }

  return {
    changeCountry : function(aCountryID) {
      if (mObjects.country == null) return this;
      mObjects.country.val(aCountryID);
      return this;
    },
    changeState : function(aStateID) {
      if (mObjects.state == null) return this;
      mObjects.state.val(aStateID);
      return this;
    },
    changeCity : function(aCityID) {
      if (mObjects.city == null) return this;
      mObjects.city.val(aCityID);
      return this;
    },
    changeZip : function(aZipID) {
      if (mObjects.zip == null) return this;
      mObjects.zip.val(aZipID);
      return this;
    },
    changeSchool: function(aSchoolID) {
      if (mObjects.school == null) return this;
      mObjects.school.val(aSchoolID);
      return this;
    } 
  }

};

Ace.Combo = {
    
}

Ace.Combo.AutoComplete = function(aFieldOptions) {
  var mID = (aFieldOptions.id) ? aFieldOptions.id : '';
  var mName = (aFieldOptions.name) ? aFieldOptions.name : '';
  
  var mUrlBuilder = new Ace.Ajax.Url(AcePath);
  var mController = (aFieldOptions.controller) ? (aFieldOptions.controller) : '';
  var mModel = (aFieldOptions.model) ? (aFieldOptions.model) : '';
  var mDepends = (aFieldOptions.depends) ? aFieldOptions.depends : null;
  
  var mComboOptions = {
      'depends': mDepends
  }
  var mCombo = $(mID).acecombobox(mComboOptions);
  var mInitialValue = (aFieldOptions.value) ? aFieldOptions.value : null;
  if (mInitialValue <= '') mInitialValue = null;
    
  var lThat = this; // because of the scope of event handlers
  
  mCombo.source(function(aEvent, aOptions) {
    var lParams = {
        'controller': mController,
        'model': mModel,
        'value': (aOptions.value) ? aOptions.value : '',
        'page': (aOptions.page) ? aOptions.page : 1,
        'limit': (aOptions.limit) ? aOptions.limit : 20,
        'type': (aOptions.type) ? aOptions.type.toLowerCase() : ''
    }
    lParams['action'] = (lParams.type == 'oneitem') ? 'oneitem' : 'find';
    
    return {
      'source': mUrlBuilder.toFilterUrl(lParams),
      'model': mModel
    }
  });
  var mChandedInitialValue = function() {
    if (mInitialValue != null) {
      mCombo.lockFilter();
      try {
        mCombo.val(mInitialValue);  
      } finally {
        mCombo.unlockFilter();
      }
      mInitialValue = null;
      return true;
    }
    return false;
  };
  mCombo.loaded(function() {
    if (mChandedInitialValue()) {
      
    }
    mCombo.element.trigger('loaded', [this]);
  });
  mCombo.changed(function() {
    if (mChandedInitialValue()) {
      
    }
    mCombo.element.trigger('changed', [this]);
  });
  
  mCombo.depended(function(aEvent, aDepends, aIsFirstUpdate) {
    $.each(aDepends, function(aKey, aValue) {
      if (aIsFirstUpdate || mCombo.getSelectedValue() != aValue) {
        mCombo.val(aValue);
      }
    });
  });
  
  return {
    val: function() {
      if (args.length <= 0) {
        return mCombo.getSelectedValue();
      }
      mCombo.val(args[0]);
      return null;
    },
    changed: function(aCallback) {
      mCombo.changed(aCallback);
    },
    loaded: function(aCallback) {
      mCombo.changed(aCallback)
    }
  }
}