var CruiseLineModel = Backbone.Model.extend({
    defaults: { 
        "cruise_line_id": 0,
        "cruise_line_name":"",
        "cruise_ship_name":"" 
    },
    idAttribute: "cruise_line_id"
});

var SailingModel = Backbone.Model.extend({
    defaults: {
          "sailing_id": 0,
          "sailing_name":"",
          "sailing_cruise_line_id":"",
          "sailing_main_image":""
      },
      idAttribute: "sailing_id"
});

var SailingOptionModel = Backbone.Model.extend({
    defaults: {
          "sailing_option_sailing_id": 0,
          "sailing_price":"",
          "sailing_date":""
      },
      idAttribute: "sailing_option_sailing_id"
});

var cruiseLine = new CruiseLineModel();
var sailing = new SailingModel();
var sailingOption = new SailingOptionModel();

var CruiseLinesCollection = Backbone.Collection.extend({
    model: CruiseLineModel,
    url: "/data/data.json",
    parse: function(response) {
        return response.cruise_lines;
    }
});

var SailingsCollection = Backbone.Collection.extend({
    model: SailingModel,
    url: "/data/data.json",
    parse: function(response) {
        return response.sailings;
    }
});

var SailingOptionsCollection = Backbone.Collection.extend({
    model: SailingOptionModel,
    url: "/data/data.json",
     parse: function(response) {
        return response.sailing_options;
    }
});

var cruiseLines = new CruiseLinesCollection();
var sailings = new SailingsCollection();
var sailingOptions = new SailingOptionsCollection();

cruiseLines.fetch(); 
sailings.fetch();
sailingOptions.fetch();

console.log(cruiseLines.toJSON());  
console.log(sailings.toJSON());
console.log(sailingOptions.toJSON());
