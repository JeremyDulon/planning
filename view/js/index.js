function testScroll(evt) {
	var banner= $("#test").height();
	if(window.pageYOffset>banner) $("#navbar").css({
      position : "fixed",
      top: "0",
	  width:"100%"
    });
	if(window.pageYOffset<banner) $("#navbar").css("position","inherit");
}

window.onscroll=testScroll;