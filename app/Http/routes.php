<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Project routes
$app->get('/projects', 'ProjectController@getProjects');
$app->get('/projects/{projectId}', 'ProjectController@getProject');
$app->post('/projects', 'ProjectController@postProject');
$app->delete('/projects/{projectId}', 'ProjectController@deleteProject');

$app->get('/projects/{projectId}/users', 'ProjectController@getProjectUsers');
$app->post('/projects/{projectId}/users', 'ProjectController@postProjectUsers');

// Ticket routes
$app->get('/projects/{projectId}/tickets', 'TicketController@getProjectTickets');
$app->post('/projects/{projectId}/tickets', 'TicketController@postProjectTickets');

$app->get('/tickets/{ticketNumber}', 'TicketController@getTicket');
$app->put('/tickets/{ticketNumber}', 'TicketController@putTicket');
$app->delete('/tickets/{ticketNumber}', 'TicketController@deleteTicket');
