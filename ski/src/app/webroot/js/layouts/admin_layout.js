$().ready(function() {
  $('#splitter').splitter({
    'type': 'horizontal',
    'panelsBefore': ['#admin-menu', '#admin-container'],
    'panelsAfter': ['#admin-messages']
  });
});