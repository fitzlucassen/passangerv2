function View(width, height) {
    this.width = Math.round(width);
    this.height = Math.round(height);
}

View.prototype.appendClearBoth = function(){
    this.container.append('<div class="cl"></div>');
};