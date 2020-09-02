<?php

// Visualização dos veículos
Route::get('/agendamento', 'AgendamentoController@index' );

// Agendar - Create é o nome do arquivo = create.blade.php
Route::get('/agendamento/agendar', 'AgendamentoController@create' );

// Login
Route::get('/agendamento/login', 'AgendamentoController@login' );

// Lista de usuários
Route::get('/agendamento/usuarios', 'AgendamentoController@usuarios' );