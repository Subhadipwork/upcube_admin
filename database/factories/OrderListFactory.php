<?php

namespace Database\Factories;

use App\Models\OrderList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class OrderListFactory extends Factory
{
    protected $model = OrderList::class;

    public function definition()
    {
        $invoiceNumber = Cache::get('invoice_no_counter', 1); // Get the current counter from cache or default to 1
        Cache::forever('invoice_no_counter', $invoiceNumber + 1); // Increment the counter in the cache for the next use

        
        $statuses = ['placed', 'accepted', 'shipped', 'out for delivery', 'delivered', 'cancelled', 'returned'];
        $user = \App\Models\User::inRandomOrder()->first();

        // if ($user) {
        //     $email = $user->email;
        // } else {
          
        //     $email = $this->faker->unique()->safeEmail; 
        // }
        
        $status = $statuses[array_rand($statuses)];
        $order_date = $this->faker->dateTimeThisYear();
        $accepted_date = null;
        $shipped_date = null;
        $out_for_delivery_date = null;
        $delivered_date = null;
        $cancelled_date = null;
        $returned_date = null;
    
        switch ($status) {
            case 'accepted':
                $accepted_date = $this->faker->dateTimeInInterval($order_date, '+3 days');
                break;
            case 'shipped':
                $accepted_date = $this->faker->dateTimeInInterval($order_date, '+3 days');
                $shipped_date = $this->faker->dateTimeInInterval($accepted_date, '+3 days');
                break;
            case 'out for delivery':
                $accepted_date = $this->faker->dateTimeInInterval($order_date, '+3 days');
                $shipped_date = $this->faker->dateTimeInInterval($accepted_date, '+3 days');
                $out_for_delivery_date = $this->faker->dateTimeInInterval($shipped_date, '+2 days');
                break;
            case 'delivered':
                $accepted_date = $this->faker->dateTimeInInterval($order_date, '+3 days');
                $shipped_date = $this->faker->dateTimeInInterval($accepted_date, '+3 days');
                $out_for_delivery_date = $this->faker->dateTimeInInterval($shipped_date, '+2 days');
                $delivered_date = $this->faker->dateTimeInInterval($out_for_delivery_date, '+2 days');
                break;
            case 'cancelled':
                $accepted_date = $this->faker->dateTimeInInterval($order_date, '+3 days');
                $cancelled_date = $this->faker->dateTimeInInterval($accepted_date, '+5 days');
                break;
            case 'returned':
                $accepted_date = $this->faker->dateTimeInInterval($order_date, '+3 days');
                $shipped_date = $this->faker->dateTimeInInterval($accepted_date, '+3 days');
                $out_for_delivery_date = $this->faker->dateTimeInInterval($shipped_date, '+2 days');
                $delivered_date = $this->faker->dateTimeInInterval($out_for_delivery_date, '+2 days');
                $returned_date = $this->faker->dateTimeInInterval($delivered_date, '+4 days');
                break;
        }

        return [
            // 'invoice_no' => $this->faker->unique()->numerify('INV######'),
            'invoice_no' => 'INV' . str_pad($invoiceNumber, 6, '0', STR_PAD_LEFT),
            'user_id' => $user->id,
            'subtotal' => $this->faker->randomFloat(2, 10, 1000),
            'grandtotal' => $this->faker->randomFloat(2, 10, 1000),
            'delivery_charge' => $this->faker->randomFloat(2, 0, 100),
            'discount_amount' => $this->faker->randomFloat(2, 0, 100),
            'discount_type' => $this->faker->randomNumber(1),
            'gst' => $this->faker->randomFloat(2, 0, 100),
            'status' => $status,
            'name' => $this->faker->name,
            'email' => 'dasjay@example.com',
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'pincode' => $this->faker->postcode,
            'landmark' => $this->faker->streetAddress,
            'notes' => $this->faker->sentence,
            'payment_method' => $this->faker->randomElement(['card', 'cash', 'online']),
            'payment_status' => $this->faker->randomElement(['pending', 'completed']),
            'transaction_id' => $this->faker->bankAccountNumber,
            'coupon_code' => $this->faker->optional()->word,
            'coupon_amount' => $this->faker->optional()->randomFloat(2, 0, 100),
            
            'order_date' => $order_date,
            'accepted_date' => $accepted_date,
            'shipped_date' => $shipped_date,
            'out_for_delivery_date' => $out_for_delivery_date,
            'delivered_date' => $delivered_date,
            'cancelled_date' => $cancelled_date,
            'returned_date' => $returned_date,
        ];
    }
}
