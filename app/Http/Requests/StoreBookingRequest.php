<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'suburb_id' => ['required', 'integer', 'exists:suburbs,id,is_active,1'],
            'bin_size_id' => ['required', 'integer', 'exists:bin_sizes,id,is_active,1'],
            'waste_type_id' => ['required', 'integer', 'exists:waste_types,id'],
            'delivery_date' => ['required', 'date', 'after_or_equal:tomorrow'],
            'pickup_date' => ['required', 'date', 'after_or_equal:delivery_date'],
            'customer_name' => ['required', 'string', 'min:3', 'max:150'],
            // Regex for Australian Landline and Mobile Numbers (e.g. 0412 345 678, +61 412 345 678, (02) 6772 1234)
            'customer_phone' => ['required', 'string', 'regex:/^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$/'],
            'customer_email' => ['required', 'email:rfc,dns', 'max:150'],
            'delivery_address' => ['required', 'string', 'min:5', 'max:255'],
            'placement_location' => ['required', 'in:driveway,nature_strip'],
        ];
    }

    public function messages(): array
    {
        return [
            'suburb_id.exists' => 'Selected suburb is currently outside our regular service area. Please call our office on 0429 323 696.',
            'delivery_date.after_or_equal' => 'Online deliveries require at least 24 hours advance notice. For same-day bookings, please call our office.',
            'customer_phone.regex' => 'Please enter a valid Australian mobile or landline phone number (e.g. 0412 345 678 or 02 6772 1234).',
            'pickup_date.after_or_equal' => 'The pickup date cannot precede the delivery date.',
            'placement_location.in' => 'Placement location must be either Private Driveway or Nature Strip / Street.',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $v) {
            if ($this->filled('delivery_date')) {
                $delivery = Carbon::parse($this->input('delivery_date'));
                if ($delivery->isSunday()) {
                    $v->errors()->add('delivery_date', 'We do not deliver skip bins on Sundays.');
                }
            }

            if ($this->filled('pickup_date')) {
                $pickup = Carbon::parse($this->input('pickup_date'));
                if ($pickup->isSunday()) {
                    $v->errors()->add('pickup_date', 'We do not collect skip bins on Sundays.');
                }
            }
        });
    }
}