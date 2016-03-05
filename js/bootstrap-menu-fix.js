jQuery(document).ready(function(){
	jQuery('nav .menu-item-has-children').each(function(){
		jQuery(this).addClass('dropdown');
		jQuery(this).find('ul').attr('class', 'dropdown-menu');
	});
	jQuery("nav .menu-item-has-children a").each(function(){
		jQuery(this).attr('data-toggle', 'dropdown');
		jQuery(this).attr('aria-expanded', 'false');
		jQuery(this).addClass('dropdown-toggle');
	});
	jQuery("nav .menu-item-has-children .dropdown-menu a").each(function(){
		jQuery(this).removeAttr('data-toggle');
		jQuery(this).removeAttr('aria-expanded');
		jQuery(this).removeClass('dropdown-toggle');
	});
});