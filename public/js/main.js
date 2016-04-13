var CruiseLineModel = Backbone.Model.extend({
    defaults: { 
        "cruise_line_id": 0,
        "cruise_line_name":"",
        "cruise_ship_name":"" 
    },
    idAttribute: "cruise_line_id"
});

var CruiseLinesCollection = Backbone.Collection.extend({
    model: CruiseLineModel
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

var SailingsCollection = Backbone.Collection.extend({
    model: SailingModel
});



var SailingOptionModel = Backbone.Model.extend({
    defaults: {
          "sailing_option_sailing_id": 0,
          "sailing_price":"",
          "sailing_date":""
      },
      idAttribute: "id"
});

var SailingOptionsCollection = Backbone.Collection.extend({
  model: SailingOptionModel,
  getSmallestPrice: function(){
    var smallestPrice = 0;
    this.each(function(m){
      var price = m.get('sailing_price');
      if( !smallestPrice || price < smallestPrice ){
        smallestPrice = price;
      }
    });
    return smallestPrice;
  }
});






var SailingTotalSum = Backbone.Model.extend({
  initialize: function(){
    _.bindAll( this, 'updateSum' );
  },
  defaults: {
    sum: 0
  },
  sailing_prices: {},
  updateSum: function( sailingOption ){
    
    var sailing_id = sailingOption.get('sailing_option_sailing_id');
    var sailing_price = sailingOption.get('sailing_price');
    
    this.sailing_prices[sailing_id] = sailing_price;
    
    var sum = 0;
    for(var id in this.sailing_prices){
      sum += this.sailing_prices[id];
    }
    this.set({sum: sum });
    
    return sum;
    
  }
});


//

var sailingTotalSum = new SailingTotalSum();
sailingTotalSum.on('change:sum', function(m){
  document.getElementById('total_price').innerHTML = m.get('sum');
});



var SailingOptionView = Backbone.View.extend({
  template: Handlebars.compile( $('#sailingOptionTpl').html() ),
  events: {
    'change': 'onSelectMe'
  },
  render: function(){
    
    var tplvars = this.model.toJSON();
    
    this.$el.html( this.template( tplvars )  );
    
    return this;
  },
  onSelectMe: function(e){
    sailingTotalSum.updateSum( this.model );
    
  }
});


var SailingOptionsView = Backbone.View.extend({
  render: function(){
    this.collection.each(this.addOne, this);
    return this;
  },
  addOne: function(m){
    var v = new SailingOptionView({
      model: m
    });
    v.render().$el.appendTo( this.el );
  }
});





var SailingView = Backbone.View.extend({
  tagName: 'li',
  className: 'cruise-section',
  template: Handlebars.compile( $('#sailingTpl').html() ),
  initialize: function(o){
    //console.log('[SailingView init]', this, 'Options:',o);
    this.cruise = o.cruise;
    this.sailingOptions = o.sailingOptions;
    
  },
  render: function(){
    
    var tplvars = _.extend(this.model.toJSON(), this.cruise.toJSON());
    
    tplvars.sailingOptions = this.sailingOptions.toJSON();
    
    tplvars.smallestPrice = this.sailingOptions.getSmallestPrice();
    
    //console.log('tplvars', tplvars);
    
    this.$el.html( this.template( tplvars )  );
    
    
//     var sailingOptionView = new SailingOptionView();
    
    var sailingOptionsView = new SailingOptionsView({
      collection: this.sailingOptions
    });
    sailingOptionsView.render();
    
    this.$('footer').append( sailingOptionsView.el );
    
    return this;
  }
});



var SailingsView = Backbone.View.extend({
  initialize: function(o){
    _.bindAll(this, 'addOne');
    
    //console.log('options data', o.data);
    
    
    this.cruises = new CruiseLinesCollection(  o.data.cruise_lines );
    
    this.sailings = new SailingsCollection( o.data.sailings );
    
    this.sailingOptions = new SailingOptionsCollection( o.data.sailing_options );
    //console.log('this.sailingOptions',o.data.sailing_options,  this.sailingOptions.toJSON() );
    
    
  },
  render: function(){
    this.sailings.each(this.addOne);
  },
  
  addOne: function(sailing){
      
    //console.log('[addOne]', sailing.toJSON(), this.cruises.toJSON() );
    
    var sailingView = new SailingView({
      model: sailing,
      
      cruise: this.cruises.findWhere({ cruise_line_id: sailing.get('sailing_cruise_line_id') }),
      
      sailingOptions: new SailingOptionsCollection( this.sailingOptions.where({
        sailing_option_sailing_id: sailing.get('sailing_id')
      }) )
      
    });
    sailingView.render().$el.appendTo( this.el );

  }
});


$.getJSON("/data/data.json", function(data){
  //console.log('data:', data);
  
  
  var sailingsView = new SailingsView({
    el: '.salingsWrap',
    data: data
  });
  sailingsView.render();


});




