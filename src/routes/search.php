<?php
$r = function() { render('search_form'); render('search_result'); };
render_page(['search_form', 'search_result'], ['title' => 'The Car Catalog']);
