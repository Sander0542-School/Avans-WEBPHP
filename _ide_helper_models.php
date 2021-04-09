<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Cinema
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaHall[] $halls
 * @property-read int|null $halls_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaShow[] $shows
 * @property-read int|null $shows_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereUpdatedAt($value)
 */
	class Cinema extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CinemaHall
 *
 * @property int $id
 * @property int $cinema_id
 * @property int $chair_rows
 * @property int $chair_row_seats
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cinema|null $cinema
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaShow[] $shows
 * @property-read int|null $shows_count
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereChairRowSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereChairRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereCinemaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereUpdatedAt($value)
 */
	class CinemaHall extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CinemaMovie
 *
 * @property int $id
 * @property string $title
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaMovie whereUpdatedAt($value)
 */
	class CinemaMovie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CinemaReservation
 *
 * @property int $id
 * @property int $cinema_show_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaReservationSeat[] $seats
 * @property-read int|null $seats_count
 * @property-read \App\Models\CinemaShow|null $show
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation whereCinemaShowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservation whereUserId($value)
 */
	class CinemaReservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CinemaReservationSeat
 *
 * @property int $id
 * @property int $cinema_reservation_id
 * @property int $row_id
 * @property int $seat_id
 * @property-read \App\Models\CinemaReservation|null $reservation
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat whereCinemaReservationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaReservationSeat whereSeatId($value)
 */
	class CinemaReservationSeat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CinemaShow
 *
 * @property int $id
 * @property int $cinema_hall_id
 * @property int $movie_id
 * @property \Illuminate\Support\Carbon $start_datetime
 * @property \Illuminate\Support\Carbon $end_datetime
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cinema|null $cinema
 * @property-read \App\Models\CinemaHall|null $hall
 * @property-read \App\Models\CinemaMovie|null $movie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaReservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereCinemaHallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaShow whereUpdatedAt($value)
 */
	class CinemaShow extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property \Illuminate\Support\Carbon $start_datetime
 * @property \Illuminate\Support\Carbon $end_datetime
 * @property int $max_tickets
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $days
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventReservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereMaxTickets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EventReservation
 *
 * @property int $id
 * @property int $event_id
 * @property int $user_id
 * @property int $ticket_count
 * @property string $picture
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read EventReservation|null $event
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereTicketCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventReservation whereUserId($value)
 */
	class EventReservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property int $restaurant_kitchen_id
 * @property string $name
 * @property string $location
 * @property \Illuminate\Support\Carbon $opens_at
 * @property \Illuminate\Support\Carbon $closes_at
 * @property int $max_seats
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RestaurantKitchen|null $kitchen
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RestaurantReservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereClosesAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereMaxSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereOpensAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereRestaurantKitchenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUpdatedAt($value)
 */
	class Restaurant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RestaurantKitchen
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Restaurant[] $restaurants
 * @property-read int|null $restaurants_count
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantKitchen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantKitchen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantKitchen query()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantKitchen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantKitchen whereName($value)
 */
	class RestaurantKitchen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RestaurantReservation
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int $user_id
 * @property string $start_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Restaurant|null $restaurant
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantReservation whereUserId($value)
 */
	class RestaurantReservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $street
 * @property string $building_number
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZipCode($value)
 */
	class User extends \Eloquent {}
}

