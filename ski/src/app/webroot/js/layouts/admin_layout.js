$().ready(function() {
  $('#splitter').splitter({
    'type': 'horizontal',
    'panelsBefore': ['.left-sidebar', /*'#admin-menu'*/, '#admin-container'],
    'panelsAfter': ['#admin-messages']
  });
});