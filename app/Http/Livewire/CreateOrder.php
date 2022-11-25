<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateOrder extends Component
{
    public  $contact,
            $phone,
            $address,
            $reference,
            $departments,
            $cities = [],
            $districts = [],
            $shipping_type = '',
            $shipping_cost = 0;

    public  $department_id = '',
            $city_id = '',
            $district_id = '';

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'shipping_type' => 'required',
    ];

    public function mount() {
        $this->departments = Department::all();
    }

    public function updatedShippingType($value) {
        if ($value == 1) {
            $this->resetValidation([
                'department_id', 'city_id', 'district_id', 'address', 'reference'
            ]);
        }
    }

    public function updatedDepartmentId($value) {
        $this->cities = City::where('department_id', $value)->get();

        $this->reset(['city_id', 'district_id']);
    }

    public function updatedCityId($value) {
        $city = City::find($value);

        $this->shipping_cost = $city->shipping_cost;

        $this->districts = District::where('city_id', $value)->get();

        $this->reset('district_id');
    }

    public function create_order() {
        $rules = $this->rules;

        if ($this->shipping_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['reference'] = 'required';
        }

        $this->validate($rules);

        $order = new Order();

        $order->user_id = Auth::id();
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->shipping_type = $this->shipping_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->content = Cart::content();

        if ($this->shipping_type == 2) {
            $order->shipping_cost = $this->shipping_cost;
            $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address;
            $order->reference = $this->reference;
        }

        $order->save();

        foreach (Cart::content() as $item) {
            stockDiscount($item);
        }

        Cart::destroy();

        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
