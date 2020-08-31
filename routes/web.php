<?php

// Visualização dos veículos
Route::get('/agendamento', 'AgendamentoController@index' );

// Agendar
Route::get('/agendamento/agendar', 'AgendamentoController@create' );