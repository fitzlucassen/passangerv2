$(document).ready(function(){
    var width = $(window).width() - 17;
    var height = $(window).height();
    
    var MainMenu = new Menu(width, height);
    var MainView = new View(MainMenu.caseWidth, MainMenu.caseHeight, $('#global'));
    
    MainMenu.getMenu(MainView);
    MainView.appendClearBoth();
});