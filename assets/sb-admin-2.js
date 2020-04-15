$(function() {

    var url = window.location;

    var element = $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    var element = $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu") .addClass('active');


});
