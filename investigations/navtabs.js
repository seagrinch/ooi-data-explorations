// Script to add Bootstrap Tabs to Browser History
// Written by Sage 8/12/19
// Adapted from https://www.redotheweb.com/2012/05/17/enable-back-button-handling-with-twitter-bootstrap-tabs-plugin.html

$(document).ready(function() {
  // add a hash to the URL when the user clicks on a tab
  $('a[data-toggle="tab"]').on('click', function(e) {
    history.pushState(null, null, $(this).attr('href'));
  });
  if (location.hash=='') {
    $('#llbnav li:eq(0) a').tab('show');
  }
  // navigate to a tab when the history changes
  window.addEventListener("popstate", function(e) {
    if (location.hash.length>0) {
      var activeTab = $('[href=' + location.hash + ']');
      if (activeTab.length) {
        activeTab.tab('show');
      } else {
        $('#llbnav li:eq(0) a').tab('show');
      }      
    } else {
        $('#llbnav li:eq(0) a').tab('show');      
    }
  });
});
