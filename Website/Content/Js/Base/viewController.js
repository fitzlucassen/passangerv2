function View(width, height, container) {
    this.width = Math.round(width);
    this.height = Math.round(height);
    this.container = container;
}

View.prototype.createEmptyCase = function(){
    var html = '<div class="emptyCase" style="width:' + this.width + 'px;height:' + this.height + 'px;"></div>';
    
    this.container.append(html);
};

View.prototype.createCase = function(wording){
    var html = '';
    if(wording === 'PassAnger')
	html += '<div class="emptyCase caseFull" style="width:' + this.width + 'px;height:' + this.height + 'px;"><h1 style="padding-top:' + ((this.height / 2) - 15) + 'px;">' + wording + '</h1></div>';
    else
	html += '<div class="emptyCase caseFull" style="width:' + this.width + 'px;height:' + this.height + 'px;"><h2 style="padding-top:' + ((this.height / 2) - 15) + 'px;">' + wording + '</h2></div>';
    
    this.container.append(html);
};

View.prototype.appendClearBoth = function(){
    this.container.append('<div class="cl"></div>');
};