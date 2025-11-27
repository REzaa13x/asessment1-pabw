<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'coins',
        'photo',
        'phone',
        'birth_date',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the coin histories for the user.
     */
    public function coinHistories()
    {
        return $this->hasMany(CoinHistory::class);
    }

    /**
     * Get the donation transactions for the user.
     */
    public function donationTransactions()
    {
        return $this->hasMany(\App\Models\DonationTransaction::class);
    }

    /**
     * Add coins to user
     */
    public function addCoins($amount, $reason = 'donation_completed')
    {
        $this->increment('coins', $amount);

        $this->coinHistories()->create([
            'amount' => $amount,
            'reason' => $reason,
            'transaction_type' => 'earned',
        ]);
    }
}
