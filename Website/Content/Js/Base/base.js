$(document).ready(function(){
    var width = $(window).width() - 15.5;
    var height = $(window).height();
    
    var MainMenu = new Menu(width, height);
    var MainView = new View(MainMenu.caseWidth, MainMenu.caseHeight, $('#global'));
    
    MainMenu.createMenu(MainView);
    MainView.appendClearBoth();
});