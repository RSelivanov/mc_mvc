$(function() {
	var mainMenuBox = $(".main-menu > ul");
	if(mainMenuBox.length > 0) {
		var dropdowns = mainMenuBox.children("li.dropdown");
		dropdowns.children("a[href='#']").click(function(e) {
			e.preventDefault();
		});
		dropdowns.mouseenter(function(e) {
			var $this = $(this);
			var hideTimeoutId = $this.data('hideTimeout');
                        console.log(hideTimeoutId);
			if(hideTimeoutId) {
				clearTimeout(hideTimeoutId);
				$this.data('hideTimeout', false);
			}
			var dropdown = $this.children(".dropdown_menu");
			dropdown.show();
			if(!dropdown.hasClass('visible')) {
				setTimeout(function() {
					dropdown.addClass('visible');
				}, 1);
			}
		});
		dropdowns.mouseleave(function(e) {
			var $this = $(this);
			var dropdown = $this.children(".dropdown_menu");
			dropdown.removeClass('visible');
			var id = setTimeout(function() {
				dropdown.hide();
			}, 300);
			$this.data('hideTimeout', id);
		});
	}
        var secondMenuBox = $(".second-menu > ul");
        if(secondMenuBox.length > 0) {
		var dropdowns = secondMenuBox.children("li.dropdown");
		dropdowns.children("a[href='#']").click(function(e) {
			e.preventDefault();
		});
		dropdowns.mouseenter(function(e) {
			var $this = $(this);
			var hideTimeoutId = $this.data('hideTimeout');
                        console.log(hideTimeoutId);
			if(hideTimeoutId) {
				clearTimeout(hideTimeoutId);
				$this.data('hideTimeout', false);
			}
			var dropdown = $this.children(".dropdown_menu");
			dropdown.show();
			if(!dropdown.hasClass('visible')) {
				setTimeout(function() {
					dropdown.addClass('visible');
				}, 1);
			}
		});
		dropdowns.mouseleave(function(e) {
			var $this = $(this);
			var dropdown = $this.children(".dropdown_menu");
			dropdown.removeClass('visible');
			var id = setTimeout(function() {
				dropdown.hide();
			}, 300);
			$this.data('hideTimeout', id);
		});
	}
	$("#dle-content a[onclick^='return dropdownmenu(this, event, MenuNewsBuild']").attr("title", "Редактировать").addClass("news_edit_control").addClass("tip");
});