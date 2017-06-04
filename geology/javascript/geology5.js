d3.csv("camhd/scene7_list.csv", function(error, data) {
  if (error) throw error;
  imageList = data;
  $("#image-slider")
    .slider({
      min: 0,
      max: data.length-1,
      slide: function(event, ui) {
        sliderUpdate(ui.value);
      },
      value: 0
    });
  sliderUpdate($("#image-slider").slider("option","value"));
});

sliderAdd = function(){
  var slider = $("#image-slider"),
      val = slider.slider("option","value");
  if (val != slider.slider("option","max")){
    slider.slider("value", +val + 1 );
  }
  sliderUpdate(val)
}

sliderSubtract = function(){
  var slider = $("#image-slider"),
      val = slider.slider("option","value");
  if (val != slider.slider("option","min")){
    slider.slider("value", +val - 1 );
  }
  sliderUpdate(val)
}

sliderUpdate = function(val){
  dir = $("#slider-image").data('directory');
  $("#slider-image").attr("src", "camhd/"+dir+"/" + imageList[val].filename);
}

