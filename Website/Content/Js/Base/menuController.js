function Menu(width, height) {
    this.menu = {
	home: [4,1],
	bio: [2,1],
	news: [6,1],
	media: [3,2],
	audio: [5,2],
	contact: [4,3]	
    };
    this.nbCase = 28;
    this.nbCaseH = 7;
    this.nbCaseV = 4;
    this.caseWidth = width / this.nbCaseH;
    this.caseHeight = height / this.nbCaseV;
}

Menu.prototype.createMenu = function(MainView){
    i = 1;
    j = 1;
    for(var cpt = 0; cpt < this.nbCase; cpt++){
	if(this.menu.home[0] === i && this.menu.home[1] === j){
	    MainView.createCase('PassAnger');
	}
	else if(this.menu.bio[0] === i && this.menu.bio[1] === j){
	    MainView.createCase('Bio');
	}
	else if(this.menu.news[0] === i && this.menu.news[1] === j){
	    MainView.createCase('Actualité');
	}
	else if(this.menu.media[0] === i && this.menu.media[1] === j){
	    MainView.createCase('Media');
	}
	else if(this.menu.audio[0] === i && this.menu.audio[1] === j){
	    MainView.createCase('Son');
	}
	else if(this.menu.contact[0] === i && this.menu.contact[1] === j){
	    MainView.createCase('Contactez-nous');
	}
	else
	    MainView.createEmptyCase();
	
	i++;
	if(i === (this.nbCaseH+1)){
	    i = 1;
	    j++;
	}
    }
};