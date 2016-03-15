<?php
	return [
	    'nextActive'   => '<li><a href="{{url}}">{{text}}</a></li>',  // The active state for a link generated by next().
		'nextDisabled' => '<li class="dissabled"><a href="{{url}}">{{text}}</a></li>',  // The disabled state for next().
		'prevActive'   => '<li><a href="{{url}}">{{text}}</a></li>',  // The active state for a link generated by prev().
		'prevDisabled' => '<li class="dissabled"><a href="{{url}}">{{text}}</a></li>',  // The disabled state for prev()
		'counterRange' => '<a href="{{url}}">{{text}}</a>',  // The template counter() uses when format == range.
		'counterPages' => '<a href="{{url}}">{{text}}</a>',  // The template counter() uses when format == pages.
		'first'        => '<li><a href="{{url}}">{{text}}</a></li>',  // The template used for a link generated by first().
		'last'         => '<li><a href="{{url}}">{{text}}</a></li>',  // The template used for a link generated by last()
		'number'       => '<li><a href="{{url}}">{{text}}</a></li>',  // The template used for a link generated by numbers().
		'current'      => '<li class="active"><a href="{{url}}">{{text}}</a></li>',  // The template used for the current page.
		'ellipsis'     => '<li class="dissabled"><a href="{{url}}">...</a></li>',  // The template used for ellipses generated by numbers().
		'sort'         => '<a href="{{url}}">{{text}}</a>',  // The template for a sort link with no direction.
		'sortAsc'      => '<a href="{{url}}">{{text}}</a>',  // The template for a sort link with an ascending direction.
		'sortDesc'     => '<a href="{{url}}">{{text}}</a>'   // The template for a sort link with a descending direction.
	];
?>