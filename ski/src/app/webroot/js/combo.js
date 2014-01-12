Ace.Locations = function(aCountryName, aStateName, aCityName, aZipName) {
    var mNames = {
      country: aCountryName,
      state: aStateName,
      city: aCityName,
      zip: aZipName
    };
    
    var mLoad = function(aValues, aRootUrl, aWhatToFind, aDstID, aDefaultDstVal, aCallBack) {
      var lUrl = '', lCurVal; 
      var lIsAll = false;
      if (typeof(aValues) == 'string') {
        if (aValues.toLowerCase() != 'all') {
          lUrl = aWhatToFind + '/' + lCurVal;
        } else {
          lUrl = 'all/*';
          lIsAll = true;
        }
      } else {
        for(var index = 0; index < aValues.length; index++) {
          lCurVal = aValues[index];
          if (lCurVal <= '') return;
          if (lUrl != '') lUrl = lUrl + '/';
          lUrl = lUrl + aWhatToFind + '/' + lCurVal;
        }
      }
      if (!lIsAll && lUrl <= '') {
        lUrl = 'empty/0';
      }
      
      var lFullPath = aRootUrl + lUrl;
      //$(aDstID).load(lFullPath);
      
      $.ajax({ 
        type: "get", 
        url: lFullPath, 
        success: function(response){ 
          $(aDstID).html(response); 
          if (typeof(aDefaultDstVal) != 'undefined' && aDefaultDstVal != null) {
            $(aDstID).val(aDefaultDstVal);
          }
          if (typeof(aDefaultDstVal) != 'undefined' && aCallBack != null) {
            aCallBack();
          }
        }
      });  
    }
    
    var mLoadFromSrc = function(aSrcID, aRootUrl, aWhatToFind, aDstID, aDefaultDstVal, aCallBack) {
      var lCurVal = '';
      var lArray = []; 
      $(aSrcID + ' option:selected').each(function() {
        lCurVal = $(this).val();
        if (lCurVal <= '') return;
        lArray.push(lCurVal);
      });
      mLoad(lArray, aRootUrl, aWhatToFind, aDstID, aDefaultDstVal, aCallBack);
    };
    
    var mLoadAll = function(aSrcID, aPrefix, aFindStates, aFindCities, aFindZips, aDefaultStateID, aDefaultCityID, aDefaultZipID) {
      var lLoadZips = function() {
        if (aFindZips === true && mNames.zips > '') {
          mLoadFromSrc(aSrcID, AcePath + 'zips/find/', aPrefix, mNames.zips, aDefaultZipID);
        }
      };
      var lLoadCities = function() {
        if (aFindCities === true && mNames.cities > '') {
          mLoadFromSrc(aSrcID, AcePath + 'cities/find/', aPrefix, mNames.state, aDefaultCityID, lLoadZips);
        }
      };
      var lLoadStates = function() {
        if (aFindStates === true && mNames.state > '') {
          mLoadFromSrc(aSrcID, AcePath + 'states/find/', aPrefix, mNames.state, aDefaultStateID, lLoadCities());
        }
      };
      if (aFindStates === true && mNames.state > '') {
        lLoadStates();
      } else if (aFindCities === true && mNames.cities > '') {
        lLoadCities();
      } else if (aFindZips === true && mNames.zips > '') {
        lLoadZips();
      }
    };
      
    var lThat = this; //because of the scope of event handlers
    
    var mReloadCountries = null;
    if (mNames.country > '') {
      mReloadCountries = function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        mLoadAll(mNames.country, 'country', true, true, true, aDefaultStateID, aDefaultCityID, aDefaultZipID);
      };
      $(mNames.country).change(mReloadCountries);  
    }
    
    var mReloadStates = null;
    if (mNames.state > '') {
      mReloadStates = function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        mLoadAll(mNames.state, 'state', false, true, true, aDefaultStateID, aDefaultCityID, aDefaultZipID);
      }
      $(mNames.state).change(mReloadStates);  
    }
    
    var mReloadCities = null;
    if (mNames.cities > '') {
      mReloadCities = function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        mLoadAll(mNames.cities, 'cities', false, false, true, aDefaultStateID, aDefaultCityID, aDefaultZipID);
      };
      $(mNames.cities).change(mReloadCities);  
    };
    
    return {
      changeCountry: function(aCountryID) {
        $(mNames.country).val(aCountryID);
      },
      changeState: function(aCountryID, aStateID) {
        this.reloadCountries(aStateID);
      },
      changeCity: function(aCountryID, aCityID) {
        this.reloadStates(aCountryID, aCityID);
      },
      changeZip: function(aCountryID, aCityID, aZipID) {
        this.reloadCities(aCountryID, aCityID, aZipID);
      },
      loadCountryList: function(aDefualtCountryID, aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        var lThat = this;
        mLoad('all', AcePath + 'countries/find/', 'country', $(mNames.country), aDefualtCountryID, function() {
          lThat.reloadCountries(aDefaultStateID, aDefaultCityID, aDefaultZipID);  
        });
      },
      reloadCountries: function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        if (mReloadCountries == null) return;
        mReloadCountries(aDefaultStateID, aDefaultCityID, aDefaultZipID);
      },
      reloadStates: function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        if (mReloadStates == null) return;
        mReloadStates(aDefaultStateID, aDefaultCityID, aDefaultZipID);
      },
      reloadCities: function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        if (mReloadCities == null) return;
        mReloadCities(aDefaultStateID, aDefaultCityID, aDefaultZipID);
      },
      reloadZips: function(aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        
      },
      reloadAll: function(aDefualtCountryID, aDefaultStateID, aDefaultCityID, aDefaultZipID) {
        this.loadCountryList(aDefualtCountryID, aDefaultStateID, aDefaultCityID, aDefaultZipID);
      }
    }
    
};