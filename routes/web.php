<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventParticipationController;
use App\Http\Controllers\MatchScheduleController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\PlayerController;


Route::get('/', function () {
    $events = Event::with('organizer')->get();
    return view('welcome', compact('events'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registration/success', function () {
    return view('auth.registration-success');
})->name('registration.success');


Route::post('/check-email', [RegisteredUserController::class, 'checkEmail'])->name('check-email');
Route::get('verify-email/{id}/{token}', [RegisteredUserController::class, 'verify'])->name('verify.email');

Route::get('/admin/login', [AdminController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'handleAdminLogin'])->name('admin.login.submit');
Route::post('/check-credentials', [AuthenticatedSessionController::class, 'checkCredentials']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// become organizer

Route::get('/become-organizer', [UserController::class, 'becomeOrganizer'])->name('become-organizer');
Route::post('/become-organizer', [UserController::class, 'becomeOrganizerRequest']);

//Admin
Route::get('/organizers', [AdminController::class, 'organizers'])->name('organizers');
Route::get('/requests', [AdminController::class, 'requests'])->name('requests');
Route::get('/events', [AdminController::class, 'events'])->name('events');
Route::get('/teams', [AdminController::class, 'teams'])->name('teams');
Route::get('team/{id}', [AdminController::class, 'team'])->name('admin.team');

Route::post('/admin/player/accept', [AdminController::class, 'acceptPlayer'])->name('admin.acceptPlayer');
Route::post('/admin/player/reject', [AdminController::class, 'rejectPlayer'])->name('admin.rejectPlayer');


Route::get('/players', [AdminController::class, 'players'])->name('players');

Route::post('/admin/accept-organizer', [AdminController::class, 'acceptOrganizer'])->name('admin.acceptOrganizer');
Route::post('/admin/reject-organizer', [AdminController::class, 'rejectOrganizer'])->name('admin.rejectOrganizer');




//events

Route::get('/organizer/create_event', [EventController::class, 'event'])->name('organizer.createEvent');
Route::post('/organizer/createEvent', [EventController::class, 'createEvent'])->name('organizer.store');
Route::get('/user/event/{id}', [EventController::class, 'showEvent'])->name('user.event');

//Team


Route::get('/create-team', [TeamController::class, 'createTeam'])->name('teams.create');
Route::post('/teams/store', [TeamController::class, 'storeTeam'])->name('teams.store');
Route::get('/teams/{id}', [TeamController::class, 'showTeam'])->name('teams.show');
Route::get('/myteam', [TeamController::class, 'myTeam'])->name('myteam');

Route::get('/teams/{id}/invite', [TeamController::class, 'invitePlayers'])->name('teams.invite');
Route::post('/teams/{id}/send-invitations', [TeamController::class, 'sendInvitations'])->name('teams.sendInvitations');
Route::get('/players/{id}/accept-invitation', [TeamController::class, 'acceptInvitation'])->name('players.acceptInvitation');

//event Participation

Route::get('/event_participation', [EventParticipationController::class, 'create'])->name('event_participation');
Route::post('/event-participation/store', [EventParticipationController::class, 'store'])->name('event-participation.store');
Route::get('/event_participations', [EventParticipationController::class, 'index'])->name('event_participations');

//MatchSchedule

Route::get('/events/{eventId}/matches', [MatchScheduleController::class, 'index'])->name('matches.index');
Route::post('/events/{eventId}/matches/generate', [MatchScheduleController::class, 'generateSchedule'])->name('matches.generate');
Route::put('/matches/{id}/update', [MatchScheduleController::class, 'update'])->name('matches.update');
Route::post('/events/{eventId}/matches', [MatchScheduleController::class, 'store'])->name('matches.store');

Route::get('/events/{eventId}/standings', [MatchScheduleController::class, 'generateStandings'])->name('matches.standings');

Route::post('/player/remove', [PlayerController::class, 'remove'])->name('player.remove');


});

require __DIR__.'/auth.php';
