<?php

// Frontend
//View::composer('frontend/_layout/menu', 'Sefa\Composers\MenuComposer');
View::composer('frontend.layout.template', 'Composers\FrontEnd\MenuComposer');
View::composer('frontend.include.profile', 'Composers\FrontEnd\RightMenuComposer');

// Backend
View::composer('backend.layout.navbar', 'Composers\BackEnd\MenuComposer');