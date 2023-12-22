<?php

namespace Webkul\RestApi\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\URL;
use Webkul\Sales\Models\OrderProxy;
use Shetabit\Visitor\Traits\Visitor;
use Webkul\Checkout\Models\CartProxy;
use Webkul\Sales\Models\InvoiceProxy;
use Webkul\Core\Models\SubscribersListProxy;
use Webkul\Product\Models\ProductReviewProxy;
use Webkul\Admin\Mail\Admin\ResetPasswordNotification;
use Webkul\User\Contracts\Admin as AdminContract;
use Webkul\User\Database\Factories\AdminFactory;


class Admin extends Authenticatable implements AdminContract
{
    use HasApiTokens, HasFactory, Notifiable, Visitor;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'api_token',
        'role_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token',
        'remember_token',
    ];

    /**
     * Get image url for the product image.
     */
    public function image_url()
    {
        if (! $this->image) {
            return;
        }

        return Storage::url($this->image);
    }

    /**
     * Get image url for the product image.
     */
    public function getImageUrlAttribute()
    {
        return $this->image_url();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        $array['image_url'] = $this->image_url;

        return $array;
    }

    /**
     * Get the role that owns the admin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(RoleProxy::modelClass());
    }

    /**
     * Checks if admin has permission to perform certain action.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if (
            $this->role->permission_type == 'custom'
            && ! $this->role->permissions
        ) {
            return false;
        }

        return in_array($permission, $this->role->permissions);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return AdminFactory::new();
    }
}
